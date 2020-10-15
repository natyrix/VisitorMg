<?php require_once ("../resources/config.php")?>
<?php include_once("../resources/admin/header.php") ?>
<div id="form">
    <form name="edit" action="edit2.php" onsubmit="return validate4()">
        <label>Username:</label><br>
        <input type="text" name="euname" oninput="document.getElementById('eunameerr').innerHTML = '';document.edit.euname.style='border-color:default;';">
        <label id="eunameerr" style="color: red"></label><br><br>
        <input type="submit" name="submit" value="Edit"  class="button">
    </form>
</div>
<?php include_once("../resources/admin/footer.php") ?>