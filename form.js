let result = "*Please fill this field!*";
let see = document.querySelector('.pass');
let n = 0;

function even(n){
     if(n%2 == 0){
          return true;
     }
     else{
          return false;
     }
}

see.onclick = function(){
     n++;
     let password = document.getElementById("pword");
     if(!even(n)){
          see.src = "media/icons/eye.png";
          password.setAttribute("type", "text");
     }
     else{
          see.src = "media/icons/hidden.png";
          password.setAttribute("type", "password");
     }
}

function tuma(){
     if(document.form.uname.value == ""){
          document.getElementById("result1").innerHTML = result;
          document.getElementById("user").style.border = "2px solid red";
          event.preventDefault();
     }
     else{
          document.getElementById("result1").innerHTML = "";
          document.getElementById("user").style.border = "2px solid black";
     }
     if(document.form.pass.value == ""){
          document.getElementById("result3").innerHTML = result;
          document.getElementById("secret").style.border = "2px solid red";
          event.preventDefault();
     }
     else{
          document.getElementById("result3").innerHTML = "";
          document.getElementById("secret").style.border = "2px solid black";
     }
}