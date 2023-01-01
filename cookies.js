function setCookie(name,value,expireDays) {

    var date = new Date();
    date.setTime(date.getTime() + (expireDays*24*60*60*1000));
    var expires = "expires=" + date.toUTCString();
    document.cookie = name + " = " + value + ";"  + expires + ";path=/"; 
}

function getCookie(name){

     var cname = name + " = ";
     var decodedCookie = decodeURIComponent(document.cookie);
     var char = decodedCookie.split(';');
     for(var i = 0;i<char.length;i++){
        var c = char[i];
        while(c.charAt(0) == ' '){
            c = c.substring(1);
        }
        if(c.indexOf(cname) == 0){
            return c.substring(cname.length,c.length);
        }
     }
     return "";
}

function checkCookie(){

    var user = getCookie("username");
    console.log(user);
}

