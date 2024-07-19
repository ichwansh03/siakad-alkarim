<?php
session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if(!$user->get_admin_session()){
		header('Location: index.php');
		exit();
	}
?>	
<?php 
$pageTitle = "Hasil Siswa";
include "php/headertop_admin.php";
?>
<div class="all_student fix">
		
		<table class="tab_one" style="text-align:center;">
			<tr>
				<th style="text-align:center;">No</th>
				<th style="text-align:center;">Nama</th>
				<th style="text-align:center;">NISN</th>
				<th style="text-align:center;">Tambah Hasil</th>
				<th style="text-align:center;">Lihat Hasil</th>
				
			</tr>
			<?php 
			$i=0;
				$alluser = $user->get_all_student();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $rows['nama'];?></td>
				<td><?php echo $rows['id_siswa'];?></td>
				<td><a href="tambah_hasil.php?ar=<?php echo $rows['id_siswa']; ?>&vn=<?php echo $rows['nama'];?>">Tambah Hasil</a></td>
				<td><a href="lihat_hasil.php?vr=<?php echo $rows['id_siswa']; ?>&vn=<?php echo $rows['nama'];?>">Lihat Hasil</a></td>
			</tr>
			<?php } ?>
	
		</table>

		
</div>
<?php include "php/footerbottom.php";?>
<?php ob_end_flush() ; ?>