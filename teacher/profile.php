<?php
session_start();
	require "../main/config.php";
	require_once "connect.php";
	$user = new LoginAndRegTeacher;
	$nip = $_SESSION['tc_nip'];
	$name = $_SESSION['tc_name'];
	if(!$user->getTeacherSession()){
		header('Location: index.php');
		exit();
	}
?>
<?php 
$pageTitle = "Profil Guru";
include "top.php";
?>
<div class="profile">
		<p style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0">Selamat Datang : <?php $user->getTeacherByName($name); ?> <i class="fa fa-check-circle" aria-hidden="true"></i></p>
		<table class="tab_one">
			<?php
				$getuser = $user->teacherById($nip);
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
			<tr >
				<td><b>NIP:</b> </td>
				<td><?php echo $row['nip']; ?></td>
			</tr>
			<tr>
				<td><b>Nama:</b> </td>
				<td><?php echo $row['nama']; ?></td>
			</tr>
			<tr>
				<td><b>E-mail:</b> </td>
				<td><?php echo $row['email']; ?></td>
			</tr>
			<tr>
				<td><b>Tanggal Lahir:</b> </td>
				<td><?php echo $row['tgl_lahir']; ?></td>
			</tr>
			<tr>
				<td><b>Kontak:</b> </td>
				<td><?php echo $row['kontak']; ?></td>
			</tr>
			<tr>
				<td><b>Jenis Kelamin:</b> </td>
				<td><?php echo $row['jk']; ?></td>
			</tr>
            
			<tr>
				<td><b>Alamat:</b> </td>
				<td><?php echo $row['alamat']; ?></td>
			</tr>
			<?php if($row['nip'] == $nip){ ?>
			<tr>
				<td><b>Update Profil:</b> </td>
				<td><a href="update.php?id=<?php echo $row['nip'];?>"><button class="editbtn">Edit Profil</button></a></td>
			</tr>
			<?php } } ?>
		</table>

</div>

<?php include "../student/bottom.php";?>