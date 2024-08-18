<?php
class login_registration_class{
	public function __construct(){
		$db = new databaseConnection();
	}
	
	//All function for Student
	
	//function for student registration
	public function st_registration($nisn,$nama_siswa,$pw_siswa,$email_siswa,$tgllahir,$kontak_siswa,$jk_siswa,$alamat_siswa, $nipd, $kelas){
		global $conn;
		$query = $conn->query("SELECT nisn from siswa where nisn='$nisn' or email ='$email_siswa' ");

		$num = $query->num_rows;
		$in_sql = "INSERT INTO siswa (nisn,nama,password,email,tgl_lahir,jk,kontak,alamat,nipd,kelas) VALUES ('$nisn','$nama_siswa','$pw_siswa','$email_siswa','$tgllahir','$jk_siswa','$kontak_siswa','$alamat_siswa','$nipd','$kelas') ";
		if($num == 0){
			$conn->query($in_sql);
			return true;
		}else{
			return false;
		}
	}
	
	//function for student login
	public function st_userlogin($nisn, $pw_siswa){
		global $conn;
		$sql = "SELECT nisn,nama FROM siswa WHERE nisn='$nisn' and password='$pw_siswa'";
		$result = $conn->query($sql);
		$userdata = $result->fetch_assoc();
		$count = $result->num_rows;
		if($count == 1){
			session_start();
			$_SESSION['st_login'] = true; 
			$_SESSION['sid'] = $userdata['nisn'];
			$_SESSION['sname'] = $userdata['nama'];
			return true;
		}else{
			return false;
		}
		
	}

	//function parent login
	public function parent_login($nisn){
		global $conn;
		$sql = "SELECT nisn,nama FROM siswa WHERE nisn='$nisn'";
		$result = $conn->query($sql);
		$userdata = $result->fetch_assoc();
		$count = $result->num_rows;
		if($count == 1){
			session_start();
			$_SESSION['st_login'] = true; 
			$_SESSION['sid'] = $userdata['nisn'];
			$_SESSION['sname'] = $userdata['nama'];
			return true;
		}else{
			return false;
		}
		
	}
	
	//function for get student Name 
	public function getusername($sid){
		global $conn;
		$query = $conn->query("select nama from siswa where nisn='$sid'");
		$result = $query->fetch_assoc();
		echo $result['nama'];
	}
	// Get all info of a specific student by Student ID
	public function getuserbyid($nisn){
		global $conn;
		$query = $conn->query("select * from siswa where nisn='$nisn'");
		return $query;
	}
	//Update Student Profile
	public function updateprofile($sid,$nama_siswa,$email_siswa,$tgllahir,$jk_siswa,$kontak_siswa,$alamat_siswa,$nipd,$kelas){
		global $conn;
		$query = $conn->query("update siswa set nama='$nama_siswa',email='$email_siswa',tgl_lahir='$tgllahir',jk='$jk_siswa',kontak='$kontak_siswa', alamat='$alamat_siswa', nipd='$nipd', kelas='$kelas' where nisn='$sid'");
		return true;
	}
	
	//Change Student Password
	public function updatePassword($sid, $newpass, $oldpass){
		global $conn;
		$query = $conn->query("select nisn from siswa where nisn='$sid' and password='$oldpass' ");
		$count = $query->num_rows;
		if($count == 0){
			return print("<p style='color:red;text-align:center'>password lama tidak tersedia</p>");
		}else{
			$update = $conn->query("update siswa set password='$newpass' where nisn='$sid' ");
			return print("<p style='color:green;text-align:center'>Password berhasil diubah.</p>");
		}
	}
	//Session Unset for Student info //Log out option
	public function st_logout(){
		$_SESSION['st_login'] = false;
		unset($_SESSION['sid']); 
		unset($_SESSION['sname']);
		unset($_SESSION['st_login']);
		
		//session_destroy();
	}
	public function getsession(){
		return @$_SESSION['st_login'];
	}

	//Ends student releted function 
	
	/**
	---------------------------------
	All functions for teach section
	---------------------------------
	**/
	public function teach_registration($nip, $name,$pass,$email,$jk_guru,$kontak_guru,$alamat_guru,$tgllahir,$kelas){
		global $conn;
		$fct = $conn->query("select nip from guru where nip='$nip' ");
		$count = $fct->num_rows;
		if($count == 0){
			$sql = "insert into guru(nip,nama,password,email,jk,kontak,alamat,tgl_lahir,kelas_ajar) values('$nip','$name','$pass','$email','$jk_guru','$kontak_guru','$alamat_guru','$tgllahir','$kelas')";
			$result = $conn->query($sql);
			return true;
		}else{
			return false;
		}
	}
	//get teach 
	public function get_teach_by_nip($nip){
		global $conn;
		$sql = "select * from guru where nip='$nip'";
		$result = $conn->query($sql);
		return $result;
	}
	public function get_teach(){
		global $conn;
		$sql = "select * from guru order by nip ASC";
		$result = $conn->query($sql);
		return $result;
	}
	//login for teach 
	public function teach_login($nip, $pass){
		global $conn;
		$sql = "select * from guru where nip='$nip' and password='$pass' ";
		$result = $conn->query($sql);
		$count = $result->num_rows;
		$fctinfo = $result->fetch_assoc();
		if($count == 1){
			session_start();
			$_SESSION['teach_login'] = true;
			$_SESSION['f_id'] = $fctinfo['nip'];
			$_SESSION['f_name'] = $fctinfo['nama'];
			$_SESSION['f_class'] = $fctinfo['kelas_ajar'];
			$_SESSION['f_pass'] = $fctinfo['password'];
			return true;
		}else{
			return false;
		}
	}
	//update profile teacher
	//Update Student Profile
	public function update_teach_profile($nip, $name,$email,$jk_guru,$kontak_guru,$alamat_guru,$tgllahir,$kelas){
		global $conn;
		$query = $conn->query("update guru set nama='$name',email='$email',tgl_lahir='$tgllahir',jk='$jk_guru',kontak='$kontak_guru', alamat='$alamat_guru', kelas_ajar='$kelas' where nip='$nip'");
		return true;
	}

	public function teach_logout(){
		$_SESSION['teach_login'] = false;
		unset($_SESSION['f_id']);
		unset($_SESSION['f_name']);
		unset($_SESSION['f_pass']);
		unset($_SESSION['f_class']);
		unset($_SESSION['fct_login']);
	}

	public function get_teach_session(){
		return @$_SESSION['teach_login'];
	}
	
	/*
	**********************
	----------------------
	All functions for ortu 
	----------------------
	**********************
	*/
	
	//for getting All student infomation 
	public function get_all_student(){
		global $conn;
		$sql = "select * from siswa order by nama ASC";
		$query = $conn->query($sql);
		return $query;
	}

	public function get_student_by_class($kelas){
		global $conn;
		$sql = "select * from siswa where kelas='$kelas'";
		$query = $conn->query($sql);
		return $query;
	}
	//search student
	//Search Query
	public function search($query){
		global $conn;
		$result = $conn->query("SELECT * FROM siswa WHERE (nisn LIKE '%".$query."%'
							OR nama LIKE '%".$query."%'
								OR kontak LIKE '%".$query."%'
									OR email LIKE '%".$query."%') order by nisn");
		return $result;
	}
	
	//ortu log in function 
	public function admin_userlogin($username, $password){
		global $conn;
		$sql  = "SELECT id, username FROM admin WHERE username='$username' AND password='$password'";
		$result = $conn->query($sql);
		$admin_info = $result->fetch_assoc();
		$count = $result->num_rows;
		if($count == 1){
			session_start();
			$_SESSION['admin_login'] = true;
			$_SESSION['admin_id'] = $admin_info['id'];
			$_SESSION['admin_name'] = $admin_info['username'];
			return true;
		}else{
			return false;
		}
		
	}
	public function get_admin_session(){
		return @$_SESSION['admin_login'];
	}
	//admin logout 
	public function admin_logout(){
		$_SESSION['admin_login'] = false;
		unset($_SESSION['admin_id']);
		unset($_SESSION['admin_name']);
		unset($_SESSION['admin_login']);
	}
	//delete student
	public function delete_student($nisn){
		global $conn;
		$sql = "delete from siswa where nisn='$nisn' ";
		$result = $conn->query($sql);
		if($result){
			return true;
		}else{
			return false;
		}
	}
	//attendance system
	
	//grading system
	public function add_marks($stid,$subject,$task1,$task2,$task3,$task4,$task5,$task6,$mid,$final,$marks){
		global $conn;
		$qry = "select * from rapor where nisn='$stid' and mapel='$subject' ";
		$query = $conn->query($qry);
		$count = $query->num_rows;
		if($count>0){
			return false;
		}else{
		$sql = "insert into rapor(nisn,mapel,tugas1,tugas2,tugas3,uts,tugas4,tugas5,tugas6,uas,nilai_akhir) values('$stid','$subject','$task1','$task2','$task3','$mid','$task4','$task5','$task6','$final','$marks')";
		$result = $conn->query($sql);
		return $result;
		}
	}
	//show marks
	public function show_marks($stid){
		global $conn;
		$result = $conn->query("select * from rapor where nisn='$stid'");
		$count = $result->num_rows;
		if($count>0){
			return $result;
		}else{
			return false;
		}
		
	}
	//show marks by nisn and subject
	public function show_marks_by_mapel($stid, $subject) {
		global $conn;
		$result = $conn->query("select * from rapor where nisn='$stid' and mapel='$subject'");
		$count = $result->num_rows;
		if($count>0){
			return $result;
		}else{
			return false;
		}
	}

	//update student result
	public function update_result($stid,$subject = array()){
		global $conn;
		foreach($subject as $key =>$mark ){
			$sql = "update rapor set nilai_akhir='$mark' where nisn='$stid' and mapel='$key' ";
				$result = $conn->query($sql);
		}
		if($result){
			return true;
		}else{
			return false;
		}
	}

	public function update_nilai($stid,$subject,$task1,$task2,$task3,$task4,$task5,$task6,$mid,$final,$marks){
		global $conn;
		$query = $conn->query("update rapor set mapel='$subject',tugas1='$task1',tugas2='$task2',tugas3='$task3',uts='$mid', tugas4='$task4', tugas5='$task5', tugas6='$task6', uas='$final', nilai_akhir='$marks' where nisn='$stid'");
		return true;
	}

	public function view_cgpa($stid){
		global $conn;
		$sql = "select * from rapor where nisn='$stid'";
		$result = $conn->query($sql);
		return $result;
	}
	
	
	
	/* Total average marks
	public function sgpa(){
		global $conn;
		$sql = "SELECT avg(marks) as sgpa from result where st_id=12103072 and semester='1st'";
		$result = $conn->query($sql);
		return $result;
	}
	*/
	
	
	
	
	
//end class 	
};



?>