<?php
include("koneksi.php");

$querySiswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
$query_absen = mysqli_query($koneksi, "SELECT * FROM tb_absensi");

function rekap()
{
    include("koneksi.php");

    $result = array();
    $query = mysqli_query($koneksi, "SELECT * FROM tb_absensi");
    while ($row = mysqli_fetch_assoc($query)) {
        $nis = $row['id_siswa'];
        $absen = $row['id_status'];

        if (!isset($result[$nis])) {
            $result[$nis] = array(
                'H' => 0,
                'I' => 0,
                'S' => 0,
                'A' => 0
            );
        }
        $result[$nis][$absen]++;
    }

    echo '<table border="1">
    <tr>
        <th>H</th>
        <th>I</th>
        <th>S</th>
        <th>A</th>
    </tr>';

    foreach ($result as $nis => $value) {
        echo '<tr><td>' . $value['H'] . '</td><td>' . $value['I'] . '</td><td>' . $value['S'] . '</td><td>' . $value['A'] . '</td></tr>';
    }
    echo '</table>';
}
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
    <div style="display: flex;">
        <div style="margin-right: 20px;">
            <form action="" method="post">
                <table>
                    <tr>
                        <th colspan="38">Bulan November</th>
                    </tr>
                    <tr>
                        <th rowspan="2">no</th>
                        <th rowspan="2">nis</th>
                        <th rowspan="2">nama</th>
                        <?php
                        for ($i = 1; $i <= 31; $i++) {
                            echo "<th>$i</th>";
                        }
                        ?>
                    </tr>
                    <tr>

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
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                $query_absen = mysqli_query($koneksi, "SELECT id_status FROM tb_absensi WHERE id_siswa = '" . $rowSiswa['nis'] . "' AND tanggal = '2023-11-$i'");
                                $absen = "";
                                if (mysqli_num_rows($query_absen) > 0) {
                                    $absen = mysqli_fetch_assoc($query_absen)['id_status'];
                                }
                                echo "<td>$absen</td>";
                            }
                            ?>
                            
                        </tr>
                    <?php } ?>
                </table>
            </form>
        </div>

        <div>
            <table>
                <tr>
                    <th colspan="4">Rekap Absensi</th>
                </tr>
                <?php
                // Panggil fungsi rekap untuk menampilkan tabel rekap
                rekap();
                ?>
            </table>
        </div>
    </div>
</body>

</html>
