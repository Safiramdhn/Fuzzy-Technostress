<!DOCTYPE html>
<html lang="en">
<?php
    include 'inc/header.php';
    $id = Session::get('id');
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuesioner Technostress</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4fd193de95.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['proses'])) {
            $log = $hasil->fuzzyTest($id, $_POST);
        }

        if(isset($log)){
            echo $log;
        }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="nav-link" href="javascript:window.history.go(-1);">Kembali</a>
        </div>
    </nav>

    <div class="container mt-3 mb-5 text-center">
        <h2 class="header">Kuesioner Technostress</h2>
    </div>

    <div class="container">
        <?php
            $data = $pernyataan->pernyataan(); //menyimpan hasil dari fungsi yang dipanggil
            $row = $data->fetchAll(PDO::FETCH_COLUMN, 0); //mengambil array pernyataan
        ?>
        <form class="text-center" action="" method="post">
            <?php
                for($i=0; $i<count($row); $i++){ //perulangan untuk pernyataan
            ?>            
            <div class="container p-5 mb-3" style="background:#fff;">
                <p class="kuesioner">
                    <?php
                        echo $row[$i]; //menampilkan pernyataan
                    ?>
                </p>

                <?php
                    for($j=0; $j<=0; $j++){ //perulangan radio sesuai dengan pernyataan
                ?>
                <input type="radio" name="p[<?php echo [$i][$j]?>]" id="s1" value=1>
                <label class="p-2" for="s1">Sangat Tidak Setuju</label> <!--input sangat tidak setuju-->
            
                <input type="radio" name="p[<?php echo [$i][$j]?>]" id="s2" value=2>
                <label class="p-2" for="s2">Tidak Setuju</label> <!--input tidak setuju-->
            
                <input type="radio" name="p[<?php echo [$i][$j]?>]" id="s3" value=3>
                <label class="p-2" for="s3">Netral</label> <!--input netral-->
    
                <input type="radio" name="p[<?php echo [$i][$j]?>]" id="s4" value=4>
                <label class="p-2" for="s4">Setuju</label> <!--input setuju-->
            
                <input type="radio" name="p[<?php echo [$i][$j]?>]" id="s5" value=5>
                <label class="p-2" for="s5">Sangat Setuju</label> <!--input sangat setuju-->
            </div>
            <?php }} ?>
            <div class="d-flex justify-content-center">
                <button type="submit" name ="proses" class="btn btn-light">Proses</button>
            </div>
        </form>  
    </div>
</body>
</html>