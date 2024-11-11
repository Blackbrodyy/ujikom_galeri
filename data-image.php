<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
  echo '<script>window.location="login.php"</script>';
}
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
    <title>Data Foto</title>
  <link rel="website icon" type="png" href="img/icon1.png">
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

  <div class="container">
    <figure class="text-center mt-5">
      <blockquote class="blockquote">
        <p>Data Foto Yang Ditambahkan</p>
      </blockquote>
      <figcaption class="blockquote-footer">
        CRUD : Create, Read, Update, And Delete <cite title="Source Title"></cite>
      </figcaption>
    </figure>

    <a href="tambah-image.php" type="button" class="btn btn-primary">Tambah</a><br><br>
    <table class="table table-hover ">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Album</th>
          <th scope="col">Nama User</th>
          <th scope="col">Nama Gambar</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Gambar</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $user = $_SESSION['a_global']->admin_id;
        $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE admin_id = '$user' ");
        if (mysqli_num_rows($foto) > 0) {
          while ($row = mysqli_fetch_array($foto)) {
            ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $row['category_name'] ?></td>
              <td><?php echo $row['admin_name'] ?></td>
              <td><?php echo $row['image_name'] ?></td>
              <td><?php echo $row['image_description'] ?></td>
              <td><a href="foto/<?php echo $row['image'] ?>" target="_blank"><img src="foto/<?php echo $row['image'] ?>"
                    width="50px"></a></td>
              <td><?php echo ($row['image_status'] == 0) ? 'Tidak Aktif' : 'Aktif'; ?></td>
              <td>
              <div class="tombol">
                <a href="edit-image.php?id=<?php echo $row['image_id'] ?>">
                  <button type="button" class="btn btn-primary">
                  <i class="bi bi-pencil-fill"></i>
                  </button>
                </a>
                <a href="proses-hapus.php?idp=<?php echo $row['image_id'] ?>"
                  onclick="return confirm('Yakin Ingin Hapus ?')">
                  <button type="button" class="btn btn-danger">
                  <i class="bi bi-trash3-fill"></i>
                  </button>
                </a>
              </td>
            </tr>
            </div>
          <?php }
        } else { ?>
          <tr>
            <td colspan="8">Tidak ada data</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  </div>
  </div>

  </div>
<br><br>
  <footer>
    <div class="container">
        <small>Copyright &copy; 2024 - GaleriKu.</small>
    </div>
</footer><br>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>