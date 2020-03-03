<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'db_lkps');
    $uploadStatus = 1; 
    // Upload file

    // Ambil file-file bersangkutan
    $tanggal = $_POST['tgl'];
    $jenis = $_POST['jenis'];
    $filename = $_FILES['myfile']['name'];
    $kode_dosen = $_SESSION['kode_dosen'];
    // menyimpan file di alamat penyimpanan
    $destination = 'uploads/' . $filename;
    // ambil file extensi
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // pemindahan file ke tempat upload di server
    $file =$_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    //Pengecekan extensi file
    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo json_encode(array(
            "statusCode"=>201,
            "Pesan"=> "Tipe file harus ZIP atau PDF atau DOCX"
        ));
        exit();
    } else if ($_FILES['myfile']['size'] > 10000000) { // Ukuran file maksimal 10MB
        echo json_encode(array(
            "statusCode"=>201,
            "Pesan"=> "Ukuran file terlalu besar"
        ));
        exit();
    }
    
    //Jika lolos maka upload
    if($uploadStatus == 1){   
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO data_upload (kode_dosen,jenis , nama, tanggal, ukuran)VALUES ('$kode_dosen','$jenis', '$filename', '$tanggal', '$size')";
            if (mysqli_query($conn, $sql)) {
                echo json_encode(array(
                    "statusCode"=>200,
                    "Pesan"=> "Berhasil Input file"
                ));

            }else{
                echo json_encode(array(
                    "statusCode"=>201,
                    "Pesan"=> "Gagal input file"
                ));
            }
        }
    }
    
?>