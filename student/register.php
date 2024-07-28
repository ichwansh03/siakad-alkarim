<?php
session_start();
require "../main/config.php";
require_once "connect.php";
$user = new LoginAndRegStudent();
if($user->getsession()){
	header('Location: profile.php');
}
?>
<?php
$pageTitle = "Registrasi Siswa";
include "top.php";
?>
	<div class="wrapper">
		
				<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$nisn   = $_POST['nisn'];
						$st_name = $_POST['nama'];
						$st_pass = $_POST['password'];
						$st_email = $_POST['email'];
						
						$BirthMonth = $_POST['BirthMonth'];
						$BirthDay	 = $_POST['BirthDay'];
						$BirthYear	 = $_POST['BirthYear'];
						$bday = "{$BirthYear}-{$BirthMonth}-{$BirthDay}";
						
						$st_contact  = $_POST['kontak'];
						$st_gender  = $_POST['jk'];
						$st_nipd = $_POST['nipd'];
						$st_add  = $_POST['alamat'];
						
						if(empty($nisn) || empty($st_name) || empty($st_pass ) || empty($st_email) || empty($BirthMonth) || empty($BirthDay) || empty($BirthYear) || empty($st_contact) || empty($st_gender) || empty($st_nipd) || empty($st_add)){
							echo "<p style='color:red;text-align:center'>**Kolom tidak boleh kosong**</p>";
						}else{
							$st_pass = md5($st_pass);
							$st_register = $user->studentReg($nisn,$st_name,$st_email,$st_pass,$bday,$st_gender,$st_contact,$st_nipd,$st_add);
							
							if($st_register){
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
				<input type="text" name="nisn" required>
				<label>Masukkan NISN</label>
			</div>
			<div class="input-field">
				<input type="text" name="nipd" required>
				<label>Masukkan NIPD</label>
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
					<th>NISN: </th>
					<td><input type="text" name="nisn" placeholder="NISN" required /></td>
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

<?php include "bottom.php"; ?>

