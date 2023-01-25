<?php
$a=htmlspecialchars(@$_GET['a']);
$b=htmlspecialchars(@$_GET['b']);
$querylihat="SELECT id_nilaimahasiswa,kriteria.namaKriteria AS namaKriteria,nilai_kriteria.keterangan AS keterangan FROM nilai_mahasiswa
INNER JOIN kriteria USING (id_kriteria)
INNER JOIN nilai_kriteria USING (id_nilaikriteria)
WHERE nilai_mahasiswa.id_mahasiswa='$a' AND nilai_mahasiswa.id_jenisbeasiswa='$b'";
$execute2=$konek->query($querylihat);
if ($execute2->num_rows == 0){
    header('location:./?page=penilaian');
}
?>
<!-- judul -->
<div class="panel-top">
    <b class="text-green">Detail data</b>
</div>
<form>
    <div class="panel-middle">
        <div class="group-input">
            <?php
            $query="SELECT namaMahasiswa FROM mahasiswa WHERE id_mahasiswa='$a'";
            $execute=$konek->query($query);
            $data=$execute->fetch_array(MYSQLI_ASSOC);
            ?>
            <div class="group-input">
                <label for="jenisbeasiswa">Nama Mahasiswa</label>
                <input class="form-custom" value="<?php echo $data['namaMahasiswa'];?>" disabled type="text" autocomplete="off" required name="jenisbeasiswa" id="jenisbeasiswa">
            </div>
        </div>
        <div class="group-input">
            <?php
            $query="SELECT namaBeasiswa FROM jenis_beasiswa WHERE id_jenisbeasiswa='$b'";
            $execute=$konek->query($query);
            $data=$execute->fetch_array(MYSQLI_ASSOC);
            ?>
            <div class="group-input">
                <label for="jenisbeasiswa">Jenis Beasiswa</label>
                <input class="form-custom" value="<?php echo $data['namaBeasiswa'];?>" disabled type="text" autocomplete="off" required name="jenisbeasiswa" id="jenisbeasiswa" placeholder="jenisbeasiswa">
            </div>
        </div>
        <?php
        $execute2=$konek->query($querylihat);
        while($data2=$execute2->fetch_array(MYSQLI_ASSOC)){
            echo "<div class=\"group-input\">
                        <label for=\"\">$data2[namaKriteria]</label>
                        <input class=\"form-custom\" value=\"$data2[keterangan]\" disabled type=\"text\" autocomplete=\"off\" required name=\"bobot[]\">
                      </div>
                ";
        }
        ?>
    </div>
    <div class="panel-bottom">
        <button type="submit" class="btn btn-green">Simpan</button>
        <button type="reset" class="btn btn-second">Reset</button>
    </div>
</form>