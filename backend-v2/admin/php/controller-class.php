<?php
session_start();
ini_set('display_errors', 1);

class Controller{
    private $db;

    public function __construct(){
        ob_start();
        include '../config/db.config.php';
        $this->db = $con;
    }

    public function __destruct(){
        $this->db->close();
		ob_end_flush();
    }


    public function login_application_user(){
        extract($_POST);
        $query = $this->db->query("SELECT * FROM users where email = '" . $email . "' and password = '" . md5($password) . "'  ");
        if($query->num_rows > 0){
            foreach($query->fetch_array() as $key => $val){
                if($key != 'password' && !is_numeric($key)){
                    $_SESSION['login_'.$key]=$val;
                }
            }
            return 1;
        }else{
            return 2;
        }
    }
}

?>