<!DOCTYPE html>
<?php
    include 'inc/header.php';
    Session::LoginAdmin();
    // Session::Login();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['loginAdmin'])) {
            $adminLog = $admin->login($_POST);
        }elseif(isset($_POST['login'])){
            $userLog = $users->login($_POST);
        }elseif(isset($_POST['daftar'])){
            $userLog = $users->daftar($_POST);
        }
    }

    if (isset($adminLog)){
        echo $adminLog;
    }elseif(isset($userLog)){
        echo $userLog;
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar Technostress</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4fd193de95.js" crossorigin="anonymous"></script>
</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Sistem Pakar Technostress</a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link admin" data-bs-toggle="modal" href="#loginAdmin">Admin</a>
                    
                    <!-- Modal login Admin-->
                    <div class="modal fade" id="loginAdmin" tabindex="-1" aria-labelledby="modalLoginAdmin" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>                    
                                
                                <div class="modal-body">
                                    <div class="text-center mb-4">
                                        <h2 class="modal-title" id="ModalLabel">Masuk Akun Admin</h2>
                                        <img class="img-fluid img-modal" src="img\icon_akun.png" alt="">
                                    </div>
                                    
                                    <form action="" method="post">
                                        <div class="mb-4">
                                            <input type="text" class="form-control" id="unameAdmin" name="unameAdmin" placeholder="Username">
                                        </div>
                                        
                                        <div class="mb-4">
                                            <input type="password" class="form-control" id="passAdmin" name="passAdmin"placeholder="Password">
                                        </div> 
                                        
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" name="loginAdmin" class="btn btn-light">Masuk</button>
                                        </div>                       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <!--gambar-->
                <img class="img-fluid" src="img\web.png" alt="Sistem Pakar Technostress">
            </div>

            <div class="col-6 align-self-center">
                <!--about-->
                <h2 class="header">TENTANG</h2>
                <p class="p">
                    Technostress adalah bentuk stres saat berinteraksi dengan 
                    hal-hal yang berhubungan dengan teknologi dan informasi    
                    Dengan aplikasi ini, Anda dapat mengetahui tingkat dan kriteria dari technostress
                </p>
                <div class="row">
                    <div class="col-4">
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#loginUser">
                            Masuk
                        </button>
    
                        <!-- Modal -->
                        <div class="modal fade" id="loginUser" tabindex="-1" aria-labelledby="modalLoginUser" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                
                                    <div class="modal-body">
                                        <div class="text-center mb-4">
                                            <h2 class="modal-title" id="ModalLabel">Masuk Akun Pengguna</h2>
                                            <img class="img-fluid img-modal" src="img\icon_akun.png" alt="">
                                        </div>
                                        <form method="post" action="">
                                            <div class="mb-3">
                                                <input type="email" class="form-control" id="emailUser" name="email" placeholder="Email">
                                            </div>
            
                                            <div class="mb-3">
                                                <input type="password" class="form-control" id="passUser" name="pass" placeholder="Password">
                                            </div> 
        
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" name="login" class="btn btn-light">Masuk</button>
                                            </div>                       
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#newUser">
                            Daftar
                        </button>
    
                        <!-- Modal -->
                        <div class="modal fade" id="newUser" tabindex="-1" aria-labelledby="modalNewUser" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                    
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <h2 class="modal-title" id="ModalLabel">Daftar Akun Admin</h2>
                                        </div>
                                        <form method="post" action="">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="nameUser" name="name" placeholder="Nama">
                                            </div>
                                        
                                            <div class="mb-3">
                                                <input type="email" class="form-control" id="emailUser" name="email" placeholder="Email">
                                            </div>
                                        
                                            <div class="mb-3">
                                                <input type="password" class="form-control" id="passUser" name="pass" placeholder="Password">
                                            </div> 
                                
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" name="daftar" class="btn btn-light">Daftar</button>
                                            </div>                       
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <p>copyright chocorange 2022</p>
    </footer>
</body>
</html>