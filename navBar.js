let multimenu = document.querySelector('.multi_menu');
let submenu = document.querySelector('.sub_menu');

let n = 0;

function even(n){
    if(n % 2 == 0){
        return true;
    }
    else{
        return false;
    }
}

multimenu.onclick = function(){
    n++;
    submenu.classList.toggle('open');

    if(even(n)){
        submenu.setAttribute("class", "submenu");
    }
    else{
        submenu.setAttribute("class", "sub_menu open");
    }
}