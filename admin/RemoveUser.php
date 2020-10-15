<?php require_once ("../resources/config.php")?>
<?php include_once("../resources/admin/header.php") ?>

<div id="form">
        <form name="removeuser" action="" onsubmit="return validate3()">
            <label>Employee Username:</label><br>
            <input type="text" name="euname" oninput="document.getElementById('eunameerr').innerHTML = '';document.removeuser.euname.style='border-color:default;';">
            <label id="eunameerr" style="color: red"></label><br><br>

            <input type="submit" name="submit" value="Remove" >

        </form>
    </div>
</div>
<?php include_once("../resources/admin/footer.php") ?>