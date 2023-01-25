<?php
$id=htmlspecialchars(@$_GET['id']);
$query="SELECT id_jenisbeasiswa,namaBeasiswa FROM jenis_beasiswa WHERE id_jenisbeasiswa='$id'";
$execute=$konek->query($query);
if ($execute->num_rows > 0){
    $data=$execute->fetch_array(MYSQLI_ASSOC);
}else{
    header('location:./?page=beasiswa');
}
?>
<div class="panel-top panel-top-edit">
    <b><i class="fa fa-pencil-alt"></i> Ubah data</b>
</div>
<form id="form" method="POST" action="./proses/prosesubah.php">
    <input type="hidden" name="op" value="beasiswa">
    <input type="hidden" name="id" value="<?php echo $data['id_jenisbeasiswa']; ?>">
    <div class="panel-middle">
        <div class="group-input">
            <label for="beasiswa" >Nama Beasiswa :</label>
            <input type="text" value="<?php echo $data['namaBeasiswa']; ?>" class="form-custom" required autocomplete="off" placeholder="Nama beasiswa" id="beasiswa" name="beasiswa">
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