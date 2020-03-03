<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'db_lkps');

    $result = mysqli_query($conn,"select * from data_upload ORDER BY id DESC  
    LIMIT 1");
    $cek=mysqli_num_rows($result);
    while($data = mysqli_fetch_row($result))
    {
        echo"<p>File terakhir : $data[3]";
    }
?>