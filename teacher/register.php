<?php
session_start();
require "../main/config.php";
require_once "connect.php";
$user = new LoginAndRegTeacher();
if($user->getTeacherSession()){
	header('Location: profile.php');
}
?>
<?php
$pageTitle = "Registrasi Guru";
include "top.php";
?>
	<div class="wrapper">
		
				<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$nip   = $_POST['nip'];
						$tc_name = $_POST['nama'];
						$tc_pass = $_POST['password'];
						$tc_email = $_POST['email'];
						
						$BirthMonth = $_POST['BirthMonth'];
						$BirthDay	 = $_POST['BirthDay'];
						$BirthYear	 = $_POST['BirthYear'];
						$bday = "{$BirthYear}-{$BirthMonth}-{$BirthDay}";
						
						$tc_contact  = $_POST['kontak'];
						$tc_gender  = $_POST['jk'];
						$tc_add  = $_POST['alamat'];
						
						if(empty($nip) || empty($tc_name) || empty($tc_pass ) || empty($tc_email) || empty($BirthMonth) || empty($BirthDay) || empty($BirthYear) || empty($tc_contact) || empty($tc_gender) || empty($tc_add)){
							echo "<p style='color:red;text-align:center'>**Kolom tidak boleh kosong**</p>";
						}else{
							$tc_pass = md5($tc_pass);
							$tc_register = $user->teacherReg($nip,$tc_name,$tc_email,$tc_pass,$bday,$tc_gender,$tc_contact,$tc_add);
							
							if($tc_register){
								echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Registrasi berhasil<a style='font-size:20px;color:#8e44ad' href='index.php'>Login</a></h3>";
							}else{
								echo "<p style='color:red;text-align:center'>Error..ID Siswa atau email sudah terdaftar</p>";
							}
						}
					}
				?>
			
		<form action="" method="post" id="st_form">
			<h2>Daftar</h2>
			<div class="input-field">
				<input type="text" name="nama" required>
				<label>Masukkan Nama</label>
			</div>
			<div class="input-field">
				<input type="text" name="nip" required>
				<label>Masukkan NIP</label>
			</div>

			<div class="input-field">
				<input type="email" name="email" required>
				<label>Masukkan Email</label>
			</div>
			<div class="input-field">
				<input type="password" name="password" required>
				<label>Masukkan Password</label>
			</div>
			<tr>
					<th>Tanggal Lahir: </th>
					<td>
						<fieldset>

						  <select class="select-style" name="BirthMonth">
						  <option  value="01">Januari</option>

						<option value="02">Februari</option>

						 <option value="03" >Maret</option>

						  <option value="04">April</option>

						  <option value="05">Mei</option>

						  <option value="06">Juni</option>

						  <option value="07">Juli</option>

						 <option value="08">Agustus</option>

						  <option value="09">September</option>

							<option value="10">Oktober</option>

						 <option value="11">November</option>
						  <option value="12" >Desember</option>
						  </label>

						</select>

						<label><input class="birthday" maxlength="2" name="BirthDay"  placeholder="Day" required=""></label>

						<label><input class="birthyear" maxlength="4" name="BirthYear" placeholder="Year" required=""></label>

					  </fieldset>
					</td>
				</tr>
			<tr>
					<th>Jenis Kelamin:</th>
					<td><label><input type="radio" name="jk" value="Male" checked/> LK</label>
					<label><input type="radio" name="jk" value="Female"/> PR</label>
						
					</td>
				</tr>
			<div class="input-field">
				<input type="text" name="kontak" required>
				<label>Masukkan No.HP</label>
			</div>
			<div class="input-field">
				<input type="text" name="alamat" required>
				<label>Masukkan Alamat</label>
			</div>
			<button type="submit">Daftar</button>
			<!--<table>
				<tr>
					<th>Nama: </th>
					<td><input type="text" name="nama" placeholder="Nama Lengkap" required /></td>
				</tr>
				<tr>
				<tr>
					<th>nip: </th>
					<td><input type="text" name="nip" placeholder="nip" required /></td>
				</tr>
				<tr>
					<th>E-mail: </th>
					<td><input type="email" name="email" placeholder="example@email.com" required /></td>
				</tr>
				<tr>
					<th>Password: </th>
					<td><input type="password" name="password" placeholder="password" required /></td>
				</tr>
				<tr>
					<th>Tanggal Lahir: </th>
					<td>
						<fieldset>

						  <select class="select-style" name="BirthMonth">
						  <option  value="01">Januari</option>

						<option value="02">Februari</option>

						 <option value="03" >Maret</option>

						  <option value="04">April</option>

						  <option value="05">Mei</option>

						  <option value="06">Juni</option>

						  <option value="07">Juli</option>

						 <option value="08">Agustus</option>

						  <option value="09">September</option>

							<option value="10">Oktober</option>

						 <option value="11">November</option>
						  <option value="12" >Desember</option>
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
					<td><label><input type="radio" name="jk" value="Male" checked/> LK</label>
					<label><input type="radio" name="jk" value="Female"/> PR</label>
						
					</td>
				</tr>
				<tr>
					<th>NIPD: </th>
					<td><input type="text" name="nipd" placeholder="NIPD" required /></td>
				</tr>
				<tr>
					<th>Alamat:</th>
					<td><input type="text" name="alamat" placeholder="Address" required /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="sub" value="submit" /></td>
				</tr>
			</table>-->
		</form>

	</div>

<?php include "../student/bottom.php"; ?>

