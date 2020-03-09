<!-- 
  LOAD DATA LOCAL INFILE 'C:\\xampp\\tmp\\phpFE45.tmp' INTO TABLE `kuesioner_mhs` FIELDS TERMINATED BY ';' LINES TERMINATED BY '\r\n' 

  $sql = "LOAD DATA LOCAL INFILE \'C:\\\\xampp\\\\tmp\\\\phpFE45.tmp\' INTO TABLE `kuesioner_mhs` FIELDS TERMINATED BY \';\' LINES TERMINATED BY \'\\r\\n\'";
-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php include_once('koneksi.php');
        $result = mysqli_query($conn,"select * from kuesioner_mhs");
        $cek=mysqli_num_rows($result);

        echo "<table id='table-data' style='margin:16px;'>
    <thead>
        <tr>
            <th >No</th>
            <th >Nama</th>
            <th >NIM</th>
            <th >Bulan dan Tahun Lulus</th>
            <th Bulan dan Tahun Pertama Kerja</th>
            <th >Nama Perusahaan</th>
            <th >Nama Wirausaha</th>
            <th >Tanggal Wirausaha</th>
            <th >Link Kartu Pegawai</th>
            <th >Bidang Pekerjaan</th>

        </tr>
    </thead>";
    echo"<tbody>";
    $i = 1;
    while($data = mysqli_fetch_row($result))
    {   
        echo "<tr>";
            echo "<td align=center style='width:50px;'>$i</td>";
            echo "<td style='width:200px;'>$data[1]</td>";
            // echo "<td style='width:300px;'>$data[2]</td>";
            // echo "<td style='width:300px;'>$data[3]</td>";
            // echo "<td style='width:100px;'>$data[4]</td>";
            // echo "<td style='width:150px;'>";
            // if($data[1] == $_SESSION['kode_dosen']){
            //     echo "<a href='download.php?file_id=$data[0]'><i class='fas fa-download' style='color: #000000; padding-right:10px; padding-left: 5px'></i></a>";

            //     echo "<a href='delete.php?file_id=$data[0]' onclick='confirmation(event)'><i class='fas fa-trash' style='color: #000000; padding-right: 10px;'></i></a>";
            //     echo "<a href='print_data.php?file_id=$data[0]'><i class='fas fa-print'style='color: #000000;'></i></a>";
            // }else{
            //     echo "<a href='download.php?file_id=$data[0]'><i class='fas fa-download' style='color: black'></i> f</a>";
            //     echo"<br>";
            //     echo "<a href='print_data.php?file_id=$data[0]' target='_blank' class='w3-btn w3-blue'>Print</a>";
            // }
            // echo"</td>";
        echo "</tr>";
        $i++;
    }
    echo "</tbody>";
echo "</table>";
  ?>
  
</body>
</html>
