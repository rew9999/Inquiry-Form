# Inquiry-Form

##　環境構築

### Dockerビルド
```
・git clone git@github.com:rew9999/Inquiry-Form.git
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

### .env注意点
```
・cp .env.example .env後、.envの書き換えを行う。
DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
+ DB_HOST=mysql
DB_PORT=3306
- DB_DATABASE=laravel
- DB_USERNAME=root
- DB_PASSWORD=
+ DB_DATABASE=laravel_db
+ DB_USERNAME=laravel_user
+ DB_PASSWORD=laravel_pass
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
・nginx:1.21.1
・Larave:l 8.83.8
・mysql:8.0.26
```

### ER図
https://github.com/rew9999/Inquiry-Form/issues/3#issue-3603596285