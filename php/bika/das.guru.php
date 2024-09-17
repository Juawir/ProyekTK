

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/atlantis.css">
    <link rel="stylesheet" href="awesome/fontawesome-free-6.4.2-web/css/all.css">
    <style>
        .nav-pills li a:hover {
            background-color: rgb(66, 66, 243);
        }
    </style>
</head>
<body>  

    <div class="container-fluid">
        <div class="row">
            <div class="d-flex flex-column justify-content-between col-auto bg-dark min-vh-100">
                <div class="mt-4">
                    <a class="text-while d-none d-sm-inline text-decoration-none d-flex align-items-center ms-4" role="button">
                        <span class="fs-5">TK</span>
                    </a>
                    <hr class="text-white d-none d-sm-block">
                    <ul class="nav nav-pills flex-column mt-2 mt-sm-0 " id="menu">
                        <li class="nav-item my-sm-1 my-2">
                            <a href="#" class="nav-link text-white text-center text-sm-start" aria-current="page">
                                <i class="fa fa-gauge"></i>
                                <span class="ms-2 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item my-sm-1 my-2">
                            <a href="#" class="nav-link text-white text-center text-sm-start" aria-current="page">
                                <i class="fa fa-house"></i>
                                <span class="ms-2 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li class="nav-item my-sm-1 my-2 disabled">
                            <a href="#sidemenu" data-bs-toggle ="collapse" class="nav-link  text-white text-center text-sm-start" aria-current="page">
                                <i class="fa fa-table"></i>
                                <span class="ms-2 d-none d-sm-inline">Absen</span>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="nav collapse ms-1 flex-column" id="sidemenu" data-bs-parent="#menu">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="absensi.siswa.php" aria-current="page">absensi siswa</a>
                                </li>
                                <li class="nav-item">
                                    <a href="data.siswa.php" class="nav-link text-white">tambahkan siswa</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item my-sm-1 my-2">
                            <a href="#" class="nav-link  text-white text-center text-sm-start" aria-current="page">
                                <i class="fa fa-users"></i>
                                <span class="ms-2 d-none d-sm-inline">Costumer</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <div>
                        <div class="dropdown open">
                            <a class="btn border-none outline-none text-white" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                        <i class="fa fa-user"></i><span class="ms-1 d-none d-sm-inline">Guru</span>
                                        <i class="fa fa-caret-up"></i>
                                    </a>
                            <a class="btn border-none outline-none text-white" type="button" id="triggerId">
                                        <i class="fa fa-door-open"></i><span class="ms-1 d-none d-sm-inline">Keluar </span>
                                    </a>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Settings</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>