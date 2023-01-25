<?php

/**
 * Created by PhpStorm.
 * User: dimas
 * Date: 23/06/2018
 * Time: 10:50
 */
class saw {

    private $konek;
    private $idCookie;
    public $simpanNormalisasi=array();
    public function setconfig($konek,$idCookie){
        $this->konek=$konek;
        $this->idCookie=$idCookie;
    }
    public function getConnect(){
       return $this->konek;
    }
    //mendapatkan kriteria
    public function getKriteria(){
        $data=array();
        $querykriteria="SELECT namaKriteria FROM kriteria";//query tabel kriteria
        $execute=$this->getConnect()->query($querykriteria);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,$row['namaKriteria']);
        }
        return $data;
    }
    //mendapatkan alternative
    public function getAlternative(){
        $data=array();
        $queryAlternative="SELECT mahasiswa.namaMahasiswa AS namaMahasiswa,id_mahasiswa FROM nilai_mahasiswa INNER JOIN mahasiswa USING(id_mahasiswa) WHERE id_jenisbeasiswa='$this->idCookie' GROUP BY id_mahasiswa ";
        $execute=$this->getConnect()->query($queryAlternative);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,array("namaMahasiswa"=>$row['namaMahasiswa'],"id_mahasiswa"=>$row['id_mahasiswa']));
        }
        return $data;
    }
    public function getNilaiMatriks($id_mahasiswa){
        $data=array();
        $queryGetNilai="SELECT nilai_kriteria.nilai AS nilai,kriteria.sifat AS sifat,nilai_mahasiswa.id_kriteria AS id_kriteria FROM nilai_mahasiswa JOIN kriteria ON kriteria.id_kriteria=nilai_mahasiswa.id_kriteria JOIN nilai_kriteria ON nilai_kriteria.id_nilaikriteria=nilai_mahasiswa.id_nilaikriteria WHERE (id_jenisbeasiswa='$this->idCookie' AND id_mahasiswa='$id_mahasiswa')";
        $execute=$this->getConnect()->query($queryGetNilai);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,array(
                "nilai"=>$row['nilai'],
                "sifat"=>$row['sifat'],
                "id_kriteria"=>$row['id_kriteria']
            ));
        }
        return $data;
    }
    public function getArrayNilai($id_kriteria){
        $data=array();
        $queryGetArrayNilai="SELECT nilai_kriteria.nilai AS nilai FROM nilai_mahasiswa INNER JOIN nilai_kriteria ON nilai_mahasiswa.id_nilaikriteria=nilai_kriteria.id_nilaikriteria WHERE nilai_mahasiswa.id_kriteria='$id_kriteria' AND nilai_mahasiswa.id_jenisbeasiswa='$this->idCookie'";
        $execute=$this->getConnect()->query($queryGetArrayNilai);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,$row['nilai']);
        }
        return $data;
    }
    //rumus normalisasai
    public function normalisasi($array,$sifat,$nilai){
        if ($sifat=='Benefit'){
            $result=$nilai/max($array);
        }elseif ($sifat=='Cost'){
            $result=min($array)/$nilai;
        }
        return round($result,3);
    }
    //mendapatkan bobot kriteria
    public function getBobot($id_kriteria){
        $queryBobot="SELECT bobot FROM bobot_kriteria WHERE id_jenisbeasiswa='$this->idCookie' AND id_kriteria='$id_kriteria' ";
        $row=$this->getConnect()->query($queryBobot)->fetch_array(MYSQLI_ASSOC);
        return $row['bobot'];
    }
    //meyimpan hasil perhitungan
    public function simpanHasil($id_mahasiswa,$hasil){
        $queryCek="SELECT hasil FROM hasil WHERE id_mahasiswa='$id_mahasiswa' AND id_jenisbeasiswa='$this->idCookie'";
        $execute=$this->getConnect()->query($queryCek);
        if ($execute->num_rows > 0) {
            $querySimpan="UPDATE hasil SET hasil='$hasil' WHERE id_mahasiswa='$id_mahasiswa' AND id_jenisbeasiswa='$this->idCookie'";
        }else{
            $querySimpan="INSERT INTO hasil(hasil,id_mahasiswa,id_jenisbeasiswa) VALUES ('$hasil','$id_mahasiswa','$this->idCookie')";
        }
        $execute=$this->getConnect()->query($querySimpan);

    }
    //Kmencari kesimpulan
    public function getHasil(){
    $queryHasil     =   "SELECT hasil.hasil AS hasil,jenis_beasiswa.namaBeasiswa,mahasiswa.namaMahasiswa AS namaMahasiswa FROM hasil JOIN jenis_beasiswa ON jenis_beasiswa.id_jenisbeasiswa=hasil.id_jenisbeasiswa JOIN mahasiswa ON mahasiswa.id_mahasiswa=hasil.id_mahasiswa WHERE hasil.hasil=(SELECT MAX(hasil) FROM hasil WHERE id_jenisbeasiswa='$this->idCookie')";
    $execute        =   $this->getConnect()->query($queryHasil)->fetch_array(MYSQLI_ASSOC);
    echo "<p>Jadi rekomendasi pemilihan mahasiswa <i>$execute[namaBeasiswa]</i> jatuh pada <i>$execute[namaMahasiswa]</i> dengan Nilai <b>".round($execute['hasil'],3)."</b></p>";
    }

}