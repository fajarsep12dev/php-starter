<?php

class UserLogin extends conn{
   
    // FUNGSI UNTUK LOGIN SESUAI USERNAME($username) DAN PASSWORD('$password')
    // TABLE "users"
    public function login($u, $p){
       
        $pMd5               = md5($p);
        $query              = "SELECT * FROM users WHERE user_username='$u' and user_password='$pMd5'";
        $result             = $this->connection->query($query);
        $rowResult          = mysqli_fetch_array($result);
        $countResult        = mysqli_num_rows($result);

        //VALIDASI LOGIN JIKA HASIL QUERY NYA ADA AKAN SET DATA 
        //$_SESSION UNTUK DATA DARI TABLE "users"
        if($countResult == 1){
            $_SESSION['login']      = true;
            $_SESSION['user_id']    = $rowResult['user_id'];
            $_SESSION['user_role']  = $rowResult['user_role'];
            return true;
        }
    }

    //FUNGSI LOGOUT / KELUAR DARI APLIKASI
    public function logout(){
        $_SESSION['login'] = false;
		session_destroy();
    }

}

?>