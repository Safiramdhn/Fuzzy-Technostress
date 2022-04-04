<?php
// calling other file
include_once 'lib/Database.php';
include_once 'lib/Session.php';

class Kriteria{
    private $db_conn;
    public $kode;
    public $nama;
    public $keterangan;

    // db connection
    public function __construct($db){
        $this->db_conn = $db;
    }

    // show data
    public function showAll(){
        $query = "SELECT kode_kriteria, nama_kriteria, keterangan from kriteria ";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // search
    public function search($data){
        $key = $data['key'];
        
        $query = "SELECT kode_kriteria, nama_kriteria, keterangan from kriteria 
                where kode_kriteria = :kode or nama_kriteria = :nama";
        $stmt = $this->db_conn->prepare($query);
        $stmt->bindValue(':kode', $key);
        $stmt->bindValue(':nama',$key);
        $stmt->execute();
        return $stmt;
    }

    // cek data
    public function cekData($kode){
        $query = "SELECT kode_kriteria from kriteria where kode_kriteria = :kode";
        $stmt = $this->db_conn->prepare($query);
        $stmt->bindValue(':kode', $kode);
        $stmt->execute();
    }

    // insert
    public function insert($data){
        $kode = $data['kode'];
        $nama = $data['nama'];
        $ket = $data['keterangan'];

        $cek = $this->cekData($kode);
        if($kode == "" || $nama == "" || $ket == ""){
            echo "<script> alert('Tidak Ada Data Yang Ditambahkan')</script>";
        }elseif($kode == $cek){
            echo "<script> alert('Kode Kriteria Sudah Ada')</script>";
        }else{
            $query = "INSERT into kriteria(kode_kriteria, nama_kriteria, keterangan) values(:kode, :nama, :ket)";
            $stmt = $this->db_conn->prepare($query);
            $stmt->bindValue(':kode',$kode);
            $stmt->bindValue(':nama',$nama);
            $stmt->bindValue(':ket', $ket);
            $result = $stmt->execute();

            if($result){
                echo "<script> alert('Data Berhasi Ditambah')</script>";
            }else{
                echo "<script> alert('Data Gagal Ditambah')</script>";
            }
        }
        header('Location:dataKriteria.php');
    }

    // get kode
    public function getCode(){
        $query = "SELECT kode_kriteria from kriteria";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // update
    public function update($data){
        $kode = $data['kode'];
        $nama = $data['nama'];
        $ket = $data['keterangan'];

        if($nama == "" || $ket == ""){
            echo "<script> alert('Periksa Kembali Data Yang Diubah')</script>";
        }else{
            $query = "UPDATE kriteria set nama_kriteria = :nama, keterangan = :ket where kode_kriteria = :kode";
            $stmt = $this->db_conn->prepare($query);
            $stmt->bindValue(':kode', $kode);
            $stmt->bindValue(':nama', $nama);
            $stmt->bindValue(':ket', $ket);
            $result = $stmt->execute();

            if($result){
                echo "<script> alert('Data Berhasil Diubah')</script>";
                header('Location:dataKriteria.php');
            }else{
                echo "<script> alert('Data Gagal Diubah')</script>";
            }
        }
    }

    public function delete($data){
        $kode = $data['kode'];

        $query = "DELETE from kriteria where kode_kriteria = :kode";
        $stmt = $this->db_conn->prepare($query);
        $stmt -> bindValue(':kode', $kode);
        $result = $stmt->execute();

        if($result){
            echo "<script> alert('Data Berhasil Dihapus')</script>";
            header('Location:dataKriteria.php');
        }else{
            echo "<script> alert('Data Gagal Dihapus')</script>";
        }
    }
}