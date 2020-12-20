<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SKPPKM</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <style>
  body{
  background-image: url(../img/gedung2.png);
}
  </style>

</head>

<body class="bg-gradient-primary">
   <?php 
    if(isset($_GET['pesan'])){
        if($_GET['pesan']=="gagal"){
            echo"<script>alert('Username atau password tidak sesuai');
        </script>";
        }
    }
    ?>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-8 col-lg-8 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block ">

                <table border="0" width="100%" height="100%">
                  <tr>
                    <td >&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td></td>
                  </tr>
                   <tr>
                    <td></td>
                    <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../img/lp2m.png" width="350" height="80"></td>
                  </tr>
                   <tr>
                    <td></td>
                    <td></td>
                  </tr>
                  
                </table>
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                  </div>
                  <form class="user" method="POST" action="ceklogin.php">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nidn" name="id" placeholder="NIDN">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                    </div>
                   <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>

                  
            
                  </form>
                 
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
