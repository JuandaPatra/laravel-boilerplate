🐳 Menjalankan dengan Docker (Docker Desktop / Engine)
Jalankan Containers
docker compose up -d --build


Ini akan membangun dan menjalankan semua service yang ada di docker-compose.yml seperti app, web server, db, dll.

Akses Shell Container (opsional)
docker exec -it <app_container_name> bash


Contoh nama container bisa dilihat dari:

docker ps

Install dependencies & migrations

Jika belum diinstall lewat build:

docker exec -it <app_container_name> bash
composer install
php artisan migrate --seed
npm install
npm run dev

Stop / Remove containers
docker compose down

🐧 Menjalankan dengan Podman

Podman kompatibel dengan file docker-compose.yml, jadi kamu tinggal pakai:

podman compose up -d --build


Pastikan podman dan podman-compose sudah terpasang.
Podman menangani container tanpa daemon seperti Docker.

Jika perintah tidak jalan, install podman compose:
``
sudo dnf install podman-compose  # (Fedora / RHEL)
# atau sesuaikan dengan distro kamu
Podman Exec
podman exec -it <app_container_name> bash
``
📌 Tips
