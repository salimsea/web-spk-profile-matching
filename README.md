# Aplikasi SPK Metode Profile Matching

## Demo Website
<img width="500" alt="image" src="https://github.com/salimsea/web-spk-profile-matching/assets/49223890/132f77bc-f14c-43fc-bd5a-e588b342a52c">

## Deskripsi
Aplikasi ini adalah sistem pendukung keputusan (SPK) yang menggunakan metode Profile Matching untuk membantu dalam proses penilaian dan pengambilan keputusan. Metode ini membandingkan profil kandidat dengan profil yang diinginkan untuk mendapatkan hasil yang paling sesuai.

## Fitur
- Input data kriteria dan subkriteria
- Input data kandidat
- Perhitungan nilai profile matching
- Hasil perhitungan dan ranking kandidat

## Teknologi yang Digunakan
- PHP
- MySQL
- HTML
- CSS
- JavaScript

## Instalasi
1. Clone repository ini ke lokal Anda:
    ```bash
    git clone https://github.com/salimsea/web-spk-profile-matching.git
    ```

2. Masuk ke direktori project:
    ```bash
    cd repo
    ```

3. Buat database di MySQL dan impor file `database.sql` yang ada di folder `sql`:
    ```sql
    CREATE DATABASE spk;
    USE spk;
    SOURCE database.sql;
    ```

4. Ubah file koneksi database di `koneksi.php`:
    ```php
    <?php
    $host     = "localhost";
    $username = "root";
    $password = "";
    $database = "db_pm";
    $koneksi  = mysqli_connect($host, $username, $password, $database);

    if (! $koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    } 

   
    ?>

    ```

5. Jalankan aplikasi dengan membuka file `index.php` di browser:
    ```bash
    http://localhost/profile-matching/index.php
    ```

## Penggunaan
1. Tambahkan data kriteria dan subkriteria di halaman `page?=kriteria`.
2. Tambahkan data kandidat di halaman `page?=alternatif`.
3. Lakukan perhitungan profile matching di halaman `page?=perhitungan`.
4. Lihat hasil ranking di halaman `page?=hasil`.

## Kontribusi
Silakan membuat pull request atau mengajukan issue jika Anda ingin berkontribusi pada proyek ini.


