<?php
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if($user->getsession()){
	header('Location: guru_profile.php');
}
?>
<?php 
$pageTitle = "Registrasi Guru";
include "header.php";
?>
	<div class="st_reg fix">
		<h2 style="color:#ddd;background:#3498db">Registrasi Guru</h2>
		<p class="msg">
				<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$st_name = $_POST['nama'];
						$uname = $_POST['username'];
						$st_pass = $_POST['password'];
						$st_email = $_POST['email'];
						$st_gender  = $_POST['jk'];	
						$st_contact  = $_POST['kontak'];
						$st_add  = $_POST['alamat'];
						
						if(empty($st_name) or empty($uname) or empty($st_pass ) or empty($st_email)or empty($st_contact) or empty($st_gender) or empty($st_add)){
							echo "<p style='color:red;text-align:center'>**Kolom tidak boleh kosong**</p>";
						}else{
							$st_pass = md5($st_pass);
							$fct_register = $user->teach_registration($st_name,$uname,$st_pass,$st_email,$st_gender,$st_contact,$st_add);
							if($fct_register){
								echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Registrasi Berhasil !! <a style='font-size:20px;color:#8e44ad' href='loginguru.php'>Login</a></h3>";
							}else{
								echo "<p style='color:red;text-align:center'>Error..username Already exists</p>";
							}
						}
					}
				?>
			
			</p>
		<form action="" method="post" id="st_form">
			<table>
				<tr>
					<th>Nama: </th>
					<td><input type="text" name="nama" placeholder="Nama Lengkap" required /></td>
				</tr>
				<tr>
				<tr>
					<th>Username: </th>
					<td><input type="text" name="username" placeholder="username" required /></td>
				</tr>
				<tr>
					<th>Password: </th>
					<td><input type="password" name="password" placeholder="password" required /></td>
				</tr>
				<tr>
					<th>E-mail: </th>
					<td><input type="email" name="email" placeholder="example@email.com" required /></td>
				</tr>
				
				<tr>
					<th>Jenis Kelamin:</th>
					<td><label><input type="radio" name="jk" value="Pria" checked/> Pria</label>
					<label><input type="radio" name="jk" value="Wanita"/> Wanita</label>
					</td>
				</tr>
				<tr>
					<th>Kontak:</th>
					<td><input type="text" name="kontak" placeholder="No HP" required /></td>
				</tr>
				<tr>
					<th>Alamat:</th>
					<td><input type="text" name="alamat" placeholder="Alamat" required /></td>
				</tr>
				<tr>
					<td colspan="2"><input style="color:#ddd;background:#3498db" type="submit" name="sub" value="Register" /></td>
				</tr>
			</table>
		</form>

	</div>

<?php include "footer.php"; ?>

