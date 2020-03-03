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
        <li><button type="button" class="but" onclick="intentReadData()">Tampil Data</button></li>
        <li><button type="button" class="but" onclick="intentHome()">Home</button></li>
    </ul>

    <div class="output">
        <span class="badge" id="badge">Filter</span>
<!--        <select name="filter" id="filter" class="form-control" onchange="getData()">-->
<!--            <option value="1">1. Tata Pamong, Tata Kelola, dan Kerjasama</option>-->
<!--            <option value="2">2. Mahasiswa</option>-->
<!--            <option value="3">3. Profil Dosen</option>-->
<!--            <option value="4">4. Keuangan, Sarana, dan Prasarana</option>-->
<!--            <option value="5">5. Pendidikan</option>-->
<!--            <option value="6">6. Penelitian</option>-->
<!--            <option value="7">7. Pengabdian kepada Masyarakat</option>-->
<!--            <option value="8">8. Luaran dan Capaian Tridharma</option>-->
<!--        </select>-->
<!--        -->
        <div>
            <button onclick="getData1()">1. Tata Pamong, Tata Kelola, dan Kerjasama</button>
            <button onclick="getData2()">2. Mahasiswa</button>
            <button onclick="getData3()">3. Profil Dosen</button>
            <button onclick="getData4()">4. Keuangan, Sarana, dan Prasarana</button>
            <button onclick="getData5()">5. Pendidikan</button>
            <button onclick="getData6()">6. Penelitian</button>
            <button onclick="getData7()">7. Pengabdian kepada Masyarakat</button>
            <button onclick="getData8()">8. Luaran dan Capaian Tridharma</button>
        </div>
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