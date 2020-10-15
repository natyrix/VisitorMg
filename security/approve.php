<?php
require_once ("../resources/config.php");
if(isset($_GET['approve']) &&isset($_GET['vid'])){
    $vid=$_GET['vid'];
    $query=query("SELECT * FROM approvedappointments WHERE appo_id={$vid}");
    confirm($query);
    $row=fetch_array($query);
    $fname=$row['fname'];
    $lanme=$row['lname'];
    $det=$row['detail'];
    $date=$row['datee'];
    $appointed=$row['appointed_by'];
    $query1=query("INSERT INTO enteredappoints(fname,lname,detail,datee,appointed_by) VALUES ('{$fname}','{$lanme}','{$det}','{$date}','{$appointed}')");
    confirm($query1);
    $query2=query("DELETE FROM approvedappointments WHERE appo_id={$vid}");
    confirm($query2);
    redirect('index.php');
}


?>


