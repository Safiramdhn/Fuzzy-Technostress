<?php
// define database
define ('DB_HOST', 'localhost:2513');
define ('DB_USER','root');
define ('DB_PASS','');
define ('DB_NAME','sistempakar2513');

// session_start();
class  Database{
    public $db_conn;
    // Construct Class
    public function getConnection(){
        $this->db_conn = null;

        // menghubungkan database
        try {
            $this->db_conn = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME, DB_USER, DB_PASS);
        } 
        catch (PDOException $e) {
            // jika tidak tersambung
            die("Koneksi Gagal".$e->getMessage());
        }
        return $this->db_conn;
    }
}
?>