<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LKPS - LOGIN</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="flex-container">
        <div class="left-container" style="flex-grow: 8">
            <img src="aset/index_img.svg" style="width:90%;margin-left:10%" alt="">
        </div>
        <div style="flex-grow: 8">
            <div class="right-container">
                <div class="text-content">
                    <div>L K P S</div>
                    <p>Laporan Kinerja Program Studi <br> D3 Rekayasa Perangkat Lunak Aplikasi <br> Telkom University
                </div>
                <p class="as">Masuk sebagai...</p>
                <div class="button-container">
                    <button onclick="window.location.href='login.php'">DOSEN</button>
                </div>
                <br>
                <p class="as">Lihat Hasil Kuesioner Alumni</p>
                <div class="button-container">
                    <button onclick="window.location.href='siswa.php'" class="mahasiswa">Hasil Kuesioner</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>