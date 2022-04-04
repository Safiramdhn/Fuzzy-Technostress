
<!DOCTYPE html>
<?php
  include 'inc/header.php';
  $id = Session::get('id_admin');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin</title>

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
        
        // show data
        $admin->show($id);
    ?> 

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
            $update = $admin->update($id, $_POST);
          
        }
          
        if (isset($update)) {
            echo $update;
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
                <h2 class="header">Data Admin</h2>
            </div>
        </div>  

        <!-- Data Admin -->
        <div class="container w-75 text-center">
            <div class="row mt-3 mb-3">
                <div class="col-4 mb-5">
                    <label for="unameAdmin">Username</label>
                </div>

                <div class="col-8 mb-5">
                    <input class="form-control w-75" type="text" id=unameAdmin
                        placeholder="<?php echo $admin->uname;?>" 
                    disabled>
                </div>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col-4 mb-5">
                    <label for="passAdmin">Password</label>
                </div>

                <div class="col-8 mb-5">
                    <input class="form-control w-75" type="password" id="passAdmin" 
                    placeholder="<?php echo $admin->pass;?>" 
                    disabled>
                </div>
            </div>
            
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-light btn-ubah" data-bs-toggle="modal" data-bs-target="#editAdmin">Ubah Data</button>
                
                <!-- Modal Edit Data Admin -->
                <div class="modal fade" id="editAdmin" tabindex="-1" aria-labelledby="modalEditAdmin" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                    
                            <div class="modal-body">
                                <div class="text-center">
                                    <h2 class="modal-title" id="ModalLabel">Ubah Data Admin</h2>
                                </div>
                                <form method="post" action="">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="unameAdmin" name="unameAdmin" 
                                            placeholder="<?php echo $admin->uname;?>">
                                    </div>                                
                                        
                                    <div class="mb-3">
                                        <input type="password" class="form-control" id="passAdmin" name="passAdmin" 
                                            placeholder="<?php echo $admin->pass;?>">
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