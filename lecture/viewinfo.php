<?php require_once ("../resources/config.php")?>
<?php include_once("../resources/lecture/header.php") ?>
<?php
if(isset($_GET['vdate'])){
$datee= $_GET['vdate'];
$uname=$_SESSION['logged_user'];
$query=query("SELECT * FROM approvedappointments WHERE datee='{$datee}' AND appointed_by='{$uname}'");
confirm($query);
?>
    <div class="container">
    <table class="table">
    <thead class="thead-light"><tr><th>First Name</th><th> Last Name</th><th> Detail</th><th> Date</th></tr></thead>
    <?php
while ($row=fetch_array($query)){
$data=<<<dt
    <tr><td>{$row['fname']}</td><td> {$row['lname']}</td><td> {$row['detail']}</td><td> {$row['datee']}</td></tr>
dt;
echo $data;
}
}
?>
    </table>
    </div>
<?php include_once("../resources/lecture/footer.php") ?>