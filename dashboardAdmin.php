<!DOCTYPE html>
<?php
  include 'inc/header.php';
  $id = Session::get('id_admin');
?>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>

    <!-- CSS -->
    <link href="https://www.cssscript.com/demo/sticky.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css" />
    
    <!-- JS -->
    <script src="https://kit.fontawesome.com/4fd193de95.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
  <!-- calling sidebar -->
  <?php include 'sidebarAdmin.php'?> 

  <!-- Main Wrapper -->
  <div class="my-container active-cont">
    <!-- Top Nav -->
    <nav class="navbar top-navbar navbar-light bg">
      <div class="container-fluid">
        <a class="btn border-0" id="menu-btn"><i class="fa-solid fa-bars"></i></a>
      </div>
    </nav>
      
    <!--Content-->
    <div class="container mt-2 mb-5">
      <div class="text-center">
        <h2 class="header">Dashboard</h2>
      </div>
    </div>  

    <div class="container">
      <div class="text-center align-self-center">
        <!-- Jumlah data pengguna -->
        <div class="row mt-5 mb-5">
          <div class="col-6 mb-5">
            <h1>
              <?php
                $jmlUser = $users->countData();
                echo $jmlUser;
              ?>
            </h1>
          </div>
    
          <div class="col-6 align-self-center mb-5">
            <h3>Jumlah Pengguna</h3>
          </div>
        </div>

        <!-- Jumlah data hasil -->
        <div class="row  mt-5 mb-5">
          <div class="col-6 mb-5">
            <h1>
              <?php
                $jmlHasil = $hasil->countData();
                echo $jmlHasil;
              ?>
            </h1>
          </div>
    
          <div class="col-6 align-self-center mb-5">
            <h3>Jumlah Hasil</h3>
          </div>
        </div>
      </div>
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