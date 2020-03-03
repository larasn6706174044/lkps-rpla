<?php
if (isset($_GET['file_id'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'db_lkps');
    $id = $_GET['file_id'];
    // fetch file to download from database
    $sql = "SELECT * FROM data_upload WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['nama'];
    var_dump($filepath);

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['nama']));
        readfile('uploads/' . $file['nama']);
    }

}
?>