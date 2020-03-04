<?php // You'd put this code at the top of any "protected" page you create
// Always start this first
session_start();

if (isset($_SESSION['dosen_id'])) {
    error_reporting(0);
    $error = $_GET['error'];
    if($error == 1){
        echo"<script>alert('File Zip tidak bisa di print');</script>";
        echo "<script>window.close();</script>";
    }
    ?>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/file.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        body{
            font-family: 'Open Sans', 'Roboto';
        }
        .but {
            display: inline-block;
            padding: 14px 16px;
            text-decoration: none;
            transition: 0.3s;
            background-color: Transparent;
            border: none;
            cursor: pointer;
            overflow: hidden;
            outline: none;
        }

        footer {
            position: relative;
            bottom: 0;
            width: 100%;
            height: 50px;
            background-color: #333;
            padding-top: 15px;
            margin-top: 32px;
        }

        footer p {
            color: white;
            font-size: 1em;
        }

        .tampung {
            width: 98%;
        }

        .coba {
            float: left;
            width: 100%;
            height: 10%;
            margin: auto;
            display: block;
            padding: 2%;
            color: #FFFFFF;

            /* gradient1 */

            background: linear-gradient(271.9deg, #96EBC9 -44.59%, #1D98D6 99.7%, #008FD7 99.72%);
        }

        .bg {
            margin:10% 20%;
            width: 60%;
            padding: 5% 0%;
            float: left;
            z-index:1;
            top:70vh;
            position:absolute;
            background-color:#fff;
            box-shadow: 4px 4px 7px rgba(0, 0, 0, 0.1);
            border-radius:4px;
        }

        #filter{
            width:400px;
            margin-left:16px;
        }

        #badge{
            margin-left:16px;
            background:#008FD7;
        }

        .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        }

        .dropbtn:hover, .dropbtn:focus {
        background-color: #3e8e41;
        }

        #myInput {
        box-sizing: border-box;
        background-image: url('searchicon.png');
        background-position: 14px 12px;
        background-repeat: no-repeat;
        font-size: 16px;
        padding: 14px 20px 12px 45px;
        border: none;
        border-bottom: 1px solid #ddd;
        }

        #myInput:focus {outline: 3px solid #ddd;}

        .dropdown {
        position: relative;
        display: inline-block;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f6f6f6;
        min-width: 230px;
        overflow: auto;
        border: 1px solid #ddd;
        z-index: 1;
        }

        .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        }

        .dropdown a:hover {background-color: #ddd;}

        .show {display: block;}

        .topnav {
        overflow: hidden;
        background-color: #314152;
        
        }

        .topnav button, .topnav a {
        float: right;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        transition:0.3s
        }

        .topnav a:hover, .but:hover:not(.aktif) {
            background-color: #F7E9A0;
            color: #314152;
        }

        .but.aktif{
            background-color: #F7E9A0;
        }

        .topnav a.active {
            background-color: #F7E9A0;
            color: #314152;

        }
    </style>
</head>

<body>
    <div class="topnav">
        <a href="logout.php">Logout</a>
        <button type="button" class="but" data-toggle="modal" data-target="#myModal">Ubah Password</button>
        <a  href="#">Lihat Data</a>
        <a href="#" class="active">Tambah Data</a>
        <a href="#" style="position:absolute;left:0px">Selamat datang,
        <?php 
            if($_SESSION['kelamin']=='L') {
                echo "Pak ".$_SESSION['nama_dosen'];
                }

                else if($_SESSION['kelamin']=='P') {
                    echo "Ibu ".$_SESSION['nama_dosen'];
                }

        ?>
        </a>
    </div>
    <div class="header">
        <div class="header_left">
            <img src="aset/landing_img.svg">
            
        </div>
        <div class="header_right" style="color:#314152">
            <p> 
                <span style="font-size: 64px;letter-spacing:3;font-weight:bold">L K P S</span>
                <br><span style="letter-spacing:3">Laporan Kinerja Program Studi</span>
            </p>
            
            <!-- <table>
                <td><img class="aset" src="aset/telu.png" /></td>
                <td>
                    
                </td>
                <td></td>
            </table> -->
            <div class="row" style="padding-left:20px;margin-top:35%">
                <div class="col-10" style="display:flex;padding-left:10px"><img class="aset" src="aset/telu.png" /><img  class="aset" src="aset/if.png" /></div>
                <div class="col-50" style="width:40%;padding-left:20px">
                    <p style="padding:0px">
                        <b style="font-size: 12px;">D3 Rekayasa Perangkat Lunak Aplikasi
                        <br>Telkom University</b>
                        </b>
                    </p>
                </div>

            </div>
        </div>
    </div>
    <!-- <div class="coba"></div> -->
    <center>
        <div class="bg">
            <div class="container">
                <form action="logic.php" id="form" method="POST" enctype='multipart/form-data'>
                    <div class="row ">
                        <div class="col-100" style="font-size:32px;font-weight:bold;letter-spacing:0.3px">Upload Berkas </div>
                        <div style="border:2px solid #fbf4d0; border-radius:4px; width:25%;margin-bottom:10%;margin-left:5%"></div>
                        <div class="form-group row text-left">
                            
                            <div class="col-25"><label for="lname">Jenis Berkas</label></div>
                            <div class="col-75 text-left">
                                <select name="jenis" id="jenis" class="js-example-basic-single" style="width:100%">
                                    <option value="-" >Pilih Jenis Berkas</option>
                                    </optgroup>
                                    <optgroup label="1.Tata Pamong, Tata Kelola, dan Kerjasama">
                                        <option value="1.a. Data Kerja Sama Tridharma">1.a. Data Kerja Sama Tridharma</option>
                                    </optgroup>
                                    <optgroup label="2.Mahasiswa">
                                        <option value="2.a. Data Seleksi Mahasiswa">2.a Data Seleksi Mahasiswa</option>
                                        <option value="2.b. Data Mahasiswa Asing">2.b Data Mahasiswa Asing</option>
                                    </optgroup>
                                    <optgroup label="3.a. Profil Dosen">
                                        <option
                                            value="3.a.1. Data Dosen Tetap Perguruan Tinggi yang ditugaskan di Program Studi yang Diakreditasi">
                                            3.a.1 Data Dosen Tetap Perguruan Tinggi yang ditugaskan di Program Studi yang
                                            Diakreditasi</option>
                                        <option value="3.a.2. Data Dosen Pembimbing Tugas Akhir">3.a.2. Data Dosen
                                            Pembimbing Tugas Akhir</option>
                                        <option
                                            value="3.a.3. Data Ekuivalen Waktu Mengajar Penuh (SWMP) Dosen Tetap Perguruan Tinggi">
                                            3.a.3. Data Ekuivalen Waktu Mengajar Penuh (SWMP) Dosen Tetap Perguruan Tinggi
                                        </option>
                                        <option
                                            value="3.a.4. Data Dosen Tidak Tetap yang ditugaskan di PS yang diakreditasi">
                                            3.a.4. Data Dosen Tidak Tetap yang ditugaskan di PS yang diakreditasi</option>
                                        <option value="3.a.5. Data Dosen Industri/Praktisi">3.a.5. Data Dosen
                                            Industri/Praktisi</option>
                                    </optgroup>
                                    <optgroup label="3.b. Kinerja Dosen">
                                        <option value="3.b.1. Data Pengakuan/Rekognisi DTPS">3.b.1. Data Pengakuan/Rekognisi
                                            DTPS</option>
                                        <option value="3.b.2. Data Penelitian DTPS">3.b.2. Data Penelitian DTPS</option>
                                        <option value="3.b.3. Data Pengabdian Kepada Masyarakat DTPS">3.b.3. Data Pengabdian
                                            Kepada Masyarakat DTPS</option>
                                        <option value="3.b.4. Data Publikasi Ilmiah DTPS">3.b.4. Data Publikasi Ilmiah DTPS
                                        </option>
                                        <option value="3.b.5. Data Pagelaran/pameran/presentasi/publikasi Ilmiah DTPS">
                                            3.b.5. Data Pagelaran/pameran/presentasi/publikasi Ilmiah DTPS</option>
                                        <option value="3.b.6. Data Karyailmiah DTPS yang disitasi dalam 3 tahun terakhir">
                                            3.b.6. Data Karyailmiah DTPS yang disitasi dalam 3 tahun terakhir</option>
                                        <option value="3.b.7. Data Produk/Jasa DTPS yang diadopsi oleh Industir/Masyarakat">
                                            3.b.7. Data Produk/Jasa DTPS yang diadopsi oleh Industir/Masyarakat</option>
                                        <option value="3.b.8. Data Luaran penelitian/PKM Lainnya oleh DTPS">3.b.8. Data
                                            Luaran penelitian/PKM Lainnya oleh DTPS</option>
                                    </optgroup>
                                    <optgroup label="4. Keuangan, Sarana, dan Prasarana">
                                        <option value="4.a. Data Penggunaan Dana">4.a. Data Penggunaan Dana</option>
                                    </optgroup>
                                    <optgroup label="5. Pendidikan">
                                        <option value="5.a. Data Kurikulum, Capaian Pembelajaran dan Rencana Pembelajaran">
                                            5.a Data Kurikulum, Capaian Pembelajaran dan Rencana Pembelajaran</option>
                                        <option value="5.b. Data Integrasi Kegiatan Penelitian/PKM kedalam Pembelajaran">5.b
                                            Data Integrasi Kegiatan Penelitian/PKM kedalam Pembelajaran</option>
                                        <option value="5.c. Data Kepuasan Mahasiswa">5.c. Data Kepuasan Mahasiswa</option>
                                    </optgroup>
                                    <optgroup label="6. Penelitian">
                                        <option value="6.a. Data Penelitian DTPS yang melibatkan Mahasiswa">6.a Data
                                            Penelitian DTPS yang melibatkan Mahasiswa</option>
                                        <option value="6.b. Data Penelitian DTPS yang menjadi rujukan tema tesis/disertasi">
                                            6.b. Data Penelitian DTPS yang menjadi rujukan tema tesis/disertasi</option>
                                    </optgroup>
                                    <optgroup label="7. Pengabdian kepada Masyarakat">
                                        <option value="7.a. PKM DTPS yang melibatkan Mahasiswa">7.a. PKM DTPS yang melibatkan
                                            Mahasiswa</option>
                                    </optgroup>
                                    <optgroup label="8. Luaran dan Capaian Tridharma">
                                    <optgroup label="8.a. Capaian Pembelajaran">
                                        <option value="8.a. Data IPK Lulusan">8.a. Data IPK Lulusan</option>
                                    </optgroup>
                                    <optgroup label="8.b. Prestasi Mahasiswa">
                                        <option value="8.b.1. Data Prestasi Akademik Mahasiswa">8.b.1. Data Prestasi
                                            Akademik Mahasiswa</option>
                                        <option value="8.b.2. Data Prestasi Non Akademik Mahasiswa">8.b.2. Data Prestasi Non
                                            Akademik Mahasiswa</option>
                                    </optgroup>
                                    <optgroup label="8.c. Efektivitas dan Produktivitas Pendidikan">
                                        <option value="8.c.1. Data Masa Studi Lulusan Program Program Diploma Tiga">8.c.1.
                                            Data Masa Studi Lulusan Program Program Diploma Tiga</option>
                                        <option value="8.c.2. Data Masa Studi Lulusan Program Sarjana/Sarjana Terapan">
                                            8.c.2. Data Masa Studi Lulusan Program Sarjana/Sarjana Terapan</option>
                                        <option
                                            value="8.c.3. Data Mahasiswa Studi Program Magister/Magister Terapan/Spesialis">
                                            8.c.3. Data Mahasiswa Studi Program Magister/Magister Terapan/Spesialis</option>
                                        <option
                                            value="8.c.4. Data Masa Studi Lulusan Program Doktor/Doktor Terapan/Sub-spesialis">
                                            8.c.4. Data Masa Studi Lulusan Program Doktor/Doktor Terapan/Sub-spesialis
                                        </option>
                                    </optgroup>
                                    <optgroup label="8.d. Daya Saing Lulusan">
                                        <option value="8.d.1. Data Waktu Tunggu Lulusan Program Diploma Tiga">8.d.1. Data
                                            Waktu Tunggu Lulusan Program Diploma Tiga</option>
                                        <option value="8.d.2. Data Waktu Tunggu Lulusan Program Sarjana">8.d.1. Data Waktu
                                            Tunggu Lulusan Program Sarjana</option>
                                        <option value="8.d.3. Data Waktu Tunggu Lulusan Program Sarjana Terapan">8.d.1. Data
                                            Waktu Tunggu Lulusan Program Sarjana Terapan</option>
                                        <option value="8.d.4. Data Kesesuaian Bidang Kerja Lulusan">8.d.4. Data Kesesuaian
                                            Bidang Kerja Lulusan</option>
                                    </optgroup>
                                    <optgroup label="8.e. Kinerja Lulusan">
                                        <option value="8.e.1. Data Tempat Kerja Lulusan">8.e.1. Data Tempat Kerja Lulusan
                                        </option>
                                        <option value="8.e.2. Data Kepuasan Pengguna">8.e.2. Data Kepuasan Pengguna</option>
                                    </optgroup>
                                    <optgroup label="8.f. Luaran Penelitian dan PkM Mahasiswa">
                                        <option value="8.f.1. Data Publikasi Ilmiah Mahasiswa">8.f.1. Data Publikasi Ilmiah
                                            Mahasiswa</option>
                                        <option value="8.f.2. Data Pagelaran/pameran/presentasi/publikasi Ilmiah Mahasiswa">
                                            8.f.2. Data Pagelaran/pameran/presentasi/publikasi Ilmiah Mahasiswa</option>
                                        <option value="8.f.3. Data Karyailmiah Mahasiswa wayang disitasi">8.f.3. Data
                                            Karyailmiah Mahasiswa wayang disitasi</option>
                                        <option
                                            value="8.f.4. Data Produk/Jasa yang dihasilkan Mahasiswa yang Diadopsi oleh Industri/Masyarakat">
                                            8.f.4. Data Produk/Jasa yang dihasilkan Mahasiswa yang Diadopsi oleh
                                            Industri/Masyarakat</option>
                                        <option value="8.f.5. Data Luaran Lainnya yang dihasilkan Mahasiswa">8.f.5. Data
                                            Luaran Lainnya yang dihasilkan Mahasiswa</option>
                                    </optgroup>
                                    <option value="Daftar Program Studi di UPPS">Daftar Program Studi di UPPS</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    <div class="row text-left">
                        <div class="col-25  text-left"><label for="lname">Tanggal Upload</label></div>
                        <div class="col-75"><input type="text" readonly name="tglshow" id="tglshow"
                                placeholder="20 October 2019" style="border-style:none">
                        </div>
                        <div class="col-75" style="display:none"><input type="text" readonly name="tgl" id="tgl">
                        </div>
                    </div>
                    <div class="row text-left">
                        <div class="col-25  text-left"><label for="lname">Pilih File</label></div>
                        <div class="col-75"><input type="file" name="myfile" id="fileToUpload"  style="width:100%"> 
                        </div>
                    </div>
                    <div class="row text-left">
                        <div class="col-25 text-left"><label for="lname"></label></div>
                        <div class="col-75"><input type="submit" name="submit" value="Submit"  style="width:100%"></div>
                    </div>
                </form>
            </div>
        </div>
    </center>
    <!-- <div class="output">
    <span class="badge" id="badge">Filter</span>
        <select name="filter" id="filter" class="form-control" onchange="getData()"> 
            <option value="1">1. Tata Pamong, Tata Kelola, dan Kerjasama</option>
            <option value="2">2. Mahasiswa</option>
            <option value="3">3. Profil Dosen</option>
            <option value="4">4. Keuangan, Sarana, dan Prasarana</option>
            <option value="5">5. Pendidikan</option>
            <option value="6">6. Penelitian</option>
            <option value="7">7. Pengabdian kepada Masyarakat</option>
            <option value="8">8. Luaran dan Capaian Tridharma</option>
        </select>
        <center>
            <div class="tampung">

            </div>
        </center>
        <footer>
            <div class="container text-center">
                <div class="row">
                    <div class="col-sm-12">
                        <p>Raka Daffa Arrival & Septy Rahmadilha & Muhammad Hisyam Fadhil &copy;<?= date('Y'); ?> | <a
                                href="#">LKPS</a>.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div> -->


    </div>
</body>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


</html>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    function dropdownFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function filterFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
            } else {
            a[i].style.display = "none";
            }
        }
    }

    var dataTableTemp;
    $(document).ready(function () {
        getData();
        getDataLast();
        $('#form').on('submit', function (e) {
            e.preventDefault();
            var form = document.getElementById('form');
            var fdata = new FormData(form);
            $.ajax({
                type: "POST",
                url: 'logic.php',
                data: fdata,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    var dataResult = JSON.parse(response);

                    if (dataResult.statusCode == 200) {
                        swal("Sukses!", dataResult.Pesan, "success");
                        getData();
                        getDataLast();
                    } else if (dataResult.statusCode == 201) {
                        swal("Gagal!", dataResult.Pesan, "error");
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr);
                    console.log(ajaxOptions);
                    console.log(thrownError);
                }
            });
        });

        $('#ubahPassword').on('submit', function (e) {
            e.preventDefault();
            var form = document.getElementById('ubahPassword');
            var fdata = new FormData(form);
            $.ajax({
                type: "POST",
                url: 'updatePassword.php',
                data: fdata,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    var dataResult = JSON.parse(response);

                    if (dataResult.statusCode == 200) {
                        swal("Sukses!", dataResult.Pesan, "success");
                        getData();
                        getDataLast();
                        $('#myModal').modal('toggle');
                    } else if (dataResult.statusCode == 201) {
                        swal("Gagal!", dataResult.Pesan, "error");
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr);
                    console.log(ajaxOptions);
                    console.log(thrownError);
                }
            });
        });

        var d = new Date();
        var month = d.getMonth() + 1;
        var day = d.getDate();

        Date.prototype.monthNames = [
            "Januari", "Februari", "Maret",
            "April", "Mei", "Juni",
            "Juli", "Agustus", "September",
            "Oktober", "November", "Desember"
        ];

        Date.prototype.getMonthName = function() {
            return this.monthNames[this.getMonth()];
        };

        var output = d.getFullYear() + '-' +
            (month < 10 ? '0' : '') + month + '-' +
            (day < 10 ? '0' : '') + day;
        var newOutput = day + ' ' +
            d.getMonthName() + ' ' +
            d.getFullYear();

        $('#tgl').val(output);
        $('#tglshow').val(newOutput);
    });

    function getDataLast() {
        $.ajax({
            type: "GET",
            url: "dataLast.php",
            dataType: "html",
            success: function (response) {
                $(".coba").html(response);
            }
        });
    }

    function getData() {
        var filter = $('#filter').val();
        $.ajax({
            type: "GET",
            url: "dataTable.php?filter="+filter,
            dataType: "html",
            success: function (response) {
                $(".tampung").html(response);
            }
        });
    }

    function intentReadData() {
        window.location.href = "tampildata.php";
    }

    function intentHome() {
        window.location.href = "dosen.php";
    }

</script>
<?php
}else {
    // Redirect them to the login page
    header("Location: login.php");
}

?>