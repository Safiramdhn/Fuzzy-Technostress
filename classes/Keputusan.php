<?php
// calling other file
include_once 'lib/Database.php';
include_once 'lib/Session.php';

class Keputusan{
    private $db_conn;

    // db connection
    public function __construct($db){
        $this->db_conn = $db;
    }

    // show data
    public function showAll(){
        $query = "SELECT a.kode_keputusan, k.kode_kriteria, k.nama_kriteria, p.kode_pernyataan, p.pernyataan
                from keputusan a join kriteria k on a.kode_kriteria = k.kode_kriteria
                join pernyataan p on a.kode_pernyataan = p.kode_pernyataan";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // search
    public function search($data){
        $key = $data['key'];
        
        $query = "SELECT a.kode_keputusan, k.kode_kriteria, k.nama_kriteria, p.kode_pernyataan, p.pernyataan
                from keputusan a join kriteria k on a.kode_kriteria = k.kode_kriteria
                join pernyataan p on a.kode_pernyataan = p.kode_pernyataan
                where k.kode_kriteria = :kodeK or k.nama_kriteria = :nama or p.kode_pernyataan = :kodeP";
        $stmt = $this->db_conn->prepare($query);
        $stmt->bindValue(':kodeK', $key);
        $stmt->bindValue(':nama',$key);
        $stmt->bindValue(':kodeP',$key);
        $stmt->execute();
        return $stmt;
    }

    // cek data
    public function cekData($kode){
        $query = "SELECT kode_keputusan from keputusan where kode_keputusan = :kode";
        $stmt = $this->db_conn->prepare($query);
        $stmt->bindValue(':kode', $kode);
        $stmt->execute();
    }

    // insert
    public function insert($data){
        $kriteria = $data['kodeKriteria'];
        $pernyataan = $data['kodePernyataan'];

        if($kriteria == "" || $pernyataan == ""){
            echo "<script> alert('Tidak Ada Data Yang Ditambahkan')</script>";
        }else{
            $query = "INSERT into keputusan(kode_kriteria, kode_pernyataan) values(:kodeK, :kodeP)";
            $stmt = $this->db_conn->prepare($query);
            $stmt->bindValue(':kodeK',$kriteria);
            $stmt->bindValue(':kodeP',$pernyataan);
            $result = $stmt->execute();

            if($result){
                echo "<script> alert('Data Berhasi Ditambah')</script>";
            }else{
                echo "<script> alert('Data Gagal Ditambah')</script>";
            }
        }
        header('Location:dataKeputusan.php');
    }

    // get kode
    public function getKeputusan(){
        $query = "SELECT kode_keputusan from keputusan";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getKriteria(){
        $query = "SELECT kode_kriteria from kriteria";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getPernyataan(){
        $query = "SELECT kode_pernyataan from pernyataan";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // update
    public function update($data){
        $kode = $data['kode'];
        $kriteria = $data['kodeKriteria'];
        $pernyataan = $data['kodePernyataan'];

        if($kriteria == "" || $pernyataan == ""){
            echo "<script> alert('Periksa Kembali Data Yang Diubah')</script>";
        }else{
            $query = "UPDATE keputusan set kode_kriteria = :kodeK, kode_pernyataan = :kodeP where kode_keputusan = :kode";
            $stmt = $this->db_conn->prepare($query);
            $stmt->bindValue(':kode', $kode);
            $stmt->bindValue(':kodeK', $kriteria);
            $stmt->bindValue(':kodeP', $pernyataan);
            $result = $stmt->execute();

            if($result){
                echo "<script> alert('Data Berhasil Diubah')</script>";
                header('Location:dataKeputusan.php');
            }else{
                echo "<script> alert('Data Gagal Diubah')</script>";
            }
        }
    }

    public function delete($data){
        $kode = $data['kode'];

        $query = "DELETE from keputusan where kode_keputusan = :kode";
        $stmt = $this->db_conn->prepare($query);
        $stmt -> bindValue(':kode', $kode);
        $result = $stmt->execute();

        if($result){
            echo "<script> alert('Data Berhasil Dihapus')</script>";
            header('Location:dataKeputusan.php');
        }else{
            echo "<script> alert('Data Gagal Dihapus')</script>";
        }
    }
}

?>