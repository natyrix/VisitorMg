<?php require_once ("../resources/config.php")?>
<?php include_once("../resources/admin/header.php") ?>

<div id="form">
    <form name="edit" action="" onsubmit="return validate4()" method="post">
        <label>Enter new Username:</label><br>
        <input type="text" name="euname" oninput="document.getElementById('eunameerr').innerHTML = '';
        document.edit.euname.style='border-color:default;';"
        value="<?php
        echo $_SESSION['uname'];
        ?>"
        >
        <label id="eunameerr" style="color: red"></label><br><br>
        <?php ChngUSer();?>
        <input type="submit" name="submit" value="Change"  class="button">
    </form>
</div>
<?php include_once("../resources/admin/footer.php") ?>