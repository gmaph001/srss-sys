let sidebar = document.querySelector('.sidebar');
let menupic = document.getElementById("menu");


menupic.onclick = function(){
     sidebar.classList.toggle('open');
}

// function badili(){
//      if(document.update.firstname.value == ""){
//           alert("Please input your first name!");
//           event.preventDefault();
//      }
// }