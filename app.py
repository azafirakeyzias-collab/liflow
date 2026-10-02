"""
========================================================
LIFLOW - Flask Web Application Deployment
Provides:
- Web App routing (Guest marketing site vs Authenticated Dashboard)
- Auth API (/api/auth & /api/auth.php for JS compatibility)
- State Management API (/api/state & /api/state.php)
- Static file serving (CSS, JS, images)
- Local SQLite / JSON persistence
========================================================
"""

import os
import json
import sqlite3
from flask import Flask, request, jsonify, session, send_from_directory, redirect, url_for

BASE_DIR = os.path.abspath(os.path.dirname(__file__))
DB_FILE = os.path.join(BASE_DIR, "liflow.db")

app = Flask(__name__, static_folder="assets", static_url_path="/assets")
app.secret_key = "liflow_super_secret_key_guilt_free_life_os"

# ────────────────────────────────────────────────────────
# DATABASE SETUP (SQLite)
# ────────────────────────────────────────────────────────
def init_db():
    conn = sqlite3.connect(DB_FILE)
    cur = conn.cursor()
    cur.execute("""
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT UNIQUE NOT NULL,
            email TEXT UNIQUE NOT NULL,
            password TEXT NOT NULL
        )
    """)
    cur.execute("""
        CREATE TABLE IF NOT EXISTS user_data (
            user_id INTEGER PRIMARY KEY,
            state_json TEXT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )
    """)
    conn.commit()
    conn.close()

init_db()

DEFAULT_STATE = {
    "tasks": [
        {"id": 1, "text": "Selesaikan Desain UI Liflow", "category": "Productivity", "priority": "High", "completed": True},
        {"id": 2, "text": "Meeting Organisasi", "category": "Productivity", "priority": "Medium", "completed": False},
        {"id": 3, "text": "Olahraga 30 menit", "category": "Health", "priority": "Medium", "completed": False},
        {"id": 4, "text": "Review Anggaran Bulanan", "category": "Finance", "priority": "Low", "completed": True}
    ],
    "habits": [
        {"id": 1, "name": "Minum air 8 gelas", "streak": 7, "doneToday": True},
        {"id": 2, "name": "Olahraga 30 menit", "streak": 5, "doneToday": False},
        {"id": 3, "name": "Baca buku 15 menit", "streak": 3, "doneToday": False},
        {"id": 4, "name": "Tidur sebelum 23.00", "streak": 6, "doneToday": True}
    ],
    "transactions": [
        {"id": 1, "name": "Makan Siang", "amount": 25000, "type": "expense"},
        {"id": 2, "name": "Transportasi", "amount": 15000, "type": "expense"},
        {"id": 3, "name": "Freelance UI", "amount": 350000, "type": "income"},
        {"id": 4, "name": "Kopi", "amount": 18000, "type": "expense"}
    ],
    "reflection": {
        "mood": "🙂",
        "win": "Menyelesaikan migrasi deployment Flask Liflow",
        "challenge": "Sinkronisasi sesi dan modularisasi",
        "gratitude": "Kesehatan yang baik dan ketenangan pikiran"
    },
    "tomorrow": {
        "focusArea": "Kuliah",
        "plan": "Fokus pada perkuliahan dan eksplorasi fitur baru.",
        "wakeTime": "06:00"
    },
    "lifeScore": 86
}

# ────────────────────────────────────────────────────────
# HTML TEMPLATE READERS
# ────────────────────────────────────────────────────────
def read_file_safe(relative_path):
    path = os.path.join(BASE_DIR, relative_path)
    if os.path.exists(path):
        with open(path, "r", encoding="utf-8") as f:
            content = f.read()
            # Clean PHP tags if embedding raw partials
            content = content.replace("<?php", "").replace("?>", "")
            return content
    return ""

def render_guest_site():
    """Assembles the guest marketing site."""
    header = read_file_safe("includes/header.php")
    # Replace PHP echo with empty or default
    header = header.replace("<?php echo $db_connected ? 'true' : 'false'; ?>", "true")
    header = header.replace("<?php echo isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 'null'; ?>", "null")
    # Clean any leftover PHP if statements in header
    if "<?php if (isset($_SESSION['user_id'])):" in header:
        parts = header.split("<?php if (isset($_SESSION['user_id'])):")
        after_else = parts[1].split("<?php else: ?>")[1].split("<?php endif; ?>")
        header = parts[0] + after_else[0] + after_else[1]

    landing = read_file_safe("views/landing.php")
    about = read_file_safe("views/about.php")
    features = read_file_safe("views/features.php")
    pricing = read_file_safe("views/pricing.php")
    blog = read_file_safe("views/blog.php")
    footer = read_file_safe("includes/footer.php")

    return f"{header}\n{landing}\n{about}\n{features}\n{pricing}\n{blog}\n{footer}"

def render_app_dashboard(username, email, user_id):
    """Assembles the authenticated dashboard."""
    app_header = read_file_safe("includes/app_header.php")
    app_header = app_header.replace("<?= htmlspecialchars($_SESSION['username'] ?? 'Dashboard') ?>", username)
    app_header = app_header.replace("<?php echo $db_connected ? 'true' : 'false'; ?>", "true")
    app_header = app_header.replace("<?php echo (int)($_SESSION['user_id'] ?? 0); ?>", str(user_id))
    app_header = app_header.replace('username: "<?= htmlspecialchars($_SESSION[\'username\'] ?? \'\') ?>"', f'username: "{username}"')
    app_header = app_header.replace('email:    "<?= htmlspecialchars($_SESSION[\'email\']    ?? \'\') ?>"', f'email: "{email}"')

    app_view = read_file_safe("views/app.php")
    app_view = app_view.replace("<?= strtoupper(substr($_SESSION['username'] ?? 'U', 0, 1)) ?>", (username[0] if username else 'U').upper())
    app_view = app_view.replace("<?= htmlspecialchars($_SESSION['username'] ?? '') ?>", username)
    app_view = app_view.replace("<?= htmlspecialchars($_SESSION['email'] ?? '') ?>", email)

    app_footer = read_file_safe("includes/app_footer.php")

    return f"{app_header}\n{app_view}\n{app_footer}"

# ────────────────────────────────────────────────────────
# ROUTES
# ────────────────────────────────────────────────────────
@app.route("/")
def index():
    user_id = session.get("user_id")
    if user_id:
        username = session.get("username", "Pengguna")
        email = session.get("email", "user@liflow.app")
        return render_app_dashboard(username, email, user_id)
    return render_guest_site()

@app.route("/liflow.png")
def favicon():
    return send_from_directory(BASE_DIR, "liflow.png")

# ────────────────────────────────────────────────────────
# AUTH API (/api/auth & /api/auth.php for frontend compatibility)
# ────────────────────────────────────────────────────────
@app.route("/api/auth", methods=["GET", "POST"])
@app.route("/api/auth.php", methods=["GET", "POST"])
def auth_api():
    action = request.args.get("action") or request.args.get("api") or ""

    if action == "register":
        data = request.get_json(silent=True) or request.form
        username = (data.get("username") or "").strip()
        email = (data.get("email") or "").strip()
        password = data.get("password") or ""

        if not username or not email or not password:
            return jsonify({"success": False, "message": "Harap isi semua kolom pendaftaran."})

        conn = sqlite3.connect(DB_FILE)
        cur = conn.cursor()
        cur.execute("SELECT id FROM users WHERE email = ? OR username = ?", (email, username))
        if cur.fetchone():
            conn.close()
            return jsonify({"success": False, "message": "Username atau email sudah terdaftar."})

        cur.execute("INSERT INTO users (username, email, password) VALUES (?, ?, ?)", (username, email, password))
        user_id = cur.lastrowid
        cur.execute("INSERT INTO user_data (user_id, state_json) VALUES (?, ?)", (user_id, json.dumps(DEFAULT_STATE)))
        conn.commit()
        conn.close()

        session["user_id"] = user_id
        session["username"] = username
        session["email"] = email

        return jsonify({
            "success": True,
            "user": {"username": username, "email": email},
            "state": DEFAULT_STATE
        })

    elif action == "login":
        data = request.get_json(silent=True) or request.form
        email = (data.get("email") or "").strip()
        password = data.get("password") or ""

        if not email or not password:
            return jsonify({"success": False, "message": "Harap masukkan email dan kata sandi."})

        conn = sqlite3.connect(DB_FILE)
        cur = conn.cursor()
        cur.execute("SELECT id, username, email, password FROM users WHERE email = ? OR username = ?", (email, email))
        user = cur.fetchone()

        if user and user[3] == password:
            user_id, username, user_email = user[0], user[1], user[2]
            cur.execute("SELECT state_json FROM user_data WHERE user_id = ?", (user_id,))
            state_row = cur.fetchone()
            state = json.loads(state_row[0]) if state_row else DEFAULT_STATE
            conn.close()

            session["user_id"] = user_id
            session["username"] = username
            session["email"] = user_email

            return jsonify({
                "success": True,
                "user": {"username": username, "email": user_email},
                "state": state
            })
        elif not user:
            # Quick guest login fallback
            username = email.split("@")[0].capitalize() or "Zafira"
            cur.execute("INSERT INTO users (username, email, password) VALUES (?, ?, ?)", (username, email, password))
            user_id = cur.lastrowid
            cur.execute("INSERT INTO user_data (user_id, state_json) VALUES (?, ?)", (user_id, json.dumps(DEFAULT_STATE)))
            conn.commit()
            conn.close()

            session["user_id"] = user_id
            session["username"] = username
            session["email"] = email

            return jsonify({
                "success": True,
                "user": {"username": username, "email": email},
                "state": DEFAULT_STATE
            })
        else:
            conn.close()
            return jsonify({"success": False, "message": "Kredensial login Anda salah."})

    elif action == "logout":
        session.clear()
        return jsonify({"success": True})

    return jsonify({"success": False, "message": "Action tidak dikenal."})

# ────────────────────────────────────────────────────────
# STATE API (/api/state & /api/state.php)
# ────────────────────────────────────────────────────────
@app.route("/api/state", methods=["GET", "POST"])
@app.route("/api/state.php", methods=["GET", "POST"])
def state_api():
    action = request.args.get("action") or request.args.get("api") or ""
    user_id = session.get("user_id")

    if not user_id:
        return jsonify({"success": False, "message": "Sesi tidak aktif."})

    if action == "save_state":
        data = request.get_json(silent=True) or {}
        state = data.get("state", {})
        state_json = json.dumps(state)

        conn = sqlite3.connect(DB_FILE)
        cur = conn.cursor()
        cur.execute("""
            INSERT INTO user_data (user_id, state_json) VALUES (?, ?)
            ON CONFLICT(user_id) DO UPDATE SET state_json = excluded.state_json
        """, (user_id, state_json))
        conn.commit()
        conn.close()

        return jsonify({"success": True})

    elif action == "get_state":
        conn = sqlite3.connect(DB_FILE)
        cur = conn.cursor()
        cur.execute("SELECT state_json FROM user_data WHERE user_id = ?", (user_id,))
        row = cur.fetchone()
        conn.close()

        state = json.loads(row[0]) if row else DEFAULT_STATE
        return jsonify({"success": True, "state": state})

    return jsonify({"success": False, "message": "Action tidak dikenal."})

if __name__ == "__main__":
    print("[LIFLOW] Flask Server running on http://127.0.0.1:5000")
    app.run(host="0.0.0.0", port=5000, debug=False)
