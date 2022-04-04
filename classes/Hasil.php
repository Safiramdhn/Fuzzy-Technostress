<?php
// calling other file
include_once 'lib/Database.php';
include_once 'lib/Session.php';
include_once 'Fuzzy.php';

class Hasil{
    private $db_conn;
    public $nama;
    public $tingkat;
    public $ket;
    
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
        $query = "SELECT h.kode_hasil, p.email, k.nama_kriteria, h.tingkat
                    from hasil h join pengguna p on h.id_pengguna = p.id_pengguna
                    join kriteria k on h.kode_kriteria = k.kode_kriteria";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function show($id){
        $query = "SELECT k.nama_kriteria, h.tingkat, k.keterangan
                    from hasil h join kriteria k on h.kode_kriteria = k.kode_kriteria
                    where h.id_pengguna = :id";
        $stmt = $this->db_conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();  
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nama = $row['nama_kriteria'] ?? 'Data Kosong';
        $this->tingkat = $row['tingkat'] ?? 'Data Kosong';
        $this->ket = $row['keterangan'] ?? 'Data Kosong';
    }

    public function fuzzyTest($id, $data){
        $nilai = $data['p'];

        $fuzzy = new Fuzzy();
        $fuzzy->overload($nilai);
        $fuzzy->invasion($nilai);
        $fuzzy->complexity($nilai);
        $fuzzy->uncertainty($nilai);
        $fuzzy->insecurity($nilai);
        $fuzzy->inferensi();

        
        if($fuzzy->maxAkhir == $fuzzy->maxOverload){
            $kriteria = "T01";                
        }elseif($ffuzzy->maxAkhir == $ffuzzy->maxInvasion){
            $kriteria = "T02";
        }elseif($fuzzy->maxAkhir == $fuzzy->maxComplexity){
            $kriteria = "T03";
        }elseif($fuzzy->maxAkhir == $fuzzy->maxUncertainty){
            $kriteria = "T04";
        }else{
            $kriteria = "T05";
        }

        $query = "INSERT into hasil(id_pengguna, kode_kriteria, tingkat) 
                values(:id, :kode, :tingkat)";
        $stmt = $this->db_conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':kode', $kriteria);
        $stmt->bindValue(':tingkat', $fuzzy->tingkat);
        $result = $stmt->execute();
        if($result){
            echo "<script> alert('Data Berhasi Ditambah')</script>";
        }else{
            echo "<script> alert('Data Gagal Ditambah')</script>";
        }
        header('Location:hasilTes.php');
    }
}
?>