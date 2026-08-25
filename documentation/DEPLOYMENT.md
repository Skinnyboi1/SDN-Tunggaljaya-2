# Deployment Manual - SDN Tunggaljaya 2 Profile Website

Document instructions for deploying **SDN Tunggaljaya 2** web application on Laragon (Windows) or Nginx/Apache VPS servers.

---

## 1. Environment Requirements
- **PHP**: 8.3+
- **Extensions**: PDO, SQLite/MySQL, OpenSSL, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath
- **Composer**: 2.x
- **Web Server**: Apache / Nginx / Laragon

---

## 2. Automated Deployment Steps (Windows / Laragon)

Double-click or execute `deploy.bat` in the project root folder:
```cmd
deploy.bat
```

This script automatically executes:
1. `composer install --no-dev --optimize-autoloader`
2. `php artisan migrate --force`
3. `php artisan config:cache`
4. `php artisan route:cache`
5. `php artisan view:cache`

---

## 3. Web Server Virtual Host Setup (Nginx)

```nginx
server {
    listen 80;
    server_name tunggaljaya2.sch.id;
    root /var/www/Tunggaljaya/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

---

## 4. Default Operator Credentials
- **Email**: `operator@tunggaljaya2.sch.id`
- **Password**: `password123`
