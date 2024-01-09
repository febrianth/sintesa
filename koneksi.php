<?php
// Variabel-variabel ini seperti kunci untuk membuka pintu yang menghubungkan kita ke "rumah" database kita.
$host = 'localhost'; // Ini adalah alamat 'rumah' dataabse kita di komputer server.
$db   = 'siswa_sintesa'; // Ini adalah nama 'rumah' kita, atau nama database di MySQL.
$user = 'febrianth'; // Ini seperti nama pengguna kita untuk masuk ke 'rumah' kita.
$pass = 'febrianth123'; // Ini adalah kata sandi untuk membuka pintu 'rumah' database kita.

// Ini adalah sekumpulan aturan yang kita berikan kepada PDO agar ia tahu cara berperilaku saat masuk ke 'rumah' database.
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Jika ada yang tidak beres, PDO akan memberitahu kita dengan jelas.
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Ketika kita mengambil data, PDO akan memberikan kepada kita dalam bentuk yang mudah kita pahami, seperti lemari dengan label yang jelas.
    PDO::ATTR_EMULATE_PREPARES   => false, // PDO tidak akan menggunakan trik untuk menyiapkan perintah kita, ia akan menggunakan cara yang sebenarnya.
];

try {
    // Kita mencoba masuk ke 'rumah' database kita dengan kunci yang sudah kita siapkan.
    $pdo = new PDO("mysql:host=$host;dbname=$db;", $user, $pass, $options);
} catch (\PDOException $e) {
    // Jika ada yang salah, misalnya kita salah memasukkan kata sandi, maka PDO akan memberitahu kita apa masalahnya.
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
