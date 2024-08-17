<?php
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
$pageTitle = "Hasil Siswa";
include "php/headertop_guru.php";
?>
<div class="all_student fix">
		
		<table class="tab_one" style="text-align:center;">
			<tr>
				<th style="text-align:center;">No</th>
				<th style="text-align:center;">Nama</th>
				<th style="text-align:center;">NISN</th>
				<th style="text-align:center;">Input Nilai</th>
				<th style="text-align:center;">Lihat Rapor</th>
				
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
				<td><?php echo $rows['nisn'];?></td>
				<td><a href="tambah_hasil.php?ar=<?php echo $rows['nisn']; ?>&vn=<?php echo $rows['nama'];?>">Input Nilai</a></td>
				<td><a href="lihat_hasil.php?vr=<?php echo $rows['nisn']; ?>&vn=<?php echo $rows['nama'];?>">Lihat Rapor</a></td>
			</tr>
			<?php } ?>
	
		</table>

		
</div>
<?php include "php/footerbottom.php";?>
<?php ob_end_flush() ; ?>