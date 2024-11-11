<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tambah Foto</title>
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


    <figure class="text-center mt-3">
        <blockquote class="blockquote"><br>
            <p>Tambah Gambar</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            CRUD: Create, Read, Update, And Delete
        </figcaption>
    </figure>

    <!-- content -->
    <div class="container mt-5">
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="Album" class="form-label">Album</label>
                <input type="hidden" name="nama_kategori" id="prd_name">
            </div>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM tb_category");
            $jsArray = "var prdName = new Array();\n";
            echo '<select class="input-control form-control" name="kategori" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]" required>
                    <option value="">-Pilih Kategori Foto-</option>';
            while ($row = mysqli_fetch_array($result)) {
                echo '<option value="' . $row['category_id'] . '">' . htmlspecialchars($row['category_name']) . '</option>';
                $jsArray .= "prdName['" . $row['category_id'] . "'] = '" . addslashes($row['category_name']) . "';\n";
            }
            echo '</select>';
            ?>

            <input type="hidden" name="adminid" value="<?php echo $_SESSION['a_global']->admin_id; ?>">

            <div class="mb-3">
                <label for="namaadmin" class="form-label">Nama</label>
                <input type="text" class="form-control" name="namaadmin"
                    value="<?php echo htmlspecialchars($_SESSION['a_global']->admin_name); ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="namafoto" class="form-label">Nama Foto</label>
                <input type="text" name="nama_foto" class="form-control" placeholder="Tambahkan Nama Foto" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" placeholder="Deskripsikan Fotomu"></textarea>
            </div>

            <div class="mb-3">
                <input type="file" name="gambar" class="form-control" required>
            </div>

            <select class="mb-3 form-control" name="status" required>
                <option value="">--Pilih Status--</option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>

            <button type="submit" class="btn btn-primary" name="submit" value="submit">Tambah</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            // Store input from the form
            $kategori = $_POST['kategori'];
            $nama_ka = $_POST['nama_kategori'];
            $ida = $_POST['adminid'];
            $user = $_POST['namaadmin'];
            $nama = $_POST['nama_foto']; // Ensure you're using the correct POST variable for the photo name
            $deskripsi = $_POST['deskripsi'];
            $status = $_POST['status'];

            // Store uploaded file data
            $filename = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];

            // Use a timestamp for unique naming
            $newname = 'foto_' . time() . '_' . basename($filename); // Added basename for security
        
            // Directly proceed to file upload
            if (move_uploaded_file($tmp_name, './foto/' . $newname)) {
                // Insert into database without file type checks
                $insert = mysqli_query($conn, "INSERT INTO tb_image VALUES (
            null,
            '$kategori',
            '$nama_ka',
            '$ida',
            '$user',
            '$nama',
            '$deskripsi',
            '$newname',
            '$status',
            null
        )");

                if ($insert) {
                    echo '<script>alert("Tambah Foto berhasil")</script>';
                    echo '<script>window.location="data-image.php"</script>';
                } else {
                    echo 'gagal: ' . mysqli_error($conn);
                }
            } else {
                echo '<script>alert("Upload file gagal")</script>';
            }
        }
        ?>


    </div>
<br>
    <footer>
    <div class="container">
        <small>Copyright &copy; 2024 - GaleriKu.</small>
    </div>
</footer>

    <script type="text/javascript"><?php echo $jsArray; ?></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>