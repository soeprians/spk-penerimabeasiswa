
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
        $query="SELECT * FROM kriteria";
        $execute=$konek->query($query);
        if ($execute->num_rows > 0){
            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                echo "<div class=\"group-input\">
                        <label for=\"$data[namaKriteria]\">$data[namaKriteria]</label>
                        <input type='hidden' value=$data[id_kriteria] name='kriteria[]'>
                            <input class=\"form-custom\" type=\"text\" autocomplete=\"off\" required name=\"bobot[]\" id=\"$data[namaKriteria]\" placeholder=\"Nilai $data[namaKriteria]\">
                      </div>
                ";
            }
        }
        ?>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" id="buttonreset" class="btn btn-second">Reset</button>
    </div>
</form>