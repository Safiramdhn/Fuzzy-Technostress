<!DOCTYPE html>
<?php
  include 'inc/header.php';
  $id = Session::get('id');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Tes</title>

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
        include 'sidebar.php';
        $hasil->show($id);
        if (isset($_GET['action']) && $_GET['action'] == 'hapusData') {
            $hasil->delete($id);
        }
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
                <h2 class="header mt-2 mt-5">Total Penilaian Kuesioner</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Overload</th>
                            <th scope="col">Invasion</th>
                            <th scope="col">Complexity</th>
                            <th scope="col">Uncertainty</th>
                            <th scope="col">Insecurity</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><?php echo $hasil->over; ?></td>
                            <td><?php echo $hasil->inva; ?></td>
                            <td><?php echo $hasil->com; ?></td>
                            <td><?php echo $hasil->un; ?></td>
                            <td><?php echo $hasil->in; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container mt-2 mb-5">
            <div class="text-center">
                <h2 class="header mt-2 mt-5">Hasil Akhir Tes</h2>
            </div>
            <div class="p-2">
                <h1>Tingkat</h1>
                <p style="font-size:16pt"><?php echo $hasil->tingkat;?></p>
            </div>
            
            <div class="p-2">
                <h1>Nilai akhir</h1>
                <p style="font-size:16pt"><?php echo $hasil->angka;?></p>
            </div>

            <div class="p-2">
                <h1>Solusi</h1>
                <p style="font-size:16pt"><?php
                    if($hasil->tingkat == "Data Kosong"){
                        echo "Data Kosong";
                    }else{
                        echo "Memperbaiki pola hidup sehat. 
                            Melakukan latihan relaksasi. 
                            Melakukan rekreasi. 
                            Mengatur jadwal. 
                            Menjelaskan secara jujur kepada rekan kerja terkait batasan jadwal kerja. 
                            Menggunakan perangkat yang user friendly. 
                            Jika merasa tidak mengalami perubahan, bisa melakukan konsultasi dengan pakar.";
                    }
                ?>
                </p>
            </div>
        </div>  

        <div class="container">
            <div class="row text-center d-flex justify-content-center">
                <div class="col-4">
                    <a type="button" class="btn btn-light btn-tambah" href="tes.php">
                        Lakukan Tes
                    </a>
                </div>
                    
                <div class="col-4">
                    <button type="button" class="btn btn-light btn-hapus" data-bs-toggle="modal" data-bs-target="#delete">
                        Hapus Data
                    </button>
                    <!-- Modal Hapus Data-->
                    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>                    
                                
                                <div class="modal-body">
                                    <div class="text-center mb-4">
                                        <h2 class="modal-title" id="ModalLabel">Hapus Data</h2>
                                    </div>
                                    <div class="text-center mb-4">
                                        <p>Anda yakin ingin menghapus data?</p>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <a type="button" href="?action=hapusData" class="btn btn-light">Ya</a>
                                    </div>                       
                               </div>
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
