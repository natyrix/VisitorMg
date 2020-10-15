<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="Admin.css">
    <link href="/VisitorMg/images/AAU Logo.png" rel="icon" type="image/png" />
</head>
<body>
<div>
    <img src="../images/AAU-Header.jpg">
</div>
<div id="top">
    <?php
    if(!isset($_SESSION['title']) || !isset($_SESSION['logged_in'])){
        redirect('../login.php');
    }
    ?>
    <?php require_once("nav.php") ?>
