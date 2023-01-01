function signUp(){

    var login = document.getElementById("login");
    var signup = document.getElementById("signup");
    var line = document.getElementById("line");

    signup.style.transform = "translateX(0px)";
    login.style.transform = "translateX(0px)";
    login.classList.add("login");
    line.style.transform = "translateX(100px)";
    
}

function logIn(){

    var login = document.getElementById("login");
    var signup = document.getElementById("signup");
    var line = document.getElementById("line");

    signup.style.transform = "translateX(750px)";
    login.classList.add("centerelem");
    login.classList.remove("login");
    line.style.transform = "translateX(0px)";
}


function submitform(){
    const name  = document.getElementById("name").value;
    localStorage.setItem("textarea",name);
  }
  
  window.addEventListener("load",() =>{
    document.getElementById("use").innerHTML = localStorage.getItem("textarea");
  //document.getElementById("user").innerHTML = localStorage.getItem("textarea");
  })


function readValue(){

    var input = document.getElementById("pass").value;

//var password = document.getElementById("err").innerHTML;

     if(input.length < 8){
      document.getElementById("err").innerHTML = "Password length must be 8 characters";
     }
     else if(input.search(/[0-9]/) == -1){
       document.getElementById("err").innerHTML = "Atleast one numeric value must be enterd";
     }
     else if(input.search(/[a-z]/) == -1){
      document.getElementById("err").innerHTML = "Atleast one small letter must be entered";
    }
    else if(input.search(/[A-Z]/) == -1){
      document.getElementById("err").innerHTML = "Atleast one capital letter must be enterd";
    }
    else if(input.search(/[!\0\#\$\%\&\,\.\+\*\(\)\:\^\@\_\;]/) == -1){
      document.getElementById("err").innerHTML = "Atleast one special letter must be enterd";
    }
    else{
      document.getElementById("err").innerHTML = "Password is right";
    }
}

function readRepass(){

  if(!readValue())
     document.getElementById("err").style.display = "none";
  else
     document.getElementById("err").style.visibility = "visible";
     
}
