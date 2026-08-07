@echo off
echo ========================================================
echo   AUTOMATED DEPLOYMENT SCRIPT FOR SDN TUNGGALJAYA 2
echo ========================================================

echo 1. Pulling latest code changes...
git pull origin main

echo 2. Installing Composer dependencies for production...
call composer install --no-dev --optimize-autoloader

echo 3. Running database migrations...
call php artisan migrate --force

echo 4. Clearing and building production cache...
call php artisan config:cache
call php artisan route:cache
call php artisan view:cache

echo 5. Ensuring storage symlink...
call php artisan storage:link

echo ========================================================
echo   DEPLOYMENT COMPLETED SUCCESSFULLY!
echo ========================================================
