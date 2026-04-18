# 📦 Koperasi Merah Putih - Inventory Management System

Sistem Manajemen Inventori berbasis web yang dirancang khusus untuk **Koperasi Merah Putih**. Aplikasi ini dibangun menggunakan framework **Laravel** untuk mendigitalisasi pencatatan stok barang, mengelola transaksi masuk/keluar, serta menyediakan sistem pelaporan dokumen fisik yang sah.

## 🚀 Fitur Utama

* **Sistem Autentikasi**: Akses aman bagi petugas melalui fitur Login dan Register.
* **Manajemen Inventori (CRUD)**: Pengelolaan data master barang secara lengkap (Nama Barang, Kategori, Harga, dan Stok).
* **Pencatatan Transaksi**: Logika otomatis yang mencatat riwayat barang masuk dan keluar.
* **Update Stok Real-Time**: Jumlah stok pada data master akan bertambah atau berkurang secara otomatis setiap kali transaksi berhasil diverifikasi.
* **Sistem Pelaporan PDF**:
    * **Laporan Inventori**: Ringkasan seluruh aset yang tersedia di koperasi.
    * **Cetak Surat Jalan/Surat Masuk**: Menghasilkan dokumen PDF profesional dengan nomor surat otomatis (`SJ-XXXXX`) sebagai bukti fisik transaksi.
* **Dashboard User-Friendly**: Antarmuka responsif menggunakan Bootstrap 5 untuk kemudahan operasional.

## 🛠️ Teknologi yang Digunakan

* **Backend**: Laravel (PHP >= 8.1)
* **Database**: MySQL
* **Frontend**: Blade Templating & Bootstrap 5
* **PDF Library**: DomPDF
* **Dependency Manager**: Composer

## 📐 Arsitektur Database

Sistem ini menggunakan basis data relasional untuk memastikan konsistensi data antara stok dan riwayat transaksi:



1.  **Tabel `items`**: Menyimpan informasi dasar barang dan jumlah stok saat ini.
2.  **Tabel `transactions`**: Menyimpan log aktivitas (Tanggal, Jenis Transaksi, Jumlah, Keterangan) dan terhubung ke tabel `items`.

## 🚀 Panduan Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek di lingkungan lokal:

1.  **Clone Repositori**:
    ```bash
    git clone [https://github.com/ferandlim00/INVENTORI-MOBIL.git](https://github.com/ferandlim00/INVENTORI-MOBIL.git)
    cd INVENTORI-MOBIL
    ```

2.  **Install Dependensi**:
    ```bash
    composer install
    ```

3.  **Konfigurasi Environment**:
    Salin file `.env.example` menjadi `.env` dan sesuaikan pengaturan database Anda (DB_DATABASE, DB_USERNAME, DB_PASSWORD).
    ```bash
    cp .env.example .env
    ```

4.  **Generate Application Key**:
    ```bash
    php artisan key:generate
    ```

5.  **Migrasi Database**:
    ```bash
    php artisan migrate
    ```

6.  **Jalankan Server Lokal**:
    ```bash
    php artisan serve
    ```
    Akses aplikasi di `http://127.0.0.1:8000`.

## 📝 Logika Bisnis (Contoh Kasus)

Aplikasi ini menerapkan aturan bisnis sebagai berikut:
* **Barang Masuk**: Saat menginput transaksi jenis "Masuk", sistem akan menjalankan fungsi penambahan stok pada tabel barang terkait.
* **Validasi Surat**: Setiap transaksi yang tercatat dapat langsung dicetak menjadi Surat Jalan yang memuat nama petugas penanggung jawab (diambil dari data sesi login).

## 📷 Dokumentasi Visual

| Dashboard Utama | Riwayat Transaksi | Hasil Cetak Surat Jalan |
| :---: | :---: | :---: |
| ![Dashboard](./assets/dashboard.png) | ![Transaksi](./assets/transaksi.png) | ![PDF Surat Jalan](./assets/surat-jalan.png) |

---

**Dikembangkan Oleh:**
**Fernandoz Lim**
NIM: 2322039
Mahasiswa Teknik Komputer, Institut Teknologi Batam (ITB Batam)
