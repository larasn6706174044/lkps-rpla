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
    <style>
        .but {
            display: inline-block;
            color: #000000;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            transition: 0.3s;
            font-size: 14px;
            font-family: Malgun Gothic;
            background-color: Transparent;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            overflow: hidden;
            outline: none;
        }

        .but:hover:not(.aktif) {
            border-bottom: 2px solid #828282;
        }

        .but.aktif {
            border-bottom: 2px solid #008FD7;
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
            width: 100%;
            padding: 5%;
            float: left;
        }

        #filter{
            width:400px;
            margin-left:16px;
        }

        #badge{
            margin-left:16px;
            background:#008FD7;
        }
    </style>
</head>

<body>
    <ul class="nav">
        <li><a href="logout.php">Logout</a></li>
        <li><button type="button" class="but" data-toggle="modal" data-target="#myModal">Ubah Password</button></li>
    </ul>
    <div class="header">
        <div class="header_left">
            <p><b style="font-size: 64px;">LKPS</b><br>Laporan Kinerja Program Sudi <br><b style="font-size: 12px;">D3
                    Rekayasa Perangkat Lunak Aplikasi <br>Telkom University
                </b><br><b style="font-size: 12px;">Selamat Datang <br>
                    <?php 
                        if($_SESSION['kelamin']=='L') {
                                echo "Pak ".$_SESSION['nama_dosen'];
                                }

                                else if($_SESSION['kelamin']=='P') {
                                    echo "Ibu ".$_SESSION['nama_dosen'];
                                }

                                ?>
                </b></p>
            <table>
                <td><img src="aset/telu.png" /></td>
                <td><img src="aset/if.png" /></td>
            </table>
        </div>
        <div class="header_right"><img src="aset/imageofheader.png"></div>
    </div>
    <div class="coba"></div>
    <center>
        <div class="bg">
            <div class="container">
                <form action="logic.php" id="form" method="POST" enctype='multipart/form-data'>
                    <div class="row">
                        <div class="col-25"><label for="lname">Jenis Berkas</label></div>
                        <div class="col-75">
                            <select name="jenis" id="jenis">
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
                    <div class="row">
                        <div class="col-25"><label for="lname">Tanggal Upload</label></div>
                        <div class="col-75"><input type="text" readonly name="tgl" id="tgl"
                                placeholder="20 October 2019">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25"><label for="lname">Browse File</label></div>
                        <div class="col-75"><input type="file" name="myfile" id="fileToUpload">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25"><label for="lname"></label></div>
                        <div class="col-75"><input type="submit" name="submit" value="Submit"></div>
                    </div>
                </form>
            </div>
        </div>
    </center>
    <div class="output">
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
    </div>

    <!-- footer -->

    <!-- footer -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ubah Password</h4>
                </div>
                <div class="modal-body">
                    <form action="updatePassword.php" method="POST" id="ubahPassword">
                    Password Lama :<input type="password" class="form-control" name="password_lama" placeholder="Password Lama">
                    Password Baru :<input type="password" class="form-control" name="password_baru" placeholder="Password Baru">
                        <input type="submit" value="Simpan" name="simpan">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    </div>
</body>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</html>
<script>
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
        var output = d.getFullYear() + '-' +
            (month < 10 ? '0' : '') + month + '-' +
            (day < 10 ? '0' : '') + day;
        $('#tgl').val(output);
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
</script>
<?php
}else {
    // Redirect them to the login page
    header("Location: login.php");
}

?>