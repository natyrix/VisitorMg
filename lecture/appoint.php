<?php require_once ("../resources/config.php")?>
<?php include_once("../resources/lecture/header.php") ?>
    <div class="column content">
        <div id="apform">
            <form name="appointform" action="" method="post">
                <table id="apform">
                    <thead>
                    <tr>
                        <td> </td>
                        <td><label>First Name</label></td>
                        <td><label>Last Name</label></td>
                        <td><label>Visitation Detail</label></td>
                        <td><label>Visitation Date</label></td>
                    </tr>
                    </thead>
                    <?php
                    $uname=$_SESSION['logged_user'];

                    $fname =array(" "," "," ");
                    $fnameerr=array(" "," "," ");
                    $lname=array(" "," "," ");
                    $lnameerr=array(" "," "," ");
                    $dateerr=array(" "," "," ");
                    $details=array(" "," "," ");
                    $deterr=array(" "," "," ");
                    $da=date("m/d/Y");
                    if(!isset($_SESSION['y'])){

                        $_SESSION['y']=1;

                    }
                    $y=$_SESSION['y'];
                    $q=" ";
                    if($y>=0 && $y<=3){
                        for ($i=0;$i<$y;$i++){
                            if(isset($_SESSION['fname'.$i])){
                                $fname[$i]=$_SESSION['fname'.$i];
                            }
                            if (isset($_SESSION['fnameerr'.$i])){
                                $fnameerr[$i]=$_SESSION['fnameerr'.$i];
                            }
                            if(isset($_SESSION['lname'.$i])){
                                $lname[$i]=$_SESSION['lname'.$i];
                            }
                            if (isset($_SESSION['lnameerr'.$i])){
                                $lnameerr[$i]=$_SESSION['lnameerr'.$i];
                            }
                            if(isset($_SESSION['visdet'.$i])){
                                $details[$i]=$_SESSION['visdet'.$i];
                            }
                            if (isset($_SESSION['visdeterr'.$i])){
                                $deterr[$i]=$_SESSION['visdeterr'.$i];
                            }
                            if (isset($_SESSION['visitdateerr'.$i])){
                                $dateerr[$i]=$_SESSION['visitdateerr'.$i];
                            }

                        }
                        for($i=1;$i<=$y;$i++){
                            $x=$i-1;
                            $data=<<<del
                            <tr>
                            <td>
                            {$i}
</td>
                        <td>
                            <input type="text" name="fname{$i}" value="{$fname[$x]}">
                            <label id="firstnameerr" style="color: red">{$fnameerr[$x]}</label>
                        </td>
                        <td>
                            <input type="text" name="lname{$i}" value="{$lname[$x]}">
                            <label id="lastnamerr" style="color: red">{$lnameerr[$x]}</label>
                        </td>
                        <td>
                            <textarea name="details{$i}" >{$details[$x]}</textarea><br><br>
                            <label id="deterr" style="color: red">{$deterr[$x]}</label>
                        </td>
                        <td>
                            <input type="date" name="vdate{$i}" min="{$da}" >
                            <label id="daterr" style="color: red">{$dateerr[$x]}</label>
                        </td>
                    </tr>

del;
                            echo $data;

                        }
                        $dtt=<<<Dee
<tr>
                        <td>
                            <input type="submit" name="submit" value="Appoint"  class="button">
                        </td>
                    </tr>
Dee;
                        appointVis();
                        echo $dtt;

                    }
                    ?>

                </table>
            </form>
        </div>
        <div class="rightmarg">
            <form method="post">
        <?php
        addrows();
        if($y>=0 && $y<3){
            echo "<p>Add rows here</p>";
            echo "<select name='val'>";
            $x=3-$y;
            for($i=1;$i<=$x;$i++){
                echo "<option value='{$i}'>{$i}</option>";
            }
            echo "</select>";
            echo "<input type='submit' name='add' value='Add'  class='button'>";

        }
        else{

        }
        echo "<input type='submit' name='cancel' value='Cancel'  class='button' style=\"background-color: darkred\">";
        ?>
            </form>
        </div>
    </div>
</div>
<?php
function addrows(){
    if(isset($_POST['add'])){
        $_SESSION['y']+=$_POST['val'];
        redirect('appoint.php');
        $x=$_SESSION['y'];
        for($i=0;$i<$x;$i++){
            if (isset($_SESSION['fnameerr'.$i])){
                unset($_SESSION['fnameerr'.$i]);
            }
            if (isset($_SESSION['lnameerr'.$i])){
                unset($_SESSION['lnameerr'.$i]);
            }
            if (isset($_SESSION['visdeterr'.$i])){
                unset($_SESSION['visdeterr'.$i]);
            }
            if (isset($_SESSION['visitdateerr'.$i])){
                unset($_SESSION['visitdateerr'.$i]);
            }
        }
    }
    elseif (isset($_POST['cancel'])){
        $x=$_SESSION['y'];
        for($i=0;$i<$x;$i++){
            if(isset($_SESSION['fname'.$i])){
                unset($_SESSION['fname'.$i]);
            }
            if (isset($_SESSION['fnameerr'.$i])){
                unset($_SESSION['fnameerr'.$i]);
            }
            if(isset($_SESSION['lname'.$i])){
                unset($_SESSION['lname'.$i]);
            }
            if (isset($_SESSION['lnameerr'.$i])){
                unset($_SESSION['lnameerr'.$i]);
            }
            if(isset($_SESSION['visdet'.$i])){
                unset($_SESSION['visdet'.$i]);
            }
            if (isset($_SESSION['visdeterr'.$i])){
                unset($_SESSION['visdeterr'.$i]);
            }
            if (isset($_SESSION['visitdateerr'.$i])){
                unset($_SESSION['visitdateerr'.$i]);
            }
        }
        unset($_SESSION['y']);
        redirect('index.php');
    }
}
?>
<?php include_once("../resources/lecture/footer.php") ?>