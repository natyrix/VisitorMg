<?php
require_once ("../resources/config.php");
if(isset($_GET['vid'])){
    $vid=$_GET['vid'];
    $query=query("SELECT * FROM approvedappointments WHERE appo_id={$vid}");
    confirm($query);
    $row=fetch_array($query);

    $_SESSION['fname']=$row['fname'];
    $_SESSION['lname']=$row['lname'];
    redirect('appoint2.php');
}
?>

