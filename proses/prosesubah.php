<?php
require '../connect.php';
require '../class/crud.php';
$crud=new crud($konek);
if ($_SERVER['REQUEST_METHOD']=='GET') {
    $id=@$_GET['id'];
    $op=@$_GET['op'];
}else if ($_SERVER['REQUEST_METHOD']=='POST'){
    $id=@$_POST['id'];
    $op=@$_POST['op'];
}
$beasiswa=@$_POST['beasiswa'];
$mahasiswa=@$_POST['mahasiswa'];
$kriteria=@$_POST['kriteria'];
$sifat=@$_POST['sifat'];
$nilai=@$_POST['nilai'];
$keterangan=@$_POST['keterangan'];
$bobot=@$_POST['bobot'];
switch ($op){
    case 'beasiswa':
        $query="UPDATE jenis_beasiswa SET namaBeasiswa='$beasiswa' WHERE id_jenisbeasiswa='$id'";
        $crud->update($query,$konek,'./?page=beasiswa');
        break;
    case 'mahasiswa':
        $query="UPDATE mahasiswa SET namaMahasiswa='$mahasiswa' WHERE id_mahasiswa='$id'";
        $crud->update($query,$konek,'./?page=mahasiswa');
        break;
    case 'kriteria':
        $cek="SELECT namaKriteria FROM kriteria WHERE namaKriteria='$kriteria'";
        $query="UPDATE kriteria SET namaKriteria='$kriteria',sifat='$sifat' WHERE id_kriteria='$id';";
        $crud->multiUpdate($cek,$query,$konek,'./?page=kriteria');
        break;
    case 'subkriteria':
        $cek="SELECT id_nilaikriteria FROM nilai_kriteria WHERE (id_kriteria='$kriteria' AND nilai ='$nilai') OR (id_kriteria='$kriteria' AND keterangan = '$keterangan')";
        $query="UPDATE nilai_kriteria SET id_kriteria='$kriteria',nilai='$nilai',keterangan='$keterangan' WHERE id_nilaikriteria='$id'";
        $crud->multiUpdate($cek,$query,$konek,'./?page=subkriteria');
        break;
    case 'bobot':
        $query=null;
        for ($i=0;$i<count($id);$i++){
            $query.="UPDATE bobot_kriteria SET bobot='$bobot[$i]' WHERE id_bobotkriteria='$id[$i]';";
        }
        $crud->update($query,$konek,'./?page=bobot');
    break;
    case 'nilai':
        $query=null;
        for ($i=0;$i<count($id);$i++){
            $query.="UPDATE nilai_mahasiswa SET id_nilaikriteria='$nilai[$i]' WHERE id_nilaimahasiswa='$id[$i]';";
        }
        $crud->update($query,$konek,'./?page=penilaian');
    break;
}