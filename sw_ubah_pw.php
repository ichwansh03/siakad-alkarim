<?php
ini_set('display_errors','1');
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
?>

<?php 
$pageTitle = "Ubah Password";
?>
<div class="profile">
			<h3 style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0">Ubah Password Siswa</h3>
				<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$sid = $_POST['nisn'];
						$newpass  = $_POST['newpass'];
						$confirmpass  = $_POST['confirmpass'];
						if(empty($newpass) or empty($sid) or empty($confirmpass)){
							echo "<p style='color:red;text-align:center'>Kolom tidak boleh kosong.</p>";
						}elseif($newpass != $confirmpass){
							echo "<p style='color:red;text-align:center'>Password tidak sama.</p>";
						}else{
							$newpass = md5($newpass);
							$user->updatePassword($sid, $newpass);
						}
					}
				?>
			
			<div style="width:40%;margin:50px auto">
				<form action="" method="post">
						
					<table class="tab_one" >
						<tr>
							<td style="width:125px;"></td>
							<td width="26%">NISN:</td>
							<td><input type="text" name="nisn" placeholder="NISN" /></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Password Baru:</td>
							<td><input type="password" name="newpass" placeholder="Password Baru" /></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Password Konfirmasi:</td>
							<td><input type="password" name="confirmpass" placeholder="Konfirmasi Password" /></td>
						</tr>
				
						<tr>
						<td style="width:125px;"></td>
						<td></td>
						<td colspan="2">
							<input style="background:#3498db;color:#fff;width:168px;border-radius:5px;" type="submit" name="Update" value="Update">
							</td>						
						</tr>
					</table>
				</form>
			</div>
			<div class="back fix">
				<p style="text-align:center"><a href="index.php"><button class="editbtn">Kembali ke halaman login</button></a></p>
			</div>
</div>


<?php include "php/footerbottom.php";?>