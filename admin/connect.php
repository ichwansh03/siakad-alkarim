<?php
class LoginAdmin {

    public function __construct()
    {
        $db = new DBCon();
    }

    public function adminLogin($username, $pass) {
        global $conn;
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$pass'";
        $result = $conn->query($sql);
        $row = $result->num_rows;
        $fetch = $result->fetch_assoc();

        if($row == 1) {
            session_start();
            $_SESSION['admin_login'] = true;
            $_SESSION['ad_username'] = $fetch['username'];
            $_SESSION['ad_pass'] = $fetch['password'];
            return true;
        } else {
            return false;
        }
    }

    public function adminLogout(){
        $_SESSION['admin_login'] = true;
        unset($_SESSION['ad_username']);
        unset($_SESSION['ad_password']);
    }

    public function getAdminSession(){
        return @$_SESSION['admin_login'];
    }
}
