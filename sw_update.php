<?php
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$sid = $_SESSION['sid'];
	$sname = $_SESSION['sname'];
/*
	if(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];
	}else{
		header('Location: index.php');
		exit();
	}
*/	
	if(!$user->getsession()){
		header('Location: sw_login.php');
		exit();
	}
	
?>

<?php 
$pageTitle = "Update Profil";
include "php/headertop.php";
?>
 <script>
    function PreviewImage(upname, prv_id) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementsByName(upname)[0].files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById(prv_id).src = oFREvent.target.result;
        };
    };
  
</script>

<div class="profile">
			<h3 style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0">Update Profil Kamu</h3>							
				<?php
						$qry=$user->getuserbyid($sid);
						$pic=$qry->fetch_assoc();
						$piclocation=$pic['img'];
				
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						//code for img
						function guid() {
								 if (function_exists('com_create_guid')) {
											return com_create_guid();
										} else {
											mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
											$charid = strtoupper(md5(uniqid(rand(), true)));
											$hyphen = chr(45); // "-"
											$uuid = chr(123)// "{"
													. substr($charid, 0, 8) . $hyphen
													. substr($charid, 8, 4) . $hyphen
													. substr($charid, 12, 4) . $hyphen
													. substr($charid, 16, 4) . $hyphen
													. substr($charid, 20, 12)
													. chr(125); // "}"
											return $uuid;
										}
							  }
					
								
								if($_FILES["personal_image"]["name"])
								{
									  $path_parts = pathinfo($_FILES["personal_image"]["name"]);
												  $ext = $path_parts['extension'];
												  $fileName = trim(guid(), '{}') . '.' . $ext;
								}
								else{
									$fileName = $piclocation;
								}

							move_uploaded_file($_FILES['personal_image']['tmp_name'], "img/student/$fileName");

													
						//end img 
						$sw_nama = $_POST['nama'];
						$sw_email = $_POST['email'];
						$sw_tgllahir  = $_POST['tgl_lahir'];
						$sw_kontak  = $_POST['kontak'];
						$sw_jk  = $_POST['jk'];
						$sw_alamat  = $_POST['alamat'];
						if(empty($sw_nama) or empty($sw_email)or empty($sw_tgllahir) or empty($sw_kontak) or empty($sw_jk) or empty($sw_alamat)){
							echo "<p style='color:red;text-align:center'>Kolom tidak boleh kosong.</p>";
						}else{
							$update = $user->updateprofile($sid,$sw_nama,$sw_email,$sw_tgllahir,$sw_jk,$sw_kontak,$sw_alamat,$fileName);
							if($update){
								echo "<h4 style='color:green;text-align:center'>Informasi berhasil diperbarui</h4>";
							}else{
								echo "<h4 style='color:red;text-align:center;text-align:center'>Gagal diperbarui</h4>";
							}
						}
					}
				?>
			
			<div class="st_update fix">
				<form action="" method="post" enctype="multipart/form-data">
						<?php
						$result = $user->getuserbyid($sid);
						while($row = $result->fetch_assoc()){
						?>
					<table class="tab_one" >
						<tr>
							<td style="width:250px;"></td>
							<td>Foto</td>
							<td>
							<img id="logo_preview" src="img/student/<?php echo $row['img']?>" style="height:150px; width:150px; border:1px green solid;"><br><br> 
							<input type="file" name="personal_image" id="spic" onchange="PreviewImage('personal_image', 'logo_preview')" />
							</td>
						</tr>
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
				<p style="text-align:center"><a href="sw_profile.php"><button class="editbtn">Kembali ke profilmu</button></a></p>
			</div>
</div>


<?php include "php/footerbottom.php";?>