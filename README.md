# EduQuest - Smart Academic Exam Generator & Question Bank

EduQuest adalah sistem manajemen bank soal dan generator lembar ujian berbasis web tingkat lanjut. Dirancang khusus untuk memecahkan masalah para tenaga pengajar dan akademisi di bidang Sains, Teknologi, Teknik, dan Matematika (STEM) yang kerap kesulitan menuliskan rumus kompleks pada platform digital konvensional. 

Sistem ini bertindak sebagai asisten virtual yang memungkinkan pengajar menyimpan repositori soal, memvisualisasikan data akademik, dan meracik lembar ujian dinamis hanya dalam beberapa kali klik.


## Fitur Unggulan (Key Features)

EduQuest dibangun dengan arsitektur **Multi-Tenant**, memastikan setiap dosen memiliki ruang kerja dan basis data soal yang terisolasi secara aman.

* **Dashboard Analytics & Visualisasi Data**
    * Ringkasan statistik real-time menggunakan `Chart.js`.
    * Diagram Lingkaran (Pie Chart) untuk memantau komposisi tingkat kesulitan soal.
    * Diagram Batang (Bar Chart) untuk distribusi soal pada setiap mata kuliah.
* **Dukungan Penuh Sintaks LaTeX (MathJax Engine)**
    * Ucapkan selamat tinggal pada *screenshot* rumus! Input pertanyaan mendukung penuh sintaks LaTeX (misal: integral, matriks, limit) yang akan di-render secara presisi berstandar publikasi ilmiah.
* **Manajemen Bank Soal Cerdas**
    * **Upload Media:** Dukungan penyisipan gambar/grafik (diagram benda bebas, rangkaian listrik, dll) pada setiap butir soal.
    * **Bulk Import CSV:** Mengunggah puluhan soal sekaligus dari format Excel/CSV tanpa membuat server terbebani (menggunakan fungsi pembacaan file native PHP).
* **Dynamic Exam Generator (Generator Ujian Dinamis)**
    * Filter cerdas berdasarkan Mata Kuliah dan/atau Tingkat Kesulitan.
    * Fitur **Checklist Massal** untuk memilih butir soal secara spesifik.
    * **Algoritma Pengacakan (Shuffle):** Opsi untuk mengacak urutan soal secara otomatis setiap kali dokumen di-generate untuk meminimalisir kecurangan mahasiswa.
    * **Auto-Generate Kunci Jawaban:** Sistem memisahkan lembar cetak mahasiswa dan secara otomatis membuat halaman "Dokumen Rahasia" di akhir PDF yang berisi tabel kunci jawaban khusus untuk dosen.


## Teknologi yang Digunakan (Tech Stack)

* **Backend:** PHP 8.x, Laravel Framework, Eloquent ORM
* **Database:** MySQL / MariaDB
* **Frontend:** HTML5, CSS3, Bootstrap 5, Blade Templating
* **Data Visualization:** Chart.js
* **Typography & Math Rendering:** MathJax (CDN)


## Panduan Instalasi (Local Development)

Ikuti langkah-langkah berikut untuk menjalankan proyek EduQuest di mesin lokal Anda:

### 1. Kloning Repositori
```bash
git clone (https://github.com/ahan-vian/eduquest.git)
cd eduquest 
``` 
### 2. Instalasi Dependensi PHP
```bash
composer install 
```

### 3. Konvigurasi Environment
Duplikat file `.env.example` menjadi `.env`

```bash
cp .env.example .env
```

Buka file `.env` dan sesuaikan pengaturan database anda :
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eduquest_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Key & Link Storage
Sangat penting untuk menjalankan tautan storage agar fitur upload gambar dapat berfungsi di antarmuka web.
```bash
php artisan key:generate
php artisan storage:link
```

### 5. Migrasi Database
Membangun skema tabel, termasuk kolom relasional dan atribut tambahan.
```bash
php artisan migrate
```

### 6. Jalankan Server Lokal
```bash
php artisan serve
```

Aplikasi kini dapat diakses melalui browser Anda di alamat:
`http://localhost:8000`