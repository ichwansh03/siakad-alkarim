<?php
ob_start ();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if($user->get_teach_session()){
	header('Location: kelas_pres_guru.php');
	exit();
}
?>

<?php 
$pageTitle = "Login Guru";
include "header.php";
?>
	<div class="loginform fix">
		<div class="msg "><h3><i class="fa fa-user" aria-hidden="true"></i> Login Guru</h3></div>
		<div class="access">
		
			<?php
			//php for teach login
			if($_SERVER['REQUEST_METHOD'] == "POST"){
						$username = $_POST['username'];
						$psw  = $_POST['password'];

						if(empty($username) or empty($psw)){
							echo "<p style='color:red;text-align:center;'>Kolom tidak boleh kosong.</p>";
						}else{
							$psw = md5($psw);
							$login = $user->teach_login($username, $psw);
							if($login){
								header('Location: kelas_pres_guru.php');
							}else{
								echo "<p style='color:red;text-align:center'>Username atau password salah</p>";
							}
						}
					}
				?>
				
			<form action="" method="post">
				<input type="text" name="username" placeholder="Username" />
				<input type="password" name="password" placeholder="Password" />
				<input style="color:#ddd;background:#3498db" type="submit" value="Login" />
			</form>
		</div>
		<p >Not Registered? <a href="guru_reg.php">Buat Akun</a></p>
	</div>

<?php
 include "footer.php"; 
  ob_end_flush() ; 
?>