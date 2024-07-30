<?php
ob_start();
session_start();
require "../main/config.php";
require "connect.php";
$user = new LoginAndRegTeacher();
if($user->getTeacherSession()){
	header('Location: profile.php');
	exit();
}
?>

<?php
$pageTitle = "Login Guru";
include "top.php";
?>

<div class="wrapper">
	<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$nip = $_POST['nip'];
						$pass = $_POST['password'];

						if(empty($nip) || empty($pass)){
							echo "<p style='color:red;text-align:center;'>Kolom tidak boleh kosong.</p>";
						}else{
							$pass = md5($pass);
							$login = $user->teacherLogin($nip, $pass);
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
        <input type="text" name="nip" required>
        <label>Masukkan NIP</label>
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