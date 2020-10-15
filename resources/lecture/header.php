<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
<!--    <link rel="stylesheet" href="code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">-->
    <link rel="stylesheet" href="lecture.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link href="/VisitorMg/images/AAU Logo.png" rel="icon" type="image/png" />
</head>
<body onload="displaydate()">
<div>
    <img src="../images/AAU-Header.jpg">
    <p id="today">Today's Date &nbsp;<?php echo date("m,d,Y")?></p>
    <p id="dispdate"></p>

</div>
<?php
if(!isset($_SESSION['title']) || !isset($_SESSION['logged_in'])){
    redirect('../login.php');
}
?>
<?php require_once("nav.php") ?>
