<!Doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $pageTitle; ?></title>
        <meta name="description" content="Sistem Informasi Akademik SMP Alam Al-Karim Lampung">
		<meta name="author" content="Aldo Febrian ">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/stylesheet.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <header class="container header_area fix" >
			<div id="sticker">
				<div class="head">
					<a href="#"><div class="logo fix">
						<img src="./img/alkarim.png" alt="" />
					</div></a>
					<div class="uniname fix">
						<h2>Sistem Informasi Akademik SMP Alam Al-Karim Lampung</h2>
					</div>
				</div>
				<div class="menu fix">
					<div class="dateshow fix"><p><?php echo "Date : ".date("d M Y"); ?></p></div>
				<!--	<ul>
						<li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
						
						<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> User</a></li>
					</ul>
				-->
				</div>
			</div>
		</header>
		<div class="maincontent container fix">
			<div id="stickerside">
				<div class="sidebar fix" >
						<ul>
							<li><span class="spcl"><i class="fa fa-server" aria-hidden="true"></i> Administrator</span></li>
								<ul>
									<li><a href="index.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
								</ul>
							
							<li><span class="spcl"><i class="fa fa-male" aria-hidden="true"></i> Guru</span></li>
								<ul>
									<li><a href="loginguru.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
									<li><a href="guru_profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profil</a></li>
									<li><a href="kelas_pres.php"><i class="fa fa-database" aria-hidden="true"></i> Kehadiran Kelas</a></li>
								</ul>
							
							<li><span class="spcl"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Siswa</span></li>
								<ul>
									<li><a href="sw_login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
									<li><a href="sw_reg.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Daftar</a></li>
									<li><a href="sw_profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profil</a></li>
									<li><a href="#"><i class="fa fa-outdent" aria-hidden="true"></i> Hasil</a></li>
								</ul>
							
						
						</ul>
					
					</div>
				</div>
				<div class="content fix">