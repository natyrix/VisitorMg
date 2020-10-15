<?php require_once ("../resources/config.php")?>
<?php include_once("../resources/lecture/header.php") ?>
    <div class="column content">
        <div id="apform2">
            <form name="appointform" action="" onsubmit="return validate()" method="post">
                <label>First Name</label><br>
                <input type="text" name="fname" oninput="document.getElementById('firstnameerr').innerHTML = '';document.appointform.fname.style='border-color:default;';"
                value="<?php
                if(isset($_SESSION['fname'])){
                    echo $_SESSION['fname'];
                }
                ?>"
                >
                <label id="firstnameerr" style="color: red"></label><br><br>
                <label>Last Name</label><br>
                <input type="text" name="lname" oninput="document.getElementById('lastnamerr').innerHTML = '';document.appointform.lname.style='border-color:default;';"
                value="<?php
                if(isset($_SESSION['lname'])){
                    echo $_SESSION['lname'];
                }
                ?>"
                >
                <label id="lastnamerr" style="color: red"></label><br><br>
                <label>Visitation Detail</label><br>
                <textarea cols="113" name="details" oninput="document.getElementById('deterr').innerHTML = '';document.appointform.details.style='border-color:default;';"><?php if(isset($_SESSION['visdet'])){echo $_SESSION['visdet'];} ?></textarea><br><br>
                <label id="deterr" style="color: red"></label><br><br>
                <label>Visitation Date</label><br>
                <input type="date" name="dtt"><label id="daterr" style="color: red">
                    <?php
                    if (isset($_SESSION['visitdateerr'])){
                        echo $_SESSION['visitdateerr'];
                    }
                    ?>
                </label><br><br>

                <?php appointVis2()?>
                <input type="submit" name="submit" value="Appoint"  class="button">
            </form>
        </div>
    </div>


<?php include_once("../resources/lecture/footer.php") ?>