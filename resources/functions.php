<?php
function redirect($location){
    header("Location: $location");
}
function query($sql){
    global $connection;
    return mysqli_query($connection,$sql);
}

function confirm($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED " . mysqli_error($connection));
    }
}
function escape_string($string){
    global $connection;
    return mysqli_real_escape_string($connection,$string);
}
function fetch_array($result){
    return mysqli_fetch_array($result);
}
function num_rows($result){
    $x=mysqli_num_rows($result);
    return $x;
}

function signAdmin(){
    $unmae = "NSRAD";
    $pwd=12345;
    $pass= password_hash($pwd,PASSWORD_DEFAULT);
    $title="Admin";
    $tithash=password_hash($title,PASSWORD_DEFAULT);
    $query=query("INSERT INTO users (user_id , Password) VALUES ('{$unmae}','{$pass}')");
    confirm($query);
    $query2=query("INSERT INTO title (user_id , Title) VALUES ('{$unmae}','{$tithash}')");
    confirm($query2);
}
function login(){
    if($_SERVER['REQUEST_METHOD']=="POST" ||isset($_POST['submit'])){
        $_SESSION['uname']= escape_string($_POST['uname']);
        $_SESSION['pwd']=escape_string($_POST['pwd']);
        $uname=trim($_SESSION['uname']);

        if ($uname!=" " && $_SESSION['pwd']!=" "){
            $query=query("SELECT * FROM users WHERE user_id='{$uname}'");
            confirm($query);
            if(num_rows($query)>0){
                $row=fetch_array($query);
                if(password_verify($_SESSION['pwd'],$row['Password'])){
                    $_SESSION['unameerr']=" ";
                    $_SESSION['pwderr']=" ";
                    $query1=query("SELECT * FROM title WHERE user_id='{$uname}'");
                    confirm($query1);
                    if(num_rows($query1)>0){
                        $row=fetch_array($query1);
                        if(password_verify("Admin",$row['Title'])){
                            $_SESSION['logged_user']=$uname;
                            $_SESSION['logged_in']=true;
                            redirect('admin');
                            $_SESSION['title']='admin';
                        }
                        if(password_verify("Lecture",$row['Title'])){
                            $_SESSION['logged_user']=$uname;
                            $_SESSION['logged_in']=true;
                            redirect('lecture');
                            $_SESSION['title']='lecture';
                        }
                        if(password_verify("Security",$row['Title'])){
                            $_SESSION['logged_user']=$uname;
                            $_SESSION['logged_in']=true;
                            redirect('security');
                            $_SESSION['title']='security';
                        }
                        if(password_verify("Dep_head",$row['Title']) || password_verify("Dean",$row['Title'])){
                            $_SESSION['logged_user']=$uname;
                            if(password_verify("Dep_head",$row['Title'])){
                                $_SESSION['logged_in']=true;
                                redirect('Dean');
                                $_SESSION['title']='Dean';
                            }
                            elseif(password_verify("Dean",$row['Title'])){
                                $_SESSION['logged_in']=true;
                                redirect('Dean');
                                $_SESSION['title']='Dean';
                            }

                        }
                    }
                    else{
                        die("Fatal Error Occurred");
                    }
                }
                else{
                    $_SESSION['unameerr']=" ";
                    $_SESSION['pwderr']="Invalid password";
                    redirect('login.php');
                }
            }
            else{
                $_SESSION['unameerr']="Username not found";
                redirect('login.php');
            }
        }
        else{
            $_SESSION['unameerr']="Username can not be empty";
            $_SESSION['pwderr'] = "Password required";
            redirect('login.php');
        }
    }
}
function logOut(){
    session_destroy();
    redirect('../index.php');
}
function registerUser(){

}
function ChngUSer(){
    if($_SERVER['REQUEST_METHOD']=="POST" || isset($_POST['submit'])){
        $id=$_SESSION['uname'];
        $_SESSION['uname']=escape_string($_POST['euname']);
        $uname=trim($_SESSION['uname']);
        $query=query("UPDATE users SET user_id='{$uname}' WHERE user_id='{$id}'");
        confirm($query);
        $query1=query("UPDATE title SET user_id='{$uname}' WHERE user_id='{$id}'");
        confirm($query1);
        redirect('index.php');
    }
}
function chngpwd(){
    if($_SERVER['REQUEST_METHOD']=="POST" || isset($_POST['submit'])){
        $id=$_SESSION['uname'];
        $oldpwd=escape_string($_POST['pwd']);
        $newpwd=escape_string($_POST['pwd2']);
        $conpwd=escape_string($_POST['conpwd']);
        $query=query("SELECT * FROM users WHERE user_id='{$id}'");
        confirm($query);
        if(num_rows($query)>0){
            $row=fetch_array($query);
            if(password_verify($oldpwd,$row['Password'])){
                if($newpwd === $conpwd){
                    $hashedpwd=password_hash($newpwd,PASSWORD_DEFAULT);
                    $query1=query("UPDATE users SET Password='[$hashedpwd]' WHERE user_id='[$id]'");
                    confirm($query1);
                    logOut();
                }
            }
            else{
                $_SESSION['pwde']="Incorrect old Password";
            }
        }
    }
}
function reglect(){
    if($_SERVER['REQUEST_METHOD']=="POST" || isset($_POST['submit'])){
        $_SESSION['fname']=escape_string($_POST['fname']);
        $_SESSION['lname']=escape_string($_POST['lname']);
        $_SESSION['signupuname']=escape_string($_POST['uname']);
        $_SESSION['pnoo']=escape_string($_POST['pno']);
        $dep=$_POST['Department'];
        $uname=$_SESSION['signupuname'];
        $pass=escape_string($_POST['pwd']);
        $conpwd=escape_string($_POST['conpwd']);
        $query=query("SELECT * FROM users WHERE user_id ='{$uname}'");
        confirm($query);
        if(num_rows($query)==0){
            if($conpwd===$pass){
                unset($_SESSION['signupuname']);
                unset($_SESSION['pwderr']);
                unset($_SESSION['unameerr']);
                $fname=$_SESSION['fname'];
                $lname=$_SESSION['lname'];
                $pno= $_SESSION['pnoo'];
                $title=password_hash("Lecture",PASSWORD_DEFAULT);
                unset($_SESSION['pnoo']);
                unset($_SESSION['lname']);
                unset($_SESSION['fname']);
                $hashed=password_hash($pass,PASSWORD_DEFAULT);
                $query7=query("SELECT * FROM unit WHERE unit_name='Department'");
                confirm($query7);
                $row=fetch_array($query7);
                $unit_id=$row['unit_id'];
                $query1=query("SELECT * FROM dep_head WHERE Department_name='{$dep}'");
                confirm($query1);
                $query6=query("SELECT * FROM department WHERE Name='{$dep}'");
                confirm($query6);
                $row2=fetch_array($query6);
                $dep_id=$row2['dep_id'];
                if(num_rows($query1)>0){
                    $row=fetch_array($query1);
                    $user_head=$row['user_id'];
                    $query2=query("INSERT INTO info (user_id,First_name ,Last_name,phone_number ,dep_id,unit_id) VALUES ('{$uname}','{$fname}','{$lname}','{$pno}','{$dep_id}','{$unit_id}')");
                    confirm($query2);
                    $query3=query("INSERT INTO title (user_id,Title) VALUES ('{$uname}','{$title}')");
                    confirm($query3);
                    $query4=query("INSERT INTO users(user_id,Password) VALUES('{$uname}','{$hashed}') ");
                    confirm($query4);
                    $query5=query("INSERT INTO user_head(user_id,head_id) VALUES ('{$uname}','{$user_head}')");
                    confirm($query5);
                    redirect("index.php");
                }
                else{
                    $_SESSION['pwderr']="Department Head not found";
                    redirect("signup.php?Lecture");
                }
            }
            else{
                $_SESSION['pwderr']="Passwords do not match";
                redirect("signup.php?Lecture");
            }
        }
        else{
            $_SESSION['unameerr']="User name already taken";
            redirect("signup.php?Lecture");
        }
    }
}
function regSec(){
    if($_SERVER['REQUEST_METHOD']=="Post" || isset($_POST['submit'])){
        $_SESSION['fname']=escape_string($_POST['fname']);
        $_SESSION['lname']=escape_string($_POST['lname']);
        $_SESSION['signupuname']=escape_string($_POST['uname']);
        $_SESSION['pnoo']=escape_string($_POST['pno']);
        $uname=$_SESSION['signupuname'];
        $pass=escape_string($_POST['pwd']);
        $conpwd=escape_string($_POST['conpwd']);
        $query=query("SELECT * FROM users WHERE user_id ='{$uname}'");
        confirm($query);
        if(num_rows($query)==0){
            if($pass===$conpwd){
                $fname=$_SESSION['fname'];
                $lname=$_SESSION['lname'];
                $hash=password_hash($pass,PASSWORD_DEFAULT);
                $pno=$_SESSION['pnoo'];
                $title=password_hash("Security",PASSWORD_DEFAULT);
                $query1=query("SELECT * FROM unit WHERE unit_name='Security'");
                confirm($query1);
                $row=fetch_array($query1);
                $unit_id=$row['unit_id'];
                unset($_SESSION['signupuname']);
                unset($_SESSION['fname']);
                unset($_SESSION['lname']);
                unset($_SESSION['pnoo']);
                unset($_SESSION['unameerr']);
                $query2=query("INSERT INTO info (user_id,First_name ,Last_name,phone_number,unit_id) VALUES ('{$uname}','{$fname}','{$lname}','{$pno}','{$unit_id}')");
                confirm($query2);
                $query3=query("INSERT INTO title (user_id,Title) VALUES ('{$uname}','{$title}')");
                confirm($query3);
                $query4=query("INSERT INTO users(user_id,Password) VALUES('{$uname}','{$hash}') ");
                confirm($query4);
                redirect('index.php');
            }
        }
        else{
            $_SESSION['unameerr']="User name already taken";
            redirect("signup.php?Security");
        }
    }
}
function regAdmm(){
    if($_SERVER['REQUEST_METHOD']=="Post" || isset($_POST['submit'])){
        $_SESSION['fname']=escape_string($_POST['fname']);
        $_SESSION['lname']=escape_string($_POST['lname']);
        $_SESSION['signupuname']=escape_string($_POST['uname']);
        $_SESSION['pnoo']=escape_string($_POST['pno']);
        $uname=$_SESSION['signupuname'];
        $pass=escape_string($_POST['pwd']);
        $conpwd=escape_string($_POST['conpwd']);
        $query=query("SELECT * FROM users WHERE user_id ='{$uname}'");
        confirm($query);
        if(num_rows($query)==0){
            if($pass===$conpwd){
                $fname=$_SESSION['fname'];
                $lname=$_SESSION['lname'];
                $hash=password_hash($pass,PASSWORD_DEFAULT);
                $pno=$_SESSION['pnoo'];
                $title=password_hash("Administrative",PASSWORD_DEFAULT);
                $query1=query("SELECT * FROM unit WHERE unit_name='Administrative'");
                confirm($query1);
                $row=fetch_array($query1);
                $unit_id=$row['unit_id'];
                $head_id="DEAN";
                unset($_SESSION['signupuname']);
                unset($_SESSION['fname']);
                unset($_SESSION['lname']);
                unset($_SESSION['pnoo']);
                unset($_SESSION['unameerr']);
                $query2=query("INSERT INTO info (user_id,First_name ,Last_name,phone_number,unit_id) VALUES ('{$uname}','{$fname}','{$lname}','{$pno}','{$unit_id}')");
                confirm($query2);
                $query3=query("INSERT INTO title (user_id,Title) VALUES ('{$uname}','{$title}')");
                confirm($query3);
                $query4=query("INSERT INTO users(user_id,Password) VALUES('{$uname}','{$hash}') ");
                confirm($query4);
                $query5=query("INSERT INTO user_head(user_id,head_id) VALUES ('{$uname}','{$head_id}')");
                redirect('index.php');
            }
        }
        else{
            $_SESSION['unameerr']="Username already taken";
            redirect("signup.php?admm");
        }
    }
}
function regDep(){
    if($_SERVER['REQUEST_METHOD']=="Post" || isset($_POST['submit'])){
        $_SESSION['depname']=escape_string($_POST['euname']);
        $dep=$_SESSION['depname'];
        $query=query("SELECT * FROM department WHERE Name='{$dep}'");
        confirm($query);
        if(num_rows($query)==0){
            $_SESSION['depart']=$_SESSION['depname'];
            unset($_SESSION['deperr']);
            unset($_SESSION['depname']);
            redirect("signup.php?dep_head");
        }
        else{
            $_SESSION['deperr']="Department already exists";
            redirect('signup.php?dep');
        }
    }
}
function reggDephead(){
    if($_SERVER['REQUEST_METHOD']=="Post" || isset($_POST['submit'])){
        $dep=$_SESSION['depart'];
        unset($_SESSION['depart']);
        $_SESSION['fname']=escape_string($_POST['fname']);
        $_SESSION['lname']=escape_string($_POST['lname']);
        $_SESSION['signupuname']=escape_string($_POST['uname']);
        $_SESSION['pnoo']=escape_string($_POST['pno']);
        $uname=$_SESSION['signupuname'];
        $pass=escape_string($_POST['pwd']);
        $conpwd=escape_string($_POST['conpwd']);
        $query=query("SELECT * FROM users WHERE user_id ='{$uname}'");
        confirm($query);
        if(num_rows($query)==0){
            if($conpwd===$pass){
                $fname=$_SESSION['fname'];
                $lname=$_SESSION['lname'];
                $hash=password_hash($pass,PASSWORD_DEFAULT);
                $pno=$_SESSION['pnoo'];
                $title=password_hash("Dep_head",PASSWORD_DEFAULT);
                $query1=query("SELECT * FROM unit WHERE unit_name='Department'");
                confirm($query1);
                $row=fetch_array($query1);
                $unit_id=$row['unit_id'];
                unset($_SESSION['signupuname']);
                unset($_SESSION['fname']);
                unset($_SESSION['lname']);
                unset($_SESSION['pnoo']);
                unset($_SESSION['unameerr']);
                $query1=query("INSERT INTO department(Name) VALUES ('{$dep}')");
                confirm($query1);
                $query2=query("SELECT * FROM department WHERE Name='{$dep}'");
                confirm($query2);
                $row1=fetch_array($query2);
                $dep_id=$row1['dep_id'];
                $query5=query("INSERT INTO info (user_id,First_name ,Last_name,phone_number,dep_id,unit_id) VALUES ('{$uname}','{$fname}','{$lname}','{$pno}','{$dep_id}','{$unit_id}')");
                confirm($query5);
                $query3=query("INSERT INTO title (user_id,Title) VALUES ('{$uname}','{$title}')");
                confirm($query3);
                $query4=query("INSERT INTO users(user_id,Password) VALUES('{$uname}','{$hash}') ");
                confirm($query4);
                $query6=query("INSERT INTO dep_head (user_id,Department_name) VALUES ('{$uname}','{$dep}')");
                redirect('index.php');
            }
        }
        else{
            $_SESSION['unameerr']="Username already taken";
            redirect("signup.php?admm");
        }

    }
}
function checkDep(){
    if($_SERVER['REQUEST_METHOD']=="POST" || isset($_POST['submit'])){
        $dep=$_POST['Department'];
        $query=query("SELECT * FROM dep_head WHERE Department_name='$dep'");
        confirm($query);
        if(num_rows($query)>0){
            $_SESSION['deperr']="Department {$dep} already has a head";
            redirect('signup.php?dep_head');
        }
    }
}
function regUnit(){
    if($_SERVER['REQUEST_METHOD']=="Post" || isset($_POST['submit'])){
        $_SESSION['unitname']=escape_string($_POST['euname']);
        $uni=$_SESSION['unitname'];
        $query=query("SELECT * FROM unit WHERE unit_name='{$uni}'");
        confirm($query);
        if(num_rows($query)==0){
            unset($_SESSION['unierr']);
            unset($_SESSION['unitname']);
            $query1=query("INSERT INTO unit(unit_name) VALUES '{$uni}'");
            confirm($query1);
            redirect("index.php");
        }
        else{
            $_SESSION['unierr']="Unit already exists";
            redirect('signup.php?uni');
        }
    }
}
function appointVis(){
    if($_SERVER['REQUEST_METHOD']=="POST" || isset($_POST['submit'])){
        if(isset($_SESSION['y'])){
            $fname=array();
            $lname=array();
            $visdetail=array();
            $visdate=array();
            $y=$_SESSION['y'];
            for($i=0;$i<$y;$i++){
                $x=$i+1;
                $fname[$i]=escape_string(trim($_POST['fname'.$x]));
                $_SESSION['fname'.$i]=$fname[$i];
                $lname[$i]=escape_string(trim($_POST['lname'.$x]));
                $_SESSION['lname'.$i]=$lname[$i];
                $visdetail[$i]=escape_string(trim($_POST['details'.$x]));
                $_SESSION['visdet'.$i]=$visdetail[$i];
                $visdate[$i]=escape_string(trim($_POST['vdate'.$x]));
            }
            for ($i=0;$i<$y;$i++){
                if(empty($fname[$i])){
                    $_SESSION['fnameerr'.$i]="First name required";
                }
                elseif (!preg_match("/^[ a-z A-Z ]+$/ ",$fname[$i])){
                    $_SESSION['fnameerr'.$i]="First name must be letters only";
                }
                else{
                    $_SESSION['fnameerr'.$i]=" ";
                }
                if(empty($lname[$i])){
                    $_SESSION['lnameerr'.$i]="Last name required";
                }
                elseif (!preg_match("/^[ a-z A-Z ]+$/ ",$lname[$i])){
                    $_SESSION['lnameerr'.$i]="Last name must be letters only";
                }
                else{
                    $_SESSION['lnameerr'.$i]=" ";
                }
                if(empty($visdetail[$i])){
                    $_SESSION['visdeterr'.$i]="Visitation details required";
                }
                else{
                    $_SESSION['visdeterr'.$i]=" ";
                }
                $year=explode("-",$visdate[$i]);
                $curyear=explode("-",date("Y-m-d"));
                if($year[0]!=$curyear[0]){
                    $_SESSION['visitdateerr'.$i]="Visitation date can not be set to another year";
                }
                 elseif($year[1]<$curyear[1] && $year[0]==$curyear[0]){
                    $_SESSION['visitdateerr'.$i]="Visitation date can not be set to past month";
                }
                elseif($year[2]<$curyear[2] && $year[1]<=$curyear[1] && $year[0]==$curyear[0]){
                    $_SESSION['visitdateerr'.$i]="Visitation date can not be set to past date";
                }
                else{
                    $_SESSION['visitdateerr'.$i]=" ";
                }
            }
            $stat=false;
            for($i=0;$i<$y;$i++){
                if( $_SESSION['fnameerr'.$i]==" " && $_SESSION['lnameerr'.$i]==" " && $_SESSION['visdeterr'.$i]==" "&& $_SESSION['visitdateerr'.$i]==" "){
                    $stat=true;
                }
            }
            if($stat){
                $uname=$_SESSION['logged_user'];
                $date=date("Y-m-d");
                $query=query("SELECT * FROM user_head WHERE user_id='{$uname}'");
                confirm($query);
                $row=fetch_array($query);
                $head=$row['head_id'];
                for($i=0;$i<$y;$i++){
                    $query2=query("SELECT * FROM noofappoints WHERE Ddate='{$visdate[$i]}' AND user_id='{$uname}'");
                    confirm($query2);
                    if(num_rows($query2)>0){
                        $row=fetch_array($query2);
                        $num=$row['no'];
                        if($num<3){
                            $query4=query("UPDATE noofappoints SET no=no+1 WHERE user_id='{$uname}' AND Ddate='{$visdate[$i]}'");
                            confirm($query4);
                            appointnew($fname[$i],$lname[$i],$visdetail[$i],$visdate[$i],$uname);
                        }
                        else{
                            appointnew2($fname[$i],$lname[$i],$visdetail[$i],$visdate[$i],$uname,$head);
                        }
                    }
                    else{
                        $query3=query("INSERT INTO noofappoints VALUES ('{$uname}',1,'{$visdate[$i]}')");
                        confirm($query3);
                        appointnew($fname[$i],$lname[$i],$visdetail[$i],$visdate[$i],$uname);
                    }
                    unset($_SESSION['fname'.$i]);
                    unset($_SESSION['lname'.$i]);
                    unset($_SESSION['visdet'.$i]);
                    unset($_SESSION['fnameerr'.$i]);
                    unset($_SESSION['lnameerr'.$i]);
                    unset($_SESSION['visitdateerr'.$i]);
                    unset($_SESSION['visdeterr'.$i]);
                    unset($_SESSION['y']);
                }

                redirect('index.php');
            }
            else{
                redirect('appoint.php');
            }


        }
    }
}
function appointnew($fname,$lname,$detail,$datee,$appointed_by){
    $query1=query("INSERT INTO approvedappointments (fname,lname,detail,datee,appointed_by) 
VALUES ('{$fname}','{$lname}','{$detail}','{$datee}','{$appointed_by}')");
    confirm($query1);
}
function appointnew2($fname,$lname,$detail,$datee,$appointed_by,$headid){
    $query1= query("INSERT INTO draftappoint(fname,lname,detail,datee,appointed_by,head_id)
                    VALUES ('{$fname}','{$lname}','{$detail}','{$datee}','{$appointed_by}','{$headid}')
");
    confirm($query1);
}

function delpastdate(){
    $uname=$_SESSION['logged_user'];
    $query=query("SELECT * FROM noofappoints WHERE user_id='{$uname}'");
    confirm($query);
    $curyear=explode("-",date("Y-m-d"));
    while ($row=fetch_array($query)){
        $rowdate=$row['Ddate'];
        $year=explode("-",$rowdate);
        if($year[0]<$curyear[0]){
           deleteappts($rowdate,$uname);
        }
        elseif($year[1]<$curyear[1] && $year[0]==$curyear[0]){
            deleteappts($rowdate,$uname);
        }
        elseif($year[2]<$curyear[2] && $year[1]<=$curyear[1] && $year[0]==$curyear[0]){
            deleteappts($rowdate,$uname);
        }

    }
}
function deleteappts($date,$uname){

    $query1=query("DELETE FROM noofappoints WHERE Ddate='{$date}' AND user_id='{$uname}'");
    confirm($query1);
}
function appointVis2(){
    if($_SERVER['REQUEST_METHOD']=="POST" || isset($_POST['submit'])){
        $_SESSION['fname']=escape_string($_POST['fname']);
        $_SESSION['lname']=escape_string($_POST['lname']);
        $_SESSION['visdet']=escape_string($_POST['details']);
        $visdate=$_POST['dtt'];
        $year=explode("-",$visdate);
        $curyear=explode("-",date("Y-m-d"));
        if($year[0]!=$curyear[0]){
            $_SESSION['visitdateerr']="Visitation date can not be set to another year";
        }
        elseif($year[1]<$curyear[1] && $year[0]==$curyear[0]){
            $_SESSION['visitdateerr']="Visitation date can not be set to past month";
        }
        elseif($year[2]<$curyear[2] && $year[1]<=$curyear[1] && $year[0]==$curyear[0]){
            $_SESSION['visitdateerr']="Visitation date can not be set to past date";
        }
        else{
            $_SESSION['visitdateerr']=" ";
        }
        if($_SESSION['visitdateerr']==" "){
            $fname=$_SESSION['fname'];
            $lname=$_SESSION['lname'];
            $detail=$_SESSION['visdet'];
            unset($_SESSION['fname']);
            unset($_SESSION['lname']);
            unset($_SESSION['visdet']);
            $uname=$_SESSION['logged_user'];
            $query=query("SELECT * FROM user_head WHERE user_id='{$uname}'");
            confirm($query);
            $row=fetch_array($query);
            $head=$row['head_id'];
            $query2=query("SELECT * FROM noofappoints WHERE Ddate='{$visdate}' AND user_id='{$uname}'");
            confirm($query2);
            if(num_rows($query2)>0){
                $row=fetch_array($query2);
                $num=$row['no'];
                if($num<3){
                    $query4=query("UPDATE noofappoints SET no=no+1 WHERE user_id='{$uname}' AND Ddate='{$visdate}'");
                    confirm($query4);
                    appointnew($fname,$lname,$detail,$visdate,$uname);
                }
                else{
                    appointnew2($fname,$lname,$detail,$visdate,$uname,$head);
                }
            }
            else{
                $query3=query("INSERT INTO noofappoints VALUES ('{$uname}',1,'{$visdate}')");
                confirm($query3);
                appointnew($fname,$lname,$detail,$visdate,$uname);
            }
            redirect('index.php');
        }
        else{
            redirect('appoint2.php');
        }
    }
}
function appointVis3(){
    if($_SERVER['REQUEST_METHOD']=="POST" || isset($_POST['submit'])){
        $_SESSION['fname']=escape_string($_POST['fname']);
        $_SESSION['lname']=escape_string($_POST['lname']);
        $_SESSION['visdet']=escape_string($_POST['details']);
        $visdate=$_POST['dtt'];
        $year=explode("-",$visdate);
        $curyear=explode("-",date("Y-m-d"));
        if($year[0]!=$curyear[0]){
            $_SESSION['visitdateerr']="Visitation date can not be set to another year";
        }
        elseif($year[1]<$curyear[1] && $year[0]==$curyear[0]){
            $_SESSION['visitdateerr']="Visitation date can not be set to past month";
        }
        elseif($year[2]<$curyear[2] && $year[1]<=$curyear[1] && $year[0]==$curyear[0]){
            $_SESSION['visitdateerr']="Visitation date can not be set to past date";
        }
        else{
            $_SESSION['visitdateerr']=" ";
        }
        if($_SESSION['visitdateerr']==" "){
            $fname=$_SESSION['fname'];
            $lname=$_SESSION['lname'];
            $detail=$_SESSION['visdet'];
            unset($_SESSION['fname']);
            unset($_SESSION['lname']);
            unset($_SESSION['visdet']);
            $uname=$_SESSION['logged_user'];
            $query1= query("INSERT INTO approvedappointments(fname,lname,detail,datee,appointed_by)
                    VALUES ('{$fname}','{$lname}','{$detail}','{$visdate}','{$uname}')
");
            confirm($query1);
            redirect('index.php');
        }
        else{
            redirect('appoint.php');
        }
    }
}
function regdean(){
    $depnmae=array("Computer Science","Biology","Geology","Maths","Physics","Chemistry","Statistics","Food Science","Earth Science","Environmental Science");
    $dunmae=array("NSRCS","NSRBG","NSRGY","NSRMS","NSRPS","NSRCH","NSRST","NSRFS","NSRES","NSRENV");
    $fnames=array("Comp","Bio","Geo","Ma","Phy","Chem","Stat","Foo","Ear","Env");
    $pnos=array("0999887766","0989786756","0912345667","0934231245","0989090989","0965453423","0987675432","0987675311","0911223344","0922331155");
    $uname="";
    $department="";
    $pass=12345;

    $fname="";
    $lastname="Sci";
    $no="";
    $tite="Dep_head";

    $name="DEAN";
    $pass=password_hash(12345,PASSWORD_DEFAULT);
    $tit=password_hash("Dean",PASSWORD_DEFAULT);
//    $query=query("INSERT INTO users (user_id,Password) VALUES ('{$name}','{$pass}')");
//    confirm($query);
//    $query1=query("INSERT INTO title (user_id,Title) VALUES ('{$name}','{$tit}')");
//    confirm($query1);
    $unitname=array("Department","Administrative","Security");
    for ($i=0;$i<3;$i++){
//        $query=query("INSERT INTO unit (unit_name) VALUES ('{$unitname[$i]}')");
//        confirm($query);
    }
    for ($i=0;$i<10;$i++){
//        $passhash= password_hash($pass,PASSWORD_DEFAULT);
//        $title=password_hash($tite,PASSWORD_DEFAULT);
//        $query=query("UPDATE title SET Title='{$title}' WHERE user_id='{$dunmae[$i]}'");
//        confirm($query);
//        $query1=query("UPDATE users SET Password='{$passhash}' WHERE user_id='{$dunmae[$i]}'");
//        confirm($query1);
//        $query= query("INSERT INTO department (`Name`) VALUES ('{$depnmae[$i]}')");
//        confirm($query);
//        $query=query( "INSERT INTO `dep_head`(`user_id`,`Department_name`) VALUES ('{$dunmae[$i]}','{$depnmae[$i]}')");
//        confirm($query);
//        $query1=query("INSERT INTO info(user_id,First_name,Last_name,phone_number) VALUES ('{$dunmae[$i]}','{$fnames[$i]}','{$lastname}','{$pnos[$i]}')");
//        confirm($query1);
//        $query2=query("INSERT INTO title(user_id , Title) VALUES ('{$dunmae[$i]}','{$title}')");
//        confirm($query2);
//        $query3=query("INSERT INTO users(user_id,Password) VALUES ('{$dunmae[$i]}','{$passhash}')");
//        confirm($query3);
    }

}