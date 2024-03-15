@echo off
start /B "" "C:\xampp\php\php.exe" "artisan" serve
start "" "http://127.0.0.1:8000" /MAX
pause
