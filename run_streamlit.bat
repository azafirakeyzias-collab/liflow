@echo off
title LIFLOW - Streamlit App Deployment
echo ========================================================
echo   LIFLOW - Life Operating System (Streamlit Dashboard)
echo ========================================================
echo.
echo Menjalankan Streamlit Dashboard pada port 8501...
echo Buka browser Anda di: http://localhost:8501
echo Tekan CTRL+C untuk menghentikan server.
echo.
python -m streamlit run streamlit_app.py --server.port 8501 --server.headless false
pause
