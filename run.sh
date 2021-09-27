echo "[####]Cria arquivo .env[####]"
docker-compose exec app touch .env && cp env.example .env

echo "[####]Sobe containers[####]"
docker-compose up -d

echo "[####]instala dependencias do projeto[####]"
docker-compose exec app composer update

echo "[####]gera uma chave para a aplicação[####]"
docker-compose exec app php artisan key:generate

echo "[####]Roda Migration[####]"
docker-compose exec app php artisan migrate

echo "[####]Roda Seeders[####]"
docker-compose exec app php artisan db:seed --class=PetsTypesTableSeeder

echo "[####]Pronto! Aplicação preparada para rodar[####]"

