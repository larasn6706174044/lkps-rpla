<link rel="stylesheet" type="text/css" href="css/datatables.css"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style>
    .w3-btn{
        width:100px;
        margin-top:8px;
    }
</style>
<?php
session_start();
    $filter = $_GET['filter'];
    $conn = mysqli_connect('localhost', 'root', '', 'db_lkps');

    $result = mysqli_query($conn,"select * from data_upload where SUBSTRING_INDEX(jenis, '.', 1) = '$filter'");
    $cek=mysqli_num_rows($result);

echo "<table id='table-data' style='margin:16px;'>
    <thead>
        <tr>
            <th >No</th>
            <th >Kode dosen</th>
            <th >Jenis</th>
            <th >Nama file</th>
            <th >Tanggal Upload</th>
            <th >Action</th>
        </tr>
    </thead>";
    echo"<tbody>";
    $i = 1;
    while($data = mysqli_fetch_row($result))
    {   
        echo "<tr>";
            echo "<td align=center style='width:50px;'>$i</td>";
            echo "<td style='width:200px;'>$data[1]</td>";
            echo "<td style='width:300px;'>$data[2]</td>";
            echo "<td style='width:300px;'>$data[3]</td>";
            echo "<td style='width:100px;'>$data[4]</td>";
            echo "<td style='width:150px;'>";
            if($data[1] == $_SESSION['kode_dosen']){
                echo "<a href='download.php?file_id=$data[0]'><i class='fas fa-download' style='color: #000000; padding-right:10px; padding-left: 5px'></i></a>";

                echo "<a href='delete.php?file_id=$data[0]' onclick='confirmation(event)'><i class='fas fa-trash' style='color: #000000; padding-right: 10px;'></i></a>";
                echo "<a href='print_data.php?file_id=$data[0]'><i class='fas fa-print'style='color: #000000;'></i></a>";
            }else{
                echo "<a href='download.php?file_id=$data[0]'><i class='fas fa-download' style='color: black'></i> f</a>";
                echo"<br>";
                echo "<a href='print_data.php?file_id=$data[0]' target='_blank' class='w3-btn w3-blue'>Print</a>";
            }
            echo"</td>";
        echo "</tr>";
        $i++;
    }
    echo "</tbody>";
echo "</table>";


?>
<script type="text/javascript" src="js/datatables.js"></script>
<script>
$(document).ready(function () {
    $('#table-data').DataTable({
        "paging":   true,
        "ordering": true,
        "info":     true
    });

});

function confirmation(ev) {
ev.preventDefault();
var urlToRedirect = ev.currentTarget.getAttribute('href');
console.log(urlToRedirect);
swal({
  title: "Apakah anda yakin",
  text: "Akan menghapus file ini ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
    window.location.href=urlToRedirect;
  if (willDelete) {
  }
});
}
</script>