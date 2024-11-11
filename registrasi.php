<?php
include 'db.php';
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
<link rel="stylesheet" href="css/style.css">
    <title>Daftar</title>
    <link rel="website icon" type="png" href="img/icon1.png">
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


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <strong>FORM DAFTAR</strong>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <label for="Username" class="form-label">Username</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-person-circle"
                                        viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg></span>
                                <input type="text" class="form-control" name="Username" placeholder="Username">
                            </div>

                            <label for="Password" class="form-label">Password</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-lock-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                                    </svg></span>
                                <input type="password" class="form-control" name="Password" placeholder="Password">
                            </div>

                            <label for="Email" class="form-label">Email</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-envelope-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                                    </svg></span>
                                <input type="email" class="form-control" name="Email" placeholder="Email">
                            </div>

                            <label for="NamaLengkap" class="form-label">Nama Lengkap</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-person-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg></span>
                                <input type="text" class="form-control" name="NamaLengkap" placeholder="Nama Lengkap">
                            </div>

                            <label for="Alamat" class="form-label">Alamat</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-house-door-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                                    </svg></span>
                                <input type="text" class="form-control" name="Alamat" placeholder="Alamat">
                            </div>

                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Daftar</button>
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {
                            // Mengumpulkan data dari form
                            $admin_name = ucwords($_POST['NamaLengkap']);
                            $username = $_POST['Username'];
                            $password = md5($_POST['Password']); // Mengenkripsi password dengan MD5
                            $admin_email = $_POST['Email'];
                            $admin_address = ucwords($_POST['Alamat']);

                            // Memasukkan data ke dalam database
                            $insert = mysqli_query($conn, "INSERT INTO tb_admin (admin_name, username, password, admin_email, admin_address) VALUES (
                         '$admin_name', '$username', '$password', '$admin_email', '$admin_address')");

                            // Memeriksa apakah data berhasil disimpan
                            if ($insert) {
                                echo '<script>alert("Registrasi berhasil")</script>';
                                echo '<script>window.location="login.php"</script>';
                            } else {
                                echo 'Gagal: ' . mysqli_error($conn);
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div><br><br>

    <footer>
    <div class="container">
        <small>Copyright &copy; 2024 - GaleriKu.</small>
    </div>
</footer>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>