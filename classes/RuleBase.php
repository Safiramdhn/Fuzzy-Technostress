<?php
//calling other file
include_once 'lib/Database.php';
include_once 'lib/Session.php';

class Rule{
    private $db_conn;
    public $kode;
    public $over;
    public $inva;
    public $com;
    public $un;
    public $in;
    public $hasil;
    
    // db connection
    public function __construct($db){
        $this->db_conn = $db;
    }

    // show data
    public function showAll(){
        $query = "SELECT kode_rule, t01, t02, t03, t04, t05, hasil from rule_base";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // search
    public function search($data){
        $key = $data['key'];

        $query = "SELECT kode_rule, t01, t02, t03, t04, t05, hasil from rule_base
                where kode_rule = :kode or hasil = :hasil";
        $stmt = $this->db_conn->prepare($query);
        $stmt->bindValue(':kode', $key);
        $stmt->bindValue(':hasil', $key);
        $stmt->execute();
        return $stmt;
    }

    // insert
    public function insert($data){
        $over = $data['t01'];
        $inva = $data['t02'];
        $com = $data['t03'];
        $un = $data['t04'];
        $in = $data['t05'];
        $hasil = $data['hasil'];

        if($over == "" | $inva == "" | $com == "" | $un == "" | $in == "" ){
            echo "<script> alert('Tidak Ada Data Yang Ditambahkan')</script>";
        }else{
            $query = "INSERT into rule_base(t01, t02, t03, t04, t05, hasil)
                    values(:t01, :t02, :t03, :t04, :t05, :hasil)";
            $stmt = $this->db_conn->prepare($query);
            $stmt->bindValue(':t01',$over);
            $stmt->bindValue(':t02',$inva);
            $stmt->bindValue(':t03',$com);
            $stmt->bindValue(':t04',$un);
            $stmt->bindValue(':t05',$in);
            $stmt->bindValue(':hasil',$hasil);
            $result = $stmt->execute();

            if($result){
                echo "<script> alert('Data Berhasi Ditambah')</script>";
            }else{
                echo "<script> alert('Data Gagal Ditambah')</script>";
            }
        }
        header('Location:dataRule.php');
    }

    // get code
    public function getCode(){
        $query = "SELECT kode_rule from rule_base";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // update
    public function update($data){
        $kode = $data['kode'];
        $over = $data['t01'];
        $inva = $data['t02'];
        $com = $data['t03'];
        $un = $data['t04'];
        $in = $data['t05'];
        $hasil = $data['hasil'];

        if($over == "" | $inva == "" | $com == "" | $un == "" | $in == "" ){
            echo "<script> alert('Periksa Kembali Data Yang Diubah')</script>";
        }else{
            $query = "UPDATE rule_base set t01 = :t01, t02 = :t02, t03 = :t03, t04 = :t04, t05 = :t05, hasil = :hasil
                     where kode_rule = :kode";
            $stmt = $this->db_conn->prepare($query);
            $stmt->bindValue(':kode', $kode);
            $stmt->bindValue(':t01', $over);
            $stmt->bindValue(':t02', $inva);
            $stmt->bindValue(':t03', $com);
            $stmt->bindValue(':t04', $un);
            $stmt->bindValue(':t05', $in);
            $stmt->bindValue(':hasil', $hasil);
            $result = $stmt->execute();

            if($result){
                echo "<script> alert('Data Berhasil Diubah')</script>";
                header('Location:dataRule.php');
            }else{
                echo "<script> alert('Data Gagal Diubah')</script>";
            }
        }
    }

    // delete
    public function delete($data){
        $kode = $data['kode'];

        $query = "DELETE from rule_base where kode_rule = :kode";
        $stmt = $this->db_conn->prepare($query);
        $stmt -> bindValue(':kode', $kode);
        $result = $stmt->execute();

        if($result){
            echo "<script> alert('Data Berhasil Dihapus')</script>";
            header('Location:dataRule.php');
        }else{
            echo "<script> alert('Data Gagal Dihapus')</script>";
        }
    }
}
?>