<?php
// calling other file
include_once 'lib/Database.php';
include_once 'lib/Session.php';
include_once 'Fuzzy.php';

class Hasil{
    private $db_conn;
    public $over;
    public $tingkat;
    public $inva;
    public $com;
    public $un;
    public $in;
    public $angka;
    
    // db connection
    public function __construct($db){
        $this->db_conn = $db;
    }
    
    // hitung data
    public function countData(){
        $query = "SELECT kode_hasil from hasil";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();

        $jml = $stmt->rowCount();
        return $jml;
    }

    // show on dashboard admin
    public function showAll(){
        $query = "SELECT h.kode_hasil, p.email, h.tingkat, h.angka, h.overload, h.invasion,
                h.complexity, h.uncertainty, h.insecurity
                from hasil h join pengguna p on h.id_pengguna = p.id_pengguna
                order by h.kode_hasil asc";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function show($id){
        $query = "SELECT tingkat, angka, overload, invasion, complexity,
                uncertainty, insecurity from hasil where id_pengguna = :id";
        $stmt = $this->db_conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();  
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->tingkat = $row['tingkat'] ?? 'Data Kosong';
        $this->angka = $row['angka'] ?? 'Data Kosong';
        $this->over = $row['overload'] ?? '-';
        $this->inva = $row['invasion'] ?? '-';
        $this->com = $row['complexity'] ?? '-';
        $this->un = $row['uncertainty'] ?? '-';
        $this->in = $row['insecurity'] ?? '-';
    }

    public function fuzzyTest($id, $data){
        $nilai = $data['p'];

        $fuzzy = new Fuzzy();
        $fuzzy->fuzzifikasi($nilai);
        $fuzzy->inferensi();
        $fuzzy->defuzzifikasi();

        $overload = $fuzzy->over;
        $invasion = $fuzzy->inva;
        $complexity = $fuzzy->com;
        $uncertainty = $fuzzy->un;
        $insecurity = $fuzzy->in;
        $angka = $fuzzy->hasil;
        $tingkat = $fuzzy->tingkat;

        $query = "INSERT into hasil(id_pengguna, tingkat, angka, 
                overload, invasion, complexity, uncertainty, insecurity) 
                values(:id, :tingkat, :angka, :ov, :inv, :com, :un, :ins)";
        $stmt = $this->db_conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':tingkat', $tingkat);
        $stmt->bindValue(':angka', $angka);
        $stmt->bindValue(':ov', $overload);
        $stmt->bindValue(':inv', $invasion);
        $stmt->bindValue(':com', $complexity);
        $stmt->bindValue(':un', $uncertainty);
        $stmt->bindValue(':ins', $insecurity);
        $result = $stmt->execute();
        if($result){
            echo "<script> alert('Data Berhasi Ditambah')</script>";
        }else{
            echo "<script> alert('Data Gagal Ditambah')</script>";
        }
        header('Location:hasilTes.php');
    }

    // delete
    public function delete($id){
        $query = "DELETE from hasil where id_pengguna = :id";
        $stmt = $this->db_conn->prepare($query);
        $stmt -> bindValue(':id', $id);
        $result = $stmt->execute();

        if($result){
            echo "<script> alert('Data Berhasil Dihapus')</script>";
            header('Location:hasilTes.php');
        }else{
            echo "<script> alert('Data Gagal Dihapus')</script>";
        }
    }

    public function showSD(){
        $query = "SELECT * from hasil h
                join pengguna p on h.id_pengguna = p.id_pengguna
                where p.tingkat_sekolah = 'SD'";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();

        $jml = $stmt->rowCount();
        return $jml;
    }

    public function showSMP(){
        $query = "SELECT * from hasil h
                join pengguna p on h.id_pengguna = p.id_pengguna
                where p.tingkat_sekolah = 'SMP'";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();

        $jml = $stmt->rowCount();
        return $jml;
    }

    public function showSMA(){
        $query = "SELECT * from hasil h
                join pengguna p on h.id_pengguna = p.id_pengguna
                where p.tingkat_sekolah = 'SMA'";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();

        $jml = $stmt->rowCount();
        return $jml;
    }

    public function showSMK(){
        $query = "SELECT * from hasil h
                join pengguna p on h.id_pengguna = p.id_pengguna
                where p.tingkat_sekolah = 'SMK'";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();

        $jml = $stmt->rowCount();
        return $jml;
    }
}
?>
