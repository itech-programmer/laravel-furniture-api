# Имя проекта
PROJECT_NAME=furniture-api

# Команды для Docker Compose
furniture_app=docker-compose
furniture_app_exec=$(furniture_app) exec app

# Команды для работы с контейнерами
up:
	$(furniture_app) up -d

down:
	$(furniture_app) down

restart:
	$(furniture_app) restart

build:
	$(furniture_app) build

# Команды для Laravel
migrate:
	$(furniture_app_exec) php artisan migrate

seed:
	$(furniture_app_exec) php artisan db:seed

migrate-refresh:
	$(furniture_app_exec) php artisan migrate:refresh --seed

# Очистка кэша
cache-clear:
	$(furniture_app_exec) php artisan cache:clear
	$(furniture_app_exec) php artisan config:clear
	$(furniture_app_exec) php artisan route:clear
	$(furniture_app_exec) php artisan view:clear

# Установка зависимостей
composer-install:
	$(furniture_app_exec) composer install

composer-update:
	$(furniture_app_exec) composer update

# Тесты
test:
	$(furniture_app_exec) php artisan test
