
<!-- judul -->
<div class="panel-top">
</div>
<form id="form" action="./proses/prosestambah.php" method="POST">
    <input type="hidden" value="bobot" name="op">
    <div class="panel-middle">
        <div class="group-input">
            <label for="beasiswa"><b>Jenis Beasiswa</b></label>
            <select class="form-custom" required name="beasiswa" id="beasiswa">
                <option selected disabled>--Pilih Jenis Beasiswa--</option>
                <?php
                $query="SELECT * FROM jenis_beasiswa";
                $execute=$konek->query($query);
                if ($execute->num_rows > 0){
                    while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                        echo "<option value=\"$data[id_jenisbeasiswa]\">$data[namaBeasiswa]</option>";
                    }
                }else {
                    echo "<option value=\"\">Belum ada Jenis Beasiswa</option>";
                }
                ?>
            </select>
        </div>
        <?php
$listWeight=array(
    array("nama"=>"0","nilai"=>0),
    array("nama"=>"0.25","nilai"=>0.25),
    array("nama"=>"0.5","nilai"=>0.5),
    array("nama"=>"0.75","nilai"=>0.75),
    array("nama"=>"1","nilai"=>1),
);
        $query="SELECT * FROM kriteria";
        $execute=$konek->query($query);
        if ($execute->num_rows > 0){
            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                echo "<div class=\"group-input\">
                        <label for=\"$data[namaKriteria]\"><b>$data[namaKriteria]</b></label>
                        <input type='hidden' value=$data[id_kriteria] name='kriteria[]'>
                            <select class=\"form-custom\" required name=\"bobot[]\" id=\"$data[namaKriteria]\">
                            <option selected disabled>--Pilih Bobot $data[namaKriteria]--</option>";
                            foreach ($listWeight as $key) {
                                echo "<option value=\"$key[nilai]\">$key[nama]</option>";
                            }
                echo "      </select>
                      </div>
                ";
            }
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