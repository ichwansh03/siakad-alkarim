<?php
ob_start ();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if($user->get_teach_session()){
	header('Location: guru_profile.php');
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
						$nip = $_POST['nip'];
						$psw  = $_POST['password'];

						if(empty($nip) or empty($psw)){
							echo "<p style='color:red;text-align:center;'>Kolom tidak boleh kosong.</p>";
						}else{
							$psw = md5($psw);
							$login = $user->teach_login($nip, $psw);
							if($login){
								header('Location: guru_profile.php');
							}else{
								echo "<p style='color:red;text-align:center'>nip atau password salah</p>";
							}
						}
					}
				?>
				
			<form action="" method="post">
				<input type="text" name="nip" placeholder="NIP" />
				<input type="password" name="password" placeholder="Password" />
				<p style="text-align: end;"><a href="guru_ubah_pw.php">Lupa Password</a></p>
				<input style="color:#ddd;background:#3498db;margin-top:5%" type="submit" value="Login" />
			</form>
		</div>
		<p >Belum Terdaftar? <a href="guru_reg.php">Buat Akun</a></p>
	</div>

<?php
 include "footer.php"; 
  ob_end_flush() ; 
?>