# Sistem Informasi Absensi TK-Aisyiah (ProyekTK)

Aplikasi berbasis web untuk pencatatan absensi / kehadiran siswa di tingkat pendidikan Taman Kanak-Kanak (TK) Aisyiah. Proyek ini dibangun sebagai tugas pembuatan sistem informasi akademik semester III.

## 🚀 Teknologi yang Digunakan
Sistem ini dibuat secara *Native* (tanpa menggunakan framework utuh) dengan teknologi berikut:
- **Frontend / UI**: HTML5, CSS, dan JavaScript murni.
- **Template Admin**: AdminLTE (Dilengkapi dengan plugin Bootstrap 4 & FontAwesome).
- **Backend**: *Native PHP* (Pemrosesan logika sisi server & koneksi database `mysqli`).
- **Database**: MySQL / MariaDB.

## 📂 Analisis Struktur Direktori & Database
1. **Direktori `HTML/`**: Berisi halaman antarmuka pengguna (`index.html`, `login.php`, `rekapitulasi.html`) beserta aset *front-end* seperti *plugins*, *dist* (CSS/JS bawaan AdminLTE), dan skrip penghubung `Function/`.
2. **Direktori `HTML/Function/`**: Berisi skrip-skrip inti PHP seperti `koneksi.php` yang mengatur hubungan atau interaksi dengan *database*.
3. **Direktori `database/`**: Menyimpan master file ekspor database SQL bernama `db_absensi.sql`.
4. **Struktur Database (`db_absensi`)**:
   - `tb_absensi`: Tabel utama untuk mencatat tanggal kehadiran dan kode status siswa (*Hadir, Ijin, Sakit, Alpha*).
   - `tb_siswa`: Tabel data master siswa (Nama, Kelas, NIS, Telepon).
   - `tb_status`: Tabel referensi / keterangan status absensi (`H`, `I`, `S`, `A`).
   - `tb_user`: Tabel data kredensial akses untuk Kepala Sekolah, Admin, dan Guru.

---

## 🛠️ Cara Menjalankan Proyek 

Karena aplikasi ini menggunakan PHP Murni dan *routing* folder bawaan *(Native)*, Anda membutuhkan server lokal seperti **XAMPP** untuk menjalankannya. Berikut langkah-langkahnya:

### 1. Persiapan Server & Database
1. Buka aplikasi **XAMPP Control Panel** di komputer Anda.
2. Klik tombol **Start** pada modul **Apache** dan **MySQL**.
3. Buka browser dan akses halaman kelola *database* di [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
4. Buatlah **Database Baru** dan beri nama persis seperti berikut: **`db_absensi`** (huruf kecil semua tanpa spasi).
5. Klik database `db_absensi` tersebut, pilih tab/menu **Import**.
6. Klik *Choose File / Browse*, lalu cari dan pilih file `db_absensi.sql` yang berada di dalam folder proyek Anda tepatnya di: `C:\xampp\htdocs\ProyekTK\database\db_absensi.sql`.
7. Scrool ke paling bawah halaman lalu klik **Import / Go**. Tunggu hingga semua tabel sukses dibuat.

### 2. Mengakses Aplikasi Web
1. Pastikan seluruh folder proyek ini (bernama `ProyekTK`) diletakkan di dalam folder *root web server* milik XAMPP, yaitu di `C:\xampp\htdocs\ProyekTK`. (Saat ini lokasi folder Anda sudah benar).
2. Buka Tab Baru pada Web Browser Anda.
3. Ketik URL berikut untuk masuk ke halaman login utama aplikasi:
   **[http://localhost/ProyekTK/HTML/login.php](http://localhost/ProyekTK/HTML/login.php)**
   *(Abaikan jika menemukan `.html` karena titik masuk sistem php nya direntet pada file `login.php` dan skrip di file lainnya).*
4. Untuk *testing* login, Anda bisa menggunakan data user dari tabel `tb_user`, contohnya dengan email/kredensial untuk guru. 

Aplikasi Absensi TK-Aisyiah siap digunakan dan dimodifikasi secara lokal!
