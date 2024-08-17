<?php
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if($user->getsession()){
	header('Location: sw_profile.php');
}
?>
<?php 
$pageTitle = "Registrasi Siswa";
include "header.php";
?>
	<div class="sw_reg fix">
		<h2>Student Registration Form</h2>
		<p class="msg">
				<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$id_siswa   = $_POST['nisn'];
						$st_name = $_POST['nama'];
						$st_pass = $_POST['password'];
						$st_email = $_POST['email'];
						$st_kelas = $_POST['kelas'];
						$BirthMonth = $_POST['BirthMonth'];
						$BirthDay	 = $_POST['BirthDay'];
						$BirthYear	 = $_POST['BirthYear'];
						$bday = "{$BirthYear}-{$BirthMonth}-{$BirthDay}";
						
						$st_contact  = $_POST['kontak'];
						$st_gender  = $_POST['jk'];
						$st_add  = $_POST['alamat'];
						$st_nidn = $_POST['nidn'];
						
						if(empty($id_siswa) or empty($st_name) or empty($st_pass ) or empty($st_email) or empty($BirthMonth) or empty($BirthDay) or empty($BirthYear) or empty($st_contact) or empty($st_gender) or empty($st_add) or empty($st_nidn) or empty($kelas)){
							echo "<p style='color:red;text-align:center'>**Kolom tidak boleh kosong**</p>";
						}else{
							$st_pass = md5($st_pass);
							$st_register = $user->st_registration($id_siswa,$st_name,$st_pass,$st_email,$bday,$st_contact,$st_gender,$st_add,$st_nidn,$kelas);
							if($st_register){
								echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Registrasi berhasil<a style='font-size:20px;color:#8e44ad' href='sw_login.php'>Login</a></h3>";
							}else{
								echo "<p style='color:red;text-align:center'>Error..ID Siswa atau email sudah terdaftar</p>";
							}
						}
					}
				?>
			
			</p>
		<form action="" method="post" id="st_form">
			<table>
				<tr>
					<th>Name: </th>
					<td><input type="text" name="nama" placeholder="Nama Lengkap" required /></td>
				</tr>
				<tr>
				<tr>
					<th>Student ID: </th>
					<td><input type="text" name="nisn" placeholder="NISN" required /></td>
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
					<th>Kelas: </th>
					<td><input type="text" name="kelas" placeholder="Kode kelas" required /></td>
				</tr>
				<tr>
					<th>Tanggal Lahir: </th>
					<td>
						<fieldset>

						  <select class="select-style" name="BirthMonth">
						  <option  value="01">Jan</option>

						<option value="02">Feb</option>

						 <option value="03" >Maret</option>

						  <option value="04">April</option>

						  <option value="05">Mei</option>

						  <option value="06">Juni</option>

						  <option value="07">Juli</option>

						 <option value="08">Ags</option>

						  <option value="09">Sep</option>

							<option value="10">Okt</option>

						 <option value="11">Nov</option>
						  <option value="12" >Des</option>
						  </label>

						</select>   

						<label><input class="birthday" maxlength="2" name="BirthDay"  placeholder="Day" required=""></label>

						<label><input class="birthyear" maxlength="4" name="BirthYear" placeholder="Year" required=""></label>

					  </fieldset>
					</td>
				</tr>
				<tr>
					<th>Kontak:</th>
					<td><input type="text" name="kontak" placeholder="No Hp" required /></td>
				</tr>
				<tr>
					<th>Jenis Kelamin:</th>
					<td><label><input type="radio" name="jk" value="Laki" checked/> Laki</label>
					<label><input type="radio" name="jk" value="Perempuan"/> Perempuan</label>
						
					</td>
				</tr>
				<tr>
					<th>Alamat:</th>
					<td><input type="text" name="alamat" placeholder="Address" required /></td>
				</tr>
				<tr>
					<th>NIDN:</th>
					<td><input type="text" name="nidn" placeholder="NIDN" required /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="sub" value="Daftar" /></td>
				</tr>
			</table>
		</form>

	</div>

<?php include "footer.php"; ?>

