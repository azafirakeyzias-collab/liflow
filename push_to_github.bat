@echo off
title Push LIFLOW ke GitHub
echo ========================================================
echo   Mengunggah Update LIFLOW ke GitHub Repo:
echo   https://github.com/azafirakeyzias-collab/liflow
echo ========================================================
echo.
set PATH=%PATH%;%USERPROFILE%\mingit\cmd
cd /d "%~dp0"

echo [1/3] Menyiapkan perubahan file (git add)...
git add -A

echo [2/3] Menyimpan commit lokal...
git commit -m "Update Streamlit Life OS: Customer reviews bundling, 5 navbar, and cloud bridge" 2>nul

echo [3/3] Mengunggah ke GitHub (git push)...
git push -u origin main

if %ERRORLEVEL% EQU 0 (
    goto SUCCESS
)

echo.
echo ========================================================
echo   [!] GitHub memerlukan autentikasi Personal Access Token
echo   1. Buka browser: https://github.com/settings/tokens/new
echo   2. Note: liflow-deploy, Expiration: 30 days
echo   3. Centang kotak: [x] repo (Full control of private repositories)
echo   4. Klik Generate token di paling bawah, lalu salin token (ghp_xxxx)
echo ========================================================
echo.
set /p TOKEN="Tempelkan GitHub Personal Access Token Anda lalu tekan Enter: "

if "%TOKEN%"=="" goto END

git remote set-url origin https://%TOKEN%@github.com/azafirakeyzias-collab/liflow.git
echo.
echo Mencoba push ulang ke GitHub dengan token...
git push -u origin main

if %ERRORLEVEL% EQU 0 goto SUCCESS
echo.
echo [!] Gagal mengunggah. Pastikan token memiliki izin 'repo' dan koneksi internet stabil.
goto END

:SUCCESS
echo.
echo ========================================================
echo   [OK] BERHASIL! Perubahan terbaru sudah ada di GitHub!
echo.
echo   Langkah Streamlit Community Cloud (share.streamlit.io):
echo   1. Buka: https://share.streamlit.io
echo   2. Masuk ke App LIFLOW Anda
echo   3. Klik tombol titik tiga (...) lalu pilih "Reboot app"
echo      (Atau Deploy baru: pilih repo azafirakeyzias-collab/liflow)
echo   4. Main file path: streamlit_app.py (atau app.py)
echo ========================================================

:END
echo.
pause
