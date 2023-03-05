<?php
    $servername = "localhost";
    $database = "coba";
    $username = "root";
    $password = "Vian1232005";

    $conn = mysqli_connect ($servername, $username, $password, $database);

    if (!$conn) {
        die("Koneksi ke database GAGAL: " . mysqli_connect_error());
    }
    echo "<b>Koneksi Berhasil<b> (Ata Maulana Wakhid) <br>";
    $id = $_GET["id"];
    $a = mysqli_query($conn, "DELETE FROM user WHERE id = '$id'");

    if ($a) {
        echo "<h3>Hapus Data Berhasil.</h3>";
        echo "<a href='cobakonek.php'>(Kembali ke Daftar Pegawai)</a><br>";
    }else{
        echo "h3>Hapus Data TIDAK BERHASIL.</h3>";
        echo "<a href='cobakonek.php'>(Kembali ke Daftar Pegawai)</a><br>";
    }

    mysqli_close($conn);
?>