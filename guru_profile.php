<?php
ob_start();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
$fid = $_SESSION['f_id'];
$fname = $_SESSION['f_name'];
$fclass = $_SESSION['f_class'];
if(!$user->get_teach_session()){
	header('Location: guru_login.php');
	exit();
}
?>	
<?php 
$pageTitle = "Profil Guru";
include "php/headertop_guru.php";
?>
	<div class="faculty">
		<p style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0">Selamat Datang : <?php echo $fname; ?> <i class="fa fa-check-circle" aria-hidden="true"></i></p>


			<table class="tab_one">
			<?php
				$getuser = $user->get_teach_by_nip($fid);
				while($row = $getuser->fetch_assoc()){
			?>
			<tr>
				<td><b>NIP: </b></td>
				<td><?php echo $row['nip']; ?></td>
			</tr>
			<tr>
				<td><b>Nama: </b></td>
				<td><?php echo $row['nama']; ?></td>
			</tr>
			<tr>
				<td><b>Kelas Ajar: </b></td>
				<td><?php echo $row['kelas_ajar']; ?></td>
			</tr>
			<tr>
				<td><b>Kelas Ajar: </b></td>
				<td><?php echo $row['email']; ?></td>
			</tr>
			
			<tr>
				<td><b>Kontak: </b></td>
				<td><?php echo $row['kontak']; ?></td>
			</tr>
			<tr>
				<td><b>Tanggal Lahir: </b></td>
				<td><?php echo $row['tgl_lahir']; ?></td>
			</tr>
			<tr>
				<td><b>Jenis Kelamin: </b></td>
				<td><?php echo $row['jk']; ?></td>
			</tr>
			<tr>
				<td><b>Alamat: </b></td>
				<td><?php echo $row['alamat']; ?></td>
			</tr>
			<?php if($row['nip'] == $fid){ ?>
			<tr>
				<td><b>Update Profil:</b> </td>
				<td><a href="guru_update.php?id=<?php echo $row['nip'];?>"><button class="editbtn">Edit Profil</button></a></td>
			</tr>
			<?php } } ?>
		</table>

	</div>

<?php
include "php/footerbottom.php";
ob_end_flush();
?>