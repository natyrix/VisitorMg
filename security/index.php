<?php require_once ("../resources/config.php")?>
<?php include_once("../resources/security/header.php") ?>
<div id="content">
    <p > Recent Visitors</p>
    <?php
    $uname=$_SESSION['logged_user'];
    $quer=query("SELECT * FROM approvedappointments ORDER BY datee DESC ");
    confirm($quer);
    while ($row=fetch_array($quer)){
        $quer1=query("SELECT * FROM info WHERE user_id='{$row['appointed_by']}'");
        confirm($quer1);
        $row1=fetch_array($quer1);
        $data=<<<daa
    <div class="card">
        <p class="title">Visitor Name: {$row['fname']} {$row['lname']}</p>
        <p class="title">Visitation Detail: {$row['detail']}</p>
        <p class="title">Date: {$row['datee']}</p>
        <p class="req">Request made by: {$row1['First_name']} {$row1['Last_name']}</p>

        <a href="approve.php?approve&&vid={$row['appo_id']}" class="approve">Approve</a>
    </div>
daa;
        echo $data;
    }
    ?>
</div>

<?php include_once("../resources/security/footer.php") ?>