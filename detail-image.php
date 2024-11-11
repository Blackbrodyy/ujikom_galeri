<?php
error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($produk);
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <title>Detail Gambar</title>
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link rel="website icon" type="png" href="img/icon1.png">
</head>
<link rel="stylesheet" href="css/style.css">

<body>
  <!-- //navbar -->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container">
      <img src="img/icon2.png" alt="" style="width: 40px;">
      <strong><a class="navbar-brand" href="#">GaleriKu</a></strong>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="galeri.php">Galeri</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="registrasi.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- search -->
  <div class="search">
    <div class="container">
      <form action="galeri.php">
        <input type="text" name="search" placeholder="Cari Foto" value="<?php echo $_GET['search'] ?>" />
        <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>" />
        <input type="submit" name="cari" value="Cari Foto" />
      </form>
    </div>
  </div>
  <div class="section py-5">
    <div class="container">
        <h3 class="mb-4 text-center">Detail Foto</h3>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow">
                    <img src="foto/<?php echo htmlspecialchars($p->image); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($p->image_name); ?>" />
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo htmlspecialchars($p->image_name); ?></h3>
                        <h5 class="card-subtitle mb-2 text-muted">Kategori: <?php echo htmlspecialchars($p->category_name); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Nama User: <?php echo htmlspecialchars($p->admin_name); ?></h6>
                        <h6 class="card-subtitle mb-4 text-muted">Upload Pada Tanggal: <?php echo htmlspecialchars($p->date_created); ?></h6>
                        <p class="card-text">Deskripsi:<br /><?php echo nl2br(htmlspecialchars($p->image_description)); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- Like Form -->
  <div class="section">
    <div class="container">
      <div class="row">
        <!-- Like button on the left -->
        <div class="col-md-2 d-flex align-items-center">
          <form method="POST" action="">
            <input type="hidden" name="gam" value="<?php echo $p->image_id ?>">
            <input type="hidden" name="adname" value="<?php echo $_SESSION['a_global']->admin_name ?>" required>

            <?php
            // Check total likes for the image
            $qt = mysqli_query($conn, "SELECT SUM(suka) AS total_likes FROM tb_like WHERE image_id = '" . $_GET['id'] . "'");
            $total_likes = mysqli_fetch_array($qt)['total_likes'] ?? 0;

            // Check if the user has already liked this image
            $cekk = mysqli_query($conn, "SELECT * FROM tb_like WHERE admin_name='" . $_SESSION['a_global']->admin_name . "' AND image_id='" . $p->image_id . "'");
            $hasLiked = mysqli_num_rows($cekk) > 0;

            $likeIconClass = $hasLiked ? 'bi-heart-fill text-danger' : 'bi-heart text-muted'; // Change icon based on like status
            echo '<button name="suka" class="like-btn"><i class="bi ' . $likeIconClass . '"></i> <span>' . $total_likes . '</span></button>';
            ?>
          </form>
        </div>
        <!-- Image or content on the right -->
        <div class="col-md-10">
          <!-- You can add more content here (like the image or details) -->
        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST['suka'])) {
    include 'db.php';
    echo '<script>alert("Login terlebih dahulu")</script>';
    echo '<script>window.location="login.php"</script>';
  }
  ?>
  <br>
<?php
  $image_id = $_GET['id'];
    $total_comments_query = "SELECT COUNT(*) as total_comments FROM komentar_foto WHERE image_id = '" . $image_id . "'";
    $total_comments_result = mysqli_query($conn, $total_comments_query);
    $total_comments = mysqli_fetch_assoc($total_comments_result)['total_comments'];?>
  <!-- form komentar -->
  <div class="container mb-5">
    <h3 class="mb-3">Tulis Komentar</h3>
    <form action="" method="POST" class="mt-3">
      <input type="hidden" name="image" value="<?php echo htmlspecialchars($p->image_id); ?>">
      <input type="hidden" name="adminid" value="<?php echo htmlspecialchars($_SESSION['a_global']->admin_id); ?>"
        required>
      <input type="hidden" name="adminnm" value="<?php echo htmlspecialchars($_SESSION['a_global']->admin_name); ?>"
        required>

      <div class="form-group mb-3">
        <textarea name="komentar" class="form-control" maxlength="80" placeholder="Tulis Komentar..."
          required></textarea>
      </div>
      <button type="submit" name="submit" class="btn btn-success">Kirim</button>
    </form>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    echo '<script>alert("Login terlebih dahulu")</script>';
    echo '<script>window.location="login.php"</script>';
  }
  ?>


  <div class="container">
    <h3>Komentar (<?php echo $total_comments; ?>)</h3>
    <div class="comments-section">
      <?php
      // Fetch comments from the database
      $up = mysqli_query($conn, "SELECT * FROM komentar_foto WHERE image_id = '" . $_GET['id'] . "' ORDER BY tanggal_komentar DESC");

      // Check if there are any comments
      if (mysqli_num_rows($up) > 0) {
        // Loop through each comment and display it
        while ($u = mysqli_fetch_assoc($up)) {
          ?>
          <div class="comment card mb-3">
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars($u['admin_name']); ?></h5>
              <p class="card-text"><?php echo htmlspecialchars($u['isi_komentar']); ?></p>
              <p class="card-text"><small class="text-muted"><?php echo htmlspecialchars($u['tanggal_komentar']); ?></small>
              </p>
            </div>
          </div>
          <?php
        }
      } else {
        ?>
        <p>Komentar Tidak Ada</p>
      <?php } ?>
    </div>
    <br><br>

  </div>
  <footer>
    <div class="container">
        <small>Copyright &copy; 2024 - GaleriKu.</small>
    </div>
</footer>
</body>

</html>