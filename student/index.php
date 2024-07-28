<?php
//ini_set('display_errors','1');
ob_start ();
session_start();
require "../main/config.php";
require_once "connect.php";
$user = new LoginAndRegStudent();
if($user->getSession()){
	header('Location: profile.php');
	exit();
}
?>
<?php
$pageTitle = "Login Siswa";
include "top.php";
?>
	<div class="wrapper">
	<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$st_id = $_POST['nisn'];
						$st_pass = $_POST['password'];

						if(empty($st_id) || empty($st_pass)){
							echo "<p style='color:red;text-align:center;'>Kolom tidak boleh kosong.</p>";
						}else{
							$st_pass = md5($st_pass);
							$login = $user->studentLogin($st_id, $st_pass);
							if($login){
								header('Location: profile.php');
							}else{
								echo "<p style='color:red;text-align:center'>NISN atau password salah</p>";
							}
						}
					}
				?>
    <form action="" method="post">
      <h2>Login</h2>
        <div class="input-field">
        <input type="text" name="nisn" required>
        <label>Masukkan NISN</label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Masukkan Password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Ingatkan saya</p>
        </label>
        <a href="#">Lupa password?</a>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Belum terdaftar?? <a href="register.php">Buat akun</a></p>
      </div>
    </form>
  </div>

<?php include "bottom.php"; ?>
<?php ob_end_flush() ; ?>