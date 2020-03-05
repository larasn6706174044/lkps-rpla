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
        <title>Tampil Data</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/file.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">

        <style>
            body{
                font-family: 'Open Sans', 'Roboto'!important;
            }

            footer {
                position: absolute;
                bottom: 0;
                left: 0;
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
                width: 80%;
                float: right;
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
                background-image: url('aset/search.png');
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

            .buttonfilter {
                width: 250px;
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 16px 32px;
                text-align: left;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
            }

            .buttonfilterHov {
                background-color: white;
                color: black;
                border: 2px solid #008CBA;
            }

            .buttonfilterHov:hover {
                background-color: #008CBA;
                color: white;
            }
        </style>
    </head>
    <body id="tampil-page">
    <?php
        include_once('template/header.php');
    ?>

    <div class="tampilData">
        <!--    membuat menu berada disebelah kiri  -->
        <div class="output">
            <button class="buttonfilter buttonfilterHov" onclick="getData1()">1. Tata Pamong, Tata Kelola, dan Kerjasama</button>
            <button class="buttonfilter buttonfilterHov" onclick="getData2()">2. Mahasiswa</button>
            <button class="buttonfilter buttonfilterHov" onclick="getData3()">3. Profil Dosen</button>
            <button class="buttonfilter buttonfilterHov" onclick="getData4()">4. Keuangan, Sarana, dan Prasarana</button>
            <button class="buttonfilter buttonfilterHov" onclick="getData5()">5. Pendidikan</button>
            <button class="buttonfilter buttonfilterHov" onclick="getData6()">6. Penelitian</button>
            <button class="buttonfilter buttonfilterHov" onclick="getData7()">7. Pengabdian kepada Masyarakat</button>
            <button class="buttonfilter buttonfilterHov" onclick="getData8()">8. Luaran dan Capaian Tridharma</button>
        </div>
        <!--    batas sebelah kiri -->

        <!--    tampilan dokumen sebelah kanan-->

        <div class="tampung">

        </div>
    </div>
<!--    batas tampil kanan-->
    <footer>
            <div class="container text-center footer">
                <div class="row">
                    <div class="col-lg-12">
                    <p>Raka Daffa Arrival & Septy Rahmadilha & Muhammad Hisyam Fadhil &copy;<?= date('Y'); ?> | <a href="#">LKPS</a>.</p>
                    </div>
                </div>
            </div>
    </footer>

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

        // function getData() {
        //     var filter = $('#filter').val();
        //     $.ajax({
        //         type: "GET",
        //         url: "dataTable.php?filter="+filter,
        //         dataType: "html",
        //         success: function (response) {
        //             $(".tampung").html(response);
        //
        //         }
        //     });
        // }

        $.ajax({
            type: "GET",
            url: "dataTable.php?filter="+1,
            dataType: "html",
            success: function (response) {
                $(".tampung").html(response);

            }
        });

        function getData1() {
            // var filter = $('#btnFilter').val();
            // console.log(filter);
            $.ajax({
                type: "GET",
                url: "dataTable.php?filter="+1,
                dataType: "html",
                success: function (response) {
                    $(".tampung").html(response);

                }
            });
        }

        function getData2() {
            // var filter = $('#btnFilter').val();
            // console.log(filter);
            $.ajax({
                type: "GET",
                url: "dataTable.php?filter="+2,
                dataType: "html",
                success: function (response) {
                    $(".tampung").html(response);

                }
            });
        }

        function getData3() {
            // var filter = $('#btnFilter').val();
            // console.log(filter);
            $.ajax({
                type: "GET",
                url: "dataTable.php?filter="+3,
                dataType: "html",
                success: function (response) {
                    $(".tampung").html(response);

                }
            });
        }

        function getData4() {
            // var filter = $('#btnFilter').val();
            // console.log(filter);
            $.ajax({
                type: "GET",
                url: "dataTable.php?filter="+4,
                dataType: "html",
                success: function (response) {
                    $(".tampung").html(response);

                }
            });
        }

        function getData5() {
            // var filter = $('#btnFilter').val();
            // console.log(filter);
            $.ajax({
                type: "GET",
                url: "dataTable.php?filter="+5,
                dataType: "html",
                success: function (response) {
                    $(".tampung").html(response);

                }
            });
        }

        function getData6() {
            // var filter = $('#btnFilter').val();
            // console.log(filter);
            $.ajax({
                type: "GET",
                url: "dataTable.php?filter="+6,
                dataType: "html",
                success: function (response) {
                    $(".tampung").html(response);

                }
            });
        }

        function getData7() {
            // var filter = $('#btnFilter').val();
            // console.log(filter);
            $.ajax({
                type: "GET",
                url: "dataTable.php?filter="+7,
                dataType: "html",
                success: function (response) {
                    $(".tampung").html(response);

                }
            });
        }

        function getData8() {
            // var filter = $('#btnFilter').val();
            // console.log(filter);
            $.ajax({
                type: "GET",
                url: "dataTable.php?filter="+8,
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