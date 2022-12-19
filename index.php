<?php
include('control/koneksi.php');
session_start();

// set session
$_SESSION['login'] = false;

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="icon" href="assets/img/favicon.ico">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GOIP | Cek Resi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="asset/plugins/iCheck/square/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="hold-transition login-page" style="background-image: url(./assets/img/register_bg_2.png); background-size: 100%; background-repeat: no-repeat;">
  <div class="login-box">
    <div class="login-logo">
      <img src="assets/img/goipp.png" width="250px" class="user-image" alt="User Image"><br>
      <b>Cek </b>Pengiriman <b>GOIP</b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Masukkan ID Pengiriman Disini</p>

      <form action="index.php" method="post" name="postform" class="form form-login">
        <div class="form-group has-feedback">
          <input type="text" name="id_pengiriman" id="id_pengiriman" class="form-control" placeholder="Masukkan ID Pengiriman GOIP">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <a href="login.php">login?</a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <input id="tombolTampilTH" type="submit" class="btn btn-primary btn-block btn-flat" name="tampilkan" value="tampilkan">
          </div>
          <!-- /.col -->
        </div>
      </form>


    </div>
    <!-- /.login-box-body -->

  </div>
  <!-- /.login-box -->
  <?php
  if (isset($_POST['tampilkan'])) {
    $id_pengiriman = $_POST['id_pengiriman'];
  ?>
    <div class="page-holder w-100 d-flex flex-wrap">
      <div class="container-fluid px-xl-5">
        <div class="container-fluid px-xl-20">
          <section class="py-3">
            <div id="tabelHasil" class="row">
              <div class="col-lg-12 mb-4">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase text-muted mb-0">Pengiriman</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr class="info">
                            <th>Id Pengiriman</th>
                            <th>Nama Pengirim</th>
                            <th>Id Layanan</th>
                            <th>Id Tujuan</th>
                            <th>Tanggal Pengiriman</th>
                            <th>Berat</th>
                            <th>Biaya Paket</th>
                            <th>Total Biaya</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $query = ("SELECT pengiriman.id_pengiriman, pengiriman.nm_pengirim, layanan.layanan, tujuan.tujuan, pengiriman.tanggal_pengiriman, pengiriman.berat, pengiriman.biaya_paket, pengiriman.total_biaya FROM pengiriman INNER JOIN layanan ON layanan.id_layanan = pengiriman.id_layanan INNER JOIN tujuan ON tujuan.id_tujuan = pengiriman.id_tujuan WHERE id_pengiriman = '$id_pengiriman'");
                          $hasil_query = mysqli_query($koneksi, $query);
                          $number = 1;
                          while ($row = mysqli_fetch_array($hasil_query)) {
                          ?>
                            <tr>
                              <td><?php echo $row['id_pengiriman']; ?></td></a>
                              <td><?php echo $row['nm_pengirim']; ?></td>
                              <td><?php echo $row['layanan']; ?></td>
                              <td><?php echo $row['tujuan']; ?></td>
                              <td><?php echo $row['tanggal_pengiriman']; ?></td>
                              <td><?php echo $row['berat']; ?> Kg</td>
                              <td>Rp. <?php echo number_format($row['biaya_paket']) ?>,-</td>
                              <td>Rp. <?php echo number_format($row['total_biaya']) ?>,-</td>
                            </tr>

                          <?php
                            $number++;
                          }
                          ?>
                        </tbody>

                      <?php

                    }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>

      <!-- jQuery 3 -->
      <script src="asset/bower_components/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <!-- iCheck -->
      <script src="asset/plugins/iCheck/icheck.min.js"></script>
</body>

</html>