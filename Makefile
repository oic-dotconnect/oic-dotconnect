setup:
	composer install
	npm i
	cp .env.example .env
	php artisan key:generate
	touch database/database.sqlite
	php artisan migrate --seed
	npm run dev
