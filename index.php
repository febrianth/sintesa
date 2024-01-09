<?php
require 'koneksi.php'; // Ini seperti mengatakan, "Kita perlu kunci untuk 'rumah' database kita sebelum kita bisa melakukan sesuatu."

$message = ''; // Ini adalah kotak surat kita, di mana kita akan menemukan pesan tentang apa yang terjadi, baik itu berhasil atau ada masalah.

// Kita hanya akan melakukan sesuatu jika pengguna telah mengisi formulir dan mengirimkannya.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kita mengumpulkan informasi yang dimasukkan pengguna ke dalam formulir dan menyimpannya dalam variabel.
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $hoby = $_POST['hoby'];

    // Ini adalah instruksi yang akan kita berikan kepada 'rumah' database kita untuk menambahkan informasi baru.
    $sql = "INSERT INTO siswa (nama, kelas, hoby) VALUES (?, ?, ?)";

    // Kita meminta PDO untuk menyiapkan instruksi kita dan memastikan semuanya siap sebelum kita memberikan informasi yang kita kumpulkan.
    $stmt = $pdo->prepare($sql);

    // Sekarang kita memberikan informasi yang kita kumpulkan dan meminta PDO untuk menjalankan instruksi kita.
    if ($stmt->execute([$nama, $kelas, $hoby])) {
        $message = "Data Siswa berhasil ditambahkan!"; // Jika berhasil, kita akan mendapatkan surat yang mengatakan semuanya berjalan lancar.
    } else {
        $message = "Terjadi kesalahan saat menambahkan user."; // Jika tidak, kita akan mendapatkan surat yang mengatakan ada masalah.
    }
}
$iniSaya = "Denis"; // Ini adalah nama kita yang akan ditampilkan di halaman.
?>

<!-- Di bawah ini adalah desain dari rumah kita, di mana kita akan menampilkan pesan dan formulir untuk pengguna. -->
<!DOCTYPE html>

<head>
    <!-- Kita menggunakan kode standar untuk memberitahu browser bahwa kita menggunakan karakter-karakter khusus dengan benar. -->
    <meta charset="UTF-8">
    <title>Form Input Siswa</title>
    <!-- Ini adalah aturan-aturan desain untuk membuat halaman kita terlihat bagus dan rapi. -->
    <style>
        /* Aturan-aturan desain di sini... */

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
        }

        input[type=text],
        input[type=email],
        input[type=submit] {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type=submit] {
            background-color: #5cb85c;
            color: white;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #4cae4c;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
            border-radius: 4px;
        }

        h1 {
            color: #333;
            text-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
    </style>
</head>

<body>

    <h1>Selamat Datang <?php echo $iniSaya ?>!</h1> <!-- Ini adalah sambutan untuk kita, seperti karpet merah di depan pintu. -->

    <div class="container">
        <?php if (!empty($message)) : ?>
            <div class="message">
                <?= $message; ?> <!-- Pesan yang akan ditampilkan. -->
            </div>
        <?php endif; ?>

        <!-- Ini adalah formulir di mana pengguna dapat mengisi informasi. -->
        <form method="POST">
            <!-- Kita menyiapkan tempat untuk pengguna memasukkan nama, kelas, dan hobi mereka. -->
            <label for="nama">Nama :</label>
            <input type="text" id="nama" name="nama" required>

            <label for="kelas">kelas :</label>
            <input type="text" id="kelas" name="kelas" required>

            <label for="hoby">hoby :</label>
            <input type="text" id="hoby" name="hoby" required>

            <input type="submit" value="Submit"> <!-- Ini adalah tombol untuk mengirimkan formulir. -->
        </form>
    </div>

</body>

</html>