<?php
// calling other file
include_once 'lib/Database.php';
include_once 'lib/Session.php';

class User{
    private $db_conn;
    public $id;
    public $nama;
    public $email;
    public $pass;
    public $tgl;
    public $sekolah;
    public $lama;

    // db connection
    public function __construct($db){
        $this->db_conn = $db;
    }

    public function daftar($data){
        $nama = $data['name'];
        $email = $data['email'];
        $pass = $data['pass'];

        if($nama == "" || $email == "" || $pass == ""){
            echo "<script> alert('Pendaftaran Gagal, Periksa Kembali Data Anda')</script>";
        }elseif(strlen($pass) < 8){
            echo "<script> alert('Pendaftaran Gagal, Password Anda Kurang Dari 8')</script>";
        }else{
            $query = "INSERT INTO pengguna(email, pass, nama) VALUES(:email, :pass, :nama)";
            $stmt = $this->db_conn->prepare($query);
            $stmt -> bindValue(':email', $email);
            $stmt -> bindValue(':pass', $pass);
            $stmt -> bindValue(':nama', $nama);
            $result = $stmt->execute();
            
            if($result){
                echo "<script> alert('Pendaftaran Akun Anda Berhasil!
                    Silahkan Pilih Tombol Masuk Untuk Mengakses Akun Anda')</script>";
                // echo "<script>location.href='index.php';</script>";
            }else{
                echo "<script> alert('Pendaftaran Gagal, Periksa Kembali Data Anda')</script>";
            }
        }
    }
    
    public function cekData($email){
        $sql = "SELECT email from pengguna WHERE email = :email";
        $stmt = $this->db_conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        
        if ($stmt->rowCount()> 0) {
            return true;
        }else{
            return false;
        }
    }

    // verifikasi akun
    public function verifikasi($email, $pass){
        // $password = SHA1($pass);
        $sql = "SELECT * FROM pengguna WHERE email = :email and pass = :password LIMIT 1";
        $stmt = $this->db_conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $pass);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // proses login pengguna
    public function login($data){
        $email = $data['email'];
        $password = $data['pass'];
  
  
        $checkEmail = $this->cekData($email);
  
        if ($email == "" || $password == "" ) {
            echo "<script> alert('Login Gagal, Periksa Kembali Email dan Pass Anda')</script>";
        }elseif ($checkEmail == FALSE){
            echo "<script> alert('Login Gagal, Periksa Kembali Email Anda')</script>";
        }else{
            $logResult = $this->verifikasi($email, $password);
            if($logResult){
                Session::init();
                Session::set('login', TRUE);
                Session::set('id', $logResult['id_pengguna']);
                Session::set('name', $logResult['nama']);
                Session::set('email', $logResult['email']);
                echo "<script>location.href='dashboard.php';</script>";
          }
        }
    }

    // count data
    public function countData(){
        $query = "SELECT email from pengguna";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();

        $jml = $stmt->rowCount();
        return $jml;
    }

    // show on dashboard admin
    public function showAll(){
        $query = "SELECT id_pengguna, email, nama, tgl_lahir, tingkat_sekolah, lama_mengajar from pengguna";
        $stmt = $this->db_conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function show($id){
        $query = "SELECT id_pengguna, email, nama, pass, tgl_lahir, 
                tingkat_sekolah, lama_mengajar from pengguna where id_pengguna =:id";
        $stmt = $this->db_conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id_pengguna'];
        $this->nama = $row['nama'];
        $this->email = $row['email'];
        $this->pass = $row['pass'];
        $this->tgl = $row['tgl_lahir'];
        $this->sekolah = $row['tingkat_sekolah'];
        $this->lama = $row['lama_mengajar'];
    }

    // edit
    public function update($id, $data){
        
        $email = $data['email'];
        $pass = $data['pass'];
        $nama = $data['nama'];
        $tgl = $data['tgl'];
        $sekolah = $data['sekolah'];
        $lama = $data['lama'];

        
        if($data == ""){
            echo "<script> alert('Periksa Kembali Data Yang Akan Anda Ubah')</script>";
        }elseif($pass<=8){
            echo "<script> alert('Password Anda Kurang Dari 8')</script>";
        }else{        
            $query = "UPDATE pengguna set email = :email, pass = :password 
                    nama = :nama, tgl_lahir = :tgl tingkat_sekolah = :sekolah
                    lama_mengajar = :lama where id=:id";
            $stmt = $this->db_conn->prepare($query);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $pass);
            $stmt->bindValue(':nama', $nama);
            $stmt->bindValue(':tgl', $tgl);
            $stmt->bindValue(':sekolah', $sekolah);
            $stmt->bindValue(':lama', $lama);
            $stmt->bindValue(':id', $id);
            $result = $stmt->execute();

            if($result){
                echo "<script> alert('Data Berhasil Diubah')</script>";
                header('Location:dashboard.php');
            }else{
                echo "<script> alert('Data Gagal Diubah')</script>";
            }
        }
    }
}