<?php
include 'koneksi.php';
$edit_id = $_POST['edit_id'];
$kode_pos = $_POST['kode_pos'];
$tujuan = $_POST['tujuan'];


$sql = "UPDATE tujuan SET kode_pos='" . $kode_pos . "',tujuan='" . $tujuan . "' where id_tujuan='" . $edit_id . "' ";
$result = mysqli_query($koneksi, $sql);

echo "success";
