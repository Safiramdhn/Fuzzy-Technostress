<!DOCTYPE html>
<?php
  include 'inc/header.php';
  $id = Session::get('id');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- CSS -->
    <link href="https://www.cssscript.com/demo/sticky.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css" />
    
    <!-- JS -->
    <script src="https://kit.fontawesome.com/4fd193de95.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include 'sidebar.php';
        $users->show($id);
    ?>
    <!-- Main Wrapper -->
    <div class="my-container active-cont">
        <!-- Top Nav -->
        <nav class="navbar top-navbar navbar-light bg">
            <div class="container-fluid">
                <a class="btn border-0" id="menu-btn"><i class="fa-solid fa-bars"></i></a>
            </div>
        </nav>

        <!-- Content -->
        <div class="container mt-2 mb-5">
            <div class="text-center">
                <h2 class="header">Dashboard</h2>
            </div>
        </div>

        <!-- Data Pengguna -->
        <div class="container">
            <div class="row">
                <div class="col-4 mb-5">
                    <label for="id">ID</label>
                </div>

                <div class="col-8 mb-5">
                    <input class="form-control" type="text" id=id
                        placeholder="<?php 
                        echo $users->id;?>" 
                    disabled>
                </div>
            </div>

            <div class="row">
                <div class="col-4 mb-5">
                    <label for="nama">Nama</label>
                </div>

                <div class="col-8 mb-5">
                    <input class="form-control" type="text" id="nama" 
                    placeholder="<?php 
                    echo $users->nama;?>" 
                    disabled>
                </div>
            </div>

            <div class="row">
                <div class="col-4 mb-5">
                    <label for="email">Email</label>
                </div>

                <div class="col-8 mb-5">
                    <input class="form-control" type="text" id=email
                        placeholder="<?php 
                        echo $users->email;?>" 
                    disabled>
                </div>
            </div>

            <div class="row">
                <div class="col-4 mb-5">
                    <label for="pass">Password</label>
                </div>

                <div class="col-8 mb-5">
                    <input class="form-control" type="password" id="pass" 
                    placeholder="<?php 
                    echo $users->pass;?>" 
                    disabled>
                </div>
            </div>

            <div class="row">
                <div class="col-4 mb-5">
                    <label for="tgl">Tanggal Lahir</label>
                </div>

                <div class="col-8 mb-5">
                    <input class="form-control" type="text" id="tgl" 
                    placeholder="<?php 
                    echo $users->tgl;?>" 
                    disabled>
                </div>
            </div>

            <div class="row">
                <div class="col-4 mb-5">
                    <label for="tingkat">Tingkat Sekolah</label>
                </div>

                <div class="col-8 mb-5">
                    <input class="form-control" type="text" id=tingkat
                        placeholder="<?php 
                        echo $users->sekolah;?>" 
                    disabled>
                </div>
            </div>

            <div class="row">
                <div class="col-4 mb-5">
                    <label for="waktu">Lama Mengajar</label>
                </div>

                <div class="col-8 mb-5">
                    <input class="form-control" type="text" id="waktu" 
                    placeholder="<?php 
                    echo $users->lama;?>"
                    disabled>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-light btn-ubah" data-bs-toggle="modal" data-bs-target="#edit">Ubah Data</button>
                
                <!-- Modal edit data -->
                <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                    
                            <div class="modal-body">
                                <div class="text-center">
                                    <h2 class="modal-title" id="ModalLabel">Ubah Data</h2>
                                </div>
                                <form method="post" action="">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="email" name="email" 
                                            placeholder="<?php echo $users->email;?>">
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="nama" name="nama" 
                                            placeholder="<?php echo $users->nama;?>">
                                    </div>                                
                                        
                                    <div class="mb-3">
                                        <input type="password" class="form-control" id="pass" name="pass" 
                                            placeholder="<?php echo $users->pass;?>">
                                    </div> 

                                    <div class="mb-3">
                                        <input type="date" class="form-control" id="tgl" name="tgl" 
                                            placeholder="<?php echo $users->tgl;?>">
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="sekolah" name="sekolah" 
                                            placeholder="<?php echo $users->sekolah;?>">
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="waktu" name="waktu" 
                                            placeholder="<?php echo $users->lama;?>">
                                    </div>
                                
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="update" class="btn btn-light">Simpan</button>
                                    </div>                       
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
      var menu_btn = document.querySelector("#menu-btn");
      var sidebar = document.querySelector("#sidebar");
      var container = document.querySelector(".my-container");
      menu_btn.addEventListener("click", () => {
        sidebar.classList.toggle("active-nav");
        container.classList.toggle("active-cont");
      });
    </script>
</body>
</html>