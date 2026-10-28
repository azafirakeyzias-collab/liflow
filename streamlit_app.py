"""
================================================================================
LIFLOW - Life Operating System (Streamlit Web & Interactive Application)
Deployment Ready for Streamlit Community Cloud & GitHub
Target:
1. Review customer dari bundling (Customer Reviews & Testimonials)
2. Web & App deployment (Navbar: Home, Fitur, Servis, Blog, About)
3. Minggu ke-4 Flask & Streamlit Deployment
4. 5 Navbar Utama + Life OS Interactive Dashboard
5. Clean, fast, guilt-free life architecture design
================================================================================
"""

import streamlit as st
import datetime
import json
import time

# ────────────────────────────────────────────────────────
# HELPER FUNCTIONS FOR COMPATIBILITY (Streamlit < 1.40 & >= 1.40)
# ────────────────────────────────────────────────────────
def do_rerun():
    """Cross-version safe rerun"""
    if hasattr(st, "rerun"):
        st.rerun()
    elif hasattr(st, "experimental_rerun"):
        st.experimental_rerun()

def safe_pills(label, options, default=None, key=None):
    """Fallback from st.pills to st.radio if older Streamlit version"""
    if hasattr(st, "pills"):
        return st.pills(label, options, default=default, key=key)
    else:
        idx = options.index(default) if default in options else 0
        return st.radio(label, options, index=idx, horizontal=True, key=key)

# ────────────────────────────────────────────────────────
# 1. PAGE CONFIGURATION
# ────────────────────────────────────────────────────────
st.set_page_config(
    page_title="LIFLOW — Life Operating System",
    page_icon="liflow.png",
    layout="wide",
    initial_sidebar_state="expanded"
)

# ────────────────────────────────────────────────────────
# 2. CUSTOM STYLING (LIFLOW BRAND DESIGN)
# ────────────────────────────────────────────────────────
st.markdown("""
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap');

    html, body, [class*="css"] {
        font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
        color: #292524;
    }
    
    h1, h2, h3, .brand-font {
        font-family: 'Playfair Display', Georgia, serif !important;
    }

    .stApp {
        background-color: #FAF9F6;
    }

    /* Modern Card Container */
    .liflow-card {
        background: #FFFFFF;
        border-radius: 20px;
        padding: 24px;
        border: 1px solid #F0EFEA;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        margin-bottom: 20px;
    }

    .liflow-card-highlight {
        background: linear-gradient(135deg, #F3F7F2 0%, #FFFFFF 100%);
        border: 2px solid #7F987E;
        border-radius: 24px;
        padding: 28px;
        box-shadow: 0 8px 30px rgba(127, 152, 126, 0.12);
        margin-bottom: 24px;
    }

    /* Badges */
    .badge-green {
        background: #EAF2EA;
        color: #385E38;
        padding: 4px 14px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
        display: inline-block;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .badge-amber {
        background: #FEF3C7;
        color: #92400E;
        padding: 4px 14px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
        display: inline-block;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    /* Review Card */
    .review-card {
        background: #FFFFFF;
        border: 1px solid #E7E5E4;
        border-radius: 18px;
        padding: 20px;
        margin-bottom: 16px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .review-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.06);
    }

    /* Custom Button Aesthetics */
    div.stButton > button {
        border-radius: 12px !important;
        font-weight: 600 !important;
        padding: 6px 20px !important;
        transition: all 0.2s ease !important;
    }

    div.stButton > button:first-child {
        background-color: #7F987E;
        color: white;
        border: none;
    }

    div.stButton > button:hover {
        background-color: #5D725C !important;
        color: white !important;
        box-shadow: 0 4px 12px rgba(93, 114, 92, 0.3) !important;
    }

    /* Metric cards */
    div[data-testid="stMetricValue"] {
        font-weight: 700 !important;
        color: #1C1917 !important;
    }
</style>
""", unsafe_allow_html=True)

# ────────────────────────────────────────────────────────
# 3. STATE INITIALIZATION
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
        {"name": "Project Freelance UI", "amount": 450000, "type": "Pemasukan"},
        {"name": "Makan Siang Sehat", "amount": 35000, "type": "Pengeluaran"},
        {"name": "Transportasi Kereta", "amount": 15000, "type": "Pengeluaran"},
        {"name": "Beli Buku Digital Life OS", "amount": 65000, "type": "Pengeluaran"},
    ]

if "reflection" not in st.session_state:
    st.session_state.reflection = {
        "mood": "🙂 Baik",
        "win": "Berhasil menyelesaikan deployment sistem ke GitHub & Streamlit Cloud",
        "challenge": "Menjaga fokus di tengah padatnya tugas mingguan",
        "gratitude": "Waktu istirahat berkualitas dan keluarga yang senantiasa sehat"
    }

# Review Customer dari Bundling (Target Catatan #1)
if "bundling_reviews" not in st.session_state:
    st.session_state.bundling_reviews = [
        {
            "name": "Sarah Amelia",
            "role": "Mahasiswa Kedokteran",
            "pack": "Bundling Starter (Life Kickstart Pack)",
            "rating": 5,
            "comment": "E-Book 'Flow Your Life' dan template habit-nya langsung saya pakai. Dulu saya stres berat to-do list menumpuk, sekarang dengan filosofi no-punishment LIFLOW belajar jadi teratur tanpa burnout!",
            "date": "2 hari yang lalu"
        },
        {
            "name": "Dimas Prasetyo",
            "role": "Software Engineer & Freelancer",
            "pack": "Bundling All-In-One (Ultimate Life OS Pack)",
            "rating": 5,
            "comment": "Bundling hemat 50% yang sangat worth it! Akses workshop online dan template Notion/LIFLOW membantu saya menyeimbangkan proyek freelance dengan olahraga. Money tracker-nya simpel dan cepat.",
            "date": "4 hari yang lalu"
        },
        {
            "name": "Nadia Kusuma",
            "role": "Product Manager & Ibu Muda",
            "pack": "Bundling Starter (Life Kickstart Pack)",
            "rating": 5,
            "comment": "Fitur Plan Tomorrow di paket bundling ini mengubah rutinitas pagi saya secara drastis. Tidur lebih tenang karena rencana esok sudah tersusun. Onboarding support-nya sangat ramah!",
            "date": "1 minggu yang lalu"
        },
        {
            "name": "Rian Hidayat",
            "role": "Content Creator",
            "pack": "Bundling All-In-One (Ultimate Life OS Pack)",
            "rating": 5,
            "comment": "Streak habit dan focus mode pomodoro di LIFLOW bikin produktivitas saya naik 2x lipat. Hemat banget ambil paket tahunan, sangat recommended untuk siapa pun yang ingin hidup lebih tertata.",
            "date": "2 minggu yang lalu"
        }
    ]

# ────────────────────────────────────────────────────────
# 4. SIDEBAR NAVIGATION
# ────────────────────────────────────────────────────────
with st.sidebar:
    st.markdown("""
    <div style="display:flex; align-items:center; gap:12px; margin-bottom: 20px;">
        <div style="width:42px; height:42px; border-radius:12px; background:#7F987E; display:flex; align-items:center; justify-content:center; color:white; font-weight:bold; font-size:20px; box-shadow:0 4px 10px rgba(127,152,126,0.3);">LF</div>
        <div>
            <h3 style="margin:0; font-size:19px; line-height:1; font-weight:700;">LIFLOW</h3>
            <span style="font-size:11px; color:#78716C; text-transform:uppercase; letter-spacing:1px; font-weight:600;">Life Operating System</span>
        </div>
    </div>
    """, unsafe_allow_html=True)

    st.markdown("<p style='font-size:11px; font-weight:700; color:#A8A29E; text-transform:uppercase; margin-bottom:8px;'>Navigasi Menu (Maksimal 5)</p>", unsafe_allow_html=True)
    
    # Navbar Maksimal 5 Menu Sesuai Catatan Dosen/Project:
    # 1. Home | 2. Fitur | 3. Servis (Bundling & Reviews) | 4. Blog | 5. About
    main_nav = st.radio(
        "Navbar Utama",
        [
            "🏠 Home (Beranda)",
            "⚡ Fitur (Life OS Modules)",
            "💼 Servis & Bundling Review",
            "📰 Blog (Edukasi)",
            "🌿 About (Tentang Kami)"
        ],
        index=0,
        label_visibility="collapsed"
    )

    st.markdown("---")
    st.markdown("<p style='font-size:11px; font-weight:700; color:#7F987E; text-transform:uppercase; margin-bottom:8px;'>🚀 Mode Interaktif</p>", unsafe_allow_html=True)
    
    enable_app_mode = st.toggle("Buka Life OS Dashboard Langsung", value=False, help="Aktifkan untuk langsung mengoperasikan dashboard aplikasi interaktif (Planner, Habit, Timer, Uang, Refleksi)")

    st.markdown("---")
    st.caption("🌿 **LIFLOW v2.0** — Guilt-Free Architecture")
    st.caption(f"📅 {datetime.datetime.now().strftime('%A, %d %B %Y')}")
    st.markdown("""
    <div style="background:#F5F5F4; padding:10px; border-radius:10px; font-size:11px; color:#57534E; line-height:1.4;">
        ✅ Cloud Ready: GitHub Sync<br>
        ✅ Review Customer Bundling<br>
        ✅ 5 Navbar Minimalis
    </div>
    """, unsafe_allow_html=True)

    st.markdown("---")
    st.markdown("<p style='font-size:11px; font-weight:700; color:#16A34A; text-transform:uppercase; margin-bottom:8px;'>💬 WhatsApp CS Resmi</p>", unsafe_allow_html=True)
    st.markdown("""
    <div style="background:#F0FDF4; border:1px solid #BBF7D0; padding:12px; border-radius:12px; font-size:12px; color:#166534; line-height:1.4; margin-bottom:10px;">
        <span style="font-size:10px; text-transform:uppercase; font-weight:bold; color:#15803D;">● Fast Response Online</span><br>
        <span style="font-size:14px; font-weight:800; color:#14532D;">0857-4254-6223</span><br>
        <span style="font-size:11px; color:#166534;">Konsultasi fitur atau paket bundling langsung via WhatsApp.</span>
    </div>
    """, unsafe_allow_html=True)
    st.link_button("📲 Chat via WhatsApp (0857-4254-6223)", "https://wa.me/6285742546223?text=Halo%20LIFLOW%20Support%2C%20saya%20tertarik%20dengan%20layanan%20LIFLOW%20Life%20OS", use_container_width=True)

# ────────────────────────────────────────────────────────
# 5. SUB-ROUTINE: LIFE OS DASHBOARD INTERACTIVE APPLICATION
# ────────────────────────────────────────────────────────
def render_interactive_dashboard():
    st.markdown('<div class="badge-green">✨ Interactive Life OS Mode</div>', unsafe_allow_html=True)
    st.markdown('<h1 class="brand-font" style="font-size:32px; margin-top:6px; margin-bottom:4px;">Flow Your Life Better.</h1>', unsafe_allow_html=True)
    st.write("Kelola ritme produktivitas, kebiasaan mikro, keuangan, dan refleksi harianmu tanpa rasa bersalah.")

    # Top KPI Metrics
    done_tasks = sum(1 for t in st.session_state.tasks if t["done"])
    total_tasks = len(st.session_state.tasks)
    total_income = sum(t["amount"] for t in st.session_state.transactions if t["type"] == "Pemasukan")
    total_expense = sum(t["amount"] for t in st.session_state.transactions if t["type"] == "Pengeluaran")
    balance = total_income - total_expense

    m1, m2, m3, m4 = st.columns(4)
    with m1:
        st.metric("Life Balance Score", "86 / 100", "+4 poin minggu ini")
    with m2:
        st.metric("Agenda Selesai", f"{done_tasks}/{total_tasks}", f"{int(done_tasks/total_tasks*100) if total_tasks else 0}% tuntas")
    with m3:
        st.metric("Habit Aktif", f"{len(st.session_state.habits)} Habits", "7 Hari Streak")
    with m4:
        st.metric("Saldo Bersih", f"Rp {balance:,.0f}", f"-Rp {total_expense:,.0f} keluar")

    st.write("")

    # Sub-tabs for Dashboard
    tab_planner, tab_habits, tab_money, tab_focus, tab_reflection, tab_tomorrow, tab_analytics = st.tabs([
        "📋 Daily Planner",
        "🔥 Habit Tracker",
        "💰 Money Tracker",
        "⏱️ Focus Pomodoro",
        "🌙 Daily Reflection",
        "🔄 Plan Tomorrow",
        "📊 Analytics 6 Pilar"
    ])

    # ── TAB 1: DAILY PLANNER ──
    with tab_planner:
        st.subheader("📋 Daily Planner (No-Punishment Design)")
        st.write("Fokus pada 3-5 prioritas utama hari ini. Tugas yang belum selesai dapat dialirkan kembali tanpa beban mental.")

        with st.expander("➕ Tambah Tugas Baru", expanded=False):
            col1, col2, col3, col4 = st.columns([3, 1.5, 1.5, 1])
            with col1:
                new_title = st.text_input("Nama Tugas", placeholder="Contoh: Belajar Python Streamlit...", key="p_new_title")
            with col2:
                new_cat = st.selectbox("Kategori", ["Productivity", "Health", "Learning", "Finance", "Personal"], key="p_new_cat")
            with col3:
                new_prio = st.selectbox("Prioritas", ["High 🔴", "Medium 🟡", "Low 🟢"], key="p_new_prio")
            with col4:
                st.write("")
                st.write("")
                if st.button("Simpan Tugas", key="btn_add_task"):
                    if new_title.strip():
                        st.session_state.tasks.insert(0, {
                            "id": int(datetime.datetime.now().timestamp()),
                            "text": new_title.strip(),
                            "category": new_cat,
                            "priority": new_prio.split()[0],
                            "done": False
                        })
                        st.success("Tugas berhasil ditambahkan!")
                        do_rerun()

        for i, t in enumerate(st.session_state.tasks):
            col_c, col_del = st.columns([5, 1])
            with col_c:
                checked = st.checkbox(f"**{t['text']}** — `{t['category']}` ({t['priority']})", value=t["done"], key=f"dash_task_{t['id']}")
                t["done"] = checked
            with col_del:
                if st.button("Hapus", key=f"del_task_{t['id']}"):
                    st.session_state.tasks.pop(i)
                    do_rerun()

    # ── TAB 2: HABIT TRACKER ──
    with tab_habits:
        st.subheader("🔥 Habit Tracker (Sustainable Micro-Habits)")
        st.write("Bangun konsistensi dengan aksi mikro yang terlalu mudah untuk diabaikan.")

        with st.expander("➕ Tambah Kebiasaan Baru", expanded=False):
            ch1, ch2 = st.columns([4, 1])
            with ch1:
                nh_name = st.text_input("Nama Habit Baru", placeholder="Contoh: Minum air lemon hangat...")
            with ch2:
                st.write("")
                st.write("")
                if st.button("Tambah Habit", key="btn_add_habit"):
                    if nh_name.strip():
                        st.session_state.habits.append({
                            "id": int(datetime.datetime.now().timestamp()),
                            "name": nh_name.strip(),
                            "streak": 1,
                            "done": True
                        })
                        st.success("Habit baru ditambahkan!")
                        do_rerun()

        for i, h in enumerate(st.session_state.habits):
            c_info, c_streak, c_btn = st.columns([3, 2, 1])
            with c_info:
                st.markdown(f"**{h['name']}**")
            with c_streak:
                st.markdown(f"🔥 `{h['streak']} hari streak berturut-turut`")
            with c_btn:
                btn_lbl = "Batal" if h["done"] else "Centang"
                if st.button(btn_lbl, key=f"h_btn_{h['id']}"):
                    h["done"] = not h["done"]
                    if h["done"]:
                        h["streak"] += 1
                    else:
                        h["streak"] = max(0, h["streak"] - 1)
                    do_rerun()

    # ── TAB 3: MONEY TRACKER ──
    with tab_money:
        st.subheader("💰 Money Tracker (Aliran Kas Santai)")
        st.write("Ketahui ke mana uangmu mengalir tanpa stres dengan perhitungan akuntansi yang rumit.")

        with st.expander("➕ Catat Transaksi Cepat", expanded=False):
            cm1, cm2, cm3, cm4 = st.columns([3, 2, 2, 1])
            with cm1:
                desc = st.text_input("Keterangan", placeholder="Contoh: Langganan Liflow Bundling...")
            with cm2:
                amt = st.number_input("Nominal (Rp)", min_value=1000, step=5000, value=25000)
            with cm3:
                ttype = st.selectbox("Jenis", ["Pengeluaran", "Pemasukan"])
            with cm4:
                st.write("")
                st.write("")
                if st.button("Catat", key="btn_add_money"):
                    if desc.strip():
                        st.session_state.transactions.insert(0, {
                            "name": desc.strip(),
                            "amount": amt,
                            "type": ttype
                        })
                        st.success("Transaksi tersimpan!")
                        do_rerun()

        st.write("##### Riwayat Transaksi")
        for i, tr in enumerate(st.session_state.transactions):
            c1, c2, c3, c4 = st.columns([3, 2, 2, 1])
            c1.write(f"**{tr['name']}**")
            c2.write(f"`{tr['type']}`")
            col_color = "#DC2626" if tr['type'] == 'Pengeluaran' else "#16A34A"
            prefix = "-" if tr['type'] == 'Pengeluaran' else "+"
            c3.markdown(f"<span style='color:{col_color}; font-weight:bold;'>{prefix}Rp {tr['amount']:,.0f}</span>", unsafe_allow_html=True)
            if c4.button("Hapus", key=f"del_tx_{i}"):
                st.session_state.transactions.pop(i)
                do_rerun()

    # ── TAB 4: FOCUS MODE ──
    with tab_focus:
        st.subheader("⏱️ Focus Mode & Pomodoro Timer")
        st.write("Eliminasi multi-tasking dengan sesi kerja terarah berdurasi 25 atau 50 menit.")
        
        mode = st.radio("Pilih Mode Sesi", ["Pomodoro (25 Menit)", "Deep Work (50 Menit)"], horizontal=True)
        target_min = 25 if "25" in mode else 50

        st.markdown(f"""
        <div style="text-align:center; padding: 36px; background:white; border-radius:24px; border:1px solid #E7E5E4; max-width:380px; margin: 20px auto; box-shadow:0 4px 15px rgba(0,0,0,0.03);">
            <span style="font-size:11px; color:#7F987E; text-transform:uppercase; letter-spacing:2px; font-weight:bold;">SESI FOKUS BERJALAN</span>
            <h1 style="font-size: 58px; font-weight:800; color:#1C1917; margin: 12px 0;">{target_min}:00</h1>
            <p style="color:#78716C; font-size:12px; margin-bottom:0;">Jauhkan gadget dan notifikasi yang tidak perlu</p>
        </div>
        """, unsafe_allow_html=True)

        cf1, cf2 = st.columns(2)
        with cf1:
            if st.button("▶️ Mulai Sesi Fokus Sekarang", key="btn_start_focus"):
                st.success(f"Sesi fokus {target_min} menit telah diaktifkan! Bekerjalah dengan tenang 🌿")
        with cf2:
            if st.button("🔄 Reset Timer", key="btn_reset_focus"):
                st.info("Timer telah direset.")

    # ── TAB 5: DAILY REFLECTION ──
    with tab_reflection:
        st.subheader("🌙 Daily Reflection (Apresiasi Sebelum Tidur)")
        st.write("Luangkan 3 menit untuk mengevaluasi hari tanpa menghakimi diri sendiri.")

        mood_opt = ["😢 Sangat Lelah", "🙁 Kurang Baik", "😐 Biasa", "🙂 Baik", "🤩 Luar Biasa"]
        current_mood_idx = mood_opt.index(st.session_state.reflection["mood"]) if st.session_state.reflection["mood"] in mood_opt else 3
        ref_mood = st.select_slider("Bagaimana suasana hatimu hari ini?", options=mood_opt, value=st.session_state.reflection["mood"])
        ref_win = st.text_area("Kemenangan kecil hari ini (Win of the Day)", value=st.session_state.reflection["win"])
        ref_chal = st.text_area("Tantangan yang dihadapi", value=st.session_state.reflection["challenge"])
        ref_grat = st.text_area("Hal yang paling kamu syukuri", value=st.session_state.reflection["gratitude"])

        if st.button("💾 Simpan Refleksi Harian", key="btn_save_ref"):
            st.session_state.reflection = {
                "mood": ref_mood,
                "win": ref_win,
                "challenge": ref_chal,
                "gratitude": ref_grat
            }
            st.success("Refleksi tersimpan dengan baik! Selamat beristirahat dengan tenang 🌿")

    # ── TAB 6: PLAN TOMORROW ──
    with tab_tomorrow:
        st.subheader("🔄 Plan Tomorrow (Siklus Terhubung)")
        st.write("Kunci tidur nyenyak adalah mengetahui dengan pasti apa yang akan kamu lakukan esok pagi.")

        focus_tomorrow = safe_pills("Fokus Utama Esok Hari", ["🎓 Kuliah", "🏃 Sehat & Bugar", "📖 Belajar Skill", "💼 Kerja & Proyek", "💰 Keuangan", "🧘 Waktu Pribadi"], default="🎓 Kuliah")
        tomorrow_task = st.text_area("3 Agenda Utama Esok Hari", value="1. Hadiri kuliah pagi tepat waktu\n2. Selesaikan draf laporan mingguan\n3. Jalan santai 20 menit sore")
        tomorrow_wake = st.time_input("Target Bangun Pagi", value=datetime.time(6, 0))

        if st.button("🌙 Kunci Rencana & Istirahat", key="btn_save_tomorrow"):
            st.success("Rencana esok terkunci! Pikiranmu kini bebas beristirahat tanpa beban 🌿")

    # ── TAB 7: ANALYTICS ──
    with tab_analytics:
        st.subheader("📊 Analytics 6 Pilar Kehidupan")
        st.write("Visualisasi keseimbangan holistik hidup Anda secara transparan.")

        pillars = [
            {"name": "Productivity (Penyelesaian Agenda)", "score": 85},
            {"name": "Health (Olahraga & Istirahat)", "score": 78},
            {"name": "Mindfulness (Refleksi & Ketenangan)", "score": 90},
            {"name": "Finance (Disiplin Arus Kas)", "score": 82},
            {"name": "Learning (Pertumbuhan Diri)", "score": 70},
            {"name": "Relations (Sosial & Komunitas)", "score": 88}
        ]

        for p in pillars:
            st.write(f"**{p['name']}** — `{p['score']}% Optimal`")
            st.progress(p["score"] / 100)


# ────────────────────────────────────────────────────────
# 6. ROUTING MAIN NAVBAR (MAKSIMAL 5 MENU)
# ────────────────────────────────────────────────────────
if enable_app_mode:
    render_interactive_dashboard()

elif "Home" in main_nav:
    # ── VIEW 1: HOME (BERANDA) ──
    st.markdown("""
    <div style="text-align:center; padding: 40px 20px 30px 20px;">
        <span class="badge-green">🌿 GUILT-FREE LIFE ARCHITECTURE</span>
        <h1 class="brand-font" style="font-size:46px; margin: 16px 0 12px 0; color:#1C1917; line-height:1.2;">
            Arsitektur Hidup Tanpa Beban &amp; Rasa Bersalah
        </h1>
        <p style="font-size:16px; color:#57534E; max-width:750px; margin:0 auto; line-height:1.6;">
            LIFLOW adalah Life Operating System terpadu: integrasi Daily Planner, Habit Tracker, Money Tracker, Pomodoro Focus Timer, dan Refleksi Malam dalam satu ekosistem yang menenangkan.
        </p>
    </div>
    """, unsafe_allow_html=True)

    c_btn_l, c_btn_r = st.columns([1, 1])
    with c_btn_l:
        st.markdown("<div style='text-align:right;'>", unsafe_allow_html=True)
        if st.button("🚀 Buka Life OS Dashboard Sekarang", key="hero_to_app"):
            render_interactive_dashboard()
        st.markdown("</div>", unsafe_allow_html=True)
    with c_btn_r:
        if st.button("📦 Lihat Paket Bundling & Review", key="hero_to_bundling"):
            st.info("Pilih menu '💼 Servis & Bundling Review' di sidebar untuk melihat paket bundling dan review pelanggan!")

    st.write("")
    st.write("---")

    # 3 Pilar Filosofi LIFLOW
    st.markdown("<h2 class='brand-font' style='text-align:center; margin-bottom:24px;'>3 Prinsip Arsitektur LIFLOW</h2>", unsafe_allow_html=True)
    c1, c2, c3 = st.columns(3)
    with c1:
        st.markdown("""
        <div class="liflow-card">
            <h3 style="font-size:20px; color:#7F987E; margin-bottom:8px;">1. No-Punishment Design</h3>
            <p style="font-size:13px; color:#57534E; line-height:1.6;">
                Aplikasi produktivitas lain memberi sanksi visual saat tugas gagal. LIFLOW mengusung prinsip "reset challenge" ramah psikologis: hari yang buruk adalah sinyal istirahat, bukan kegagalan.
            </p>
        </div>
        """, unsafe_allow_html=True)
    with c2:
        st.markdown("""
        <div class="liflow-card">
            <h3 style="font-size:20px; color:#7F987E; margin-bottom:8px;">2. Connected Rhythm</h3>
            <p style="font-size:13px; color:#57534E; line-height:1.6;">
                Hari esok ditentukan sejak malam ini. Modul <em>Plan Tomorrow</em> dan <em>Daily Reflection</em> menghubungkan siklus tidur Anda dengan kesiapan pagi hari secara alami.
            </p>
        </div>
        """, unsafe_allow_html=True)
    with c3:
        st.markdown("""
        <div class="liflow-card">
            <h3 style="font-size:20px; color:#7F987E; margin-bottom:8px;">3. Sustainable Micro-Habits</h3>
            <p style="font-size:13px; color:#57534E; line-height:1.6;">
                Fokus pada kebiasaan kecil yang bertahan selamanya, bukan perubahan drastis yang memicu burnout dalam 2 minggu pertama.
            </p>
        </div>
        """, unsafe_allow_html=True)

    # Preview Review Customer Singkat
    st.write("---")
    st.markdown("""
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
        <h3 class="brand-font" style="margin:0;">💬 Apa Kata Mereka Tentang Bundling LIFLOW?</h3>
        <span class="badge-amber">⭐⭐⭐⭐⭐ 4.9/5 Rating Pelanggan</span>
    </div>
    """, unsafe_allow_html=True)

    col_rev1, col_rev2 = st.columns(2)
    with col_rev1:
        st.markdown("""
        <div class="review-card">
            <span style="font-size:11px; font-weight:700; color:#7F987E;">PAKET: BUNDLING STARTER</span>
            <p style="font-size:13px; color:#292524; font-style:italic; margin:10px 0;">"E-book 'Flow Your Life' dan template habit-nya langsung saya pakai. Dulu saya sering stres to-do list menumpuk, sekarang belajar jadi jauh lebih teratur tanpa rasa bersalah!"</p>
            <div style="font-size:12px; font-weight:600; color:#1C1917;">— Sarah Amelia, Mahasiswa Kedokteran</div>
        </div>
        """, unsafe_allow_html=True)
    with col_rev2:
        st.markdown("""
        <div class="review-card">
            <span style="font-size:11px; font-weight:700; color:#D97706;">PAKET: BUNDLING ALL-IN-ONE</span>
            <p style="font-size:13px; color:#292524; font-style:italic; margin:10px 0;">"Nilai bundling 1 tahun ini gila banget dengan harga segitu! Workshop online dan money tracker-nya bikin freelance dan keuangan saya seimbang."</p>
            <div style="font-size:12px; font-weight:600; color:#1C1917;">— Dimas Prasetyo, Software Engineer</div>
        </div>
        """, unsafe_allow_html=True)

elif "Fitur" in main_nav:
    # ── VIEW 2: FITUR (6 PILAR UTAMA) ──
    st.markdown('<span class="badge-green">EKOSISTEM UTUH</span>', unsafe_allow_html=True)
    st.markdown('<h1 class="brand-font">Fitur Lengkap LIFLOW Life OS</h1>', unsafe_allow_html=True)
    st.write("Dirancang khusus untuk membantu mahasiswa, profesional, dan kreator mengalirkan hidup tanpa stres.")

    f_col1, f_col2 = st.columns(2)
    with f_col1:
        st.markdown("""
        <div class="liflow-card">
            <span style="font-size:24px;">📋</span>
            <h3 style="font-size:18px; margin: 8px 0;">1. Daily Priority Planner</h3>
            <p style="font-size:13px; color:#57534E;">Bukan sekadar to-do list biasa. Filter prioritas High/Medium/Low memastikan Anda fokus pada agenda berdampak tinggi tanpa kewalahan.</p>
        </div>
        <div class="liflow-card">
            <span style="font-size:24px;">🔥</span>
            <h3 style="font-size:18px; margin: 8px 0;">2. Dynamic Habit Streak</h3>
            <p style="font-size:13px; color:#57534E;">Bangun kebiasaan mikro 2 menit. Lacak progress hari berturut-turut dengan visualisasi flame streak yang memotivasi.</p>
        </div>
        <div class="liflow-card">
            <span style="font-size:24px;">💰</span>
            <h3 style="font-size:18px; margin: 8px 0;">3. Money Tracker Arus Kas</h3>
            <p style="font-size:13px; color:#57534E;">Pencatatan pengeluaran & pemasukan instan dengan kalkulasi saldo otomatis tanpa kerumitan tabel akuntansi.</p>
        </div>
        """, unsafe_allow_html=True)

    with f_col2:
        st.markdown("""
        <div class="liflow-card">
            <span style="font-size:24px;">⏱️</span>
            <h3 style="font-size:18px; margin: 8px 0;">4. Pomodoro & Deep Work Focus</h3>
            <p style="font-size:13px; color:#57534E;">Sesi fokus 25 atau 50 menit untuk menyelesaikan 1 tugas penting tanpa distraksi notifikasi.</p>
        </div>
        <div class="liflow-card">
            <span style="font-size:24px;">🌙</span>
            <h3 style="font-size:18px; margin: 8px 0;">5. Daily Reflection Journal</h3>
            <p style="font-size:13px; color:#57534E;">Evaluasi mood harian, catat kemenangan kecil, dan bangun rasa syukur sebelum tidur untuk kesehatan mental optimal.</p>
        </div>
        <div class="liflow-card">
            <span style="font-size:24px;">🔄</span>
            <h3 style="font-size:18px; margin: 8px 0;">6. Plan Tomorrow (Siklus Terhubung)</h3>
            <p style="font-size:13px; color:#57534E;">Kunci tidur nyenyak adalah kepastian rencana esok hari. Atur 3 agenda utama dan target bangun sejak malam sebelumnya.</p>
        </div>
        """, unsafe_allow_html=True)

    st.info("💡 Semua fitur di atas dapat langsung Anda coba dengan mengaktifkan toggle **'Buka Life OS Dashboard Langsung'** di sidebar kiri!")

elif "Servis" in main_nav:
    # ── VIEW 3: SERVIS, BUNDLING & CUSTOMER REVIEW (TARGET CATATAN #1) ──
    st.markdown('<span class="badge-amber">💎 LAYANAN, BUNDLING & REVIEW PELANGGAN</span>', unsafe_allow_html=True)
    st.markdown('<h1 class="brand-font">Servis & Bundling Eksklusif LIFLOW</h1>', unsafe_allow_html=True)
    st.write("Pilih paket yang paling cocok untuk perjalanan hidupmu. Tanpa biaya tersembunyi, tanpa paksaan.")

    # Tab Navigator dalam Servis
    serv_tab1, serv_tab2, serv_tab3 = st.tabs([
        "⭐ Review Customer dari Bundling (Catatan #1)",
        "📦 Paket Bundling Spesial",
        "🏷️ Paket Reguler (Free/Premium/Teams)"
    ])

    # ── TAB 1: REVIEW CUSTOMER DARI BUNDLING (HIGHLIGHT) ──
    with serv_tab1:
        st.markdown("### 💬 Review & Testimoni Pelanggan Paket Bundling")
        st.write("Pendapat nyata dari para pengguna yang telah mengadopsi paket bundling LIFLOW untuk menata hidup mereka.")

        # Metric Kepuasan
        s1, s2, s3, s4 = st.columns(4)
        s1.metric("Rata-rata Rating", "4.95 / 5.0", "⭐⭐⭐⭐⭐")
        s2.metric("Total Pengguna Bundling", "1,420+", "+38% bulan ini")
        s3.metric("Tingkat Retensi", "94.2%", "Sangat Puas")
        s4.metric("Rekomendasi Teman", "98%", "Net Promoter Score")

        st.write("")

        # Tampilkan Review yang Tersimpan
        for rev in st.session_state.bundling_reviews:
            st.markdown(f"""
            <div class="review-card">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <div>
                        <strong style="font-size:15px; color:#1C1917;">{rev['name']}</strong> 
                        <span style="font-size:12px; color:#78716C;">— {rev['role']}</span>
                    </div>
                    <span class="badge-amber">{'⭐' * rev['rating']}</span>
                </div>
                <div style="margin: 6px 0;">
                    <span class="badge-green">{rev['pack']}</span>
                    <span style="font-size:11px; color:#A8A29E; margin-left:8px;">{rev['date']}</span>
                </div>
                <p style="font-size:13px; color:#44403C; margin-top:8px; line-height:1.5; font-style:italic;">
                    "{rev['comment']}"
                </p>
            </div>
            """, unsafe_allow_html=True)

        st.write("")
        with st.expander("✍️ Tambahkan Review Customer Baru (Interaktif)", expanded=False):
            st.write("Tuliskan pengalaman Anda menggunakan bundling LIFLOW:")
            cr_name = st.text_input("Nama Lengkap", placeholder="Contoh: Budi Santoso", key="rev_input_name")
            cr_role = st.text_input("Profesi / Status", placeholder="Contoh: Mahasiswa Teknik / Desainer", key="rev_input_role")
            cr_pack = st.selectbox("Paket Bundling yang Digunakan", [
                "Bundling Starter (Life Kickstart Pack)",
                "Bundling All-In-One (Ultimate Life OS Pack)"
            ], key="rev_input_pack")
            cr_rate = st.slider("Rating Bintang", 1, 5, 5, key="rev_input_rate")
            cr_comment = st.text_area("Ulasan / Cerita Anda", placeholder="Bagaimana paket bundling LIFLOW membantu keseharian Anda?", key="rev_input_comm")

            if st.button("Kirim Review Saya", key="btn_submit_rev"):
                if cr_name.strip() and cr_comment.strip():
                    st.session_state.bundling_reviews.insert(0, {
                        "name": cr_name.strip(),
                        "role": cr_role.strip() if cr_role.strip() else "Pengguna Terverifikasi",
                        "pack": cr_pack,
                        "rating": cr_rate,
                        "comment": cr_comment.strip(),
                        "date": "Baru saja"
                    })
                    st.success("Terima kasih! Review Anda berhasil ditambahkan dan langsung tampil di atas.")
                    do_rerun()
                else:
                    st.error("Mohon isi nama dan ulasan Anda terlebih dahulu.")

    # ── TAB 2: PAKET BUNDLING SPESIAL ──
    with serv_tab2:
        st.markdown("### 🎁 Paket Bundling Spesial (Hemat s.d 50%)")
        st.write("Dapatkan nilai maksimal dengan paket bundel eksklusif:")

        b_col1, b_col2 = st.columns(2)
        with b_col1:
            st.markdown("""
            <div class="liflow-card-highlight">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <span class="badge-green">BUNDLING STARTER</span>
                    <span style="font-weight:bold; color:#16A34A; font-size:12px;">HEMAT 30%</span>
                </div>
                <h3 style="font-size:24px; margin: 10px 0 6px 0;">Life Kickstart Pack</h3>
                <p style="font-size:13px; color:#57534E;">Bundling sempurna untuk pemula yang ingin memulai hidup teratur.</p>
                <div style="margin: 16px 0;">
                    <span style="font-size:28px; font-weight:800; color:#1C1917;">IDR 99.000</span>
                    <span style="text-decoration:line-through; color:#A8A29E; font-size:14px; margin-left:8px;">IDR 135.000</span>
                </div>
                <ul style="font-size:12px; color:#44403C; line-height:1.8; padding-left:18px;">
                    <li>✅ <strong>3 Bulan</strong> Akses LIFLOW Premium</li>
                    <li>✅ 10+ Starter Habit &amp; Planner Templates</li>
                    <li>✅ E-Book Eksklusif: <em>"Flow Your Life"</em> (PDF)</li>
                    <li>✅ 1x1 Onboarding Support via <a href="https://wa.me/6285742546223?text=Halo%20LIFLOW%2C%20saya%20ingin%20info%20Onboarding%20Support%20via%20WhatsApp" target="_blank" style="color:#16A34A; font-weight:bold; text-decoration:underline;">WhatsApp (0857-4254-6223)</a></li>
                </ul>
            </div>
            """, unsafe_allow_html=True)
            if st.button("Ambil Paket Starter (Rp 99.000)", key="btn_take_starter"):
                st.success("Terima kasih atas minat Anda! Paket Starter siap diaktifkan 🌿")

        with b_col2:
            st.markdown("""
            <div class="liflow-card-highlight" style="border-color:#D97706; background:linear-gradient(135deg, #FEFCE8 0%, #FFFFFF 100%);">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <span class="badge-amber">BUNDLING ALL-IN-ONE</span>
                    <span style="font-weight:bold; color:#D97706; font-size:12px;">HEMAT 50%</span>
                </div>
                <h3 style="font-size:24px; margin: 10px 0 6px 0;">Ultimate Life OS Pack</h3>
                <p style="font-size:13px; color:#57534E;">Solusi terlengkap untuk profesional dan kreator yang serius.</p>
                <div style="margin: 16px 0;">
                    <span style="font-size:28px; font-weight:800; color:#1C1917;">IDR 299.000</span>
                    <span style="text-decoration:line-through; color:#A8A29E; font-size:14px; margin-left:8px;">IDR 540.000</span>
                </div>
                <ul style="font-size:12px; color:#44403C; line-height:1.8; padding-left:18px;">
                    <li>✅ <strong>12 Bulan (1 Tahun Penuh)</strong> LIFLOW Premium</li>
                    <li>✅ 30+ Template Produktivitas &amp; Keuangan</li>
                    <li>✅ Workshop Online Eksklusif Menata Hidup</li>
                    <li>✅ Akses Komunitas Private Discord/Telegram</li>
                    <li>✅ Priority Feature Request &amp; 24/7 VIP Support</li>
                </ul>
            </div>
            """, unsafe_allow_html=True)
            if st.button("Ambil Paket Ultimate (Rp 299.000)", key="btn_take_ultimate"):
                st.success("Selamat! Anda memilih paket terlengkap untuk transformasi hidup Anda 🌿")

    # ── TAB 3: PAKET REGULER ──
    with serv_tab3:
        st.markdown("### 🏷️ Paket Berlangganan Reguler")
        st.write("Pilihan fleksibel bulanan:")
        pr1, pr2, pr3 = st.columns(3)
        with pr1:
            st.markdown("""
            <div class="liflow-card">
                <span style="font-size:11px; font-weight:700; color:#78716C;">LIFLOW FREE</span>
                <h2 style="font-size:24px; margin:8px 0;">IDR 0</h2>
                <p style="font-size:12px; color:#78716C;">Akses dasar planner, habit streak, dan Pomodoro 25 menit.</p>
            </div>
            """, unsafe_allow_html=True)
        with pr2:
            st.markdown("""
            <div class="liflow-card" style="border:2px solid #7F987E;">
                <span class="badge-green">POPULER</span>
                <h2 style="font-size:24px; margin:8px 0;">IDR 45.000 <span style="font-size:12px; font-weight:normal;">/ bulan</span></h2>
                <p style="font-size:12px; color:#78716C;">Akses penuh: Money Tracker, Plan Tomorrow, Refleksi, dan Analytics 6 Pilar.</p>
            </div>
            """, unsafe_allow_html=True)
        with pr3:
            st.markdown("""
            <div class="liflow-card">
                <span style="font-size:11px; font-weight:700; color:#78716C;">LIFLOW TEAMS</span>
                <h2 style="font-size:24px; margin:8px 0;">IDR 150.000 <span style="font-size:12px; font-weight:normal;">/ bulan</span></h2>
                <p style="font-size:12px; color:#78716C;">Untuk tim & organisasi. Shared dashboard dan manajemen bersama.</p>
            </div>
            """, unsafe_allow_html=True)

elif "Blog" in main_nav:
    # ── VIEW 4: BLOG (EDUKASI) ──
    st.markdown('<span class="badge-green">KNOWLEDGE BASE</span>', unsafe_allow_html=True)
    st.markdown('<h1 class="brand-font">Blog &amp; Edukasi Life OS</h1>', unsafe_allow_html=True)
    st.write("Wawasan mendalam seputar psikologi produktivitas, kebiasaan berkelanjutan, dan ketenangan mental.")

    b1, b2 = st.columns(2)
    with b1:
        st.markdown("""
        <div class="liflow-card">
            <span class="badge-amber">PRODUKTIVITAS</span>
            <h3 style="font-size:18px; margin:10px 0;">Mengapa To-Do List Tradisional Malah Memicu Kecemasan?</h3>
            <p style="font-size:13px; color:#57534E; line-height:1.5;">Daftar tugas tak berujung menciptakan ilusi ketidakcukupan. Pelajari bagaimana sistem <em>Guilt-Free Life Architecture</em> membatasi prioritas harian agar pikiran tetap tenang.</p>
            <span style="font-size:11px; color:#A8A29E;">⏱️ 4 Menit Baca • Oleh Tim Psikologi LIFLOW</span>
        </div>
        """, unsafe_allow_html=True)

        st.markdown("""
        <div class="liflow-card">
            <span class="badge-green">FINANSIAL</span>
            <h3 style="font-size:18px; margin:10px 0;">Aturan Kas 50/30/20 Tanpa Pusing Tabel Excel</h3>
            <p style="font-size:13px; color:#57534E; line-height:1.5;">Kelola pengeluaran mahasiswa dan pekerja pemula dengan pendekatan arus kas sederhana yang tidak menyiksa gaya hidup Anda.</p>
            <span style="font-size:11px; color:#A8A29E;">⏱️ 5 Menit Baca • Oleh Financial Advisor LIFLOW</span>
        </div>
        """, unsafe_allow_html=True)

    with b2:
        st.markdown("""
        <div class="liflow-card">
            <span class="badge-green">HABIT</span>
            <h3 style="font-size:18px; margin:10px 0;">Micro-Habits: Rahasia Konsistensi Tanpa Motivasi Tinggi</h3>
            <p style="font-size:13px; color:#57534E; line-height:1.5;">Motivasi mudah padam, namun kebiasaan mikro 2 menit hampir mustahil ditolak oleh otak. Simak cara membangun habit streak yang kokoh.</p>
            <span style="font-size:11px; color:#A8A29E;">⏱️ 3 Menit Baca • Oleh Habit Coach LIFLOW</span>
        </div>
        """, unsafe_allow_html=True)

        st.markdown("""
        <div class="liflow-card">
            <span class="badge-amber">WELLBEING</span>
            <h3 style="font-size:18px; margin:10px 0;">Kekuatan Refleksi Malam Sebelum Tidur</h3>
            <p style="font-size:13px; color:#57534E; line-height:1.5;">Menghabiskan 3 menit menuliskan rasa syukur dan rencana esok hari terbukti secara klinis memperbaiki kualitas tidur REM hingga 27%.</p>
            <span style="font-size:11px; color:#A8A29E;">⏱️ 4 Menit Baca • Oleh Sleep Research LIFLOW</span>
        </div>
        """, unsafe_allow_html=True)

elif "About" in main_nav:
    # ── VIEW 5: ABOUT (TENTANG KAMI) ──
    st.markdown('<span class="badge-green">TENTANG KAMI</span>', unsafe_allow_html=True)
    st.markdown('<h1 class="brand-font">Filosofi di Balik LIFLOW</h1>', unsafe_allow_html=True)
    
    st.markdown("""
    <div class="liflow-card" style="font-size:14px; color:#44403C; line-height:1.8;">
        <p>
            <strong>LIFLOW</strong> lahir dari kegelisahan terhadap budaya <em>hustle culture</em> yang toksik dan aplikasi produktivitas yang membuat penggunanya merasa bersalah setiap kali gagal menyelesaikan agenda.
        </p>
        <p>
            Kami percaya bahwa produktivitas sejati bukanlah tentang memeras setiap detik waktu hingga habis, melainkan tentang <strong>mengalirkan energi hidup (flow)</strong> pada hal-hal yang benar-benar bermakna, sambil menjaga ketenangan batin, kesehatan tubuh, dan hubungan sosial.
        </p>
        <hr style="border:none; border-top:1px solid #F0EFEA; margin:20px 0;">
        <h4 style="margin-bottom:8px; font-weight:700;">Visi &amp; Komitmen Kami:</h4>
        <ul>
            <li><strong>Guilt-Free Life Architecture:</strong> Sistem yang merangkul ketidaksempurnaan manusia.</li>
            <li><strong>Data Privacy Terjamin:</strong> Data disimpan aman, lokal, dan tidak pernah dijual ke pihak ketiga.</li>
            <li><strong>Aksesibilitas Multi-Platform:</strong> Mendukung PHP WAMP, Python Flask, dan Python Streamlit Cloud.</li>
        </ul>
    </div>
    """, unsafe_allow_html=True)

    st.write("##### Tim Pengembang LIFLOW")
    tc1, tc2 = st.columns(2)
    with tc1:
        st.markdown("""
        <div class="liflow-card">
            <strong>Az-Zafira Keyzia &amp; Kolaborator</strong><br>
            <span style="font-size:12px; color:#78716C;">Lead Developer &amp; Product Designer</span>
        </div>
        """, unsafe_allow_html=True)
    with tc2:
        st.markdown("""
        <div class="liflow-card">
            <strong>Proyek LIFLOW Week 4 Deployment</strong><br>
            <span style="font-size:12px; color:#78716C;">Flask &amp; Streamlit Cloud Architecture</span>
        </div>
        """, unsafe_allow_html=True)

    st.write("")
    st.markdown("""
    <div class="liflow-card" style="background:linear-gradient(135deg, #F0FDF4 0%, #FFFFFF 100%); border-color:#BBF7D0;">
        <span class="badge-green">💬 HUBUNGI KAMI</span>
        <h3 style="font-size:18px; margin:8px 0 4px 0;">Customer Care Resmi via WhatsApp</h3>
        <p style="font-size:12px; color:#57534E;">Nomor: <strong>0857-4254-6223</strong> • Layanan respons cepat untuk pertanyaan Life OS, bundling, dan panduan penggunaan.</p>
    </div>
    """, unsafe_allow_html=True)
    st.link_button("💬 Hubungi WhatsApp CS (0857-4254-6223)", "https://wa.me/6285742546223?text=Halo%20Tim%20LIFLOW%2C%20saya%20ingin%20bertanya%20seputar%20aplikasi%20Life%20OS", use_container_width=True)

# ────────────────────────────────────────────────────────
# 7. FOOTER
# ────────────────────────────────────────────────────────
st.write("")
st.write("---")
st.markdown("""
<div style="text-align:center; padding:10px; font-size:12px; color:#A8A29E;">
    🌿 LIFLOW Life Operating System • Guilt-Free Architecture • Minggu ke-4 Deployment Streamlit &amp; Flask
</div>
""", unsafe_allow_html=True)
