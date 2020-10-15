<?php if(!isset($_GET['Lecture'])){
    redirect('index.php');
}?>

<div id="form">
    <form name="signupform" action="" onsubmit="return validate2()" method="post">
        <legend>Registration form</legend><br><br>
        <label>First Name</label><br>
        <input type="text" name="fname" oninput="document.getElementById('firstnameerr').innerHTML = '';
        document.signupform.fname.style='border-color:default;';"
        value="<?php
        if(isset($_SESSION['fname'])){
            echo $_SESSION['fname'];
        }
        ?>"
        >
        <label id="firstnameerr" style="color: red"></label><br><br>
        <label>Last Name</label><br>
        <input type="text" name="lname" oninput="document.getElementById('lastnamerr').innerHTML = '';
        document.signupform.lname.style='border-color:default;';"
               value="<?php
               if(isset($_SESSION['lname'])){
                   echo $_SESSION['lname'];
               }
               ?>"
        >
        <label id="lastnamerr" style="color: red"></label><br><br>
        <label>Phone number</label><br>
        <input type="text" name="pno" oninput="document.getElementById('pnoerr').innerHTML='';
        document.signupform.pno.style='border-color:default;';"
        value="<?php
        if(isset($_SESSION['pnoo'])){
            echo $_SESSION['pnoo'];
        }
        ?>"
        >
        <label id="pnoerr" style="color: red"></label><br><br>
        <label>Username</label><br>
        <input type="text" name="uname" oninput="document.getElementById('unmaeerr').innerHTML = '';
        document.signupform.uname.style='border-color:default;';"
        value="<?php
        if (isset($_SESSION['signupuname'])){
            echo $_SESSION['signupuname'];
        }
        ?>"
        >
        <label id="unmaeerr" style="color: red">
            <?php
            if(isset($_SESSION['unameerr'])){
                echo $_SESSION['unameerr'];
            }
            ?>
        </label><br><br><br>
        <label>Department: </label>
        <select name="Department">
            <?php $query= query("SELECT * FROM department");
            confirm($query);
            while ($row=fetch_array($query)){
                echo "<option value='{$row['Name']}' >{$row['Name']}</option>";
            }
            ?>
        </select><br><br><br>
        <label>Password</label><br>
        <input type="password" name="pwd" oninput="document.getElementById('pwderr').innerHTML = '';  document.signupform.pwd.style='border-color:default;';">
        <label id="pwderr" style="color: red"></label><br><br><br>
        <label>Confirm Password</label><br>
        <input type="password" name="conpwd" oninput="document.getElementById('confpwderr').innerHTML = '';  document.signupform.conpwd.style='border-color:default;';">
        <label id="confpwderr" style="color: red">
            <?php
            if (isset($_SESSION['pwderr'])){
                echo $_SESSION['pwderr'];
            }
            ?>
        </label><br><br>
        <?php reglect()?>
        <input type="submit" name="submit" value="submit"  class="button">

    </form>
</div>