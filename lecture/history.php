<?php require_once ("../resources/config.php")?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link rel="stylesheet" href="code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <link rel="stylesheet" href="lecture.css">
        <link rel="stylesheet" href="bootstrap.min.css">
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
    Your past visitors are:
</h2>
    <div style="width: 60%; margin: auto;">
        <div data-role="main" class="ui-content" style="width: 30%">
            <form class="ui-filterable">
                <input id="myFilter" data-type="search">
            </form>
            <ul data-role="listview" data-autodividers="true" data-inset="true" data-filter="true" data-input="#myFilter">
                <?php
                $uname=$_SESSION['logged_user'];
                $query=query("SELECT * FROM approvedappointments WHERE appointed_by='{$uname}' ORDER BY fname ASC");
                confirm($query);
                if (num_rows($query)==0){
                    echo "No past visitors found";
                }
                while ($row=fetch_array($query)){
                    echo "<li><a href='reappoint.php?vid={$row['appo_id']}'>{$row['fname']} {$row['lname']} </a></li>";
                }
                ?>
            </ul>
        </div>
    </div>


<script rel="script" src="lecture.js"></script>
<script rel="script" src="bootstrap.min.js"></script>
<script src="code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</body>
</html>