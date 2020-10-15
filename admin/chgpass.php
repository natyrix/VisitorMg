<?php require_once ("../resources/config.php")?>
<?php include_once("../resources/admin/header.php") ?>
<div id="form">
    <form name="chng" action="" onsubmit="return validate5()" method="post">
        <label>Old Password</label><br>
        <input type="password" name="pwd" oninput="document.getElementById('oldpwderr').innerHTML = '';  document.chng.pwd.style='border-color:default;';">
        <label id="oldpwderr" style="color: red">
            <?php if(isset($_SESSION['pwde'])){
                echo $_SESSION['pwde'];
            }?>
        </label><br><br><br>
        <label>New Password</label><br>
        <input type="password" name="pwd2" oninput="document.getElementById('pwderr').innerHTML = '';  document.chng.pwd2.style='border-color:default;';">
        <label id="pwderr" style="color: red"></label><br><br><br>
        <label>Confirm Password</label><br>
        <input type="password" name="conpwd" oninput="document.getElementById('confpwderr').innerHTML = '';  document.chng.conpwd.style='border-color:default;';">
        <label id="confpwderr" style="color: red"></label><br><br>
        <?php chngpwd();?>
        <input type="submit" name="submit" value="submit"  class="button">
    </form>
</div>
<?php include_once("../resources/admin/footer.php") ?>