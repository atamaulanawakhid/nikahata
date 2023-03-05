<?php
$servername = "localhost";
$database = "coba";
$username = "root";
$password = "Vian1232005";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    die("Koneksi ke database GAGAL: " . mysqli_connect_error());
}
echo "Koneksi Berhasil (Ata Maulana Wakhid)<br>";

if (empty($_POST ["nama"])) {
    //script form isian
    echo "
    <form method='POST' action'#' name='simpandata'>
    <table>
        <tr><td colspan='2'>Form Isian Data</td></tr>
        <tr><td>Nama</td><td><input type='text' name='nama'></td></tr>
        <tr><td>NIP</td><td><input type='text' name='nip'></td></tr>
        <tr><td>Status</td><td><input type='text' name='status'></td></tr>
        <tr><td>Jenis Kelamin</td><td><select name='sex'><option>--PILIH--</option><option value='L'>L</option><option value='P'>P</option></select></td></tr>
        <tr><td colspan='2'><input type='submit' name='simpan' value='SIMPAN'></td></tr>
    </table>
    </form>";
}else{
    //script menyimpan data inputan
    $inputnama = $_POST["nama"];
    $inputnip = $_POST["nip"];
    $inputstatus = $_POST["status"];
    $inputkelamin = $_POST["sex"];
    $input = "INSERT INTO user (nama,nip,status,sex) VALUES ('$inputnama','$inputnip','$inputstatus','$inputkelamin')";
    $query_input = mysqli_query($conn,$input);
    if ($query_input){
        echo "Data berhasil disimpan...<br>";
        echo "<a href='inputdata.php'>(Kembali ke form)</a>&nbsp&nbsp|&nbsp&nbsp";
        echo "<a href='cobakonek.php'>(Kembali ke Daftar Pegawai)</a><br>";
    }else{
        echo "Data GAGAL disimpan.<br>";
        echo "<a href='inputdata.php'>(Kembali ke form)</a><br>";
        echo "<a href='cobakonek.php'>(Kembali ke Daftar Pegawai)</a><br>";
    }
}
mysqli_close($conn);
?>