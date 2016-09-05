## Laravel

### 初期設定

```
sudo composer install
cp .env.example .env
touch database/database.sqlite
php artisan migrate --seed
```

### 起動
```
php artisan serve
```

### ルート定義ファイルの追加
```
php artisan route:make route_name
```

## Vue

### 初期設定

```
npm i
```

### ビルド

```
npm build
```

ウォッチモード
```
npm build-w
```
