//document.getElementById(unmaeerr).innerHTML="gvjbh";

function validate() {
    var uname = document.loginform.uname.value;
    var pass=document.loginform.pwd.value;
    var stat = true;
    if (uname.length == 0) {
        document.getElementById('unmaeerr').innerHTML = ("*");
        document.loginform.uname.style='border-color:red';
        stat = false;
    }

    else if(!uname.match(/^[ a-z A-Z ]+$/)){
        document.getElementById('unmaeerr').innerHTML=("Must be characters");
        document.loginform.uname.style='border-color:red';
        stat=false;
    }

    if(pass.length==0){
        document.getElementById('pwderr').innerHTML="*";
        document.loginform.pwd.style='border-color:red';
        stat=false;
    }
    else if(pass.length<3){
        document.getElementById('pwderr').innerHTML=("Invalid Password length");
        document.loginform.pwd.style='border-color:red';
        stat=false;
    }
    else if(pass=="123"){
        stat=true;
    }
    return stat;
}
function validate2() {
    var frname=document.signupform.fname.value;
    var lname=document.signupform.lname.value;
    var usname=document.signupform.uname.value;
    var pwdd=document.signupform.pwd.value;
    var conpwdd=document.signupform.conpwd.value;
    var pno=document.signupform.pno.value;
    var stat=true;
    if(frname.length==0){
        document.getElementById('firstnameerr').innerHTML=("*");
        document.signupform.fname.style='border-color:red';
        stat=false;
    }
    else if (!frname.match(/^[ a-z A-Z ]+$/)){
        document.getElementById('firstnameerr').innerHTML=("First name must be letters only");
        document.signupform.fname.style='border-color:red';
        stat=false;
    }

    if(lname.length==0){
        document.getElementById('lastnamerr').innerHTML=("*");
        document.signupform.lname.style='border-color:red';
        stat=false;
    }
    else if(!lname.match(/^[ a-z A-Z ]+$/)){
        document.getElementById('lastnamerr').innerHTML=("Last name must be letters only");
        document.signupform.lname.style='border-color:red';
        stat=false;
    }
    if(pno.length==0){
        document.getElementById('pnoerr').innerHTML=("*");
        document.signupform.pno.style='border-color:red';
        stat=false;
    }
    else if(pno.match(/^[ a-z A-Z ]+$/)){
        document.getElementById('pnoerr').innerHTML=("Phone number must contain only numbers");
        document.signupform.pno.style='border-color:red';
        stat=false;
    }
    if(usname.length==0){
        document.getElementById('unmaeerr').innerHTML=("*");
        document.signupform.uname.style='border-color:red';
        stat=false;
    }
    else if (!usname.match(/^[ a-z A-Z ]+$/)){
        document.getElementById('unmaeerr').innerHTML=("Username must be Letters only");
        document.signupform.uname.style='border-color:red';
        stat=false;
    }

    if(pwdd.length==0){
        document.getElementById('pwderr').innerHTML=("*");
        document.signupform.pwd.style='border-color:red';
        stat=false;
    }
    if(conpwdd.length==0){
        document.getElementById('confpwderr').innerHTML=("*");
        document.signupform.conpwd.style='border-color:red';
        stat=false;
    }
    if(pwdd!=conpwdd){
        document.getElementById('confpwderr').innerHTML=("Passwords do not match");
        document.signupform.conpwd.style='border-color:red';
        stat=false;
    }
    return stat;
}
function validate3() {
    var euname=document.removeuser.euname.value;
    var stat=true;
    if(euname.length==0){
        document.getElementById('eunameerr').innerHTML=("*");
        document.removeuser.euname.style='border-color:red';
        stat=false;
    }
    else {
        window.alert("This Employee will be deleted");
    }
    return stat;
}
function validate4() {
    var euname=document.edit.euname.value;
    var stat=true;
    if(euname.length==0){
        document.getElementById('eunameerr').innerHTML=("*");
        document.edit.euname.style='border-color:red';
        stat=false;
    }
    if(!euname.match(/^[ a-z A-Z ]+$/)){
        document.getElementById('eunameerr').innerHTML=("Must be characters");
        document.edit.euname.style='border-color:red';
        stat=false;
    }
    return stat;
}
function validate5() {
    var oldpwd= document.chng.pwd.value;
    var newpwd= document.chng.pwd2.value;
    var conpwd= document.chng.conpwd.value;
    var stat=true;
    if(oldpwd.length==0){
        document.getElementById('oldpwderr').innerHTML=("*");
        document.chng.pwd.style='border-color:red';
        stat=false;
    }
    if(newpwd.length==0){
        document.getElementById('pwderr').innerHTML=("*");
        document.chng.pwd2.style='border-color:red';
        stat=false;
    }
    if(conpwd.length==0){
        document.getElementById('confpwderr').innerHTML=("*");
        document.chng.conpwd.style='border-color:red';
        stat=false;
    }
    else if(conpwd.length!=0 && newpwd.length!=0){
        if(conpwd!=newpwd){
            document.getElementById('confpwderr').innerHTML=("Passwords do not match");
            document.chng.pwd2.style='border-color:red';
            document.chng.conpwd.style='border-color:red';
            stat=false;
        }
    }
    return stat;
}
function chnge() {
    var x= document.getElementById('vall').value;
    window.alert(x);
}
function validate6() {
    var frname=document.regSec.fname.value;
    var lname=document.regSec.lname.value;
    var usname=document.regSec.uname.value;
    var pwdd=document.regSec.pwd.value;
    var conpwdd=document.regSec.conpwd.value;
    var pno=document.regSec.pno.value;
    var stat=true;
    if(frname.length==0){
        document.getElementById('firstnameerr').innerHTML=("*");
        document.regSec.fname.style='border-color:red';
        stat=false;
    }
    else if (!frname.match(/^[ a-z A-Z ]+$/)){
        document.getElementById('firstnameerr').innerHTML=("First name must be letters only");
        document.regSec.fname.style='border-color:red';
        stat=false;
    }

    if(lname.length==0){
        document.getElementById('lastnamerr').innerHTML=("*");
        document.regSec.lname.style='border-color:red';
        stat=false;
    }
    else if(!lname.match(/^[ a-z A-Z ]+$/)){
        document.getElementById('lastnamerr').innerHTML=("Last name must be letters only");
        document.regSec.lname.style='border-color:red';
        stat=false;
    }
    if(pno.length==0){
        document.getElementById('pnoerr').innerHTML=("*");
        document.regSec.pno.style='border-color:red';
        stat=false;
    }
    else if(pno.match(/^[ a-z A-Z ]+$/)){
        document.getElementById('pnoerr').innerHTML=("Phone number must contain only numbers");
        document.regSec.pno.style='border-color:red';
        stat=false;
    }
    if(usname.length==0){
        document.getElementById('unmaeerr').innerHTML=("*");
        document.regSec.uname.style='border-color:red';
        stat=false;
    }
    else if (!usname.match(/^[ a-z A-Z ]+$/)){
        document.getElementById('unmaeerr').innerHTML=("Username must be Letters only");
        document.regSec.uname.style='border-color:red';
        stat=false;
    }

    if(pwdd.length==0){
        document.getElementById('pwderr').innerHTML=("*");
        document.regSec.pwd.style='border-color:red';
        stat=false;
    }
    if(conpwdd.length==0){
        document.getElementById('confpwderr').innerHTML=("*");
        document.regSec.conpwd.style='border-color:red';
        stat=false;
    }
    if(pwdd!=conpwdd){
        document.getElementById('confpwderr').innerHTML=("Passwords do not match");
        document.regSec.conpwd.style='border-color:red';
        stat=false;
    }
    return stat;
}
function validate7() {
    var frname=document.regadm.fname.value;
    var lname=document.regadm.lname.value;
    var usname=document.regadm.uname.value;
    var pwdd=document.regadm.pwd.value;
    var conpwdd=document.regadm.conpwd.value;
    var pno=document.regadm.pno.value;
    var stat=true;
    if(frname.length==0){
        document.getElementById('firstnameerr').innerHTML=("*");
        document.regadm.fname.style='border-color:red';
        stat=false;
    }
    else if (!frname.match(/^[ a-z A-Z ]+$/)){
        document.getElementById('firstnameerr').innerHTML=("First name must be letters only");
        document.regadm.fname.style='border-color:red';
        stat=false;
    }

    if(lname.length==0){
        document.getElementById('lastnamerr').innerHTML=("*");
        document.regadm.lname.style='border-color:red';
        stat=false;
    }
    else if(!lname.match(/^[ a-z A-Z ]+$/)){
        document.getElementById('lastnamerr').innerHTML=("Last name must be letters only");
        document.regadm.lname.style='border-color:red';
        stat=false;
    }
    if(pno.length==0){
        document.getElementById('pnoerr').innerHTML=("*");
        document.regadm.pno.style='border-color:red';
        stat=false;
    }
    else if(pno.match(/^[ a-z A-Z ]+$/)){
        document.getElementById('pnoerr').innerHTML=("Phone number must contain only numbers");
        document.regadm.pno.style='border-color:red';
        stat=false;
    }
    if(usname.length==0){
        document.getElementById('unmaeerr').innerHTML=("*");
        document.regadm.uname.style='border-color:red';
        stat=false;
    }
    else if (!usname.match(/^[ a-z A-Z ]+$/)){
        document.getElementById('unmaeerr').innerHTML=("Username must be Letters only");
        document.regadm.uname.style='border-color:red';
        stat=false;
    }

    if(pwdd.length==0){
        document.getElementById('pwderr').innerHTML=("*");
        document.regadm.pwd.style='border-color:red';
        stat=false;
    }
    if(conpwdd.length==0){
        document.getElementById('confpwderr').innerHTML=("*");
        document.regadm.conpwd.style='border-color:red';
        stat=false;
    }
    if(pwdd!=conpwdd){
        document.getElementById('confpwderr').innerHTML=("Passwords do not match");
        document.regadm.conpwd.style='border-color:red';
        stat=false;
    }
    return stat;
}