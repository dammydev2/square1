Install Docker on your PC

Clone the repo
run docker compose up -d

copy .env.example to .env
run docker-compose exec app php artisan key:generate
run docker-compose exec app php artisan migrate
run docker-compose exec app php artisan db:seed

go to http://127.0.0.1:8080/ (you can view post, register or login)

You can run run docker-compose exec app php artisan command:fetch-post to automaticaaly run the scheduler to fetch post
