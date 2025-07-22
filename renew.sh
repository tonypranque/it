#!/bin/bash

echo "🚀 Очищаем кеш Laravel..."

php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "🔄 Перекомпилируем конфигурацию..."
php artisan config:cache

#echo "⚡ Обновляем зависимости (если нужно)"
#composer install --no-dev --optimize-autoloader

#echo "🚦 Обновляем миграции (без потери данных)"
#php artisan migrate --force

#echo "🎯 Перезапускаем Horizon и Supervisor..."
#php artisan queue:restart
#sudo supervisorctl restart all

echo "✅ Все готово! Laravel работает с чистым кешем."
