<?php
$id=htmlspecialchars(@$_GET['id']);
$querylihat="SELECT id_jenisbeasiswa,bobot,id_bobotkriteria,kriteria.namaKriteria AS namaKriteria FROM bobot_kriteria INNER JOIN kriteria USING(id_kriteria) WHERE id_jenisbeasiswa='$id'";
$execute2=$konek->query($querylihat);
if ($execute2->num_rows == 0){
    header('location:./?page=bobot');
}
?>
<!-- judul -->
<div class="panel-top panel-top-edit">
    <b><i class="fa fa-pencil-alt"></i> Ubah data</b>
</div>
<form id="form" action="./proses/prosesubah.php" method="POST">
    <input type="hidden" value="bobot" name="op">
    <div class="panel-middle">
        <div class="group-input">
            <div class="group-input">
                <?php
                $query="SELECT namaBeasiswa FROM jenis_beasiswa WHERE id_jenisbeasiswa='$id'";
                $execute=$konek->query($query);
                $data=$execute->fetch_array(MYSQLI_ASSOC);
                ?>
                <div class="group-input">
                    <label for="jenisbeasiswa">Jenis Beasiswa</label>
                    <input class="form-custom" value="<?php echo $data['namaBeasiswa'];?>" disabled type="text" autocomplete="off" required name="beasiswa" id="beasiswa">
                </div>
            </div>
        </div>
        <?php
        $execute2=$konek->query($querylihat);
        while($data=$execute2->fetch_array(MYSQLI_ASSOC)){
            echo "<div class=\"group-input\">
                     <label for=\"$data[namaKriteria]\">$data[namaKriteria]</label>
                     <input type='hidden' value=\"$data[id_bobotkriteria]\" name=\"id[]\">
                     <input class=\"form-custom\" value=\"$data[bobot]\" type=\"text\" autocomplete=\"off\" required name=\"bobot[]\" id=\"$data[namaKriteria]\" placeholder=\"Nilai $data[namaKriteria]\">
                   </div>
                ";
        }
        ?>
    </div>
    <div class="panel-top">
        <div class="panel-top">
        <h1>
            <button type="submit" class="btn btn-success rounded-pill"> Simpan</button>
            <button type="reset" id="buttonreset" class="btn btn-warning rounded-pill">Reset</button>
        </div>
    </div>
</form>