# Inquiry-Form

##　環境構築

Dockerビルド
・git clone git@github.com:Estra-Coachtech/laravel-docker-template.git
・mv laravel-docker-template Inquiry-Form
・docker compose up -d --build

Laravel環境構築
・docker compose exec php bash
・composer install
・cp .env.example .env
・composer require laravel/fortify