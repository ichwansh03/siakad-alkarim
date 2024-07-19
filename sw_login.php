<?php
ob_start ();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if($user->getsession()){
	header('Location: sw_profile.php');
	exit();
}
?>
<?php 
$pageTitle = "Login Siswa";
include "header.php";
?>
	<div class="loginform fix">
		<div class="msg"><h3><i class="fa fa-graduation-cap" aria-hidden="true"></i>Login Siswa</h3></div>
		<div class="access">
		
		<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$st_id	  = $_POST['id_siswa'];
						$st_pass = $_POST['password'];

						if(empty($st_id) or empty($st_pass)){
							echo "<p style='color:red;text-align:center;'>Kolom tidak boleh kosong.</p>";
						}else{
							$st_pass = md5($st_pass);
							$login = $user->st_userlogin($st_id, $st_pass);
							if($login){
								header('Location: sw_profile.php');
							}else{
								echo "<p style='color:red;text-align:center'>ID siswa atau password salah</p>";
							}
						}
					}
				?>
				
			<form action="" method="post">
				<input type="text" name="id_siswa" placeholder="ID Siswa" />
				<input type="password" name="password" placeholder="password" />
				<input type="submit" value="Login" />
			</form>
		</div>
		<p>Belum terdaftar? <a href="sw_reg.php">Buat akun</a></p>
	</div>

<?php include "footer.php"; ?>
<?php ob_end_flush() ; ?>