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
        // $row = $data->fetch(PDO::FETCH_ASSOC);
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
                <h2 class="header">Hasil Tes</h2>
            </div>
        </div>

        <div class="container mt-2 mb-5">
            <div class="p-2">
                <h1>Tingkat</h1>
                <p style="font-size:16pt"><?php echo $hasil->tingkat;?></p>
            </div>

            <div class="p-2">
                <h1>Kriteria</h1>
                <p style="font-size:16pt"><?php echo $hasil->nama;?></p>
            </div>

            <div class="p-2">
                <h1>Keterangan</h1>
                <p style="font-size:16pt"><?php echo $hasil->ket;?></p>
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
                    <!-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                    Porro officia cum cumque. 
                    Molestias corrupti illo temporibus vel enim ipsa nihil, 
                    cupiditate hic provident possimus sed dicta repellendus autem perferendis totam. -->
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