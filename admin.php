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
?>	
<?php 
$pageTitle = "Admin";
include "php/headertop_admin.php";
?>
<div class="admin_profile">
	
	<div class="section">
			<h3>Siswa</h3>
			<ul>
				<li><a href="admin_semua_siswa.php">Siswa</a></li>
				<li><a href="sw_hasil.php">Hasil Siswa</a></li>
				<li><a href="kelas_pres.php">Kehadiran</a></li>
				<li><a href="student_list_pdf.php"><button>Download List Siswa</button></a></li>
			</ul>
	</div>
	<div class="section">
			<h3>Guru</h3>
			<ul>
				<li><a href="admin_semua_guru.php">Guru</a></li>
				<li><a href="#">Informasi</a></li>
				<li><a href="#">Lihat Jadwal</a></li>
				<li><a href="faculty_list.php"><button>Download List Guru</button></a></li>
			</ul>
	</div>
	<!-- <div class="section">
	
			<h3>Registry</h3>
			<ul>
				<li><a href="#">Accounts</a></li>
				<li><a href="#">Salary</a></li>
				<li><a href="#">Student tution fee</a></li>
				<li><a href="#">Other cost</a></li>
			</ul>

	</div> -->

</div>

<?php include "php/footerbottom.php";?>