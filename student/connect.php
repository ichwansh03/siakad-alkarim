<?php
//ini_set('display_errors','1');
class LoginAndRegStudent{
    public function __construct()
    {
        $db = new DBCon();
    }

    //student regist
    public function studentReg($nisn, $nama, $email, $pw, $tgllahir, $jk, $phone, $nipd, $address){
        global $conn;
        $query = $conn->query("SELECT nisn FROM siswa WHERE nisn='$nisn' OR email='$email' ");

        $num = $query->num_rows;
        $regist = "INSERT INTO siswa(nisn, nama, email, password, tgl_lahir, jk, kontak, nipd, alamat)
         VALUES ('$nisn','$nama','$email','$pw','$tgllahir','$jk','$phone','$nipd','$address') ";

        if ($num == 0) {
            $conn->query($regist);
            return $conn;
        } else {
            return false;
        }
    }

    //student login
    public function studentLogin($nisn, $pw) {
        global $conn;
        $query = "SELECT nisn, nama FROM siswa WHERE nisn='$nisn' AND password='$pw'";
        $result = $conn->query($query);
        $data = $result->fetch_assoc();
        $rows = $result->num_rows;
        if ($rows == 1) {
            session_start();
            $_SESSION['st_login'] = true;
            $_SESSION['sid'] = $data['nisn'];
            $_SESSION['sname'] = $data['nama'];
            return true;
        } else {
            return false;
        }
    }

    //get info student by nisn
    public function studentById($nisn) {
        global $conn;
        $query = $conn->query("SELECT * FROM siswa WHERE nisn='$nisn'");
        return $query;
    }

    //get name student by nisn (just for test)
    public function studentName($nisn) {
        global $conn;
        $query = $conn->query("SELECT nama FROM siswa WHERE nisn='$nisn'");
        $result = $query->fetch_assoc();
        echo $result['nama'];
    }

    //update student profile
    public function updateStudent($nisn, $nama, $email, $tgllahir, $jk, $phone, $address) {
        global $conn;
        $query = $conn->query("UPDATE siswa SET nama='$nama', email='$email', tgl_lahir='$tgllahir', jk='$jk', kontak='$phone', alamat='$address' WHERE nisn='$nisn'");
        return true;
    }

    //forgot password student
    public function forgotPwStudent($nisn, $oldpw, $newpw) {
        global $conn;
        $query = $conn->query("SELECT nisn FROM siswa WHERE nisn='$nisn' AND password='$oldpw'");
        $rows = $query->num_rows;

        if ($rows == 1) {
            $update = $conn->query("UPDATE siswa SET password='$newpw' WHERE nisn='$nisn' ");
            return print("<p style='color:green;text-align:center'>Password successfully updated.</p>");
        } else {
            return print("<p style='color:green;text-align:center'>Old password is not exists.</p>");
        }
    }

    public function studentLogout(){
        $_SESSION['st_login'] = false;
        unset($_SESSION['sid']);
        unset($_SESSION['sname']);
        unset($_SESSION['st_login']);
    }

    public function getSession(){
        return @$_SESSION['st_login'];
    }
}

