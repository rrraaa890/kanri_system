up:
	docker-compose up -d
	docker-compose exec app npm run watch
build:
	docker-compose build --no-cache --force-rm
laravel-install:
	docker-compose exec app composer create-project --prefer-dist "laravel/laravel=6.*" .
create-project:
	@make build
	@make up
	@make laravel-install
install-recommend-packages:
	docker-compose exec app composer require doctrine/dbal
	docker-compose exec app composer require --dev barryvdh/laravel-ide-helper
	docker-compose exec app composer require --dev beyondcode/laravel-dump-server
	docker-compose exec app composer require --dev barryvdh/laravel-debugbar
	docker-compose exec app composer require --dev roave/security-advisories:dev-master
	docker-compose exec app php artisan vendor:publish --provider="BeyondCode\DumpServer\DumpServerServiceProvider"
	docker-compose exec app php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
# git clone後初回起動時
init_dev:
	docker-compose up -d --build
	docker-compose exec app composer install
	docker-compose exec app cp .env.example .env
	docker-compose exec app php artisan key:generate
	docker-compose exec app php artisan storage:link
	docker-compose exec app npm install
init_prod:
	docker-compose exec app composer install
	docker-compose exec app cp .env.example .env
	docker-compose exec app php artisan key:generate
	docker-compose exec app php artisan storage:link
	docker-compose exec app php artisan migrate:fresh --seed
remake:
	@make destroy
	@make init_dev
stop:
	docker-compose stop
down:
	docker-compose down
restart:
	@make down
	@make up
destroy:
	docker-compose down --rmi all --volumes
destroy-volumes:
	docker-compose down --volumes
ps:
	docker-compose ps
web:
	docker-compose exec app ash
app:
	docker-compose exec app bash
npm:
	@make npm-install
npm-install:
	docker-compose exec app npm install
npm-dev:
	docker-compose exec app npm run dev
npm-watch:
	docker-compose exec app npm run watch
npm-watch-poll:
	docker-compose exec app npm run watch-poll
db:
	docker-compose exec db bash
tinker:
	docker-compose exec app php artisan tinker