<div id="form">
    <form name="edit" action="" onsubmit="return validate4()" method="post">
        <label>Unit Name:</label><br>
        <input type="text" name="euname" oninput="document.getElementById('eunameerr').innerHTML = '';
        document.edit.euname.style='border-color:default;';"
               value="<?php
               if(isset($_SESSION['unitname'])){
                   echo $_SESSION['unitname'];
               }
               ?>"
        >
        <label id="eunameerr" style="color: red">
            <?php
            if(isset($_SESSION['unierr'])){
                echo $_SESSION['unierr'];
            }
            ?>
        </label><br><br>
        <?php regUnit()?>
        <input type="submit" name="submit" value="Register"  class="button">
    </form>
</div>