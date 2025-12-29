# 🐳 Laravel Boilerplate — Docker & Podman

Project Laravel ini sudah disiapkan untuk dijalankan menggunakan **Docker** maupun **Podman** melalui file `docker-compose.yml`.

---

## 📦 Prasyarat

Pastikan sudah terinstall:

- Git
- Docker **atau** Podman
- docker-compose (Docker)
- podman-compose (Podman)
- PHP & Composer (opsional, jika tidak sepenuhnya lewat container)

---

## 📥 Clone Repository

```bash
git clone https://github.com/JuandaPatra/laravel-boilerplate.git
cd laravel-boilerplate
```

🐳 Menjalankan dengan Docker (Docker Desktop / Engine)
▶️ Build & Jalankan Container
```bash
docker compose up -d --build
```

Perintah ini akan:

Build image dari Dockerfile

Menjalankan semua service di docker-compose.yml

Menjalankan container di background

🖥️ Akses Shell Container (Opsional)
docker exec -it <app_container_name> bash


Untuk melihat nama container:

docker ps

📦 Install Dependencies & Migrasi

Jika belum dilakukan saat build:

docker exec -it <app_container_name> bash
composer install
php artisan key:generate
php artisan migrate --seed
npm install
npm run dev

⛔ Stop / Remove Container
docker compose down

🐧 Menjalankan dengan Podman

Podman kompatibel dengan docker-compose.yml.

▶️ Build & Jalankan Container
podman compose up -d --build


Podman berjalan tanpa daemon dan lebih ringan dibanding Docker.

🧩 Install podman-compose (Jika belum ada)
Fedora / RHEL
sudo dnf install podman-compose

Ubuntu / Debian
sudo apt install podman-compose

🖥️ Akses Shell Container (Podman)
podman exec -it <app_container_name> bash


Cek container yang berjalan:

podman ps
