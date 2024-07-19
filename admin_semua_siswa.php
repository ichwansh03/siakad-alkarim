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
$pageTitle = "Detail semua siswa";
include "php/headertop_admin.php";
?>
<div class="all_student">
	<div class="search_st">
		<div class="hdinfo"><h3>List Siswa Terdaftar</h3></div>
		
		<div class="search">
		<form action="admin_cari_siswa.php" method="GET">
			<input type="text" name="src_student" placeholder="search student" />
			<input type="submit" value="Search" />
		</form>
		</div>
	</div>
		<?php
			if(isset($_REQUEST['res'])){
				if($_REQUEST['res']==1){
					echo "<h3 style='color:green;text-align:center;margin:0;padding:10px;'>Data berhasil dihapus</h3>";
				}
			}
			
		?>
		<table class="tab_one">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>NISN</th>
				<th>Lihat Profil</th>
				<th>Edit</th>
				<th>Hapus</th>
				<th>Foto</th>
			</tr>
			<?php 
			$i=0;
				$alluser = $user->get_all_student();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $rows['nama'];?></td>
				<td><?php echo $rows['id_siswa'];?></td>
				<td><a href="admin_single_siswa.php?id=<?php echo $rows['id_siswa'];?>">Detail</a></td>
				<td><a href="admin_single_siswa_update.php?id=<?php echo $rows['id_siswa'];?>">Edit</a></td>
				<td><a href="admin_delete_siswa.php?id=<?php echo $rows['id_siswa'];?>">Hapus</a></td>
				<td><img src="img/student/<?php echo $rows['img'];?>" width="50px" height="50px" title="<?php echo $rows['nama'];?>" /></td>
			</tr>
			<?php } ?>
		</table>
</div>
<?php include "php/footerbottom.php";?>
<?php ob_end_flush() ; ?>