
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
    return stat;
}