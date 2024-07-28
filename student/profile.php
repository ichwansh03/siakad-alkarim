<?php
session_start();
	require "../main/config.php";
	require_once "connect.php";
	$user = new LoginAndRegStudent();
	$sid = $_SESSION['sid'];
	$sname = $_SESSION['sname'];
	if(!$user->getsession()){
		header('Location: index.php');
		exit();
	}
?>	
<?php 
$pageTitle = "Profil Siswa";
include "top.php";
?>
<div class="profile">
		<p style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0">Selamat Datang : <?php $user->studentName($sid); ?> <i class="fa fa-check-circle" aria-hidden="true"></i></p>
		<table class="tab_one">
			<?php
				$getuser = $user->studentById($sid);
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
				<td><b>NISN:</b> </td>
				<td><?php echo $row['nisn']; ?></td>
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
				<td><b>NIPD:</b> </td>
				<td><?php echo $row['nipd']; ?></td>
			</tr>
			<tr>
				<td><b>Alamat:</b> </td>
				<td><?php echo $row['alamat']; ?></td>
			</tr>
			<?php if($row['nisn'] == $sid){ ?>
			<tr>
				<td><b>Update Profil:</b> </td>
				<td><a href="update.php?id=<?php echo $row['nisn'];?>"><button class="editbtn">Edit Profil</button></a></td>
			</tr>
			<?php } } ?>
		</table>

</div>

<?php include "bottom.php";?>