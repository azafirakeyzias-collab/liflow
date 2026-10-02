"""
========================================================
LIFLOW - Streamlit Interactive Life OS Application
Deployment for Week 4 (Minggu ke 4 deploy flask/streamlit)
========================================================
"""

import streamlit as st
import datetime

# ────────────────────────────────────────────────────────
# PAGE CONFIG
# ────────────────────────────────────────────────────────
st.set_page_config(
    page_title="LIFLOW — Life Operating System",
    page_icon="🌿",
    layout="wide",
    initial_sidebar_state="expanded"
)

# ────────────────────────────────────────────────────────
# CUSTOM STYLING (LIFLOW BRAND DESIGN)
# ────────────────────────────────────────────────────────
st.markdown("""
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap');

    html, body, [class*="css"] {
        font-family: 'Poppins', sans-serif;
        color: #292524;
    }
    
    h1, h2, h3, .brand-font {
        font-family: 'Playfair Display', serif !important;
    }

    .stApp {
        background-color: #FAF9F6;
    }

    /* Cards */
    .liflow-card {
        background: #FFFFFF;
        border-radius: 20px;
        padding: 24px;
        border: 1px solid #F0EFEA;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        margin-bottom: 20px;
    }

    /* Primary Buttons */
    .stButton>button {
        background-color: #7F987E !important;
        color: white !important;
        border-radius: 14px !important;
        border: none !important;
        font-weight: 600 !important;
        padding: 8px 24px !important;
        transition: all 0.2s ease !important;
    }
    .stButton>button:hover {
        background-color: #5D725C !important;
        transform: translateY(-1px) !important;
    }

    /* Metric cards */
    div[data-testid="stMetricValue"] {
        font-weight: 700 !important;
        color: #1C1917 !important;
    }
    
    .badge-green {
        background: #EAF2EA;
        color: #4C6B4B;
        padding: 4px 12px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
        display: inline-block;
    }
</style>
""", unsafe_allow_html=True)

# ────────────────────────────────────────────────────────
# SESSION STATE INITIALIZATION
# ────────────────────────────────────────────────────────
if "tasks" not in st.session_state:
    st.session_state.tasks = [
        {"id": 1, "text": "Selesaikan Desain UI Liflow", "category": "Productivity", "priority": "High", "done": True},
        {"id": 2, "text": "Meeting Organisasi & Review Proyek", "category": "Productivity", "priority": "Medium", "done": False},
        {"id": 3, "text": "Olahraga Sore 30 Menit", "category": "Health", "priority": "Medium", "done": False},
        {"id": 4, "text": "Review Anggaran Bulanan", "category": "Finance", "priority": "Low", "done": True},
    ]

if "habits" not in st.session_state:
    st.session_state.habits = [
        {"id": 1, "name": "Minum air 8 gelas", "streak": 7, "done": True},
        {"id": 2, "name": "Olahraga 30 menit", "streak": 5, "done": False},
        {"id": 3, "name": "Baca buku 15 menit", "streak": 3, "done": False},
        {"id": 4, "name": "Tidur sebelum 23.00", "streak": 6, "done": True},
    ]

if "transactions" not in st.session_state:
    st.session_state.transactions = [
        {"name": "Makan Siang Sehat", "amount": 35000, "type": "Pengeluaran"},
        {"name": "Transportasi Kereta", "amount": 15000, "type": "Pengeluaran"},
        {"name": "Project Freelance UI", "amount": 450000, "type": "Pemasukan"},
        {"name": "Beli Buku Digital", "amount": 65000, "type": "Pengeluaran"},
    ]

if "reflection" not in st.session_state:
    st.session_state.reflection = {
        "mood": "🙂 Baik",
        "win": "Berhasil menyelesaikan deployment sistem",
        "challenge": "Menjaga fokus di tengah padatnya tugas",
        "gratitude": "Waktu istirahat yang berkualitas dan keluarga sehat"
    }

# ────────────────────────────────────────────────────────
# SIDEBAR
# ────────────────────────────────────────────────────────
with st.sidebar:
    st.markdown("""
    <div style="display:flex; align-items:center; gap:12px; margin-bottom: 24px;">
        <div style="width:40px; height:40px; border-radius:12px; background:#7F987E; display:flex; align-items:center; justify-content:center; color:white; font-weight:bold; font-size:18px;">LF</div>
        <div>
            <h3 style="margin:0; font-size:18px; line-height:1;">LIFLOW</h3>
            <span style="font-size:10px; color:#A8A29E; text-transform:uppercase; letter-spacing:1px;">Life OS Python</span>
        </div>
    </div>
    """, unsafe_allow_html=True)

    menu = st.radio(
        "Navigasi Modul",
        [
            "🏠 Dashboard Utama",
            "📋 Daily Planner",
            "🔥 Habit Tracker",
            "💰 Money Tracker",
            "⏱️ Focus Mode",
            "🌙 Daily Reflection",
            "🔄 Plan Tomorrow",
            "📊 Analytics 6 Pilar"
        ],
        label_visibility="collapsed"
    )

    st.markdown("---")
    st.caption("🌿 **LIFLOW v2.0** — Guilt-Free Life Architecture")
    st.caption(f"📅 {datetime.datetime.now().strftime('%A, %d %B %Y')}")

# ────────────────────────────────────────────────────────
# 1. DASHBOARD UTAMA
# ────────────────────────────────────────────────────────
if menu == "🏠 Dashboard Utama":
    st.markdown('<h1 class="brand-font" style="font-size:32px; margin-bottom:4px;">Flow Your Life Better.</h1>', unsafe_allow_html=True)
    st.markdown('<span class="badge-green">✨ Life Score: 86 / 100 — Excellent State</span>', unsafe_allow_html=True)
    st.write("")

    # Top KPI Metrics
    done_tasks = sum(1 for t in st.session_state.tasks if t["done"])
    total_tasks = len(st.session_state.tasks)
    total_income = sum(t["amount"] for t in st.session_state.transactions if t["type"] == "Pemasukan")
    total_expense = sum(t["amount"] for t in st.session_state.transactions if t["type"] == "Pengeluaran")
    balance = total_income - total_expense

    c1, c2, c3, c4 = st.columns(4)
    with c1:
        st.metric("Life Score", "86 / 100", "+4 poin")
    with c2:
        st.metric("Agenda Selesai", f"{done_tasks}/{total_tasks}", f"{int(done_tasks/total_tasks*100) if total_tasks else 0}%")
    with c3:
        st.metric("Habit Aktif", f"{len(st.session_state.habits)} Habits", "7 Hari Streak")
    with c4:
        st.metric("Saldo Bersih", f"Rp {balance:,.0f}", f"-Rp {total_expense:,.0f}")

    st.write("")
    
    col_left, col_right = st.columns([1.2, 1])

    with col_left:
        st.subheader("📋 Agenda Prioritas Hari Ini")
        for t in st.session_state.tasks:
            done = st.checkbox(f"**{t['text']}** — `{t['category']}` ({t['priority']})", value=t["done"], key=f"dash_task_{t['id']}")
            t["done"] = done

    with col_right:
        st.subheader("🔥 Habit Streak")
        for h in st.session_state.habits:
            st.write(f"{'✅' if h['done'] else '⏳'} **{h['name']}** — 🔥 `{h['streak']} hari berturut-turut`")

# ────────────────────────────────────────────────────────
# 2. DAILY PLANNER
# ────────────────────────────────────────────────────────
elif menu == "📋 Daily Planner":
    st.markdown('<h2 class="brand-font">📋 Daily Planner</h2>', unsafe_allow_html=True)
    st.write("Kelola prioritas harianmu tanpa rasa bersalah (*no-punishment design*).")

    with st.expander("➕ Tambah Tugas Baru", expanded=True):
        col1, col2, col3, col4 = st.columns([3, 1.5, 1.5, 1])
        with col1:
            new_title = st.text_input("Nama Tugas", placeholder="Contoh: Belajar Python Flask...")
        with col2:
            new_cat = st.selectbox("Kategori", ["Productivity", "Health", "Learning", "Finance", "Personal"])
        with col3:
            new_prio = st.selectbox("Prioritas", ["High 🔴", "Medium 🟡", "Low 🟢"])
        with col4:
            st.write("")
            st.write("")
            if st.button("Simpan"):
                if new_title.strip():
                    st.session_state.tasks.insert(0, {
                        "id": int(datetime.datetime.now().timestamp()),
                        "text": new_title.strip(),
                        "category": new_cat,
                        "priority": new_prio.split()[0],
                        "done": False
                    })
                    st.success("Tugas berhasil ditambahkan!")
                    st.rerun()

    st.write("### Daftar Agenda")
    for i, t in enumerate(st.session_state.tasks):
        col_c, col_del = st.columns([5, 1])
        with col_c:
            checked = st.checkbox(f"{t['text']} | `{t['category']}` — **{t['priority']}**", value=t["done"], key=f"p_task_{t['id']}")
            t["done"] = checked
        with col_del:
            if st.button("Hapus", key=f"del_task_{t['id']}"):
                st.session_state.tasks.pop(i)
                st.rerun()

# ────────────────────────────────────────────────────────
# 3. HABIT TRACKER
# ────────────────────────────────────────────────────────
elif menu == "🔥 Habit Tracker":
    st.markdown('<h2 class="brand-font">🔥 Habit Tracker</h2>', unsafe_allow_html=True)
    st.write("Bangun kebiasaan mikro berkelanjutan setiap hari.")

    with st.expander("➕ Tambah Habit Baru"):
        col_h1, col_h2 = st.columns([4, 1])
        with col_h1:
            new_h_name = st.text_input("Nama Habit", placeholder="Contoh: Meditasi 10 menit...")
        with col_h2:
            st.write("")
            st.write("")
            if st.button("Tambah Habit"):
                if new_h_name.strip():
                    st.session_state.habits.append({
                        "id": int(datetime.datetime.now().timestamp()),
                        "name": new_h_name.strip(),
                        "streak": 1,
                        "done": True
                    })
                    st.success("Habit baru ditambahkan!")
                    st.rerun()

    st.write("### Kebiasaan Aktif")
    for i, h in enumerate(st.session_state.habits):
        c_check, c_streak, c_btn = st.columns([3, 2, 1])
        with c_check:
            st.markdown(f"**{h['name']}**")
        with c_streak:
            st.markdown(f"🔥 `{h['streak']} hari streak`")
        with c_btn:
            btn_label = "Batal" if h["done"] else "Centang"
            if st.button(btn_label, key=f"hb_{h['id']}"):
                h["done"] = not h["done"]
                if h["done"]:
                    h["streak"] += 1
                else:
                    h["streak"] = max(0, h["streak"] - 1)
                st.rerun()

# ────────────────────────────────────────────────────────
# 4. MONEY TRACKER
# ────────────────────────────────────────────────────────
elif menu == "💰 Money Tracker":
    st.markdown('<h2 class="brand-font">💰 Money Tracker</h2>', unsafe_allow_html=True)
    st.write("Catat arus kas sederhana tanpa beban kalkulasi rumit.")

    income_total = sum(t["amount"] for t in st.session_state.transactions if t["type"] == "Pemasukan")
    expense_total = sum(t["amount"] for t in st.session_state.transactions if t["type"] == "Pengeluaran")
    current_bal = income_total - expense_total

    m1, m2, m3 = st.columns(3)
    m1.metric("Total Pengeluaran", f"Rp {expense_total:,.0f}")
    m2.metric("Total Pemasukan", f"Rp {income_total:,.0f}")
    m3.metric("Saldo Bersih", f"Rp {current_bal:,.0f}")

    with st.expander("➕ Catat Transaksi Baru"):
        col_m1, col_m2, col_m3, col_m4 = st.columns([3, 2, 2, 1])
        with col_m1:
            tr_desc = st.text_input("Keterangan", placeholder="Contoh: Makan Siang...")
        with col_m2:
            tr_amount = st.number_input("Nominal (Rp)", min_value=1000, step=5000, value=20000)
        with col_m3:
            tr_type = st.selectbox("Jenis", ["Pengeluaran", "Pemasukan"])
        with col_m4:
            st.write("")
            st.write("")
            if st.button("Catat"):
                if tr_desc.strip():
                    st.session_state.transactions.insert(0, {
                        "name": tr_desc.strip(),
                        "amount": tr_amount,
                        "type": tr_type
                    })
                    st.success("Transaksi dicatat!")
                    st.rerun()

    st.write("### Riwayat Transaksi")
    for i, t in enumerate(st.session_state.transactions):
        c1, c2, c3, c4 = st.columns([3, 2, 2, 1])
        c1.write(f"**{t['name']}**")
        c2.write(f"`{t['type']}`")
        color = "red" if t['type'] == 'Pengeluaran' else "green"
        prefix = "-" if t['type'] == 'Pengeluaran' else "+"
        c3.markdown(f"<span style='color:{color}; font-weight:bold;'>{prefix}Rp {t['amount']:,.0f}</span>", unsafe_allow_html=True)
        if c4.button("X", key=f"tr_del_{i}"):
            st.session_state.transactions.pop(i)
            st.rerun()

# ────────────────────────────────────────────────────────
# 5. FOCUS MODE
# ────────────────────────────────────────────────────────
elif menu == "⏱️ Focus Mode":
    st.markdown('<h2 class="brand-font">⏱️ Focus Mode (Pomodoro)</h2>', unsafe_allow_html=True)
    st.write("Fokus penuh pada 1 hal penting tanpa distraksi.")

    mode = st.radio("Pilih Mode", ["Pomodoro (25 Menit)", "Deep Work (50 Menit)"], horizontal=True)
    target_min = 25 if "25" in mode else 50

    st.markdown(f"""
    <div style="text-align:center; padding: 40px; background:white; border-radius:24px; border:1px solid #E7E5E4; max-width:400px; margin: 20px auto;">
        <span style="font-size:12px; color:#A8A29E; text-transform:uppercase; letter-spacing:2px; font-weight:bold;">Sesi Fokus</span>
        <h1 style="font-size: 64px; font-weight:800; color:#1C1917; margin: 10px 0;">{target_min}:00</h1>
        <p style="color:#78716C; font-size:12px;">Singkirkan notifikasi ponsel Anda</p>
    </div>
    """, unsafe_allow_html=True)

    c_btn1, c_btn2 = st.columns([1, 1])
    with c_btn1:
        if st.button("▶️ Mulai Sesi Fokus"):
            st.success("Sesi dimulai! Tetap fokus pada agenda utamamu.")
    with c_btn2:
        if st.button("🔄 Reset Timer"):
            st.info("Timer direset.")

# ────────────────────────────────────────────────────────
# 6. DAILY REFLECTION
# ────────────────────────────────────────────────────────
elif menu == "🌙 Daily Reflection":
    st.markdown('<h2 class="brand-font">🌙 Daily Reflection</h2>', unsafe_allow_html=True)
    st.write("Evaluasi singkat dan apresiasi diri sebelum beristirahat.")

    mood = st.select_slider("Mood Hari Ini", options=["😢 Sangat Lelah", "🙁 Kurang Baik", "😐 Biasa", "🙂 Baik", "🤩 Luar Biasa"], value=st.session_state.reflection["mood"])
    win = st.text_area("Pencapaian Terbesar Hari Ini", value=st.session_state.reflection["win"])
    challenge = st.text_area("Tantangan yang Dihadapi", value=st.session_state.reflection["challenge"])
    gratitude = st.text_area("Rasa Syukur Hari Ini", value=st.session_state.reflection["gratitude"])

    if st.button("💾 Simpan Refleksi Harian"):
        st.session_state.reflection = {
            "mood": mood,
            "win": win,
            "challenge": challenge,
            "gratitude": gratitude
        }
        st.success("Refleksi tersimpan dengan baik! Selamat beristirahat 🌿")

# ────────────────────────────────────────────────────────
# 7. PLAN TOMORROW
# ────────────────────────────────────────────────────────
elif menu == "🔄 Plan Tomorrow":
    st.markdown('<h2 class="brand-font">🔄 Plan Tomorrow (Siklus Terhubung)</h2>', unsafe_allow_html=True)
    st.write("Sambungkan siklus hidupmu dengan merencanakan esok hari sejak malam ini.")

    focus_area = st.pills("Fokus Utama Esok", ["🎓 Kuliah", "🏃 Sehat", "📖 Belajar", "💼 Kerja", "💰 Finansial", "🧘 Diri"], default="🎓 Kuliah")
    plan = st.text_area("Aktivitas Utama Esok", value="Fokus sesi kuliah pagi dan menyelesaikan bab kedua laporan.")
    wake = st.time_input("Target Bangun Pagi", value=datetime.time(6, 0))

    if st.button("🌙 Simpan & Istirahat dengan Tenang"):
        st.success("Rencana esok tersimpan! Tidur nyenyak malam ini 🌿")

# ────────────────────────────────────────────────────────
# 8. ANALYTICS 6 PILAR
# ────────────────────────────────────────────────────────
elif menu == "📊 Analytics 6 Pilar":
    st.markdown('<h2 class="brand-font">📊 Analytics 6 Pilar Kehidupan</h2>', unsafe_allow_html=True)
    st.write("Keseimbangan holistik hidup Anda dihitung secara transparan.")

    pillars = [
        {"name": "Productivity", "score": 85},
        {"name": "Health", "score": 78},
        {"name": "Mindfulness", "score": 90},
        {"name": "Finance", "score": 82},
        {"name": "Learning", "score": 70},
        {"name": "Relations", "score": 88}
    ]

    for p in pillars:
        st.write(f"**{p['name']}** — `{p['score']}%`")
        st.progress(p["score"] / 100)
