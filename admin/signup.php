<?php require_once ("../resources/config.php")?>
<?php include_once("../resources/admin/header.php") ?>
<?php
    if (isset($_GET['Lecture'])){
        include_once ("regLecture.php");
    }
    if (isset($_GET['Security'])){
        include_once ("regSecurity.php");
    }
    if(isset($_GET['admm'])){
        include_once ("regAdmWrk.php");
    }
    if(isset($_GET['dep'])){
        include_once ("regDep.php");
    }
    if(isset($_GET['dep_head'])){
        include_once ("reggDepHead.php");
    }
    if(isset($_GET['uni'])){
        include_once ("regUni.php");
    }


?>
</div>
    <?php include_once("../resources/admin/footer.php") ?>