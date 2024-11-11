<?php
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
$a = mysqli_fetch_object($kontak);
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Galeri</title>
    <link rel="website icon" type="png" href="img/icon1.png">
    <style>
        body {
            background-color: #f0f4f8;
        }
        .section {
            margin-top: 20px;
        }
        .card {
            border: none;
            transition: transform 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
   <!-- //navbar -->
   <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container">
  <img src="img/icon2.png" alt="" style="width: 40px;">
  <strong><a class="navbar-brand" href="#">GaleriKu</a></strong>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link active" href="galeri.php">Galeri</a>
        <a class="nav-link active" href="registrasi.php">Register</a>
        <a class="nav-link active" href="login.php">Login</a>
             
      </div>
    </div>
  </div>
</nav>

<!-- category -->
<div class="section">
    <div class="container">
        <h3 class="text-center">Kategori</h3><br>
        <div class="row">
            <?php
            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
            if (mysqli_num_rows($kategori) > 0) {
                while ($k = mysqli_fetch_array($kategori)) {
                    ?>
                    <div class="col-md-4 mb-4">
                        <a href="galeri.php?kat=<?php echo $k['category_id'] ?>">
                            <div class="card text-center">
                                <div class="card-body">
                                    <img src="img/photo-gallery.png" width="50px" class="mb-2"/>
                                    <h5 class="card-title"><?php echo $k['category_name'] ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php }
            } else { ?>
                <p class="text-center">Kategori tidak ada</p>
            <?php } ?>
        </div>
    </div>
</div>

<!-- footer -->
<footer>
    <div class="container">
        <small>Copyright &copy; 2024 - GaleriKu.</small>
    </div>
</footer>

<!-- Optional JavaScript; choose one of the two! -->