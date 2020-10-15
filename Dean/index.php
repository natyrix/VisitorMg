<?php require_once ("../resources/config.php")?>
<?php include_once("../resources/dean/header.php") ?>
<div id="content">
    <h3>Recent Visitor Requests</h3>
    <?php
    $uname=$_SESSION['logged_user'];
    $quer=query("SELECT * FROM draftappoint WHERE head_id='{$uname}' ORDER BY datee DESC ");
    confirm($quer);
    if (num_rows($quer)==0){

    }
    while ($row=fetch_array($quer)){
        $quer1=query("SELECT * FROM info WHERE user_id='{$row['appointed_by']}'");
        confirm($quer1);
        $row1=fetch_array($quer1);
     $dat=<<<ddd
<div class="card">
        <p class="title">Visitor Name: {$row['fname']} {$row['lname']}</p>
        <p class="title">Visitation Detail: {$row['detail']}</p>
        <p class="title">Date: {$row['datee']}</p>
        <p class="req">Request made by: {$row1['First_name']} {$row1['Last_name']}</p>
        <a href="approve.php?approve&&vid={$row['vis_id']}" class="approve">Approve</a>
        <a href="approve.php?decline&&vid={$row['vis_id']}" class="decline">Decline</a>
        
    </div>
ddd;
     echo $dat;
    }
    ?>

</div>

<?php include_once("../resources/dean/footer.php") ?>