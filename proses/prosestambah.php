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
    case 'beasiswa'://tambah data beasiswa
        $query="INSERT INTO jenis_beasiswa (namaBeasiswa) VALUES ('$beasiswa')";
        $crud->addData($query,$konek);
    break;
    case 'mahasiswa': //tambah data mahasiswa
        $query="INSERT INTO mahasiswa (namaMahasiswa) VALUES ('$mahasiswa')";
        $crud->addData($query,$konek);
    break;
    case 'kriteria'://tambah data kriteria
        $cek="SELECT namaKriteria FROM kriteria WHERE namaKriteria='$kriteria'";
        $query=null;
        $query="INSERT INTO kriteria (namaKriteria,sifat) VALUES ('$kriteria','$sifat')";
        $crud->multiAddData($cek,$query,$konek);
    break;
    case 'subkriteria'://tambah data sub kriteria
        $cek="SELECT id_nilaikriteria FROM nilai_kriteria WHERE (id_kriteria='$kriteria' AND nilai ='$nilai') OR (id_kriteria='$kriteria' AND keterangan = '$keterangan')";
        $query=null;
        $query.="INSERT INTO nilai_kriteria (id_kriteria,nilai,keterangan) VALUES ('$kriteria','$nilai','$keterangan');";
        $crud->multiAddData($cek,$query,$konek);
    break;
    case 'bobot'://tambah data bobot
        $cek="SELECT id_bobotkriteria FROM bobot_kriteria WHERE id_jenisbeasiswa='$beasiswa'";
        $query=null;
        for ($i=0;$i<count($kriteria);$i++){
            $query.="INSERT INTO bobot_kriteria (id_jenisbeasiswa,id_kriteria,bobot) VALUES ('$beasiswa','$kriteria[$i]','$bobot[$i]');";
        }
        $crud->multiAddData($cek,$query,$konek);
    break;
    case 'nilai'://tambah data nilai
        $cek="SELECT id_mahasiswa FROM nilai_mahasiswa WHERE id_mahasiswa='$mahasiswa'";
        $query=null;
        for ($i=0;$i<count($nilai);$i++){
            $query.="INSERT INTO nilai_mahasiswa (id_mahasiswa,id_jenisbeasiswa,id_kriteria,id_nilaikriteria) VALUES ('$mahasiswa','$beasiswa','$kriteria[$i]','$nilai[$i]');";
        }
        $crud->multiAddData($cek,$query,$konek);
    break;
}