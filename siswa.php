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
            <th >Email</th>
            <th >Nama</th>
            <th >NIM</th>
            <th >Bulan dan Tahun Lulus</th>
            <th >Bulan dan Tahun Kerja</th>
            <th >Nama Perusahaan</th>
            <th >Nama Wirausaha</th>
            <th >Tanggal Wirausaha</th>
            <th >Link Kartu Pegawai</th>
            <th >Bidang Pekerjaan</th>
            <th >Cakupan Area Kerja</th>
            <th >Nama Atasan</th>
            <th >Kontak Atasan</th>
            <th >Masukan</th>
            <th >Kesediaan Hadir</th>
            <th >Pendapatan Perbulan</th>
            <th >Kesesuaian Pendidikan</th>
        </tr>
    </thead>";
    echo"<tbody>";
    $i = 1;
    while($data = mysqli_fetch_row($result))
    {   
        echo "<tr>";
            echo "<td align=center style='width:50px;'>$i</td>";
            echo "<td style='width:300px;'>$data[2]</td>";
            echo "<td style='width:300px;'>$data[3]</td>";
            echo "<td style='width:100px;'>$data[4]</td>";
            echo "<td style='width:100px;'>$data[5]</td>";
            echo "<td style='width:100px;'>$data[6]</td>";
            echo "<td style='width:100px;'>$data[7]</td>";
            echo "<td style='width:100px;'>$data[8]</td>";
            echo "<td style='width:100px;'>$data[9]</td>";
            echo "<td style='width:100px;'>$data[10]</td>";
            echo "<td style='width:100px;'>$data[11]</td>";
            echo "<td style='width:100px;'>$data[12]</td>";
            echo "<td style='width:100px;'>$data[13]</td>";
            echo "<td style='width:100px;'>$data[14]</td>";
            echo "<td style='min-width:400px;'>$data[15]</td>";
            echo "<td style='width:100px;'>$data[16]</td>";
            echo "<td style='width:100px;'>$data[17]</td>";
            echo "<td style='width:100px;'>$data[18]</td>";
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
