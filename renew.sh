#!/bin/bash

echo "🚀 Очищаем кеш Laravel..."

php8.3 artisan cache:clear
php8.3 artisan config:clear
php8.3 artisan route:clear
php8.3 artisan view:clear

echo "🔄 Перекомпилируем конфигурацию..."
php8.3 artisan config:cache

echo "✅ Все готово! Laravel работает с чистым кешем."
