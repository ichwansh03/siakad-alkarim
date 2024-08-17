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
						$tc_nip = $_POST['nip'];
						$tc_name = $_POST['nama'];
						$tc_pass = $_POST['password'];
						$tc_email = $_POST['email'];
						$tc_gender  = $_POST['jk'];	
						$tc_kontak  = $_POST['kontak'];
						$tc_alamat  = $_POST['alamat'];
						$tc_kelas = $_POST['kelas_ajar'];
						
						if(empty($tc_name) or empty($tc_pass ) or empty($tc_email)or empty($tc_kontak) or empty($tc_gender) or empty($tc_alamat) or empty($tc_nip) or empty($tc_kelas)){
							echo "<p style='color:red;text-align:center'>**Kolom tidak boleh kosong**</p>";
						}else{
							$tc_pass = md5($tc_pass);
							$fct_register = $user->teach_registration($tc_nip, $tc_name,$tc_pass,$tc_email,$tc_gender,$tc_kontak,$tc_alamat, $tc_kelas);
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
					<th>NIP: </th>
					<td><input type="text" name="nip" placeholder="NIP" required /></td>
				</tr
				<tr>
					<th>Nama: </th>
					<td><input type="text" name="nama" placeholder="Nama Lengkap" required /></td>
				</tr>
				<tr>
				<tr>
					<th>Password: </th>
					<td><input type="password" name="password" placeholder="password" required /></td>
				</tr>
				<tr>
					<th>E-mail: </th>
					<td><input type="email" name="email" placeholder="example@email.com" required /></td>
				</tr>
				<tr>
					<th>Kelas Ajar: </th>
					<td><input type="text" name="kelas_ajar" placeholder="Kode Kelas" required /></td>
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

