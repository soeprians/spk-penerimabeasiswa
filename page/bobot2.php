<?php
require './connect.php';
?>
<!-- judul -->

<div class="pagetitle">
      <h1>Bobot Kriteria</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Halaman</li>
          <li class="breadcrumb-item active">Bobot Kriteria</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

<h5 class="card-title">Bobot Kriteria</h5>
<div class="panel">
    <div class="panel-middle" id="judul">
        <!-- <img src="asset/image/bobot.svg">
        <div id="judul-text">
            <h2 class="text-green">BOBOT</h2>
            Halamanan Bobot Kriteria
        </div> -->
    </div>
</div>
<!-- judul -->
<div class="row">
    <div class="col-4">
        <div class="panel">
            <?php
            if (@htmlspecialchars($_GET['aksi'])=='ubah'){
                include 'ubahbobot2.php';
            }elseif (@htmlspecialchars($_GET['aksi'])=='lihat'){
                include 'lihatbobot.php';
            }else{
                include 'tambahbobot2.php';
            }
            ?>
        </div>
    </div>
    <div class="col-8">
        <div class="panel">
            <div class="panel-top">
                <b class="text-green">Daftar Bobot</b>
            </div>
            <div class="panel-middle">
                <div class="table-responsive">
                    <table>
                        <thead><tr><th>No</th><th>Nama Beasiswa</th><th>Aksi</th></tr></thead>
                        <tbody>
                        <?php
                        $query="SELECT bobot_kriteria.id_jenisbeasiswa AS idbeasiswabobot,jenis_beasiswa.namaBeasiswa AS namaBeasiswa FROM bobot_kriteria INNER JOIN jenis_beasiswa WHERE bobot_kriteria.id_jenisbeasiswa=jenis_beasiswa.id_jenisbeasiswa GROUP BY idbeasiswabobot ORDER BY idbeasiswabobot ASC";
                        $execute=$konek->query($query);
                        if ($execute->num_rows > 0){
                            $no=1;
                            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                echo"
                                <tr id='data'>
                                    <td>$no</td>
                                    <td>$data[namaBeasiswa]</td>
                                    <td>
                                    <div class='norebuttom'>
                                    <a class=\"btn btn-green\" href='./?page=bobot&aksi=lihat&id=".$data['idbeasiswabobot']."'><i class='fa fa-eye'></i></a>
                                    <a class=\"btn btn-light-green\" href='./?page=bobot&aksi=ubah&id=".$data['idbeasiswabobot']."'><i class='fa fa-pencil-alt'></i></a>
                                    <a class=\"btn btn-yellow\" data-a=".$data['namaBeasiswa']." id='hapus' href='./proses/proseshapus.php/?op=bobot&id=".$data['idbeasiswabobot']."'><i class='fa fa-trash-alt'></i></a></td>
                                </div></tr>";
                                $no++;
                            }
                        }else{
                            echo "<tr><td  class='text-center text-green' colspan='4'><b>Kosong</b></td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-bottom"></div>
        </div>
    </div>
</div>