<!-- judul -->

<div class="pagetitle">
      <h1>Jenis Beasiswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Halaman</li>
          <li class="breadcrumb-item active">Jenis Beasiswa</li>
        </ol>
      </nav>
</div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

<!-- <div class="card" style="width: 12rem;">
    <div class="card-body">
    <h5 class="card-title">Jenis Beasiswa</h5>
    </div>
</div> -->

<div class="card">
    <div class="card-body">
        <div class="panel">
            <h2></h2>
                <div class="panel-middle" id="judul">
                    <!-- <div id="judul-text">
                        <h2 class="text-green">Beasiswa</h2>
                        Halamanan Administrator Beasiswa
                    </div> -->
                </div>
            </div>
            <!-- judul -->
            <div class="row">
                <div class="col-4">
                    <div class="panel">
                        <?php
                        if (@htmlspecialchars($_GET['aksi'])=='ubah'){
                            include 'ubahbeasiswa.php';
                        }else{
                            include 'tambahbeasiswa.php';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-8">
                    <div class="panel">
                        <div class="panel-top">
                            <b class="text-green">Daftar Beasiswa</b>
                        </div>
                        <div class="panel-middle">
                            <div class="table table-striped">
                                <table>
                                    <thead><tr><th>No</th><th>Nama</th><th>Aksi</th></tr></thead>
                                    <tbody>
                                    <?php
                                    $query="SELECT * FROM jenis_beasiswa";
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
                                                <a class=\"btn btn-success rounded-pill\" href='./?page=beasiswa&aksi=ubah&id=".$data['id_jenisbeasiswa']."'></a>
                                                <a class=\"btn btn-yellow\" data-a=".$data['namaBeasiswa']." id='hapus' href='./proses/proseshapus.php/?op=beasiswa&id=".$data['id_jenisbeasiswa']."'><i class='fa fa-trash-alt'></i></a></td>
                                            </div></tr>";
                                            $no++;
                                        }
                                    }else{
                                        echo "<tr><td  class='text-center text-green' colspan='3'>Kosong</td></tr>";
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
    </div>
</div>
</div>
</div>
</section>