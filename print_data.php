<?php
if (isset($_GET['file_id'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'db_lkps');
    $id = $_GET['file_id'];
    $sql = "SELECT * FROM data_upload WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $nama = $file['nama'];
    $string = $file['nama']; 
    $str_arr = explode(".", $string);  
    $wayae = end($str_arr);
    if($wayae == "docx"){

        $path = "uploads/".$nama;
        header("Content-type: application/msword");
    
        header("Content-Length: " . filesize($path)); 
        @readfile('uploads/'.$nama);
    }else if($wayae == "pdf"){
        
        $path = "uploads/".$nama;
        header("Content-type: application/pdf");
    
        header("Content-Length: " . filesize($path)); 
        @readfile('uploads/'.$nama);
    }else{
        header('Location:dosen.php?error=1');
    }
}
?>