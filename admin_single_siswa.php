<?php
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if(isset($_REQUEST['id'])){
		$st_id = $_REQUEST['id'];
	}else{
		header('Location: admin.php');
		exit();
	}
	
	if(!$user->get_admin_session()){
		header('Location: index.php');
		exit();
	}
?>
<?php 
$pageTitle = "Detail Siswa";
include "php/headertop_admin.php";
?>
<div class="profile">
		<p style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0"><?php $user->getusername($st_id); ?> <i class="fa fa-check-circle" aria-hidden="true"></i></p>
		<table class="tab_one">
			<?php
				$getuser = $user->getuserbyid($st_id);
				while($row = $getuser->fetch_assoc()){
			?>
			<tr>
				<td></td>
				<?php if(empty($row['img'])){?>
				<td><img src="img/default.png" style="height:180px; width:180px; border:1px #1ABC9C solid;border-radius:90px" alt="" /></td>
				<?php }else{ ?>
				<td><img src="img/student/<?php echo $row['img']; ?>" style="height:180px; width:180px; border:1px #1ABC9C solid;border-radius:90px" alt="" /></td>
				<?php }?>
			</tr>
			<tr>
				<td>ID Siswa: </td>
				<td><?php echo $row['id_siswa']; ?></td>
			</tr>
			<tr>
				<td>Nama: </td>
				<td><?php echo $row['nama']; ?></td>
			</tr>
			<tr>
				<td>E-mail: </td>
				<td><?php echo $row['email']; ?></td>
			</tr>
			<tr>
				<td>Tanggal Lahir: </td>
				<td><?php echo $row['tgllahir']; ?></td>
			</tr>
			<tr>
				<td>Kontak: </td>
				<td><?php echo $row['kontak']; ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin: </td>
				<td><?php echo $row['jk']; ?></td>
			</tr>
			<tr>
				<td>Alamat: </td>
				<td><?php echo $row['alamat']; ?></td>
			</tr>
			<tr>
				<td>Update Profil: </td>
				<td><a href="admin_single_siswa_update.php?id=<?php echo $row['id_siswa'];?>"><button class="editbtn">Edit Profil</button></a></td>
			</tr>
			<?php  } ?>
		</table>
		<div class="back fix">
			<p style="text-align:center"><a href="admin_semua_siswa.php"><button class="editbtn">Back to student list</button></a></p>
		</div>

</div>

<?php include "php/footerbottom.php";?>
