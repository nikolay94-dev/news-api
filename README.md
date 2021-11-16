# News parser
# Запуск
1. git clone
2. composer install
3. Настроить локальное окружение(создать базу данных, создать .env файл в проекте):
Также в .env нужно добавить ссылку на api для получения новостей:
NEWS_BASE_URI=
NEWS_API_KEY=
5. php artisan key:generate
6. php artisan migrate


