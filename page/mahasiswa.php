<div class="pagetitle">
      <h1>Daftar Mahasiswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Halaman</li>
          <li class="breadcrumb-item active">Daftar Mahasiswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

<section class="section">
      <div class="row align-items-top">
        <div class="col-lg-4">

          <!-- Default Card -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Mahasiswa</h5>
              <div class="col-7">
                    <div class="panel">
                        <?php
                        if (@htmlspecialchars($_GET['aksi'])=='ubah'){
                            include 'ubahmahasiswa.php';
                        }else{
                            include 'tambahmahasiswa.php';
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
                  <h5 class="card-title">Daftar Mahasiswa</h5>
                  <div class="col-13">
                    <div class="panel">
                        <div class="panel-middle">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Aksi</th></tr>
                                      </thead>
                                    <tbody>
                                    <?php
                                    $query="SELECT * FROM mahasiswa";
                                    $execute=$konek->query($query);
                                    if ($execute->num_rows > 0){
                                        $no=1;
                                        while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                            echo"
                                            <tr id='data'>
                                                <th>$no</th>
                                                <td>$data[namaMahasiswa]</td>
                                                <td>
                                                <div class='norebuttom'>
                                                <a class=\"btn btn-primary\" href='./?page=mahasiswa&aksi=ubah&id=".$data['id_mahasiswa']."'>Ubah</i></a>
                                                <a class=\"btn btn-danger\" data-a=".$data['namaMahasiswa']." id='hapus' href='./proses/proseshapus.php/?op=mahasiswa&id=".$data['id_mahasiswa']."'>Hapus</i></a>
                                                </div></td>
                                            </tr>";
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