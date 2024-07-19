<?php
session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$fid = $_SESSION['f_id'];
	$funame = $_SESSION['f_uname'];
	$fname = $_SESSION['f_name'];
	if(!$user->get_teach_session()){
		header('Location: loginguru.php');
		exit();
	}
?>	
<?php 
$pageTitle = "Detail Siswa";
include "php/headertop.php";
?>
<div class="all_student fix">
		<h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:#1abc9c"> Lihat Kehadiran</h3>
		<div  class="fix" style="background:#ddd;padding:20px;">
			<span style="text-align:center;"><a style="color:#fff;" href="pres_lihat_guru.php"> <button style="background:#58A85D;border:none;color:#fff;padding:10px;">Lihat Kehadiran</button></a></span>
		</div>
		<?php
			if(isset($_REQUEST['res'])){
				echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Data berhasil dihapus !</h3>";
			}
		?>
		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$cur_date = $_POST['attndate'];
				$atten = $_POST['presensi'];
				$res = $user->insertattn($cur_date,$atten);
				if($res){
					echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Kehadiran berhasil ditambahkan!</h3>";
				}else{
					echo  "<p style='color:red;text-align:center'>Gagal menambahkan data</p>";
				}
			}
		
		?>
		
	<form action="" method="post">
		<p style="text-align:center;color:#34495e;">
			<mark>Select date: <input type="date" name="attndate" required/></mark>
		</p>
		<table class="tab_one" style="text-align:center;">
			<tr>
				<th style="text-align:center;">No</th>
				<th style="text-align:center;">Nama</th>
				<th style="text-align:center;">NISN</th>
				<th style="text-align:center;">Kehadiran</th>
	
				
			</tr>
			<?php 
			$i=0;
				$alluser = $user->attn_student();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $rows['nama'];?></td>
				<td><?php echo $rows['id_siswa'];?></td>
				<td>
					<label style="color:red;font-size:20px"><input type="radio" name="presensi[<?php echo $rows['id_siswa'];?>]" value="absent" checked/>Absen</label>
					
					<label style="color:green;font-size:20px"> <input type="radio" name="presensi[<?php echo $rows['id_siswa'];?>]" value="present" />Hadir</label>
				</td>
			</tr>
			<?php } ?>
	
		</table>
		<span style="margin-left:360px;"><input style="<text-align:right></text-align:right>;background:#58A85D;border:none;color:#fff;padding:8px 100px;" type="submit" name="submit" value="Submit" /></span>
	
	</form>
		

		
</div>
<?php include "php/footerbottom.php";?>
<?php ob_end_flush() ; ?>