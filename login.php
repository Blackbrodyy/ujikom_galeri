<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
    <link rel="website icon" type="png" href="img/icon1.png">
  </head>
  <body>
  <div class="container mt-5"><br><br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                       <STrong>LOGIN LURR</STrong> 
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <label for="Username" class="form-label">Username</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-person-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg></span>
                                <input type="text" class="form-control" id="Username" name="user" Required
                                    placeholder="Masukan Username" aria-describedby="basic-addon3">
                            </div>
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-unlock-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2" />
                                    </svg>
                                </span>
                                <input type="password" class="form-control" id="password" name="pass" Required
                                    placeholder="Masukan Password" aria-describedby="basic-addon3">
                            </div>
                            <div class=row mb-3>
                                <button type="login" class="btn btn-primary" name="login">Login</button>
                            </div>

                            <div class="text-center">
                                <br>Belum Punya Akun? Silahkan <a href="registrasi.php">Daftar</a>
                                atau <a href="index.php">Kembali</a>
                            </div> 
                            </form>

                            <?php
if (isset($_POST['login'])) {
    session_start();
    include 'db.php';

    // Mengambil username dan password dari form input
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    
    // Mengenkripsi password dengan MD5
    $pass = md5($pass);
    
    // Cek apakah username dan password yang terenkripsi cocok dengan database
    $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$user' AND password = '$pass'");
    
    if (mysqli_num_rows($cek) > 0) {
        // Jika user ditemukan, ambil data user
        $d = mysqli_fetch_object($cek);
        $_SESSION['status_login'] = true;
        $_SESSION['a_global'] = $d;
        $_SESSION['id'] = $d->admin_id;

        // Redirect ke halaman dashboard
        echo '<script>window.location="dashboard.php"</script>';
    } else {
        // Tampilkan pesan error jika login gagal
        echo '<script>alert("Username atau password anda salah")</script>';
    }
}
?>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br>
    <footer>
    <div class="container">
        <small>Copyright &copy; 2024 - GaleriKu.</small>
    </div>
</footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>