<?php

//koneksi database
$dbServer = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = "db_curriculumvitae";

$conn = mysqli_connect($dbServer, $dbUser, $dbPass);
mysqli_select_db($conn,$dbName);

//data yang diperoleh dari form mahasiswa
$institusi=$_POST['institusi'];
$tahun=$_POST['tahun'];

 //simpan data kedalam database
$sql=mysqli_query($conn, "INSERT INTO tb_education(institusi, tahun) VALUES('".$institusi."','".$tahun."')") or die(mysqli_error());
if ($sql) {
  echo "<div style='color:green'>Data berhasil disimpan!</div>";
}else{
  echo "<div style='color:red'>Data gagal disimpan!</div>";
}

?>