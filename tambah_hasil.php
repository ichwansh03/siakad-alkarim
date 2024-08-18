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
				$task1 = $_POST['tugas1'];
				$task2 = $_POST['tugas2'];
				$task3 = $_POST['tugas3'];
				$task4 = $_POST['tugas4'];
				$task5 = $_POST['tugas5'];
				$task6 = $_POST['tugas6'];
				$mid = $_POST['uts'];
				$final = $_POST['uas'];
				$desc = $_POST['deskripsi'];
				$marks = ($task1 + $task2 + $task3 + $task4 + $task5 + $task6)/20 + ($mid * 0.35) + ($final * 0.35);
				$res = $user->add_marks($stid,$subject,$task1,$task2,$task3,$task4,$task5,$task6,$mid,$final,$marks);
				if($res){
					echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Nilai berhasil ditambahkan!</h3>";
				}else{
					echo  "<p style='color:red;text-align:center'>Gagal menambahkan data</p>";
				}
			}
		
		//SELECT avg(marks) as sgpa from result where st_id=10 and semester="1sr"
		?>
	<div>
	<p style="text-align:center;color:#fff;background:purple;margin:0;padding:8px;"><?php echo "Nama: ".$name."<br>NISN: " . $stid; ?></p>
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
						<td>Tugas 1: </td>
						<td><input type="number" name="tugas1" placeholder="masukkan nilai" required /></td>
					</tr>
					<tr>
						<td>Tugas 2: </td>
						<td><input type="number" name="tugas2" placeholder="masukkan nilai" required /></td>
					</tr>
					<tr>
						<td>Tugas 3: </td>
						<td><input type="number" name="tugas3" placeholder="masukkan nilai" required /></td>
					</tr>
					<tr>
						<td>UTS: </td>
						<td><input type="number" name="uts" placeholder="masukkan nilai" required /></td>
					</tr>
					<tr>
						<td>Tugas 4: </td>
						<td><input type="number" name="tugas4" placeholder="masukkan nilai" required /></td>
					</tr>
					<tr>
						<td>Tugas 5: </td>
						<td><input type="number" name="tugas5" placeholder="masukkan nilai" required /></td>
					</tr>
					<tr>
						<td>Tugas 6: </td>
						<td><input type="number" name="tugas6" placeholder="masukkan nilai" required /></td>
					</tr>
					<tr>
						<td>UAS: </td>
						<td><input type="number" name="uas" placeholder="masukkan nilai" required /></td>
					</tr>
					<tr>
						<td>Deskripsi: </td>
						<td><textarea name="deskripsi" rows="4"></textarea></td>
					</tr>
					<tr>
						<td>Nilai Akhir: </td>
						<td><p style="font-weight: bold;">
							<?php
								if($_SERVER['REQUEST_METHOD'] == 'POST') {
									echo $marks;
								} else {
									echo 0.0;
								}
							?>
						</p></td>
					</tr>
					<tr>
						<td><input type="submit" name="subject" value="Simpan" /></td>
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