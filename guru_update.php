<?php
    session_start();
    require "php/config.php";
    require_once "php/functions.php";
    $user = new login_registration_class();
    $fid = $_SESSION['f_id'];
    $fname = $_SESSION['f_name'];

    if (!$user -> get_teach_session()){
        header('Location: guru_login.php');
        exit();
    }
?>

<?php
    $pageTitle = "Update Profil Guru";
    include "php/headertop_guru.php";
?>
<div class="profile">
    <h3 style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0">Ubah Profil</h3>

    <?php
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $tcnama = $_POST['nama'];
            $tcemail = $_POST['email'];
            $tctglahir = $_POST['tgl_lahir'];
            $tckontak = $_POST['kontak'];
            $tckelas = $_POST['kelas_ajar'];
            $tcalamat = $_POST['alamat'];
            $tcjk = $_POST['jk'];

            if (empty($tcnama) or empty($tcemail) or empty($tctglahir) or empty($tckontak) or empty($tckelas) or empty($tcjk) or empty($tcalamat)) {
                echo "<p style='color:red;text-align:center'>Kolom tidak boleh kosong.</p>";
            } else {
                $update = $user->update_teach_profile($fid, $tcnama, $tcemail, $tcjk, $tckontak, $tcalamat, $tctglahir, $tckelas);
                if ($update){
                    echo "<h4 style='color:green;text-align:center'>Informasi berhasil diperbarui</h4>";
                } else {
                    echo "<h4 style='color:red;text-align:center;text-align:center'>Gagal diperbarui</h4>";
                }
            }
        }
    ?>

    <div class="st_update fix">
        <form action="" method="post" enctype="multipart/form-data">
            <?php
                $result = $user->get_teach_by_nip($fid);
                while($row = $result->fetch_assoc()){
            ?>
            <table class="tab_one">
            <tr>
							<td style="width:125px;"></td>
							<td>Nama:</td>
							<td><input type="text" name="nama" value="<?php echo $row['nama'];?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>E-mail:</td>
							<td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Kelas:</td>
							<td><input type="text" name="kelas_ajar" value="<?php echo $row['kelas_ajar']; ?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Tanggal Lahir:</td>
							<td><input type="text" name="tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Kontak:</td>
							<td><input type="text" name="kontak" value="<?php echo $row['kontak']; ?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Jenis Kelamin:</td>
							<td><input type="text" name="jk" value="<?php echo $row['jk']; ?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Alamat:</td>
							<td><input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"></td>
						</tr>
						
						<tr>
						<td style="width:125px;"></td>
						<td></td>
						<td colspan="2">
							<input style="background:#3498db;color:#fff;width:168px;border-radius:5px;" type="submit" name="Update" value="Update">
						</td>
						</tr>
            </table>
            <?php } ?>
        </form>
    </div>
    <div class="back fix">
		<p style="text-align:center"><a href="guru_profile.php"><button class="editbtn">Kembali</button></a></p>
	</div>
</div>