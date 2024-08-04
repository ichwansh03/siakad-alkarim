<?php

    session_start();
    require "../main/config.php";
    require_once "connect.php";
    $user = new LoginAndRegTeacher();
    $tcnip = $_SESSION['tc_nip'];
    $tcname = $_SESSION['tc_name'];
    if (!$user->getTeacherSession()){
        header('Location: index.php');
        exit();
    }
?>
<?php
    $pageTitle = "Daftar Nilai Siswa";
    include "top.php";
?>
<div class="all_student fix">
    <table class="tab_one" style="text-align:center;">
        <tr>
            <th style="text-align:center;">No</th>
            <th style="text-align:center;">NISN</th>
            <th style="text-align:center;">Nama</th>
            <th style="text-align:center;">Input</th>
            <th style="text-align:center;">Lihat</th>
        </tr>
        <?php
            $i=0;
            $alluser = $user->getAllStudent();

            while($rows = $alluser->fetch_assoc()){
                $i++;
                
                ?>

                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $rows['nisn'];?></td>
                    <td><?php echo $rows['nama'];?></td>
                    <td><a href="list_student.php?ar=<?php echo $rows['nisn']; ?>$vn=<?php echo $rows['nama'];?>">Input</a></td>
                    <td><a href="../student/st_raport.php?ar=<?php echo $rows['nisn']; ?>$vn=<?php echo $rows['nama'];?>">Lihat</a></td>
                </tr>
            <?php } ?>

        
    </table>
</div>
<?php include "bottom.php";?>
<?php ob_end_flush(); ?>