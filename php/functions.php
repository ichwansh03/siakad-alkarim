<?php
class login_registration_class{
	public function __construct(){
		$db = new databaseConnection();
	}
	
	//All function for Student
	
	//function for student registration
	public function st_registration($id_siswa,$nama_siswa,$pw_siswa,$email_siswa,$tgllahir,$kontak_siswa,$jk_siswa,$alamat_siswa){
		global $conn;
		$query = $conn->query("SELECT id_siswa from info_siswa where id_siswa='$id_siswa' or email ='$email_siswa' ");

		$num = $query->num_rows;
		$in_sql = "INSERT INTO info_siswa (id_siswa,nama,password,email,tgl_lahir,jk,kontak,alamat) VALUES ('$id_siswa','$nama_siswa','$pw_siswa','$email_siswa','$tgllahir','$jk_siswa','$kontak_siswa','$alamat_siswa') ";
		if($num == 0){
			$conn->query($in_sql);
			return true;
		}else{
			return false;
		}
	}
	
	//function for student login
	public function st_userlogin($id_siswa, $pw_siswa){
		global $conn;
		$sql = "SELECT id_siswa,nama FROM info_siswa WHERE id_siswa='$id_siswa' and password='$pw_siswa'";
		$result = $conn->query($sql);
		$userdata = $result->fetch_assoc();
		$count = $result->num_rows;
		if($count == 1){
			session_start();
			$_SESSION['st_login'] = true; 
			$_SESSION['sid'] = $userdata['id_siswa']; 
			$_SESSION['sname'] = $userdata['nama']; 
			//$_SESSION['login_msg'] = "Login Success"; 
			return true;
		}else{
			return false;
		}
		
	}
	
	//function for get student Name 
	public function getusername($sid){
		global $conn;
		$query = $conn->query("select nama from info_siswa where id_siswa='$sid'");
		$result = $query->fetch_assoc();
		echo $result['nama'];
	}
	// Get all info of a specific student by Student ID
	public function getuserbyid($id_siswa){
		global $conn;
		$query = $conn->query("select * from info_siswa where id_siswa='$id_siswa'");
		return $query;
	}
	//Update Student Profile
	public function updateprofile($sid,$nama_siswa,$email_siswa,$tgllahir,$jk_siswa,$kontak_siswa,$alamat_siswa){
		global $conn;
		$query = $conn->query("update info_siswa set nama='$nama_siswa',email='$email_siswa',tgl_lahir='$tgllahir',jk='$jk_siswa',kontak='$kontak_siswa', alamat='$alamat_siswa' where id_siswa='$sid'");
		return true;
	}
	
	//Change Student Password
	public function updatePassword($sid, $newpass, $oldpass){
		global $conn;
		$query = $conn->query("select id_siswa from info_siswa where id_siswa='$sid' and password='$oldpass' ");
		$count = $query->num_rows;
		if($count == 0){
			return print("<p style='color:red;text-align:center'>password lama tidak tersedia</p>");
		}else{
			$update = $conn->query("update info_siswa set password='$newpass' where id_siswa='$sid' ");
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
	public function teach_registration($name,$uname, $pass,$email,$jk_guru,$kontak_guru,$alamat_guru){
		global $conn;
		$fct = $conn->query("select id from guru where username='$uname' ");
		$count = $fct->num_rows;
		if($count == 0){
			$sql = "insert into guru(nama,username,password,email,jk,kontak,alamat) values('$name','$uname','$pass','$email','$jk_guru','$kontak_guru','$alamat_guru')";
			$result = $conn->query($sql);
			return true;
		}else{
			return false;
		}
	}
	//get teach 
	public function get_teach_by_username($uname){
		global $conn;
		$sql = "select * from guru where username='$uname'";
		$result = $conn->query($sql);
		return $result;
	}
	public function get_teach(){
		global $conn;
		$sql = "select * from guru order by id ASC";
		$result = $conn->query($sql);
		return $result;
	}
	//login for teach 
	public function teach_login($uname, $pass){
		global $conn;
		$sql = "select * from guru where username='$uname' and password='$pass' ";
		$result = $conn->query($sql);
		$count = $result->num_rows;
		$fctinfo = $result->fetch_assoc();
		if($count == 1){
			session_start();
			$_SESSION['teach_login'] = true;
			$_SESSION['f_id'] = $fctinfo['id'];
			$_SESSION['f_uname'] = $fctinfo['username'];
			$_SESSION['f_name'] = $fctinfo['nama'];
			$_SESSION['f_pass'] = $fctinfo['password'];
			return true;
		}else{
			return false;
		}
	}
	public function teach_logout(){
		$_SESSION['teach_login'] = false;
		unset($_SESSION['f_id']);
		unset($_SESSION['f_uname']);
		unset($_SESSION['f_name']);
		unset($_SESSION['f_pass']);
		unset($_SESSION['fct_login']);
	}
	public function get_teach_session(){
		return @$_SESSION['teach_login'];
	}
	
	/*
	**********************
	----------------------
	All functions for Admin 
	----------------------
	**********************
	*/
	
	//for getting All student infomation 
	public function get_all_student(){
		global $conn;
		$sql = "select * from info_siswa order by id_siswa ASC";
		$query = $conn->query($sql);
		return $query;
	}
	//search student
	//Search Query
	public function search($query){
		global $conn;
		$result = $conn->query("SELECT * FROM info_siswa WHERE (id_siswa LIKE '%".$query."%'
							OR nama LIKE '%".$query."%'
								OR kontak LIKE '%".$query."%'
									OR email LIKE '%".$query."%') order by id_siswa");
		return $result;
	}
	
	//Admin log in function 
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
	public function delete_student($id_siswa){
		global $conn;
		$sql = "delete from info_siswa where id_siswa='$id_siswa' ";
		$result = $conn->query($sql);
		if($result){
			return true;
		}else{
			return false;
		}
	}
	//attendance system
	
	public function attn_student(){
		global $conn;
		$sql = "select * from info_siswa";
		$result = $conn->query($sql);
		return $result;
	}
	public function add_attn_student($name,$stid){
		global $conn;
		$sql = "insert into info_siswa(nama,id_siswa) values('$name','$stid')";
		$result = $conn->query($sql);
		
		$sql2 = "insert into info_siswa(id_siswa) values('$stid')";
		$result = $conn->query($sql2);
		return $result;
	}
	public function insertattn($cur_date,$atten = array()){
		global $conn;
		$sql = "select distinct tgl_presensi from presensi";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()){
			$db_date = $row['tgl_presensi'];
			if($cur_date == $db_date){
				return false;
			}
		}
		foreach($atten as $key =>$attn_value ){
			if($attn_value == "present"){
				$sql = "insert into presensi(id_siswa,presensi,tgl_presensi) values('$key','present','$cur_date')";
				$att_res = $conn->query($sql);
			}elseif($attn_value == "absent"){
				$sql = "insert into presensi(id_siswa,presensi,tgl_presensi) values('$key','absent','$cur_date')";
				$att_res = $conn->query($sql);
			}
		}
		if($att_res){
			return true;
		}else{
			return false;
		}
		
	}
	public function delete_atn_student($at_id){
		global $conn;
		$res = $conn->query("delete from info_siswa where id = '$at_id' ");
		return $res;
	}
	public function get_attn_date(){
		global $conn;
		$res = $conn->query("select distinct tgl_presensi from presensi ");
		return $res;
		
	}
	public function attn_all_student($date){
		global $conn;
		$res = $conn->query("select info_siswa.nama, presensi.*
			from info_siswa
			inner join presensi
			on info_siswa.id_siswa = presensi.id_siswa
			where tgl_presensi = '$date' ");
		return $res;
	}
	public function update_attn($date,$atten){
		global $conn;
		foreach($atten as $key =>$attn_value ){
			if($attn_value == "present"){
				$sql = "update presensi set presensi='present' where id_siswa='$key' and tgl_presensi='$date' ";
				$att_res = $conn->query($sql);
			}elseif($attn_value == "absent"){
				$sql = "update presensi set presensi='absent' where id_siswa='$key' and tgl_presensi='$date' ";
				$att_res = $conn->query($sql);
			}
		}
		if($att_res){
			return true;
		}else{
			return false;
		}
	}
	//grading system
	public function add_marks($stid,$subject,$marks){
		global $conn;
		$qry = "select * from hasil where id_siswa='$stid' and mapel='$subject' ";
		$query = $conn->query($qry);
		$count = $query->num_rows;
		if($count>0){
			return false;
		}else{
		$sql = "insert into hasil(id_siswa,nilai,mapel) values('$stid','$marks','$subject')";
		$result = $conn->query($sql);
		return $result;
		}
	}
	//show marks
	public function show_marks($stid){
		global $conn;
		$result = $conn->query("select * from hasil where id_siswa='$stid'");
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
			$sql = "update hasil set nilai='$mark' where id_siswa='$stid' and mapel='$key' ";
				$result = $conn->query($sql);	
		}
		if($result){
			return true;
		}else{
			return false;
		}
	}
	public function view_cgpa($stid){
		global $conn;
		$sql = "select * from hasil where id_siswa='$stid'";
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