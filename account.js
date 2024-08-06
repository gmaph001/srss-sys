let sidebar = document.querySelector('.sidebar');
let menupic = document.getElementById("menu");
let n = 0;

function even(n){
     if (n % 2 == 0) {
          return true;
     }
     else{
          return false;
     }
}

menupic.onclick = function(){
     sidebar.classList.toggle('open');
     n++;
     if(even(n)){
          menupic.src = "media/images/icons/menu.png";
     }
     else{
          menupic.src =  "media/images/icons/remove.png";
     }

}


function badili(){
     if(document.update.firstname.value == ""){
          alert("Please input your first name!");
          event.preventDefault();
     }
}