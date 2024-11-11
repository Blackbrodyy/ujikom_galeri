<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$produk = mysqli_query($conn, "SELECT * FROM  tb_image WHERE image_id = '" . $_GET['id'] . "'");
if (mysqli_num_rows($produk) == 0) {
    echo '<script>window.location="data-image.php"</script>';
}
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

    <title>Edit Gambar</title>
    <link rel="website icon" type="png" href="img/icon1.png">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container">
    <img src="img/icon2.png" alt="" style="width: 40px;">
    <strong><a class="navbar-brand" href="#">GaleriKu</a></strong>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
          <a class="nav-link active" href="profil.php">Profil</a>
          <a class="nav-link active" href="data-image.php">Data Foto</a>
          <a class="nav-link active" href="keluar.php" onclick="return confirm('Apakah Anda yakin ingin keluar?');">Keluar</a>

        </div>
      </div>
    </div>
  </nav>

<figure class="text-center mt-3 mb-3">
    <blockquote class="blockquote"><br>
        <p>Edit Foto</p>
    </blockquote>
    <figcaption class="blockquote-footer">
        CRUD: Create, Read, Update, And Delete
    </figcaption>
</figure>



<!-- content -->
<div class="section">
    <div class="container">
        <div class="box">
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control" placeholder="Kategori Foto"
                        value="<?php echo $p->category_name ?>" readonly="readonly">
                </div>


                
                <div class="mb-3">
                    <label for="namaadmin" class="form-label">Nama</label>
                    <input type="text" name="namauser" class="form-control" placeholder="Nama User"
                        value="<?php echo $p->admin_name ?>" readonly="readonly">
                </div>

                <div class="mb-3">
                    <label for="namaadmin" class="form-label">Nama Foto</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Foto"
                        value="<?php echo $p->image_name ?>" required>
                </div>

               <div class="mb-3">
                <img src="foto/<?php echo $p->image ?>" width="100px" />
                <input type="hidden" name="foto" value="<?php echo $p->image ?>" />
                <input type="file" name="gambar" class="form-control"></div>

                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi"
                    placeholder="Deskripsi"><?php echo $p->image_description ?></textarea><br />
                    <label for="ststus" class="form-label">Status</label>
                <select class="form-control" name="status">
                    <option value="">--Pilih--</option>
                    <option value="1" <?php echo ($p->image_status == 1) ? 'selected' : ''; ?>>Aktif</option>
                    <option value="0" <?php echo ($p->image_status == 0) ? 'selected' : ''; ?>>Tidak Aktif</option>
                </select>
                <div class="mb-5"></div>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Update</button><br><br>
            </form>
            <?php
            if (isset($_POST['submit'])) {

                // data inputan dari form
                $kategori = $_POST['kategori'];
                $user = $_POST['namauser'];
                $nama = $_POST['nama'];
                $deskripsi = $_POST['deskripsi'];
                $status = $_POST['status'];
                $foto = $_POST['foto'];

                // data gambar yang baru 
                $filename = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];

                //jika admin ganti gambar
                if ($filename != '') {

                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];

                    $newname = 'foto' . time() . '.' . $type2;

                    // menampung data format file yang diizinkan
                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                    // validasi format file
                    if (!in_array($type2, $tipe_diizinkan)) {
                        // jika format file tidak ada di dalam tipe diizinkan
                        echo '<script>alert("Format file tidak diizinkan")</script>';

                    } else {
                        unlink('./foto/' . $foto);
                        move_uploaded_file($tmp_name, './foto/' . $newname);
                        $namagambar = $newname;
                    }

                } else {
                    // jika admin tidak ganti gambar
                    $namagambar = $foto;

                }

                //query update data produk
                $update = mysqli_query($conn, "UPDATE tb_image SET
					                       category_name       = '" . $kategori . "',
										   admin_name          = '" . $user . "',
										   image_name          = '" . $nama . "',
										   image_description   = '" . $deskripsi . "',
										   image               = '" . $namagambar . "',
										   image_status        = '" . $status . "'
										   WHERE image_id      = '" . $p->image_id . "' ");
                if ($update) {
                    echo '<script>alert("Ubah data berhasil")</script>';
                    echo '<script>window.location="data-image.php"</script>';
                } else {
                    echo 'gagal' . mysqli_error($conn);

                }
            }
            ?>
        </div>
    </div>
</div>
   <!-- footer -->
   <footer><br><br>
    <div class="container">
        <small>Copyright &copy; 2024 - GaleriKu.</small>
    </div>
</footer>
    <script>
            CKEDITOR.replace( 'deskripsi' );
    </script><br><br>
</body>

</html>