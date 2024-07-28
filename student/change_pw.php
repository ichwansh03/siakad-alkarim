<?php
	session_start();
	require "../main/config.php";
	require_once "connect.php";
	$user = new LoginAndRegStudent();
	$sid = $_SESSION['sid'];
	$sname = $_SESSION['sname'];
	
	if(!$user->getsession()){
		header('Location: index.php');
		exit();
	}
?>

<?php
$pageTitle = "Ubah Password";
include "top.php";
?>
<div class="profile">
			<h3 style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0">Update Profil</h3>
				<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$oldpass  = $_POST['oldpass'];
						$newpass  = $_POST['newpass'];
						$confirmpass  = $_POST['confirmpass'];
						if(empty($newpass) || empty($oldpass) || empty($confirmpass)){
							echo "<p style='color:red;text-align:center'>Kolom tidak boleh kosong.</p>";
						}elseif($newpass != $confirmpass){
							echo "<p style='color:red;text-align:center'>Password tidak sama.</p>";
						}else{
							$oldpass = md5($oldpass);
							$newpass = md5($newpass);
							$user->forgotPwStudent($sid, $newpass, $oldpass);
						}
					}
				?>
			
			<div class="changepass fix">
				<form action="" method="post">
						<?php
						$result = $user->studentById($sid);
						while($row = $result->fetch_assoc()){
						?>
					<table class="tab_one" >
						<tr>
							<td style="width:125px;"></td>
							<td width="26%">Password Lama:</td>
							<td><input type="password" name="oldpass" placeholder="Password Lama" /></td>
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
						<?php } ?>
				</form>
			</div>
			<div class="back fix">
				<p style="text-align:center"><a href="profile.php"><button class="editbtn">Kembali ke profil</button></a></p>
			</div>
</div>


<?php include "bottom.php";?>