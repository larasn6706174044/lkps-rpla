<?php include_once('koneksi.php') ?>

<!DOCTYPE html>

<html>

<head>
    <title>Collapse/Expand</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/datatables.css"/>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
    <style>
    .w3-btn{
        width:100px;
        margin-top:8px;
    }
      body{
        font-style:"Open Sans","Roboto";
      }
      .wrapper{
        width:90%;
        margin:0% 5%;
      }
      #container{
          margin:0 auto;
          overflow:auto;
          /* padding:48px 24px; */
          /* border-radius:4px; */
          box-shadow:4px 4px 7px rgba(0, 0, 0, 0.25);
      }
      table{
        width:100%;
        overflow:hidden;
        table-layout: fixed;
      }

      .tbl-header{
        background-color: skyblue;
        overflow-x:auto;
        padding-right:20px
      }
      .tbl-content{
        height:500px;
        overflow-x:auto;
        margin-top: 0px;
        border: 1px solid rgba(255,255,255,0.3);
      }
      .datarow{
        table-layout: fixed;
        border:2px solid #ddd!important;


      }
      th{
        padding: 20px 15px;
        text-align: center;
        font-weight: bold;
        font-size: 12px;
        color: black;
        text-transform: uppercase;
      }
      td{
        padding: 20px 15px;
        text-align: left;
        vertical-align:middle;
        font-weight: 300;
        font-size: 12px;
        border-bottom: solid 1px rgba(96, 126, 183, 0.1);
        width:100%;

      }
      .judul{
        background-color:#ddd;
      }
      .data{
        background-color:#f0f0f0
      }
      .judul td{
        padding: 5px 15px!important;
        font-weight:bold;
      }
    </style>
</head>

<body>
  <div class="wrapper">
    <h1>Hasil Kuesioner Mahasiswa</h1>
    <div id="container">
      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
          <tbody>
              <tr>
                <th style="width:20px">No</th>
                <th>Nama</th>
                <th>Nama Perusahaan</th>
                <th>Nama Wirausaha</th>
                <th>Bidang Kerja</th>
                <th>Nama Atasan</th>
                <th>Kontak Atasan</th>
              </tr>
          </tbody>
        </table>
      </div>
      <?php 
        $result = mysqli_query($conn,"select * from kuesioner_mhs");
        $cek=mysqli_num_rows($result);
      ?>
      <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0" class="gridtable" id="tableMain" id="table-data2">
            <tbody>
                <?php
                  $i=1;  
                  while($data = mysqli_fetch_row($result)) { 
                ?> 
                <tr class="breakrow">
                  <td style="width:20px"><?php echo"$i";?></td>
                  <td><?php echo"$data[3]";?></td>
                  <td><?php echo"$data[7]";?></td>
                  <td><?php echo"$data[8]";?></td>
                  <td><?php echo"$data[11]";?></td>
                  <td><?php echo"$data[13]";?></td>
                  <td><?php echo"$data[14]";?></td>
                </tr>
                <tr class="datarow judul" style="display:none;font-weight:bold">
                  <td></td>
                  <td>NIM</td>
                  <td>Tahun Kerja</td>
                  <td>Tahun Wirausaha</td>
                  <td>Kesesuaian</td>
                  <td>Cakupan Area Kerja</td>
                  <td>Kesediaan Hadir</td>
                </tr>
                <tr class="datarow data" style="display:none">
                  <td></td>
                  <td><?php echo"$data[4]";?></td>
                  <td><?php echo"$data[6]";?></td>
                  <td><?php echo"$data[9]";?></td>
                  <td><?php echo"$data[18]";?></td>
                  <td><?php echo"$data[12]";?></td>
                  <td><?php echo"$data[16]";?></td>
                </tr>
                <tr class="datarow judul" style="display:none;font-weight:bold">
                  <td></td>
                  <td>Email</td>
                  <td colspan="3">Masukan</td>
                  <td>Tahun Lulus</td>
                  <td>Kartu Pegawai</td>
                </tr>
                <tr class="datarow data" style="display:none">
                  <td></td>
                  <td><?php echo"$data[2]";?></td>
                  <td colspan="3"><?php echo"$data[15]";?></td>
                  <td><?php echo"$data[5]";?></td>
                  <td><a href="<?php echo"$data[10]";?>" target="_blank">Link Kartu</a></td>
                </tr>
                <?php 
                    $i++;
                  }
                ?>
            </tbody>
        </table>
      </div>
    </div>

  </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="js/datatables.js"></script>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script>
    $( document ).ready(function() {
        $('#tableMain').on('click', 'tr.breakrow',function(){
            $(this).nextUntil('tr.breakrow').toggle(150);
        });

      $('#table-data2').DataTable({
          "paging":   true,
          "ordering": true,
          "info":     true
      });
    });

        $(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>
</html>