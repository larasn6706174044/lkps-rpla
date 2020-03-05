<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LKPS - LOGIN</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<style>

</style>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<body>
    <div class="back" style="position:absolute;top:24px;left:32px;width:32px;z-index:99">
        <a href="index.php" style="cursor:pointer"><img src="aset/left-arrow.svg" style="width: 100%" alt="" ></a>
    </div>
    <div class="flex-container">
        <div class="left-container" style="flex-grow: 8;">
            <!-- <img src="aset/login_img.svg" style="width: 60%;margin-top:20%;padding-left:20%" alt="" > -->
            <div class="image-content">
                <img src="aset/login_img.svg" style="width: 100%" alt="" >

            </div>
        </div>
        <div style="flex-grow: 8">
            <div class="right-container">
                <div class="text-content">
                    <h1>Masuk</h1>
                    <div style="border:2px solid #fbf4d0; border-radius:4px; width:25%;margin-bottom:10%;margin-left:3%"></div>
                    <form action="" id="form">

                        <div class="input-text">
                            <label for="">Username</label><br>
                            <input type="text" name="username" placeholder="Enter your username" required>
                        </div>

                        <div class="input-text" style="margin-top:10%">
                            <label for="">Password</label><br>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required>
                            <span toggle="#password" class="icon-eye-open field-icon toggle-password"></span>
                        </div>
                        <input type="submit" class="button" value="LOGIN">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>

    $(".toggle-password").click(function() {

        $(this).toggleClass("icon-eye-close");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
        input.attr("type", "text");
        } else {
        input.attr("type", "password");
        }

    });
    $('#form').on('submit', function (e) {
        e.preventDefault();
        var form = document.getElementById('form');
        var fdata = new FormData(form);
        $.ajax({
            type: "POST",
            url: 'loginPros.php',
            data: fdata,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                var dataResult = JSON.parse(response);

                if (dataResult.statusCode == 200) {
                    // swal("Sukses!", dataResult.Pesan, "success");
                    window.location.replace("dosen.php");
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
</script>