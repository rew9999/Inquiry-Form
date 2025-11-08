# Inquiry-Form

##　環境構築

### Dockerビルド
```
・git clone git@github.com:Estra-Coachtech/laravel-docker-template.git
・docker compose up -d --build
```

### Laravel環境構築
```
・docker compose exec php bash
・composer install
・cp .env.example .env
・composer require laravel/fortify
・php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
・php artisan key:generate
・php artisan migrate
・php artisan db:seed
```

### 開発環境
```
・お問い合わせ画面：http://localhost/
・ユーザー登録：http://localhost/register
・phpMyAdmin:http://localhost:8080/
```

### 使用技術（実行環境）
```
・php:8.1-fpm
・Larave:l 8.83.8
・mysql:8.0.26
```

### ER図
