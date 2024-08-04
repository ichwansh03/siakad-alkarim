<?php
class LoginAndRegTeacher {

    public function __construct(){
		$db = new DBCon();
	}

    public function teacherReg($name, $email, $pass, $jk, $alamat, $nip, $kontak){
        global $conn;
        $reg = $conn->query("SELECT nip FROM guru WHERE email='$email' ");
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
            $_SESSION['tc_nip'] = $fetch['nip'];
            $_SESSION['tc_email'] = $fetch['email'];
            $_SESSION['tc_name'] = $fetch['name'];
            $_SESSION['tc_pass'] = $fetch['password'];
            return true;
        } else {
            return false;
        }
    }

    public function teachLogout(){
        $_SESSION['teach_login'] = false;
        unset($_SESSION['tc_nip']);
        unset($_SESSION['tc_email']);
        unset($_SESSION['tc_name']);
        unset($_SESSION['tc_pass']);
        unset($_SESSION['ftc_login']);
    }

    public function getTeacher(){
        global $conn;
        $sql = "SELECT * FROM guru ORDER BY nip ASC";
        $result = $conn->query($sql);
        return $result;
    }

    public function teacherById($nip) {
        global $conn;
        $query = $conn->query("SELECT * FROM guru WHERE nip='$nip'");
        return $query;
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

    public function forgotPwTeacher($nip, $oldpw, $newpw) {
        global $conn;
        $query = $conn->query("SELECT nip FROM siswa WHERE nip='$nip' AND password='$oldpw'");
        $rows = $query->num_rows;

        if ($rows == 1) {
            $update = $conn->query("UPDATE siswa SET password='$newpw' WHERE nip='$nip' ");
            return print("<p style='color:green;text-align:center'>Password successfully updated.</p>");
        } else {
            return print("<p style='color:green;text-align:center'>Old password is not exists.</p>");
        }
    }

    public function addMarks($sname, $subject, $mark, $task1, $task2, $task3, $task4, $task5, $task6, $mid, $final) {
        global $conn;
        $query = "SELECT * FROM rapor WHERE nisn_siswa = '$sname' AND mapel = '$subject'";
        $result = $conn->query($query);
        $count = $result->num_rows;
        if($count==0){
            $sql = "INSERT INTO rapor (nisn_siswa, mapel, nilai_akhir, tugas1, tugas2, tugas3, tugas4, tugas5, tugas6, uts, uas) 
            VALUES ('$sname','$subject','$mark','$task1','$task2','$task3','$task4','$task5','$task6','$mid','$final')";
            $inserts = $conn->query($sql);
            return $inserts;
        } else {
            return false;
        }
    }
}

?>