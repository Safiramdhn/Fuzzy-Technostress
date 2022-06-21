<!DOCTYPE html>
<?php
  include 'inc/header.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Rule Base</title>
   
    <!-- CSS -->
    <link href="https://www.cssscript.com/demo/sticky.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css" />
    
    <!-- JS -->
    <script src="https://kit.fontawesome.com/4fd193de95.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js\animation.js"></script>
</head>

<body>
    <?php 
        // calling sidebar
        include 'sidebarAdmin.php';

        // tampil data
        if(isset($_POST['cari'])){
            $data = $rule->search($_POST);
        }else{
            $data = $rule->showAll();
        }
        $num = $data->rowCount();

        // proses tambah
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
            $log = $rule->insert($_POST);
        }elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
            $log = $rule->update($_POST);
        }elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])){
            $log = $rule->delete($_POST);
        }

        if(isset($log)){
            echo $log;
        }

        $dataKode = $rule->getCode();
        $kode = $rule->getCode();
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
                <h2 class="header">Data Rule Base</h2>
            </div>
        </div>

        <div class="container mt-2 mb-5">
            <div class="row">
                <div class="col-6">
                    <!-- Search bar -->
                    <form class="d-flex" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari Data" name="key">
                            <button class="btn" type="submit" name="cari" id="cari">Cari</button>
                        </div>
                    </form>
                </div>

                <!-- Tambah Data -->
                <div class="col-2">
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-light btn-tambah" data-bs-toggle="modal" data-bs-target="#addRule">Tambah Data</button>
                
                        <!-- Modal Tambah Data Kriteria -->
                        <div class="modal fade" id="addRule" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                    
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <h2 class="modal-title" id="ModalLabel">Tambah Data Rule Base</h2>
                                        </div>
                                
                                        <form method="post" action="">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="t01" name="t01" placeholder="T01-Overload">
                                            </div>                                
                                        
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="t02" name="t02" placeholder="T02-Invasion">
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="t03" name="t03" placeholder="T03-Complexity">
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="t04" name="t04" placeholder="T04-Uncertainty">
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="t05" name="t05" placeholder="T05-Insecurity">
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="hasil" name="hasil" placeholder="Tingkat Technostress">
                                            </div> 
                                
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" name="tambah" class="btn btn-light">Simpan</button>
                                            </div>                       
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Data -->
                <div class="col-2">
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-light btn-ubah" data-bs-toggle="modal" data-bs-target="#editRule">Ubah Data</button>
                        
                        <!-- Modal Edit -->
                        <div class="modal fade" id="editRule" tabindex="-1"  aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                    
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <h2 class="modal-title" id="ModalLabel">Ubah Data Rule Base</h2>
                                        </div>
                            
                                        <form method="post" action="">
                                            <div class="mb-3">
                                                <select class="form-select" name="kode">
                                                    <option selected>Kode Rule Base</option>
                                                    <?php
                                                        while($rowKode = $dataKode->fetch(PDO::FETCH_ASSOC)){
                                                            extract($rowKode);
                                                    ?>
                                                    <option><?php echo $rowKode['kode_rule'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                                
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="t01" name="t01" placeholder="T01-Overload">
                                            </div>                                
                                        
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="t02" name="t02" placeholder="T02-Invasion">
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="t03" name="t03" placeholder="T03-Complexity">
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="t04" name="t04" placeholder="T04-Uncertainty">
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="t05" name="t05" placeholder="T05-Insecurity">
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="hasil" name="hasil" placeholder="Tingkat Technostress">
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

                <!-- Hapus Data -->
                <div class="col-2">
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-light btn-hapus" data-bs-toggle="modal" data-bs-target="#deleteRule">Hapus Data</button>
                        
                        <!-- Modal Hapus -->
                        <div class="modal fade" id="deleteRule" tabindex="-1"  aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                    
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <h2 class="modal-title" id="ModalLabel">Hapus Data Rule Base</h2>
                                        </div>
                            
                                        <form method="post" action="">
                                            <div class="mb-3">
                                                <select class="form-select" name="kode">
                                                    <option selected>Kode Rule Base</option>
                                                    <?php
                                                        while($rowKode = $kode->fetch(PDO::FETCH_ASSOC)){
                                                            extract($rowKode);
                                                    ?>
                                                    <option><?php echo $rowKode['kode_rule'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>                            
                                
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" name="delete" class="btn btn-light">Hapus</button>
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
        
        <!-- Tabel data -->
        <div class="container">
            <?php
                if($num>=0){
            ?>
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">T01-Overload</th>
                        <th scope="col">T02-Invasion</th>
                        <th scope="col">T03-Complexity</th>
                        <th scope="col">T04-Uncertainty</th>
                        <th scope="col">T05-Insecurity</th>
                        <th scope="col">Tingkat Technostress</th>
                    </tr>
            </thead>
            
            <tbody>
                    <?php
                        while($row=$data->fetch(PDO::FETCH_ASSOC)){
                            extract($row);
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['kode_rule']; ?></th>
                        <td><?php echo $row['t01']; ?></td>
                        <td><?php echo $row['t02']; ?></td>
                        <td><?php echo $row['t03']; ?></td>
                        <td><?php echo $row['t04']; ?></td>
                        <td><?php echo $row['t05']; ?></td>
                        <td><?php echo $row['hasil']; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <?php
                }else{
                 echo "<h1>Data Tidak Ada</h1>";
                }
            ?>
        </div>
    </div>

    <!-- script side-navbar -->
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