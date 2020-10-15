<?php require_once ("resources/config.php")?>
<?php include_once("resources/header.php") ?>
<?php
if(isset($_SESSION['logged_in']) && isset($_SESSION['title'])){
    redirect($_SESSION['title']);
}
?>
<div>
    <div id="nav">
    <a href="index.php">Home</a>
    </div>
    <div id="form">
    <form name="loginform" action="" onsubmit="return validate()" enctype="multipart/form-data" method="post">
            <legend>Login form</legend>
            <label>Username</label><br>
            <input type="text" name="uname" oninput="document.getElementById('unmaeerr').innerHTML = '';
            document.loginform.uname.style='border-color:default;';" value="<?php if(isset($_SESSION['uname'])){
                echo $_SESSION['uname'];
            }?>">
            <label id="unmaeerr" style="color: red"><?php
                if(isset($_SESSION['unameerr'])){
                    echo $_SESSION['unameerr'];
                }
                ?></label><br>
            <label>Password</label><br>
            <input type="password" name="pwd" oninput="document.getElementById('pwderr').innerHTML = '';
            document.loginform.pwd.style='border-color:default;';">
            <label id="pwderr" style="color: red"><?php if (isset($_SESSION['pwderr'])){
                echo $_SESSION['pwderr'];
                }?> </label><br><br>
        <?php login()?>
            <input type="submit" name="submit" value="login"  class="button">
    </form>
    </div>
</div>
<?php include_once("resources/footer.php") ?>