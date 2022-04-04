<?php
// calling other file
include_once 'lib/Database.php';
include_once 'lib/Session.php';

class Pernyataan{
    private $db_conn;
    public $kode;
    public $penyataan;
    public $arrSkala = array(0,1,2,3,4,5);

    // db connection
    public function __construct($db){
        $this->db_conn = $db;
    }

    // show data
    public function showAll(){
        $query = "SELECT kode_pernyataan, pernyataan from pernyataan ";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // search
    public function search($data){
        $key = $data['key'];
        
        $query = "SELECT kode_pernyataan, pernyataan from pernyataan 
                where kode_pernyataan = :kode";
        $stmt = $this->db_conn->prepare($query);
        $stmt->bindValue(':kode', $key);
        $stmt->execute();
        return $stmt;
    }

    // cek data
    public function cekData($kode){
        $query = "SELECT kode_pernyataan from pernyataan where kode_pernyataan = :kode";
        $stmt = $this->db_conn->prepare($query);
        $stmt->bindValue(':kode', $kode);
        $stmt->execute();
    }

    // insert
    public function insert($data){
        $kode = $data['kode'];
        $pernyataan = $data['pernyataan'];

        $cek = $this->cekData($kode);
        if($kode == "" || $pernyataan == ""){
            echo "<script> alert('Tidak Ada Data Yang Ditambahkan')</script>";
        }elseif($kode == $cek){
            echo "<script> alert('Kode Pernyataan Sudah Ada')</script>";
        }else{
            $query = "INSERT into pernyataan(kode_pernyataan, pernyataan) values(:kode, :pernyataan)";
            $stmt = $this->db_conn->prepare($query);
            $stmt->bindValue(':kode',$kode);
            $stmt->bindValue(':pernyataan',$pernyataan);
            $result = $stmt->execute();

            if($result){
                echo "<script> alert('Data Berhasi Ditambah')</script>";
            }else{
                echo "<script> alert('Data Gagal Ditambah')</script>";
            }
        }
        header('Location:dataPernyataan.php');
    }

    // get kode
    public function getCode(){
        $query = "SELECT kode_pernyataan from pernyataan";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // update
    public function update($data){
        $kode = $data['kode'];
        $pernyataan = $data['pernyataan'];

        if($pernyataan == ""){
            echo "<script> alert('Tidak Ada Data Yang Diubah')</script>";
        }else{
            $query = "UPDATE pernyataan set pernyataan = :pernyataan where kode_pernyataan = :kode";
            $stmt = $this->db_conn->prepare($query);
            $stmt->bindValue(':kode', $kode);
            $stmt->bindValue(':pernyataan', $pernyataan);            
            $result = $stmt->execute();

            if($result){
                echo "<script> alert('Data Berhasil Diubah')</script>";
                header('Location:datapernyataan.php');
            }else{
                echo "<script> alert('Data Gagal Diubah')</script>";
            }
        }
    }

    public function delete($data){
        $kode = $data['kode'];

        $query = "DELETE from pernyataan where kode_pernyataan = :kode";
        $stmt = $this->db_conn->prepare($query);
        $stmt -> bindValue(':kode', $kode);
        $result = $stmt->execute();

        if($result){
            echo "<script> alert('Data Berhasil Dihapus')</script>";
            header('Location:datapernyataan.php');
        }else{
            echo "<script> alert('Data Gagal Dihapus')</script>";
        }
    }

    // kuesioner
    public function pernyataan(){
        $query = "SELECT pernyataan from pernyataan";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}