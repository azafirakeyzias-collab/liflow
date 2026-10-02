@echo off
title Push LIFLOW ke GitHub
echo ========================================================
echo   Mengunggah LIFLOW ke GitHub Repo:
echo   https://github.com/azafirakeyzias-collab/liflow
echo ========================================================
echo.
set PATH=%PATH%;%USERPROFILE%\mingit\cmd
git branch --set-upstream-to=origin/main main 2>nul

echo Mencoba push otomatis...
git push -u origin main --force

if %ERRORLEVEL% EQU 0 (
    goto SUCCESS
)

echo.
echo ========================================================
echo   [!] GitHub memerlukan autentikasi Personal Access Token
echo   1. Buka: https://github.com/settings/tokens/new
echo   2. Beri nama (contoh: liflow), centang [x] repo
echo   3. Klik Generate token, lalu salin token (ghp_xxxx)
echo ========================================================
echo.
set /p TOKEN="Tempel / Masukkan GitHub Token Anda lalu tekan Enter: "

if "%TOKEN%"=="" goto END

git remote set-url origin https://%TOKEN%@github.com/azafirakeyzias-collab/liflow.git
echo.
echo Mengunggah file ke GitHub dengan token...
git push -u origin main --force

if %ERRORLEVEL% EQU 0 goto SUCCESS
echo.
echo [!] Gagal mengunggah. Pastikan token memiliki izin 'repo' dan akun benar.
goto END

:SUCCESS
echo.
echo ========================================================
echo   [OK] BERHASIL! Semua file sudah terunggah ke GitHub!
echo   Buka browser di http://localhost:8501 lalu klik Deploy
echo   atau langsung buka: https://share.streamlit.io/new
echo ========================================================

:END
echo.
pause
