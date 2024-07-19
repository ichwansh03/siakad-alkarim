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
	if(isset($_REQUEST['dt'])){
		$date = $_REQUEST['dt'];
	}
?>	
<?php 
$pageTitle = "Detail siswa";
include "php/headertop_admin.php";
?>
<div class="all_student fix">
		<h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:#1abc9c">Presensi Kehadiran</h3>
		<div  class="fix" style="background:#ddd;padding:20px;">
			<span style="float:left;"><a style="color:#fff;" href="pres_kelas.php"><button style="background:#58A85D;border:none;color:#fff;padding:10px;">Ambil Kehadiran</button></a></span>
			<span style="float:right;"><a style="color:#fff;" href="pres_view.php"> <button style="background:#58A85D;border:none;color:#fff;padding:10px;">Lihat Kehadiran</button></a></span>
		</div>
		<p style="text-align:center;color:#34495e;margin:0;padding-top:8px;color:red;font-size:22px;">
			<?php echo "Attendance of: ".$date;?>
		</p>
		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$atten = $_POST['attn'];
				$res = $user->update_attn($date,$atten);
				if($res){
					echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Presensi Berhasil Diupdate!</h3>";
				}else{
					echo  "<p style='color:red;text-align:center'>Gagal mengupdate data</p>";
				}
			}
		
		?>
		
	<form action="" method="post">
	
		<table class="tab_one" style="text-align:center;">
			<tr>
				<th style="text-align:center;">SL</th>
				<th style="text-align:center;">Nama</th>
				<th style="text-align:center;">ID</th>
				<th style="text-align:center;">Kehadiran</th>
				
			</tr>
			<?php 
			$i=0;
				$std = $user->attn_all_student($date);
				//var_dump($std);
				if($std){
					
				
				while($rows = $std->fetch_assoc()){
				$i++;
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $rows['nama'];?></td>
				<td><?php echo $rows['id_siswa'];?></td>
				<td>
					<label style="color:red;font-size:20px"><input type="radio" name="attn[<?php echo $rows['id_siswa'];?>]" value="absent" <?php if($rows['atten'] == "absent") echo "checked";?>/>Absen</label>
					
					<label style="color:green;font-size:20px"> <input type="radio" name="attn[<?php echo $rows['id_siswa'];?>]" value="present" <?php if($rows['atten'] == "present") echo "checked";?>/>Hadir</label>
				</td>
			</tr>
			<?php 
			
			} }else echo "failed";
				?>
	
		</table>
		
		<center>
		<span><input style="<text-align:right></text-align:right>;background:#58A85D;border:none;color:#fff;padding:8px 100px;" type="submit" name="submit" value="Update" /></span>
		</center>
	
	</form>
		

		
</div>
<?php include "php/footerbottom.php";?>
<?php ob_end_flush() ; ?>