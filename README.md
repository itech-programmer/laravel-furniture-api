# Furniture API

## Описание

**Furniture API** — это REST API для управления списком мебели, включающий CRUD-операции (создание, получение, обновление, удаление), а также возможность фильтрации по цене и наличию на складе.

Проект развернут с использованием [Laravel](https://laravel.com/) и контейнеризирован с помощью [Docker](https://www.docker.com/).

## Стек технологий

- **Backend**: PHP, Laravel
- **Database**: MySQL
- **Containers**: Docker, Docker Compose

## Требования

Для работы с проектом вам потребуются:

- Docker >= 20.10
- Docker Compose >= 1.29
- Composer >= 2.1

## Установка и запуск

### 1. Клонируйте репозиторий

```bash
git clone https://github.com/itech-programmer/laravel-furniture-api
cd furniture-api
```

### 2. Скопируйте файл окружения и настройте его

```bash
cp .env.example .env
```

Отредактируйте .env файл, при необходимости указав настройки базы данных и другие параметры.

### 3. Запустите Docker контейнеры

```bash
make up
```

Docker соберет и запустит контейнеры для Laravel и MySQL.

### 4. Установите зависимости

```bash
make composer-install
```

### 5. Выполните миграции базы данных

```bash
make migrate
```

Теперь ваше приложение готово к использованию.

## Доступ к приложению

Приложение будет доступно по адресу: [http://localhost:8000](http://localhost:8000).

## Основные команды Makefile

### Работа с контейнерами

1. Запуск контейнеров: `make up`
2. Остановка контейнеров: `make down`
3. Перезапуск контейнеров: `make restart`
4. Сборка контейнеров: `make build`

### Команды для Laravel

1. Запуск миграций: `make migrate`
2. Заполнение базы данных: `make seed`
3. Перезапуск миграций с сидированием: `make migrate-refresh`

### Очистка кэша

1. Очистка всех типов кэша: `make cache-clear`

### Работа с зависимостями

1. Установка зависимостей: `make composer-install`
2. Обновление зависимостей: `make composer-update`

### Тестирование

1. Запуск тестов: `make test`

