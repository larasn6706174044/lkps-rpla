<?php
if (isset($_GET['file_id'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'db_lkps');
    $id = $_GET['file_id'];
    $sql = "SELECT * FROM data_upload WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $nama = $file['nama'];
    unlink('uploads/'.$nama);

    $del = "DELETE FROM data_upload WHERE id = '$id'";
    $result = mysqli_query($conn,$del);
    header('Location:tampildata.php');
}
?>