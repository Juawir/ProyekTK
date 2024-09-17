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
    <title>Absensi</title>
</head>

<body>

</body>

</html>

<?php
function rekap() {
    include("koneksi.php");

    $result = array();
    $query = mysqli_query($koneksi, "SELECT * FROM tb_absensi");
    while($row = mysqli_fetch_assoc($query)) {
        $nis = $row['id_siswa'];
        $absen = $row['id_status'];

        if(!isset($result[$nis])) {
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
        <th>NIS</th>
        <th>H</th>
        <th>I</th>
        <th>S</th>
        <th>A</th>
    </tr>';

    foreach($result as $nis => $value) {
        echo '<tr><td>'.$nis.'</td><td>'.$value['H'].'</td><td>'.$value['I'].'</td><td>'.$value['S'].'</td><td>'.$value['A'].'</td></tr>';
    }
    echo '</table>';
}

rekap();
?>