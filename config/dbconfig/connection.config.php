<?php

class conn {
    private $_host = 'localhost';
	private $_username = 'root';
	private $_password = '';
	private $_database= 'tpl';

    protected $connection;
    
    public function __construct(){
        if(!isset($this->connection)){
            $this->connection = mysqli_connect($this->_host, $this->_username, $this->_password, $this->_database);
            //VALIDASI CHECK TERHUBUNG KE DATABASE
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }
        }
        return $this->connection;
    }
}

// TEST MEMANGGIL KONEKSI KE DATABASE DARI FUNGSI 'connectDB'
// $var = new conn();

?>