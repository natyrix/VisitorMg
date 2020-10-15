<?php require_once ("../resources/config.php")?>
<?php include_once("../resources/admin/header.php") ?>

    <div id="editform">
    <form name="signupform" action="" onsubmit="return validate2()">
        <legend>Registration form</legend><br><br>
        <label>First Name</label><br>
        <input type="text" name="fname" oninput="document.getElementById('firstnameerr').innerHTML = '';document.signupform.fname.style='border-color:default;';">
        <label id="firstnameerr" style="color: red"></label><br><br>
        <label>Last Name</label><br>
        <input type="text" name="lname" oninput="document.getElementById('lastnamerr').innerHTML = '';document.signupform.lname.style='border-color:default;';">
        <label id="lastnamerr" style="color: red"></label><br><br>
        <label>Username</label><br>
        <input type="text" name="uname" oninput="document.getElementById('unmaeerr').innerHTML = '';document.signupform.uname.style='border-color:default;';">
        <label id="unmaeerr" style="color: red"></label><br><br><br>
        <label>Unit: </label>
        <select name="Unit">
            <option value="Department" selected>Department</option>
            <option value="Dean">Dean</option>
            <option value="Finance">Finance</option>
            <option value="Security">Security</option>
        </select><br><br><br>
       <label>Password</label><br>
        <input type="password" name="pwd" oninput="document.getElementById('pwderr').innerHTML = '';  document.signupform.pwd.style='border-color:default;';">
        <label id="pwderr" style="color: red"></label><br><br><br>
        <label>Confirm Password</label><br>
        <input type="password" name="conpwd" oninput="document.getElementById('confpwderr').innerHTML = '';  document.signupform.conpwd.style='border-color:default;';">
        <label id="confpwderr" style="color: red"></label><br><br>
        <input type="submit" name="submit" value="submit" class="button">

    </form>
</div>
<?php include_once("../resources/admin/footer.php") ?>