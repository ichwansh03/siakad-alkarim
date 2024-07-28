<?php
class LoginAndRegTeacher {

    public function __construct(){
		$db = new DBCon();
	}

    public function teacherReg($name, $email, $pass, $jk, $alamat, $nip, $kontak){
        global $conn;
        $reg = $conn->query("SELECT id FROM guru WHERE email='$email' ");
        $rows = $reg->num_rows;

        if ($rows == 0){
            $sql = "INSERT INTO guru(nama, email, password, jk, kontak, alamat, nip)
            VALUES('$name', '$email', '$pass', '$jk', '$alamat', '$kontak', '$nip')";
            $result = $conn->query($sql);
            return $result;
        } else {
            return false;
        }
    }

    public function teacherLogin($email, $pass){
        global $conn;
        $sql = "SELECT * FROM guru WHERE email = '$email' AND password = '$pass'";
        $result = $conn->query($sql);
        $rows = $result->num_rows;
        $fetch = $result->fetch_assoc();

        if ($rows == 1) {
            session_start();
            $_SESSION['teach_login'] = true;
            $_SESSION['tc_id'] = $fetch['id'];
            $_SESSION['tc_email'] = $fetch['email'];
            $_SESSION['tc_name'] = $fetch['name'];
            $_SESSION['tc_pass'] = $fetch['password'];
            return true;
        } else {
            return false;
        }
    }

    public function teachLogout(){
        $_SESSION['tc_login'] = false;
        unset($_SESSION['f_id']);
        unset($_SESSION['f_email']);
        unset($_SESSION['f_name']);
        unset($_SESSION['f_pass']);
        unset($_SESSION['ftc_login']);
    }

    public function getTeacher(){
        global $conn;
        $sql = "SELECT * FROM guru ORDER BY id ASC";
        $result = $conn->query($sql);
        return $result;
    }

    public function getTeacherByName($nama){
        global $conn;
        $sql = "SELECT * FROM guru WHERE name='$nama'";
        $result = $conn->query($sql);
        return $result;
    }

    public function getTeacherSession(){
        return @$_SESSION['teach_login'];
    }
}

?>