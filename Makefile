# Имя проекта
PROJECT_NAME=furniture-api

# Команды для Docker Compose
DC=docker-compose
DC_EXEC_APP=$(DC) exec app

# Команды для работы с контейнерами
up:
	$(DC) up -d

down:
	$(DC) down

restart:
	$(DC) restart

build:
	$(DC) build

# Команды для Laravel
migrate:
	$(DC_EXEC_APP) php artisan migrate

seed:
	$(DC_EXEC_APP) php artisan db:seed

migrate-refresh:
	$(DC_EXEC_APP) php artisan migrate:refresh --seed

# Очистка кэша
cache-clear:
	$(DC_EXEC_APP) php artisan cache:clear
	$(DC_EXEC_APP) php artisan config:clear
	$(DC_EXEC_APP) php artisan route:clear
	$(DC_EXEC_APP) php artisan view:clear

# Установка зависимостей
composer-install:
	$(DC_EXEC_APP) composer install

composer-update:
	$(DC_EXEC_APP) composer update

# Тесты
test:
	$(DC_EXEC_APP) php artisan test
