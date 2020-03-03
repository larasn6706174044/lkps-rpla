<?php

session_start();
echo $_SESSION['dosen_id']."<br>";
echo $_SESSION['kode_dosen']."<br>";
echo $_SESSION['nama_dosen'];

?>

<a href="logout.php">Logout</a>