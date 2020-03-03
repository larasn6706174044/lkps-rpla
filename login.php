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
.button {
    font-weight: 500;
    letter-spacing: 0.05rem;
    color: #ffffff;
    background: #008FD7;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    padding: 12px;
    width: 55%;
    margin-top: 15px;
}

</style>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<body>
    <div class="flex-container">
        <div class="left-container" style="flex-grow: 8">
            <img src="aset/happy 1.png" style="width: 520px" alt="">
        </div>
        <div style="flex-grow: 8">
            <div class="right-container">
                <div class="text-content">
                    <h1>Masuk</h1>
                    <form action="" id="form">

                        <div class="input-text">
                            <label for="">Username</label><br>
                            <input type="text" name="username" placeholder="Enter your username" required>
                        </div>

                        <div class="input-text">
                            <label for="">Password</label><br>
                            <input type="password" name="password" placeholder="Enter your password" required>
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