<?php

include("koneksi.php");


$query = mysqli_query($koneksi, "SELECT * FROM tb_siswa");


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/atlantis.css">
    <link rel="stylesheet" href="awesome/fontawesome-free-6.4.2-web/css/all.css">

</head>

<body>

    <h1>Daftar siswa</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <fieldset>
                            <legend>Input Data siswa</legend>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nis</label>
                                <input type="text" name="nis" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">kelas</label>
                                <select class="form-select" name="kelas">
                                    <option value="3a">3a</option>
                                    <option value="3b">3b</option>
                                    <option value="3c">3c</option>
                                    <option value="3d">3d</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">telepon</label>
                                <input type="text" class="form-control" name="telepon">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">nama</th>
                <th scope="col">nis</th>
                <th scope="col">kelas</th>
                <th scope="col">telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($query as $qu) {

                ?>
                <tr>
                    <td>
                        <?= $i++ ?>
                    </td>
                    <td>
                        <?= $qu['nama'] ?>
                    </td>
                    <td>
                        <?= $qu['nis'] ?>
                    </td>
                    <td>
                        <?= $qu['kelas'] ?>
                    </td>
                    <td>
                        <?= $qu['telepon'] ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $telepon = $_POST['telepon'];

    $sql = "INSERT INTO tb_siswa(nama,nis,kelas,telepon) VALUES('$nama','$nis','$kelas','$telepon')";
    if (mysqli_query($koneksi, $sql)) {

    } else {
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($koneksi);
    }

}

?>