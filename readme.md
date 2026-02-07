# 📦 Tes Teknis Fastprint – Aplikasi Manajemen Produk (CodeIgniter 3)

## 🧑‍💻 Identitas

Framework: **CodeIgniter 3**
Database: **MySQL**

---

## 📌 Deskripsi Proyek

Proyek ini merupakan aplikasi sederhana **manajemen data produk** yang dibangun menggunakan **CodeIgniter 3** dan **MySQL**, sesuai dengan instruksi tes teknis yang diberikan.

Aplikasi ini memungkinkan pengguna untuk:

* Melihat daftar produk
* Melakukan filter produk berdasarkan status (bisa dijual / tidak bisa dijual)
* Menambah data produk
* Mengedit data produk
* Menghapus data produk dengan konfirmasi

Seluruh fitur dibuat menggunakan konsep **MVC (Model–View–Controller)** sesuai standar CodeIgniter.

---

## 🗂️ Struktur Database

Aplikasi ini menggunakan 3 tabel utama:

### 1️⃣ Tabel `produk`

| Field       | Keterangan               |
| ----------- | ------------------------ |
| id_produk   | Primary Key              |
| nama_produk | Nama produk              |
| harga       | Harga produk             |
| kategori_id | Relasi ke tabel kategori |
| status_id   | Relasi ke tabel status   |

### 2️⃣ Tabel `kategori`

| Field         | Keterangan    |
| ------------- | ------------- |
| id_kategori   | Primary Key   |
| nama_kategori | Nama kategori |

### 3️⃣ Tabel `status`

| Field       | Keterangan                                      |
| ----------- | ----------------------------------------------- |
| id_status   | Primary Key                                     |
| nama_status | Status produk (Bisa Dijual / Tidak Bisa Dijual) |

---

## ⚙️ Fitur yang Telah Diimplementasikan

### ✅ 1. Menampilkan Data Produk

* Menampilkan seluruh data produk dari database
* Menggunakan JOIN antar tabel produk, kategori, dan status

### ✅ 2. Filter Produk Berdasarkan Status

* Filter menggunakan parameter GET
* Status:

  * Bisa Dijual
  * Tidak Bisa Dijual

### ✅ 3. Tambah Produk

* Form input produk
* Dropdown kategori & status diambil langsung dari database
* Validasi form:

  * Nama produk wajib diisi
  * Harga wajib diisi dan harus berupa angka

### ✅ 4. Edit Produk

* Menggunakan form yang sama dengan tambah
* Data otomatis terisi sesuai produk yang dipilih
* Validasi sama seperti tambah data

### ✅ 5. Hapus Produk

* Menggunakan konfirmasi JavaScript (`confirm()`) sebelum data dihapus

### ✅ 6. Tampilan

* Menggunakan **Bootstrap** agar tampilan rapi dan mudah dibaca
* Fokus pada tampilan sederhana dan fungsional

---

## 🚫 Alasan Tidak Menggunakan API yang Disediakan

Pada instruksi awal, diberikan sebuah API sebagai sumber data produk.

Namun, setelah dilakukan beberapa percobaan:

* API sudah berhasil diakses
* Autentikasi (username & password dinamis) telah dicoba sesuai petunjuk
* Request menggunakan POST (melalui Postman dan CodeIgniter)

⚠️ **Permasalahan yang ditemukan:**

* API selalu mengembalikan response error
* Data produk tidak pernah berhasil ditampilkan
* Bahkan ketika kredensial sudah disesuaikan dengan hint yang diberikan

Karena:

* API tidak mengembalikan data valid
* Tidak memungkinkan untuk melanjutkan fitur CRUD dari API

👉 **Maka diputuskan untuk menggunakan database lokal (MySQL)** dengan struktur tabel yang menyesuaikan kebutuhan soal, agar seluruh fitur yang diminta tetap dapat diselesaikan dan diuji dengan baik.

Keputusan ini diambil agar:

* Seluruh requirement tes tetap terpenuhi
* Alur aplikasi dapat berjalan secara end-to-end
* Fokus penilaian tetap pada logika, struktur kode, dan implementasi fitur

---

## 📎 Penutup

Proyek ini dibuat sebagai bentuk usaha maksimal untuk mengikuti seluruh instruksi tes yang diberikan.

Terima kasih atas kesempatan yang diberikan 🙏

Semoga hasil pengerjaan ini dapat dipertimbangkan dengan baik.
