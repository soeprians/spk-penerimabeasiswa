<!-- judul -->

<div class="pagetitle">
      <h1>Daftar Kriteria</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Halaman</li>
          <li class="breadcrumb-item active">Daftar Kriteria</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

<h5 class="card-title">Daftar Kriteria</h5>
<div class="panel">
    <div class="panel-middle" id="judul">
        <!-- <img src="asset/image/kriteria.svg">
        <div id="judul-text">
            <h2 class="text-green">KRITERIA</h2>
            Halamanan Kriteria
        </div> -->
    </div>
</div>
<!-- judul -->
<div class="row">
    <div class="col-4">
        <div class="panel">
            <?php
            if (@htmlspecialchars($_GET['aksi'])=='ubah'){
                include 'ubahkriteria.php';
            }else{
                include 'tambahkriteria.php';
            }
            ?>
        </div>
    </div>
    <div class="col-8">
        <div class="panel">
            <div class="panel-top">
                <b class="text-green">Daftar Kriteria</b>
            </div>
            <div class="panel-middle">
                <div class="table-responsive">
                    <table>
                        <thead><tr><th>No</th><th>Nama</th><th>Sifat</th><th>Aksi</th></tr></thead>
                        <tbody>
                        <?php
                        $query="SELECT * FROM kriteria";
                        $execute=$konek->query($query);
                        if ($execute->num_rows > 0){
                            $no=1;
                            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                echo"
                                <tr id='data'>
                                    <td>$no</td>
                                    <td>$data[namaKriteria]</td>
                                    <td>$data[sifat]</td>
                                    <td><div class='norebuttom'>
                                    <a class=\"btn btn-light-green\" href='./?page=kriteria&aksi=ubah&id=".$data['id_kriteria']."'><i class='fa fa-pencil-alt'></i></a>
                                    <a class=\"btn btn-yellow\" data-a=".$data['namaKriteria']." id='hapus' href='./proses/proseshapus.php/?op=kriteria&id=".$data['id_kriteria']."'><i class='fa fa-trash-alt'></i></a></td>
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