<?php
session_start();
    require "../main/config.php";
    require_once "connect.php";
    $user = new LoginAndRegTeacher();
    $nip = $_SESSION['tc_nip'];
    $name = $_SESSION['tc_name'];
    if (!$user->getTeacherSession()){
        header('Location: index.php');
        exit();
    }
    if (isset($_REQUEST['ar'])) {
        $stid = $_REQUEST['ar'];
        $stname = $_REQUEST['vn'];
    }
?>
<?php
$pageTitle = "Input Hasil Siswa";
include "top.php";
?>
<div class="all_student fix">

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $subject = $_POST['mapel'];
            $marks = $_POST['nilai_akhir'];
            $result = $user->addMarks($sname, $subject, $mark, $task1, $task2, $task3, $task4, $task5, $task6, $mid, $final);
            if ($result) {
                echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Nilai berhasil ditambahkan</h3>";
            } else {
                echo  "<p style='color:red;text-align:center'>Gagal menambahkan data</p>";
            }
        }
    ?>

    <div>
        <p style="text-align:center;color:#fff;background:purple;margin:0;padding:8px;"><?php echo "Nama: ".$stname."<br>ID Siswa: " . $stid; ?></p>
    </div>

    <div style="width:40%;margin:50px auto">
        <table class="tab_one" style="text-align:center;">
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>Pilih Mapel:</td>
                        <td>
                            <select name="mapel" id="">
                                <option value="IPA">Ilmu Pengetahuan Alam</option>
                                <option value="IPS">Ilmu Pengetahuan Sosial</option>
                                <option value="Matematika">Matematika</option>
                                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                <option value="Agama Islam">Agama Islam</option>
                                <option value="SBDP">SBDP</option>
                                <option value="PAK">Pendidikan Anti Korupsi</option>
                                <option value="Penjaskes">Pendidikan Jasmani</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Nilai Tugas 1:</td>
                        <td><input type="text" name="tugas1" placeholder="Input Nilai" required/></td>
                    </tr>
                    <tr>
                        <td>Nilai Tugas 2:</td>
                        <td><input type="text" name="tugas2" placeholder="Input Nilai" required/></td>
                    </tr>
                    <tr>
                        <td>Nilai Tugas 3:</td>
                        <td><input type="text" name="tugas3" placeholder="Input Nilai" required/></td>
                    </tr>
                    <tr>
                        <td>Nilai Ujian Tengah Semester:</td>
                        <td><input type="text" name="uts" placeholder="Input Nilai" required/></td>
                    </tr>
                    <tr>
                        <td>Nilai Tugas 4:</td>
                        <td><input type="text" name="tugas4" placeholder="Input Nilai" required/></td>
                    </tr>
                    <tr>
                        <td>Nilai Tugas 5:</td>
                        <td><input type="text" name="tugas5" placeholder="Input Nilai" required/></td>
                    </tr>
                    <tr>
                        <td>Nilai Tugas 6:</td>
                        <td><input type="text" name="tugas6" placeholder="Input Nilai" required/></td>
                    </tr>
                    <tr>
                        <td>Nilai Ujian Akhir Semester:</td>
                        <td><input type="text" name="uas" placeholder="Input Nilai" required/></td>
                    </tr>
                    <tr>
                        <td>Nilai Akhir:</td>
                        <td><input type="text" name="nilai_akhir" placeholder="Input Nilai" required/></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="subject" value="Simpan" /></td>
                        <td><input type="reset"/></td>
                    </tr>
                </table>
            </form>
        </table>
    </div>
    <div class="back fix">
    <p style="text-align:center"><a href="rapor_siswa.php"><button class="editbtn">Kembali ke list</button></a></p>
    </div>
</div>
<?php include "bottom.php";?>
<?php ob_end_flush() ; ?>