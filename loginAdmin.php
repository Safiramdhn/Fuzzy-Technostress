<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

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
            <a class="nav-link" href="index.php">Kembali</a>
        </div>
    </nav>
    <div class="container m-5 d-flex justify-content-center">
        <div class="card border-dark m-4" style="width: 25rem;">
            <div class="card-body">
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

    <!-- footer -->
    <footer class="p-3">
        <p>copyright chocorange 2022</p>
    </footer>
</body>
</html>