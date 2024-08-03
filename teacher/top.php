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

<link rel="stylesheet" href="../css/normalize.css">
<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../fonts/stylesheet.css">
<link rel="stylesheet" href="../css/main.css">

<link rel="stylesheet" href="../plugins/file-uploader/css/jquery.fileupload.css">
<link rel="stylesheet" href="../plugins/file-uploader/css/jquery.fileupload-ui.css">
<script src="../js/vendor/jquery-1.12.0.min.js"></script>
<script src="../js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->
<header class="container header_area" >
    <div id="sticker">
        <div class="head">
            <a href="#"><div class="logo fix">
                <img src="../img/alkarim.png" alt="" />
            </div></a>
            <div class="uniname fix">
            <h2>Sistem Informasi Akademik SMP Alam Al-Karim Lampung</h2>
            </div>
        </div>
        <div class="menu ">
            <div class="dateshow fix"><p><?php echo "Date : ".date("d M Y"); ?></p></div>
            <ul>
                <?php if($user->getsession()){ ?>
                <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Keluar</a></li>
                <li><a href="change_pw.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Ubah Password</a></li>
                <li><a href="st_raport.php?vr=<?php echo $sid?>&vn=<?php echo $sname?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Nilai Mapel</a></li>
                <li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $sid; ?></a></li>
                <?php } ?>
            </ul>

        </div>
    </div>
</header>
<div class="info container fix">


