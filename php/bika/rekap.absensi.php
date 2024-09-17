<?php
include("koneksi.php");

$querySiswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
$query_absen = mysqli_query($koneksi, "SELECT * FROM tb_absensi");

$query = mysqli_query($koneksi, "SELECT a.*, s.nama, s.kelas, s.telepon FROM tb_siswa s inner join tb_absensi a on a.id_siswa = s.nis");


$bulan = isset($_POST['cek']) ? $_POST['bulan'] : date('m');
$tahun = isset($_POST['cek']) ? $_POST['tahun'] : date('Y');

$data_bulan = [
    "01" => "Januari",
    "02" => "Februari",
    "03" => "Maret",
    "04" => "April",
    "05" => "Mei",
    "06" => "Juni",
    "07" => "Juli",
    "08" => "Agustus",
    "09" => "September",
    "10" => "Oktober",
    "11" => "November",
    "12" => "Desember",
];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>

<body>
    <form method="post">
        <label for="">Pilih Bulan</label>
        <select name="bulan" id="">
            <option value="" selected disabled>Pilih</option>
            <?php


            $nama_bulan = '';

            if(date('m') == $bulan) {
                $selected = 'selected';
                $nama_bulan = $val;
            } else {
                $nama_bulan = $val;
                $selected = '';
            }

            foreach($data_bulan as $key => $val) {
                $nama_bulan = isset($_POST['cek']) ? $val : $val;
                echo '<option value="'.$key.'">'.$val.'</option>';
            }
            ?>


        </select>
        <input type="number" value="<?= date('Y') ?>" name="tahun">
        <button type="submit" name="cek">Cek</button>
    </form>

    <table>
        <tr>
            <th colspan="38">Bulan
                <?= $nama_bulan; ?>
            </th>
        </tr>
        <tr>
            <th rowspan="2">no</th>
            <th rowspan="2">nis</th>
            <th rowspan="2">nama</th>
            <?php
            for($i = 1; $i <= 31; $i++) {
                echo "<th>$i</th>";
            }
            ?>
        </tr>
        <tr>

        </tr>
        <?php
        $b = 1;


        foreach($querySiswa as $rowSiswa) {

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
                <?php

                for($i = 1; $i <= 31; $i++) {
                    $tgl = $tahun.'-'.$bulan.'-'.$i;
                    // var_dump($tgl);
                    $query_absen = mysqli_query($koneksi, "SELECT id_status FROM tb_absensi WHERE id_siswa = '".$rowSiswa['nis']."' AND tanggal = '$tgl'");
                    $absen = "";
                    if(mysqli_num_rows($query_absen) > 0) {
                        $absen = mysqli_fetch_assoc($query_absen)['id_status'];
                    }
                    echo "<td>$absen</td>";
                }
                ?>

            </tr>
        <?php } ?>
    </table>

    <table>
        <tr>
            <td>NIS</td>
            <td>Nama</td>
            <td>H</td>
            <td>I</td>
            <td>S</td>
            <td>A</td>
        </tr>

        <?php
        foreach($querySiswa as $row) {
            $query_h = mysqli_query($koneksi, "SELECT COUNT(id_status) as h from tb_absensi where year(tanggal) ='$tahun' and  MONTH(tanggal) = '$bulan' and id_status = 'H' and id_siswa = '".$row['nis']."' ");
            $H = mysqli_fetch_assoc($query_h);
            $query_i = mysqli_query($koneksi, "SELECT COUNT(id_status) as i from tb_absensi where year(tanggal) ='$tahun' and MONTH(tanggal) = '$bulan' and id_status = 'I' and id_siswa = '".$row['nis']."' ");
            $I = mysqli_fetch_assoc($query_i);
            $query_s = mysqli_query($koneksi, "SELECT COUNT(id_status) as s from tb_absensi where year(tanggal) ='$tahun' and MONTH(tanggal) = '$bulan' and id_status = 's' and id_siswa = '".$row['nis']."' ");
            $S = mysqli_fetch_assoc($query_s);
            $query_a = mysqli_query($koneksi, "SELECT COUNT(id_status) as a from tb_absensi where year(tanggal) ='$tahun' and MONTH(tanggal) = '$bulan' and id_status = 'a' and id_siswa = '".$row['nis']."' ");
            $A = mysqli_fetch_assoc($query_a);
            ?>
            <tr>
                <td>
                    <?= $row['nis'] ?>
                </td>
                <td>
                    <?= $row['nama'] ?>
                </td>
                <td>
                    <?= $H['h'] ?>
                </td>
                <td>
                    <?= $I['i'] ?>
                </td>
                <td>
                    <?= $S['s'] ?>
                </td>
                <td>
                    <?= $A['a']; ?>
                </td>
            </tr>

        <?php } ?>
    </table>


</body>

</html>