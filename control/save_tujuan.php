<?php
include 'koneksi.php';

$tujuan = $_POST['tujuan'];
$kode_pos = $_POST['kode_pos'];

mysqli_query($koneksi, "INSERT INTO tujuan(kode_pos,tujuan)VALUES ( '$kode_pos','$tujuan')");

//$result['status']= "success";
echo "success";
