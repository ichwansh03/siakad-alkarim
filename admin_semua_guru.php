<?php
	ob_start ();
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
$pageTitle = "Detail Guru";
include "php/headertop_admin.php";
?>
<div class="all_student">
	<div class="search_st">
		<div class="hdinfo"><h3>List Guru</h3></div>

	</div>

		<table class="tab_one">
			<tr>
				<th>NIP</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Kontak</th>
				<th>Alamat</th>
				<th>Jenis Kelamin</th>
			</tr>
			<?php 
			$i=0;
				$alluser =$user->get_teach();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $rows['nama'];?></td>
				<td><?php echo $rows['email'];?></td>
				<td><?php echo $rows['kontak'];?></td>
				<td><?php echo $rows['alamat'];?></td>
				<td><?php echo $rows['jk'];?></td>
				
			</tr>
			<?php } ?>
		</table>
</div>
<?php include "php/footerbottom.php";?>
<?php ob_end_flush() ; ?>