<!DOCTYPE html>
<?php
    include 'inc/header.php';
    if (Session::get('login') == FALSE) {
      session_destroy();
      header('Location:index.php');
    }
  
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
      Session::destroy();
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link href="https://www.cssscript.com/demo/sticky.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css" />
    
    <!-- JS -->
    <script src="https://kit.fontawesome.com/4fd193de95.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Side-Nav -->
    <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
      <div class="container-fluid">
        <ul class="nav flex-column text-white w-100">
          <div class="text-center">
          <!--Main Menu-->
            <img class="img-fluid img-sidebar" src="img\icon_akun_black.png" alt="">
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="hasilTes.php">Hasil Tes</a>
            </li>
          </div>
        </ul>

        <br><br><br>

        <!--Logout-->
        <ul class="nav flex-column text-white w-100">
          <div class="text-center">
            <li class="nav-item">
              <a class="nav-link" href="?action=logout">Keluar Akun</a>
            </li>
          </div>
        </ul>
      </div>
    </div>
</body>
</html>