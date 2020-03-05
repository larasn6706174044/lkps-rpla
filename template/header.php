<style>
  .topnav {
        overflow: hidden;
        /* background-color: #314152; */
        padding:0px 36px;
        
        }

        .topnav button, .topnav a {
        float: right;
        color: #314152;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        transition:0.3s
        }

        .topnav a:hover, .but:hover:not(.aktif) {
            border-bottom: 2px solid #F7E9A0;

        }

        .but.aktif{
            border-bottom: 2px solid #F7E9A0;
        }

        .topnav a.active {
            border-bottom: 2px solid #F7E9A0;
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
</style>

<div class="topnav">
  <a href="logout.php">Logout</a>
  <button type="button" class="but" data-toggle="modal" data-target="#myModal">Ubah Password</button>
  <a  href="tampildata.php" id="tampil">Lihat Data</a>
  <a href="dosen.php" id="tambah">Tambah Data</a>
  <a href="#" style="position:absolute;left:36px;border-bottom: 2px solid #F7E9A0;">Selamat datang,
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

