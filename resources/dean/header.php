<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="dean.css">
    <link href="/VisitorMg/images/AAU Logo.png" rel="icon" type="image/png" />
</head>
<body onload="displaydate()">
<div>
    <img src="../images/AAU-Header.jpg">
</div>
<p id="dispdate"></p>
<?php
if(!isset($_SESSION['title']) || !isset($_SESSION['logged_in'])){
    redirect('../login.php');
}
?>
<?php include_once ('nav.php')?>