<?php
    // Always start this first
    session_start();
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        $usern = $_POST['username'];
        $pass = md5($_POST['password']);
        // Getting submitted user data from database
        $conn = mysqli_connect('localhost', 'root', '', 'db_lkps');
        $stmt = $conn->prepare("SELECT * FROM dosen WHERE username = ?");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_object();
        
        if(md5($_POST['password']) == $user->password){
            $_SESSION['dosen_id'] = $user->id;
            $_SESSION['kode_dosen'] = $user->kode_dosen;
            $_SESSION['nama_dosen'] = $user->nama_dosen;
            $_SESSION['kelamin'] = $user->kelamin;
            $_SESSION['password'] = $user->password;
            echo json_encode(array(
                "statusCode"=>200,
                "Pesan"=> "Berhasil login"
            ));
        }else if($pass != $user->password){
            echo json_encode(array(
                "statusCode"=>201,
                "Pesan"=> "Username atau Password salah"
            ));
            exit();
        }
    }
?>