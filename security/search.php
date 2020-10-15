<?php require_once ("../resources/config.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <!--    <link rel="stylesheet" href="dean.css">-->
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
<h2>
    Search Here
</h2>
<div style="width: 90%;margin: auto">
    <div data-role="main" class="ui-content" style="width: 70%">
        <form class="ui-filterable">
            <input id="myFilter" data-type="search">
        </form>
        <ul data-role="listview" data-autodividers="true" data-inset="true" data-filter="true" data-input="#myFilter">
            <?php
            $uname=$_SESSION['logged_user'];
            $query=query("SELECT * FROM approvedappointments ORDER BY fname ASC");
            confirm($query);
            if (num_rows($query)==0){
                echo "No past visitors found";
            }
            while ($row=fetch_array($query)){
                $idd=$row['appo_id'];
                $una=$row['appointed_by'];
                $query1=query("SELECT * FROM info WHERE user_id = '{$una}'");
                confirm($query1);
                $row1=fetch_array($query1);
                echo "<li><a href='approve.php?approve&&vid={$idd}'>{$row['fname']} {$row['lname']} on {$row['datee']}  by {$row1['First_name']} {$row1['Last_name']}</a></li>";
            }
            ?>
            approve.php?approve&&vid={$row['appo_id']}
        </ul>
    </div>
</div>
<script rel="script" src="security.js"></script>
<script src="code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</body>
</html>