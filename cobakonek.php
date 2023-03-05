<?php
$servername = "localhost";
$database = "coba";
$username = "root";
$password = "Vian1232005";

$conn = mysqli_connect ($servername, $username, $password, $database) ;
    //pagination
    $jumlahdataperhalaman = 3 ;
    $halaman_aktif = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $awaldata = ($halaman_aktif > 1) ? ($halaman_aktif * $jumlahdataperhalaman) - $jumlahdataperhalaman : 0; //angka pada awal data
    $jumlahlink =3;

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi ke database GAGAL: " . mysqli_connect_error());
}

// search
if (isset($_POST['bcari'])) {
    $cari = $_POST['tcari'];
} else {
    $cari = "";
}
echo "<b>Koneksi Berhasil (Ata Maulana Wakhid)<b>";
echo "<h3>Rekap Data Rekap Pegawai PT Always Selalu </h3>" ;
    echo "<table border='1' width='100%'>
    <tr align='center'><td>NO</td><td>NAMA PEGAWAI</td><td>NIP</td><td>STATUS</td><td>JENIS KELAMIN</td><td>STATUS</td></td></tr>";
    $nomor = 1+$awaldata ; //agar angka bisa berkelanjutan
    $Jeniskelamin ;
    $a =mysqli_query ($conn, "SELECT * FROM user WHERE Nama Like '%$cari%' OR NIP LIKE '%$cari%' LIMIT $awaldata, $jumlahdataperhalaman");
    $result = mysqli_query($conn, "SELECT * FROM user WHERE Nama Like '%$cari%' OR NIP LIKE '%$cari%'");
    $total = mysqli_num_rows($result);
    $jumlah_halaman = ceil($total/$jumlahdataperhalaman); //ceil untuk pembualatan ke atas 2,3 > 3
    if (!$conn) {
        die ("Koneksi ke database GAGAL:" . mysqli_connect_error ()) ;
    }

    
    $jumlahlink = 1;
    if ($halaman_aktif > $jumlahlink) {
        $angkadimulai = $halaman_aktif-$jumlahlink;
    } else {
        $angkadimulai = 1;
    }
    if ($halaman_aktif < ($jumlah_halaman - $jumlahlink)) {
        $angkakeri = $halaman_aktif + $jumlahlink;
    } else { 
        $angkakeri =$jumlah_halaman ;
    }

    while ($b =mysqli_fetch_array ($a)) {
        $id = $b["id"];
        echo "<tr><td>$nomor</td><td>$b[Nama]</td><td>$b[NIP]</td><td>$b[Status]</td><td>$b[sex]<td><a href='ubah.php?id=$id'>Ubah</a> | <a href='hapus.php?id=$id'>Hapus</a></td></tr>";
        $nomor++;
    }
    echo "</table>" ;   
    mysqli_close($conn) ;   
    ?>
    <br>
        <?php if ($halaman_aktif > 1) : ?>
           <a href="?halaman=<?= $halaman_aktif-1; ?>">&lt;MUNDUR&raquo;</a>
        <?php endif; ?>

    <?php for($i = $angkadimulai; $i <= $angkadimulai; $i++ ) : ?>
        <?php if($i == $halaman_aktif) : ?>
           <a href="?halaman=<?= $i; ?>" style="color: white;background-color: blue;font-weight: bold;"><?= $i; ?></a>
        <?php else : ?>
           <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>  
    <?php if ($halaman_aktif < $jumlah_halaman) : ?>
        <?php endif; ?>

        <?php
        for ($x = $angkadimulai; $x <=$angkakeri; $x++) {
            if ($x !=$halaman_aktif)  {
                echo "<a href='?halaman=$x'>$x</a>";
        } else {
                echo "<a href='#'>$x</a>";
        }
         }
        ?>
    <?php if ($halaman_aktif < $jumlah_halaman) : ?>
           <a href="?halaman=<?= $halaman_aktif+1; ?>">&laquo;MAJU&raquo;</a>
        <?php endif; ?>
<!DOCTYPE html>   
<html>     
<head>
    <title>Rekap Data Pegawai</title>
</head>
<body>
<div>
                <form action="cobakonek.php" method="POST" class="d-flex" role="search">
                    <input type="search" name="tcari" placeholder="Cari Data Pegawai.." autocomplete="off" autofocus value="<?php echo $cari ?>">
                    <button class="ms-2" type="submit" name="bcari">Cari</button>
                </form>
</div>
</body>

</html>