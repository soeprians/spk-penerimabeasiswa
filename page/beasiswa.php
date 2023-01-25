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
      <div class="row align-items-top">
        <div class="col-lg-4">

          <!-- Default Card -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Beasiswa</h5>
              <div class="col-7">
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
            </div>
          </div><!-- End Default Card -->

          

        </div>

        <div class="col-lg-7">

          <!-- Card with an image on left -->
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md">
                <div class="card-body">
                  <h5 class="card-title">Daftar Beasiswa</h5>
                  <div class="col-12">
                    <div class="panel">
                        <div class="panel-middle">
                            <div class="table table-striped">
                                <table class="table">
                                    <thead><tr><th>No</th><th>Nama Beasiswa</th><th>Aksi</th></tr></thead>
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
                                                <a class=\"btn btn-primary\" href='./?page=beasiswa&aksi=ubah&id=".$data['id_jenisbeasiswa']."'>Ubah</a>
                                                <a class=\"btn btn-danger\" data-a=".$data['namaBeasiswa']." id='hapus' href='./proses/proseshapus.php/?op=beasiswa&id=".$data['id_jenisbeasiswa']."'>Hapus</a></td>
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
          </div><!-- End Card with an image on left -->
        </div>

      </div>
    </section>