<?php

require_once('config/Database.php');


class AuthenticateUser {

    public $hasError = [];

    public  function authenticate($email, $password) {
        
        if(empty(trim($email)) || empty(trim($password))) {
            $this->hasError['credential'] = 'Both fields are required';
            return false;
        }

        $sql   = " SELECT * FROM donors WHERE email =:email  LIMIT 1";
        $db = new Database();

        $query = $db->query($sql, [
            'email'    => $email,
        ]);

        $result = $query->fetch(PDO::FETCH_OBJ);

        $user = !empty($result)? $result :false;
        
        if($user == false || !password_verify($password, $user->password) ){
            $this->hasError['credential'] = "Opps! we can't log you in, the credentials provided are invalid";
            return false;
        }else{

            $_SESSION['user'] = $user;
            return true;
        }
    }

}