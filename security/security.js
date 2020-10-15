
function displaydate() {
    // window.alert("ciencien");
    document.getElementById('dispdate').innerHTML=Date();
    setTimeout(displaydate,1000);
}

function validate4() {
    var euname=document.edit.euname.value;
    var stat=true;
    if(euname.length==0){
        document.getElementById('eunameerr').innerHTML=("*");
        document.edit.euname.style='border-color:red';
        stat=false;
    }
    else {
        // window.alert("xtcfygvh");
    }
    return stat;
}