function sendReqs(){
    var vals = "s";

    const chr = new XMLHttpRequest();
    chr.open("POST","./insertr.php?rid=");
    chr.send();
    chr.onload = function() {
        const btn =document.getElementById("rb1");
        btn.disabled = true;
        
        const stat = JSON.parse(chr.responseText);
        if (stat.result){
            btn.innerHTML = "Request Success"
        } else {
            btn.innerHTML = "Request Failed"
        }
    }

  }