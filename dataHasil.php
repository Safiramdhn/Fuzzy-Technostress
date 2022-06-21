<!DOCTYPE html>
<?php
  include 'inc/header.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Hasil</title>
   
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
    <?php 
        include 'sidebarAdmin.php';
        $data = $hasil->showAll();
        $num = $data->rowCount();
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
                <h2 class="header">Data Hasil</h2>
            </div>
        </div>

        <!-- Tabel data -->
        <div class="container text-center">
            <?php
                if($num>=0){
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tingkat</th>
                        <th scope="col">Hasil Nilai</th>
                        <th scope="col">Overload</th>
                        <th scope="col">Invasion</th>
                        <th scope="col">Complexity</th>
                        <th scope="col">Uncertainty</th>
                        <th scope="col">Insecurity</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        while($row=$data->fetch(PDO::FETCH_ASSOC)){
                            extract($row);
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['kode_hasil']; ?></th>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['tingkat']; ?></td>
                        <td><?php echo $row['angka']; ?></td>
                        <td><?php echo $row['overload']; ?></td>
                        <td><?php echo $row['invasion']; ?></td>
                        <td><?php echo $row['complexity']; ?></td>
                        <td><?php echo $row['uncertainty']; ?></td>
                        <td><?php echo $row['insecurity']; ?></td>
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
