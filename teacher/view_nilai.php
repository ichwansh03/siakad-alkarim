<?php
    session_start();
    require "../main/config.php";
    require_once "connect.php";
    $user = new LoginAndRegTeacher();
    $tcnip = $_SESSION['tc_nip'];
    $tcname = $_SESSION['tc_name'];

    if(!$user->getTeacherSession()){
        header('Location: index.php');
        exit();
    }

    if(isset($_REQUEST['vr'])){
        $nisn = $_REQUEST['vr'];
        $name = $_REQUEST['vn'];
    }
?>
<?php
    $pageTitle = "Daftar Nilai Siswa";
    include "top.php";
?>
<div class="all_student fix">

<?php
    function creditHour($x) {
        if ($x == "IPA") return 3;
        elseif ($x == "IPS") return 1;
        elseif ($x == "Matematika") return 4;
        elseif ($x == "Bahasa Indonesia") return 3;
        elseif ($x == "PAI") return 1;
        elseif ($x == "SBDP") return 4;
        elseif ($x == "PAK") return 3;
        elseif ($x == "Penjaskes") return 3;
    }

    function gradePoint($gd) {
        if ($gd < 60) return 0;
        elseif ($gd>=60 && $gd<70) return 1;
        elseif ($gd>=70 && $gd<80) return 2;
        elseif ($gd>=80 && $gd<90) return 3;
        elseif ($gd>=90 && $gd<=100) return 4;
    }
    ?>

    <div class="fix">
        <p style="text-align:center;color:#fff;background:purple;margin:0;padding:8px;"><?php echo "Nama: ".$name."<br>ID siswa: ".$nisn;?></p>
    </div>
    <div class="fix">
    <p style='text-align:center;background:#ddd;color:#01C3AA;padding:5px;width:84%;margin:0 auto'>Lihat Nilai</p>
    </div>
    <?php
	//select semester
			$i=0;
			$ch = 0;
			$gp = 0;
				
			
				//$get_result = $user->show_marks();
				
				$get_result = $user->viewNilaiAkhir($nisn);
				//var_dump($get_result);
				if($get_result && ($get_result->num_rows)>0){
			?>
				
				<table class="tab_two" style="text-align:center;width:85%;margin:0 auto">
					<th>Mata Pelajaran</th>
					<th>Nilai</th>
					<th>Huruf Mutu</th>
					<th>Jam Mapel</th>
					<th>Status</th>
		<?php		
				while($rows = $get_result->fetch_assoc()){
				$i++;
				//count total credit hour;	
				$ch = $ch + creditHour($rows['mapel']);

		?>
			<tr>
				<td><?php echo $rows['mapel']; ?></td>
				<td><?php echo $rows['nilai_akhir']; ?></td>
				<td>
				<?php 
				//set grade for individual subject
					$mark = $rows['nilai_akhir'];
					if($mark<60){echo "E";}
					elseif($mark>=60 && $mark<70){echo "D";}
					elseif($mark>=70 && $mark<80){echo "C";}
					elseif($mark>=80 && $mark<90){echo "B";}
					elseif($mark>=90 && $mark<=100){echo "A";}
					
					//total grade point
					$gp = $gp + (creditHour($rows['mapel']) * gradePoint($rows['nilai_akhir']));
					
				?>
				</td>
				<td><?php echo creditHour($rows['mapel']); ?></td>
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
			<td><?php echo "Total Mata Pelajaran: <span style='color:#800080;padding:3px 6px;font-size:22px'>".$i."</span>"; ?></td>
				<td colspan="1">Nilai Akhir : </td>
				<td colspan="2">
				<?php
				$sg = $gp/$ch;
				echo "<span style='color:green;padding:3px 6px;font-size:22px'>" . round($sg,2) . "</span>"; ?>
				</td>
				<td>
					<?php
						if($sg>=3.5){
							echo "<span style='background:purple;padding:3px 6px;color:#fff;'>Sangat Baik";
						}elseif($sg>=3.0 && $sg<3.5){
							echo "<span style='background:green;padding:3px 6px;color:#fff;'>Baik";
						}elseif($sg>=2.5 && $sg<3.0){
							echo "<span style='background:gray;padding:3px 6px;color:#fff;'>Cukup Baik";
						}else{
							echo "<span style='background:red;padding:3px 6px;color:#fff;'>Cukup";
						}
					?>
				</td>
			</tr>
		</table>
		
		<?php 
			}
			else{
				echo  "<p style='color:red;text-align:center'>Tidak Ditemukan</p>";
				}
		?>
		
		<div class="back fix">
			<p style="text-align:center"><a href="rapor_siswa.php?vr=<?php echo $nisn?>&vn=<?php echo $name?>"><button class="editbtn">Lihat Nilai</button></a></p>
		</div>
</div>