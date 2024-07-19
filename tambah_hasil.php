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
	if(isset($_REQUEST['ar'])){
		$stid = $_REQUEST['ar'];
		$name = $_REQUEST['vn'];
	}
?>	
<?php 
$pageTitle = "Hasil Siswa";
include "php/headertop_admin.php";
?>
<div class="all_student fix">

		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$subject = $_POST['mapel'];
				$marks = $_POST['nilai'];
				$res = $user->add_marks($stid,$subject,$marks);
				if($res){
					echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Nilai berhasil ditambahkan!</h3>";
				}else{
					echo  "<p style='color:red;text-align:center'>Gagal menambahkan data</p>";
				}
			}
		
		//SELECT avg(marks) as sgpa from result where st_id=10 and semester="1sr"
		?>
	<div>
	<p style="text-align:center;color:#fff;background:purple;margin:0;padding:8px;"><?php echo "Nama: ".$name."<br>ID Siswa: " . $stid; ?></p>
	</div>	
	<div style="width:40%;margin:50px auto">
		
		<table class="tab_one" style="text-align:center;">
			<form action="" method="post">
				<table>
					<tr>
						<td>Pilih KD: </td>
						<td>
						<select name="mapel" id="">
							<option value="IPA">Ilmu Pengetahuan Alam</option>
							<option value="IPS">Ilmu Pengetahuan Sosial</option>
							<option value="Matematika">Matematika</option>
							<option value="Bahasa Indonesia">Bahasa Indonesia</option>
							<option value="Agama">Agama</option>
							<option value="SBDP">SBDP</option>
							<option value="PAK">PAK</option>
							<option value="Penjaskes">Penjaskes</option>
							
						</select>
						</td>
					</tr>
					<tr>
						<td>Input nilai: </td>
						<td><input type="text" name="nilai" placeholder="masukkan nilai" required /></td>
					</tr>
					<tr>
						<td><input type="submit" name="subject" value="Add marks" /></td>
						<td><input type="reset" /></td>
					</tr>
				</table>
				
			</form>
		</table>
		
	</div>
		<div class="back fix">
				<p style="text-align:center"><a href="sw_hasil.php"><button class="editbtn">Kembali ke list</button></a></p>
			</div>
</div>
<?php include "php/footerbottom.php";?>
<?php ob_end_flush() ; ?>