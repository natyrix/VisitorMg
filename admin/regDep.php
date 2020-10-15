<div id="form">
    <form name="edit" action="" onsubmit="return validate4()" method="post">
        <label>Department Name:</label><br>
        <input type="text" name="euname" oninput="document.getElementById('eunameerr').innerHTML = '';
        document.edit.euname.style='border-color:default;';"
        value="<?php
        if(isset($_SESSION['depname'])){
            echo $_SESSION['depname'];
        }
        ?>"
        >
        <label id="eunameerr" style="color: red">
            <?php
            if(isset($_SESSION['deperr'])){
                echo $_SESSION['deperr'];
            }
            ?>
        </label><br><br>
        <?php regDep()?>
        <input type="submit" name="submit" value="Register"  class="button">
    </form>
</div>