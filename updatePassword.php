<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'db_lkps');
    $set = 1; 

    $passwordLama = $_POST['password_lama'];
    $passwordBaru = $_POST['password_baru'];
    $id = $_SESSION['dosen_id'];
    if($_SESSION['password'] != md5($passwordLama)){
        $set = 0;
        echo json_encode(array(
            "statusCode"=>201,
            "Pesan"=> "Password Tidak Sesuai, Hubungi Admin"
        ));
        exit();
    }else if(md5($passwordBaru) == $_SESSION['password']){
        $set = 0;
        echo json_encode(array(
            "statusCode"=>201,
            "Pesan"=> "Password tidak boleh sama dengan yang dulu!"
        ));
        exit();
    }
    $new = md5($passwordBaru);
    if($set == 1){  
        $sql = "UPDATE dosen set password = '$new' where id = '$id'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['password'] = md5($passwordBaru);
            echo json_encode(array(
                "statusCode"=>200,
                "Pesan"=> "Berhasil update Password"
        ));
        exit();
        }else{
            echo json_encode(array(
                "statusCode"=>201,
                "Pesan"=> "Gagal Update password"
        ));
        exit();
        }
    }

?>