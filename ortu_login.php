<?php
ob_start();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if ($user->getsession()){
    header('Location: sw_profile.php');
    exit();
}
?>
<?php
$pageTitle = "Login Orang Tua";
include "header.php";
?>
<div class="loginform fix">
    <div class="msg"><h3><i class="fa fa-user" aria-hidden="true"></i>Login Orang Tua</h3></div>
    <div class="access">
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $st_id	  = $_POST['nisn'];

                if(empty($st_id)){
                    echo "<p style='color:red;text-align:center;'>Kolom tidak boleh kosong.</p>";
                }else{
                    $login = $user->parent_login($st_id);
                    if($login){
                        header('Location: sw_profile.php');
                    }else{
                        echo "<p style='color:red;text-align:center'>NISN tidak terdaftar</p>";
                    }
                }
            }
        ?>
        <form action="" method="post">
			<input type="text" name="nisn" placeholder="NISN" />
			<input type="submit" value="Login" />
		</form>
    </div>
</div>
<?php include "footer.php"; ?>
<?php ob_end_flush() ; ?>