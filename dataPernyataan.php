<!DOCTYPE html>
<?php
  include 'inc/header.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pernyataan</title>
   
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
        // calling sidebar
        include 'sidebarAdmin.php';
        
        // tampil data
        if(isset($_POST['cari'])){
            $data = $pernyataan->search($_POST);
        }else{
            $data = $pernyataan->showAll();
        }
        $num = $data->rowCount();

        // proses tambah, update,delete
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
            $log = $pernyataan->insert($_POST);
        }elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
            $log = $pernyataan->update($_POST);
        }elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])){
            $log = $pernyataan->delete($_POST);
        }

        if (isset($log)) {
            echo $log;
        }

        // get kode
        $dataKode = $pernyataan->getCode();
        $kode = $pernyataan->getCode();
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
                <h2 class="header">Data Pernyataan</h2>
            </div>
        </div>

        <!-- Search bar -->  
        <div class="container mt-2 mb-5">
            <div class="row">
                <div class="col-6">
                    <form class="d-flex" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari Data" name="key">
                            <button class="btn" type="submit" name="cari">Cari</button>
                        </div>
                    </form>
                </div>
                <!-- Tambah Data -->
                <div class="col-2">
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-light btn-tambah" data-bs-toggle="modal" data-bs-target="#addPernyataan">Tambah Data</button>
                
                        <!-- Modal Tambah Data Pernyataan -->
                        <div class="modal fade" id="addPernyataan" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                    
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <h2 class="modal-title" id="ModalLabel">Tambah Data Pernyataan</h2>
                                        </div>
                                
                                        <form method="post" action="">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode">
                                            </div>
        
                                            <div class="mb-3">
                                                <textarea class="form-control" id="pernyataan" name="pernyataan" rows="3" placeholder="Pernyataan"></textarea>
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
                        <button type="button" class="btn btn-light btn-ubah" data-bs-toggle="modal" data-bs-target="#editPernyataan">Ubah Data</button>
                        
                        <!-- Modal Edit -->
                        <div class="modal fade" id="editPernyataan" tabindex="-1"  aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                    
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <h2 class="modal-title" id="ModalLabel">Ubah Data Pernyataan</h2>
                                        </div>
                            
                                        <form method="post" action="">
                                            <div class="mb-3">
                                                <select class="form-select" name="kode">
                                                    <option selected>Kode Pernyataan</option>
                                                    <?php
                                                        while($rowKode = $dataKode->fetch(PDO::FETCH_ASSOC)){
                                                            extract($rowKode);
                                                    ?>
                                                    <option><?php echo $rowKode['kode_pernyataan'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>                             
                                        
                                            <div class="mb-3">
                                                <textarea class="form-control" id="pernyataan" name="pernyataan" rows="3" placeholder="Pernyataan"></textarea>
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
                        <button type="button" class="btn btn-light btn-hapus" data-bs-toggle="modal" data-bs-target="#deletePernyataan">Hapus Data</button>
                        
                        <!-- Modal Hapus -->
                        <div class="modal fade" id="deletePernyataan" tabindex="-1"  aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                    
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <h2 class="modal-title" id="ModalLabel">Hapus Data Pernyataan</h2>
                                        </div>
                            
                                        <form method="post" action="">
                                            <div class="mb-3">
                                                <select class="form-select" name="kode">
                                                    <option selected>Kode Pernyataan</option>
                                                    <?php
                                                        while($rowKode = $kode->fetch(PDO::FETCH_ASSOC)){
                                                            extract($rowKode);
                                                    ?>
                                                    <option><?php echo $rowKode['kode_pernyataan'] ?></option>
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
            <hr>
        </div>       
        
        <!-- Tabel data -->
        <div class="container">
            <?php
                if($num>=0){
            ?>
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Kode</th>
                        <th scope="col">Pernyataan</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        while($row=$data->fetch(PDO::FETCH_ASSOC)){
                            extract($row);
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['kode_pernyataan']; ?></th>
                        <td><?php echo $row['pernyataan']; ?></td>
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
