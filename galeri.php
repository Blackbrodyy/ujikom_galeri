<?php
    error_reporting(0);
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

    <title>Galeri</title>
    <link rel="website icon" type="png" href="img/icon1.png">
  </head>
  <link rel="stylesheet" href="css/style.css">
  <body>

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

      
    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="Cari Foto" />
                <input type="submit" name="cari" value="Cari Foto" />
            </form>
        </div>
    </div>

    <!-- new product -->
    <div class="section">
    <div class="container">
        <h3>Galeri Foto</h3>
        <div class="gallery-box">
            <?php
            if ($_GET['search'] != '' || $_GET['kat'] != '') {
                $where = "AND image_name LIKE '%" . $_GET['search'] . "%' AND category_id LIKE '%" . $_GET['kat'] . "%' ";
            }
            $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_status = 1 $where ORDER BY image_id DESC");
            if (mysqli_num_rows($foto) > 0) {
                while ($p = mysqli_fetch_array($foto)) {
            ?>
                <a href="detail-image.php?id=<?php echo $p['image_id']; ?>" class="gallery-item">
                    <div class="image-container">
                        <img src="foto/<?php echo htmlspecialchars($p['image'], ENT_QUOTES); ?>" alt="<?php echo htmlspecialchars($p['image_name'], ENT_QUOTES); ?>" />
                        <div class="image-info">
                            <p class="nama"><?php echo htmlspecialchars(substr($p['image_name'], 0, 30), ENT_QUOTES); ?></p>
                            <p class="admin">Nama User: <?php echo htmlspecialchars($p['admin_name'], ENT_QUOTES); ?></p>
                            <p class="tanggal"><?php echo htmlspecialchars($p['date_created'], ENT_QUOTES); ?></p>
                        </div>
                    </div>
                </a>
            <?php 
                }
            } else { 
            ?>
                <p>Foto tidak ada</p>
            <?php 
            } 
            ?>
        </div>
    </div>
</div>
    <style>
      .section {
    padding: 20px;
    background-color: #f4f4f4; /* Warna latar belakang */
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

h3 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 28px;
    color: #333;
}

.gallery-box {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Rata tengah */
}

.gallery-item {
    text-decoration: none; /* Menghilangkan garis bawah pada tautan */
    margin: 10px; /* Jarak antar item */
    width: calc(33.33% - 20px); /* 3 item per baris dengan margin */
    transition: transform 0.3s, box-shadow 0.3s; /* Transisi untuk efek hover */
}

.gallery-item:hover {
    transform: translateY(-5px); /* Efek mengangkat saat hover */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Bayangan lebih dalam saat hover */
}

.image-container {
    position: relative; /* Posisi relatif untuk menempatkan info di atas gambar */
    overflow: hidden; /* Menghilangkan bagian gambar yang melampaui batas */
    border-radius: 8px; /* Sudut melengkung */
    background-color: #fff; /* Warna latar belakang item */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Bayangan */
}

.image-container img {
    width: 100%; /* Memastikan gambar mengisi wadah */
    height: auto; /* Mempertahankan rasio aspek */
    border-radius: 8px 8px 0 0; /* Sudut melengkung pada bagian atas */
    transition: transform 0.3s; /* Transisi untuk efek zoom */
}

.image-container:hover img {
    transform: scale(1.05); /* Efek zoom saat hover */
}

.image-info {
    padding: 10px; /* Jarak dalam */
    text-align: left; /* Rata kiri */
}

.nama {
    font-weight: bold; /* Menebalkan nama gambar */
    margin: 0; /* Menghilangkan margin default */
    color: #333; /* Warna teks */
}

.admin, .tanggal {
    margin: 5px 0; /* Jarak antar teks */
    font-size: 14px; /* Ukuran font */
    color: #666; /* Warna teks */
}
    </style>
    <!-- footer -->
    <footer>
    <div class="container">
        <small>Copyright &copy; 2024 - GaleriKu.</small>
    </div>
</footer>
</body>
</html>