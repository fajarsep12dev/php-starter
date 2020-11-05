<?php

class users extends conn{
    
    //MENGAMBIL DATA USER SESUAI DENGAN USER ID 
    public function getUserById($user_id){
        $query            = "SELECT * FROM users WHERE user_id='$user_id'";
        $result           = $this->connection->query($query);
        while ($row = $result->fetch_assoc())
        $data[]           = $row;
        return $data;
    }

    //MENGAMBIL SEMUA DATA USER
    public function getUsers(){
        $query            = "SELECT 
                                u.user_id,
                                u.user_fullname,
                                u.user_email,
                                u.user_username
                             FROM users u";
        $result           = $this->connection->query($query);
        while ($row = $result->fetch_assoc())
        $data[]           = $row;
        return $data;
    }

    //VALIDASI EMAIL DAN USERNAME
    public function checkUsername($user_username, $user_email){
        $check_query = "SELECT user_username, user_email FROM users WHERE user_username = '$user_username' 
                        OR user_email = '$user_email'";
        $result      = $this->connection->query($check_query);
        $row         = mysqli_fetch_array($result);
        
        if($user_username == $row['user_username'] || $user_email == $row['user_email']){
            return false;
        }else{
            return true;
        }
    }

    public function insertOrUpdate($user_id, $user_fullname, $user_username, $user_password, $user_email){
        if($user_id == 0){
           return $this->insertUser($user_fullname, $user_username, $user_password, $user_email);
        }else{
           return $this->updateUser($user_id, $user_fullname, $user_username, $user_password, $user_email);
        }
    }
    //INSERT DATA USER  
    public function insertUser($user_fullname, $user_username, $user_password, $user_email){
        
        $md5Password = md5($user_password);
        
        //$fn_checkUsername = checkUsername($user_username, $user_email);
        
        //if($fn_checkUsername){
            $insert_query = "INSERT INTO users(user_fullname, user_username, user_password, user_email)
                            VALUES('$user_fullname', '$user_username', '$md5Password', '$user_email')";
            $insert_result =  $this->connection->query($insert_query);  

            return $insert_result;
        //}else{
            return false;
        //}
       
    }

    //DELETE USER
    public function deleteUser($user_id){
        $query = "UPDATE users set
                    user_isActive = 0,
                    WHERE user_id  = '$user_id'";
        $result = $this->connection->query($query);
        return $result;
    }

    //UPDATE DATA USER
    public function updateUser($user_id, $user_fullname, $user_username, $user_password, $user_email){
        
        $md5Password = md5($user_password);
        $edit_query = "UPDATE users set
                         user_fullname = '$user_fullname',
                         user_username = '$user_username', 
                         user_password = '$user_password', 
                         user_email    = '$user_email'
                        WHERE user_id  = '$user_id'";

        $insert_result =  $this->connection->query($edit_query);  

        return $insert_result;
    }
}

?>