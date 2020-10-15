<?php require_once ("../resources/config.php")?>
<?php include_once("../resources/lecture/header.php") ?>
<div class="container">
<table class="table">
   <thead class="thead-dark"> <tr><th>Number Of visitors You have</th><th>Date</th></tr></thead>
    <?php
    $uname=$_SESSION['logged_user'];
    $query=query("SELECT * FROM noofappoints WHERE user_id='{$uname}'");
    confirm($query);
    while ($row=fetch_array($query)){
        $datee=$row['Ddate'];
        $data=<<<dt
<tr><td>{$row['no']}</td><td><a href='viewinfo.php?vdate={$datee}'>{$row['Ddate']}</a></td></tr>
    
dt;
        echo $data;
    }

    ?>
</table>
</div>
<?php include_once("../resources/lecture/footer.php") ?>
