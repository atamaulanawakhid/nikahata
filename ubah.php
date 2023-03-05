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
    if ($_GET["id"] && empty($_POST["simpan"])){
        $id = $_GET["id"];
        $a = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'"));
        $nama = $a ["Nama"];
        $nip = $a ["NIP"];
        $status = $a ["Status"];
        $sex = $a ["sex"];
        echo "
        <form method='POST' action='#' name='simpandata'>
        <table>
            <tr><td colspan='2'>Form Edit Data</td></tr>
            <tr><td>Nama</td><td><input type='text' name='nama' value='$nama'></td></tr>
            <tr><td>NIP</td><td><input type='text' name='nip' value='$nip'></td></tr>
            <tr><td>Status</td><td><input type='text' name='status' value='$status'></td></tr>
            <tr><td>Jenis Kelamin</td>
            <td><select name='sex'>
            <option value=''>--PILIH--</option>
            <option value='L'"; if ($sex == "L") {echo "selected";} echo ">L</option>
            <option value='P'"; if ($sex == "P") {echo "selected";} echo ">P</option>
            </select>
            </td></tr>
            <input type='hidden' name='id' value='$id'>
            <tr><td colspan='2'><input type='submit' name='simpan' value='SIMPAN'</td></tr>
        </table>
        </form>";
    } else {
        $id = $_POST["id"];
        $inputnama = $_POST["nama"];
        $inputnip = $_POST["nip"];
        $inputstatus = $_POST["status"];
        $inputkelamin = $_POST["sex"];
        $input = "UPDATE user SET nama='$inputnama' , nip='$inputnip' , status='$inputstatus', sex='$inputkelamin' WHERE id='$id'";
        $query_input = mysqli_query($conn, $input);
        if ($query_input) {
            echo "Data berhasil disimpan...<br>";
            echo "<a href='cobakonek.php'>(Kembali ke Daftar Pegawai)</a><br>";
        }else{
            echo "Data GAGAL disimpan.<br>";
            echo "<a href='cobakonek.php'>(Kembali ke Daftar Pegawai)</a><br>";
        }
    }

    mysqli_close($conn);
?>