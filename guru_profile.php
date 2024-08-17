<?php
ob_start();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
$fid = $_SESSION['f_id'];
$fname = $_SESSION['f_name'];
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
				<td  style="text-align:center">Nama: </td>
				<td><?php echo $row['nama']; ?></td>
			</tr>
			
			<tr>
				<td  style="text-align:center">E-mail: </td>
				<td><?php echo $row['email']; ?></td>
			</tr>
			
			<tr>
				<td  style="text-align:center">Kontak: </td>
				<td><?php echo $row['kontak']; ?></td>
			</tr>
			<tr>
				<td  style="text-align:center">Jenis Kelamin: </td>
				<td><?php echo $row['jk']; ?></td>
			</tr>
			<tr>
				<td  style="text-align:center">Alamat: </td>
				<td><?php echo $row['alamat']; ?></td>
			</tr>
			<?php if($row['nip'] == $fid){ ?>
			
			<?php } } ?>
		</table>

	</div>

<?php
include "php/footerbottom.php";
ob_end_flush();
?>