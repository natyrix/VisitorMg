function validate() {
    var fname=document.appointform.fname.value;
    var lname=document.appointform.lname.value;
    var det=document.appointform.details.value;
    var stat=true;
    if(fname.length==0){
        document.getElementById('firstnameerr').innerHTML=("*");
        document.appointform.fname.style='border-color:red';
        stat=false;
    }
    else if(!fname.match(/^[ a-z A-Z ]+$/)){
        document.getElementById('firstnameerr').innerHTML=("Must be letters");
        document.appointform.fname.style='border-color:red';
        stat=false;
    }
    if(lname.length==0){
        document.getElementById('lastnamerr').innerHTML=("*");
        document.appointform.lname.style='border-color:red';
        stat=false;
    }
    else if(!lname.match(/^[ a-z A-Z ]+$/)){
        document.getElementById('lastnamerr').innerHTML=("Must be letters");
        document.appointform.lname.style='border-color:red';
        stat=false;
    }
    if(det.length==0){
        document.getElementById('deterr').innerHTML=("*");
        document.appointform.details.style='border-color:red';
        stat=false;
    }
    return stat;
}
function displaydate() {
    // window.alert("ciencien");
    document.getElementById('dispdate').innerHTML=Date();
    setTimeout(displaydate,1000);
}