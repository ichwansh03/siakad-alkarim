<?php
session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$sid = $_SESSION['sid'];
	$sname = $_SESSION['sname'];
	if(!$user->getsession()){
		header('Location: sw_login.php');
		exit();
	}
	if(isset($_REQUEST['vr'])){
		$stid = $_REQUEST['vr'];
		$name = $_REQUEST['vn'];
	}
?>	
<?php 
$pageTitle = "Hasil Siswa";
include "php/headertop.php";
?>
<div class="all_student fix">

		<?php
		
		//custom function check credit hour and grade point
		function credit_hour($x){
			if($x=="IPA") return 3;
			elseif($x == "IPS") return 1;
			elseif($x == "Matematika") return 4;
			elseif($x == "Bahasa Indonesia") return 3;
			elseif($x == "Agama") return 1;
			elseif($x == "SBDP") return 4;
			elseif($x == "PAK") return 3;
			elseif($x == "Penjaskes") return 3;
		}
		function grade_point($gd){
			if($gd<60) return 0;
			elseif($gd>=60 && $gd<70) return 1;
			elseif($gd>=70 && $gd<80) return 2;
			elseif($gd>=80 && $gd<90) return 3;
			elseif($gd>=90 && $gd<=100) return 4;
		}
		?>
	<!--Infomation of student-->
		<div>
	<p style="text-align:center;color:#fff;background:purple;margin:0;padding:8px;"><?php echo "Nama: ".$name."<br>ID Siswa: " . $stid; ?></p>
	</div>	
	<form action="" method="post" style="float:center;text-align:center;margin-top:20px;padding-bottom:5px;">
		<select name="seme" id="">
			<option value="ganjil">Semester Ganjil</option>
			<option value="genap">Semester Genap</option>
		</select>
		<input type="submit" value="Lihat Nilai" />

	</form>
	<?php
	//select semester
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$semester = $_POST['seme'];
			
			$i=0;
			$ch = 0;
			$gp = 0;
				
			
				//$get_result = $user->show_marks();
				
				$get_result = $user->show_marks($stid,$semester);
				if($get_result){
			?>
				<table class="tab_two" style="text-align:center;width:85%;margin:0 auto">
					<th>Mata Pelajaran</th>
					<th>Nilai Akhir</th>
					<th>Nilai Mutu</th>
					<th>Deskripsi</th>
					<th>Status</th>
		<?php		
				while($rows = $get_result->fetch_assoc()){
				$i++;
				//count total credit hour;	
				$ch = $ch + credit_hour($rows['mapel']);

		?>
			<tr>
				<td><?php echo $rows['mapel'];?></td>
				<td><?php echo $rows['nilai_akhir'];?></td>
				<td>
				<?php 
				//set grade for individual subject
					$mark = $rows['nilai_akhir'];
					if($mark<60){echo "F";}
					elseif($mark>=60 && $mark<70){echo "D";}
					elseif($mark>=70 && $mark<80){echo "C";}
					elseif($mark>=80 && $mark<90){echo "B";}
					elseif($mark>=90 && $mark<=100){echo "A";}
					
					//total grade point
					$gp = $gp + (credit_hour($rows['mapel']) * grade_point($rows['nilai_akhir']));
					
				?>
				</td>
				<td><?php echo $rows['deskripsi'];?></td>
				<td>
				<?php
					$stat = $rows['nilai_akhir'];
					if($stat<60){
						echo "<span style='background:red;padding:3px 11px;color:#fff;'>Tidak Lulus</span>";
					}elseif($stat>=60 && $stat<70){
						echo "<span style='background:yellow'>Remedial</span>";
					}else{
						echo "<span style='background:green;padding:3px 6px;color:#fff;'>Lulus</span>";
					}
				?>
				</td>
				
				
			</tr>
			<?php } ?>
			<tr>
				<td colspan="2">Total : </td>
				<td colspan="2">
				<?php
				$sg = $gp/$ch;
				echo "<span style='color:green;padding:3px 6px;font-size:20px'>" . round($sg,2) . "</span>"; ?>
				</td>
				<td>
					<?php
						if($sg>=3.5){
							echo "<span style='background:purple;padding:3px 6px;color:#fff;'>Sangat Baik";
						}elseif($sg>=3.0 && $sg<3.5){
							echo "<span style='background:green;padding:3px 6px;color:#fff;'>Baik";
						}elseif($sg>=2.5 && $sg<3.0){
							echo "<span style='background:gray;padding:3px 6px;color:#fff;'>Cukup";
						}else{
							echo "<span style='background:red;padding:3px 6px;color:#fff;'>Kurang";
						}
					?>
				</td>
			</tr>
		</table>
		
		<?php 
			}
			else{
				echo  "<p style='color:red;text-align:center'>Tidak ditemukan</p>";
				}
				
			}
		?>
		
			<p style="float:right;text-align:left;margin:20px 0;width:58%"><a href="sw_profile.php"><button class="editbtn">Kembali ke profile</button></a></p>

</div>
<?php include "php/footerbottom.php";?>
<?php ob_end_flush() ; ?>