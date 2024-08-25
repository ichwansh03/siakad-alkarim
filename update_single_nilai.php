<?php
ini_set('display_errors','1');
    session_start();
    require "php/config.php";
    require_once "php/functions.php";
    $user = new login_registration_class();
    $fid = $_SESSION['f_id'];
    $fname = $_SESSION['f_name'];
    if (!$user->get_teach_session()){
        header('Location: guru_login.php');
        exit();
    }

    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        $i=0;
		$marks = $user->show_marks_by_id($id);
				
		while($rows = $marks->fetch_assoc()){
		    $i++;
            $stid = $rows['nisn'];
            $name = $rows['nama'];
            $subject = $rows['mapel'];
        }

    }
?>
<?php
$pageTitle = "Ubah Nilai Siswa";
include "php/headertop_guru.php";
?>
<div class="profile">
    <h3 style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0">Ubah Profil</h3>

    <?php

        if($_SERVER['REQUEST_METHOD'] == "POST"){
			$task1 = $_POST['tugas1'];
			$task2 = $_POST['tugas2'];
			$task3 = $_POST['tugas3'];
			$task4 = $_POST['tugas4'];
			$task5 = $_POST['tugas5'];
			$task6 = $_POST['tugas6'];
			$mid = $_POST['uts'];
			$final = $_POST['uas'];
			$desc = $_POST['deskripsi'];
            $semester = $_POST['semester'];
			$marks = ($task1 + $task2 + $task3 + $task4 + $task5 + $task6)/20 + ($mid * 0.35) + ($final * 0.35);
            
            $res = $user->update_nilai($stid,$subject,$task1,$task2,$task3,$task4,$task5,$task6,$mid,$final,$marks,$semester,$desc);
			if($res){
				echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Nilai berhasil diperbarui!</h3>";
			}else{
				echo  "<p style='color:red;text-align:center'>Gagal memperbarui data</p>";
			}
        }
    ?>
    
    <div>
    <p style="text-align:center;color:#fff;background:purple;margin:0;padding:8px;"><?php echo "Nama: ".$name."<br>NISN: " . $stid; ?></p>
    </div>

    <div style="width:20%;margin:50px auto">
        <form action="" method="post" enctype="multipart/form-data">
            <?php
                $result = $user->show_marks_by_mapel($stid, $subject);
                while($row = $result->fetch_assoc()) {
            ?>
            <table class="tab_one" style="text-align:center;">
                <tr>
					<th>Semester:</th>
					<td><label><input type="radio" name="semester" value="ganjil" checked/> Ganjil</label>
					<label><input type="radio" name="semester" value="genap"/> Genap</label>
					</td>
				</tr>
                <tr>
                    <td>Tugas 1:</td>
                    <td><input type="number" name="tugas1" value="<?php echo $row['tugas1'];?>"></td>
                </tr>
                <tr>
                    <td>Tugas 2:</td>
                    <td><input type="number" name="tugas2" value="<?php echo $row['tugas2'];?>"></td>
                </tr>
                <tr>
                    <td>Tugas 3:</td>
                    <td><input type="number" name="tugas3" value="<?php echo $row['tugas3'];?>"></td>
                </tr>
                <tr>
                    <td>UTS:</td>
                    <td><input type="number" name="uts" value="<?php echo $row['uts'];?>"></td>
                </tr>
                <tr>
                    <td>Tugas 4:</td>
                    <td><input type="number" name="tugas4" value="<?php echo $row['tugas4'];?>"></td>
                </tr>
                <tr>
                    <td>Tugas 5:</td>
                    <td><input type="number" name="tugas5" value="<?php echo $row['tugas5'];?>"></td>
                </tr>
                <tr>
                    <td>Tugas 6:</td>
                    <td><input type="number" name="tugas6" value="<?php echo $row['tugas6'];?>"></td>
                </tr>
                <tr>
                    <td>UAS:</td>
                    <td><input type="number" name="uas" value="<?php echo $row['uas'];?>"></td>
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
                    <td colspan="2"><input style="color:#ddd;background:#3498db" type="submit" name="Update" value="Update" /></td>
				</tr>
            </table>
            <?php } ?>
            
        </form>
    </div>
    <div class="back fix">
		<p style="text-align:center"><a href="sw_hasil.php"><button class="editbtn">Kembali ke list</button></a></p>
	</div>
</div>
