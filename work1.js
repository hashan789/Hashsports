function signup(){

    var login = document.getElementById("login");
    var signup = document.getElementById("signup");
    var line = document.getElementById("line");

    signup.style.transform = "translateX(0px)";
    login.style.transform = "translateX(0px)";
    login.classList.add("login");
    line.style.transform = "translateX(100px)";
    
}

function login(){

    var login = document.getElementById("login");
    var signup = document.getElementById("signup");
    var line = document.getElementById("line");

    signup.style.transform = "translateX(750px)";
    login.classList.add("centerelem");
    login.classList.remove("login");
    line.style.transform = "translateX(-0px)";
}

function close(){
    document.getElementById("demo").classList.remove("hide");
    document.getElementById("demo1").style.filter = "blur(8px)";
}

function close1(){
    document.getElementById("demo").setAttribute("class","hide");
    document.getElementById("demo1").style.filter = "blur(0px)";
}

