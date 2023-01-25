<div class="panel-top">
</div>
<form id="form" method="POST" action="./proses/prosestambah.php">
    <input type="hidden" name="op" value="kriteria">
    <div class="panel-middle">
        <div class="group-input">
            <label for="kriteria" ><b>Nama kriteria :</b></label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Nama kriteria" id="kriteria" name="kriteria">
        </div>
        <p>
        <div class="group-input">
            <label for="sifat" ><b>Sifat kriteria :</b></label>
            <select class="form-custom" required id="sifat" name="sifat">
                <option selected disabled>-- Pilih Sifat Kriteria --</option>
                <option value="Benefit">Benefit</option>
                <option value="Cost">Cost</option>
            </select>
        </div>
    </div>
    <div class="panel-top">
        <div class="panel-top">
        <h1>
            <button type="submit" class="btn btn-success rounded-pill"> Simpan</button>
            <button type="reset" id="buttonreset" class="btn btn-warning rounded-pill">Reset</button>
        </div>
    </div>
</form>