<?php
    session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
    }
	$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id ='".$_SESSION['id']."'");
	$d = mysqli_fetch_object($query);
	
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

    <title>Profil Saya</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="website icon" type="png" href="img/icon1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container">
  <img src="img/icon2.png" alt="" style="width: 40px;">
  <strong><a class="navbar-brand" href="#">GaleriKu</a></strong>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <strong>PROFIL</strong>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <label for="Username" class="form-label">Username</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"><i class="bi bi-person-circle"></i></span>
                                <input type="text" class="form-control" name="Username" placeholder="Username" value="<?php echo $d->username ?>" required>
                            </div>

                            <label for="Email" class="form-label">Email</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"><i class="bi bi-envelope-fill"></i></span>
                                <input type="email" class="form-control" name="Email" placeholder="Email" value="<?php echo $d->admin_email ?>" required>
                            </div>

                            <label for="NamaLengkap" class="form-label">Nama Lengkap</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" value="<?php echo $d->admin_name ?>" required>
                            </div>

                            <label for="Alamat" class="form-label">Alamat</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"><i class="bi bi-house-door-fill"></i></span>
                                <input type="text" class="form-control" name="Alamat" placeholder="Alamat" value="<?php echo $d->admin_address ?>" required>
                            </div>

                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Ubah Profil</button>
                        </form>
                        <?php
       if(isset($_POST['submit'])){
        $admin_name   = $_POST['nama']; // sesuai dengan form input 'nama'
        $username     = $_POST['Username']; // sesuai dengan form input 'Username'
        $admin_email  = $_POST['Email']; // sesuai dengan form input 'Email'
        $admin_address = $_POST['Alamat']; // sesuai dengan form input 'Alamat'
        
        $update = mysqli_query($conn, "UPDATE tb_admin SET 
                       admin_name = '".$admin_name."',
                       username = '".$username."',
                       admin_email = '".$admin_email."',
                       admin_address = '".$admin_address."'
                       WHERE admin_id = '".$d->admin_id."'");
        
        if($update){
            echo '<script>alert("Ubah data berhasil")</script>';
            echo '<script>window.location="profil.php"</script>';
        } else {
            echo 'gagal '.mysqli_error($conn);
        }
    }
    
			   ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
    <div class="container">
        <small>Copyright &copy; 2024 - GaleriKu.</small>
    </div>
</footer>
</body>
</html>

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