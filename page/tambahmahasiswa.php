<div class="panel-top">
</div>
<form id="form" method="POST" action="./proses/prosestambah.php">
    <input type="hidden" name="op" value="mahasiswa">
    <div class="panel-middle">
        <div class="group-input">
            <label for="mahasiswa" ><b>Nama Mahasiswa</b></label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Nama Mahasiswa" id="mahasiswa" name="mahasiswa">
        </div>
    </div>
    <div class="panel-top">
        <h1>
            <button type="submit" class="btn btn-success rounded-pill"> Simpan</button>
            <button type="reset" id="buttonreset" class="btn btn-warning rounded-pill">Reset</button>
    </div>
</form>