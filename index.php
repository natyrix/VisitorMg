<?php require_once ("resources/config.php")?>
<?php include_once("resources/header.php") ?>
<?php
if(isset($_SESSION['logged_in']) && isset($_SESSION['title'])){
    redirect($_SESSION['title']);
}
?>
<div id="top">
    <div id="nav">
        <a href="#">Home</a>
        <a href="login.php">LogIn</a>
    </div>
    <div id="content">
        <p>Welcome to our 4 Kilo Visitor Management System</p>
    </div>
</div>
<?php include_once("resources/footer.php") ?>