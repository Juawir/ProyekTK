<?php

include("koneksi.php");

$querySiswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
$query_absen = mysqli_query($koneksi, "SELECT * FROM tb_absensi");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="date" name="tanggal" value="<?php echo date('Y-m-d');?>">
        <table border="1">
            <tr>
                <th rowspan="2">no</th>
                <th rowspan="2">nis</th>
                <th rowspan="2">nama</th>
                <th colspan="4">absen</th>
            </tr>
            <tr>
                <td>H</td>
                <td>I</td>
                <td>S</td>
                <td>A</td>
            </tr>
            <?php
            $b = 1;
            foreach ($querySiswa as $rowSiswa) {
                ?>
                <tr>
                    <td>
                        <?= $b++ ?>
                    </td>
                    <td>
                        <?= $rowSiswa['nis'] ?><input type="hidden" name="nis[]" value="<?= $rowSiswa['nis'] ?>">
                    </td>
                    <td>
                        <?= $rowSiswa['nama'] ?>
                    </td>
                    <td><input type="checkbox" id="hadir" name="hadir[]" value="H"></td>
                    <td><input type="checkbox" name="hadir[]" value="I"></td>
                    <td><input type="checkbox" name="hadir[]" value="S"></td>
                    <td><input type="checkbox" name="hadir[]" value="A"></td>
                </tr>
            <?php } ?>
        </table>
        <input type="submit" name="submit"></input>
    </form>

    <script>
        let hadir = document.getElementById('hadir');
        console.log('hadir', hadir);
    </script>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $absen = $_POST['hadir'];
    $tanggal = $_POST['tanggal'];
    // $tanggal = date('Y-m-d');


    if (isset($absen)) {
        $no = 0;
        foreach ($absen as $row) {
            $id_siswa = $nis[$no];

            $query = mysqli_query($koneksi, "INSERT INTO tb_absensi VALUES ('', '$id_siswa', '$tanggal', '$row'); ");

            $no++;
        }

    }
    if ($query == true) {
        echo "berhasil";
    }
}
?>