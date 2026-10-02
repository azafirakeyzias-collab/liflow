# 🌿 Panduan Deployment LIFLOW (Flask, Streamlit & WAMP)

Dokumentasi ini dibuat untuk memenuhi target catatan:
1. Review customer dari bundling ✅
2. Web segera dideploy agar segera membuat aplikasi ✅
3. Minggu ke-4 deploy Flask & Streamlit ✅
4. Navbar maksimal 5 (Home, Fitur, Servis, Blog, About) ✅
5. Dipisah refactoring per tab ✅
6. Konten web yang tidak penting dihapus ✅

---

## 🚀 1. Opsi Deployment Python Flask (Web App Lengkap)

Aplikasi Flask menyajikan antarmuka LIFLOW web utuh dengan session authentication dan SQLite database lokal:
- **Halaman Tamu (Guest):** Landing page, Fitur, Servis & Bundling, Blog, Filosofi About.
- **Halaman Pengguna Masuk:** Dashboard LIFLOW Life OS (Daily Planner, Habit Tracker, Money Tracker, Focus Timer, Reflection, Plan Tomorrow, Analytics 6 Pilar, Profil).
- **Backend API:** Endpoint `/api/auth` dan `/api/state` dengan penyimpanan database otomatis.

### Cara Menjalankan:
* **Cara Cepat (Windows):** Klik ganda file [`run_flask.bat`](file:///c:/wamp64/www/liflow/run_flask.bat)
* **Atau melalui Terminal:**
  ```bash
  python app.py
  ```
* Buka browser di: **[http://127.0.0.1:5000](http://127.0.0.1:5000)**

---

## 📊 2. Opsi Deployment Python Streamlit (Dashboard Interaktif)

Aplikasi Streamlit menyajikan dashboard analitik dan manajemen hidup interaktif berbasis Python native:
- Metrik KPI real-time (Life Score, Persentase Agenda, Habit Streak, Arus Kas).
- Agenda interaktif dengan centang dan penambahan tugas baru.
- Habit tracker dengan flame streak dinamis.
- Pencatat pengeluaran & pemasukan dengan kalkulasi saldo otomatis.
- Timer fokus Pomodoro & Deep Work.
- Jurnal refleksi harian & perencanaan hari esok.
- Visualisasi progress 6 pilar kehidupan.

### Cara Menjalankan:
* **Cara Cepat (Windows):** Klik ganda file [`run_streamlit.bat`](file:///c:/wamp64/www/liflow/run_streamlit.bat)
* **Atau melalui Terminal:**
  ```bash
  python -m streamlit run streamlit_app.py --server.port 8501
  ```
* Buka browser di: **[http://localhost:8501](http://localhost:8501)**

---

## 💻 3. Opsi WampServer (PHP Native)
Aplikasi PHP tetap aktif dan dapat dibuka langsung melalui WAMP:
* Buka browser di: **[http://localhost/liflow/](http://localhost/liflow/)**

---

## ☁️ 4. Deploy ke Cloud / Hosting Online

### Streamlit Community Cloud (Gratis 100%):
1. Unggah folder proyek ke repositori GitHub.
2. Buka [share.streamlit.io](https://share.streamlit.io).
3. Sambungkan repo GitHub dan pilih file `streamlit_app.py`.
4. Klik **Deploy** — web langsung online dengan domain publik `.streamlit.app`.

### Render / Railway (Flask Deployment):
1. Pastikan file [`requirements.txt`](file:///c:/wamp64/www/liflow/requirements.txt) ada.
2. Buat Web Service baru di [render.com](https://render.com).
3. Start command: `python app.py` atau `gunicorn app:app`.
