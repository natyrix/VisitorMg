<?php require_once ("../resources/config.php")?>
<?php include_once("../resources/lecture/header.php") ?>
    <div class="column content">
       <p>Recent updates will appear here</p>
    </div>
</div>
<?php
if(isset($_SESSION['logged_user'])){
    delpastdate();
}
?>
<?php include_once("../resources/lecture/footer.php") ?>