@echo off

echo Run post deployment script

cd D:\home\site\wwwroot\source

composer update --prefer-dist --no-dev --optimize-autoloader --no-progress
