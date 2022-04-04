<?php
include_once 'lib/Database.php';
include_once 'lib/Session.php';

class Admin{
    private $db_conn;
    public $id;
    public $uname;
    public $pass;
    
    // db connection
    public function __construct($db){
        $this->db_conn = $db;
    }

    public function cekData($uname){
        $sql = "SELECT uname from admin where uname = :uname";
        $stmt = $this->db_conn->prepare($sql);
        $stmt->bindValue(':uname', $uname);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
    
        // verifikasi akun
    public function verifikasi($uname, $pass){
        $sql = "SELECT * from admin where uname = :username and pass = :password limit 1";
        $stmt = $this->db_conn->prepare($sql);
        $stmt->bindValue(':username', $uname);
        $stmt->bindValue(':password', $pass);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
    
    // proses login admin
    public function login($data){
        $uname = $data['unameAdmin'];
        $pass = $data['passAdmin'];
        
        $cekData = $this->cekData($uname);
        if($uname == "" || $pass == ""){
            echo "<script> alert('Login Gagal, Periksa Kembali Username dan Pass Anda')</script>";
        }elseif($uname == false){
            echo "<script> alert('Login Gagal, Periksa Kembali Username Anda')</script>";
        }elseif($pass == false){
            echo "<script> alert('Login Gagal, Periksa Kembali Pass Anda')</script>";
        }elseif($cekData == false){
            echo "<script> alert('Login Gagal, Periksa Kembali Username Anda')</script>";
        }else{
            $log = $this->verifikasi($uname, $pass);
            if($log){
                Session::init();
                Session::set('loginAdmin', TRUE);
                Session::set('uname_admin', $log['uname']);
                Session::set('id_admin', $log['id']);
                echo "<script>location.href='dashboardAdmin.php';</script>";
            }
        }
    }

    // show data
    public function show($id){
        $query = "SELECT id, uname, pass from admin where id=:id";
        $stmt = $this->db_conn->prepare($query);
        $stmt->bindValue(':id',$id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];
        $this->uname = $row['uname'];
        $this->pass = $row['pass'];
    }
}
?>