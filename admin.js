function check(){
    let photo = document.getElementById("pic");
    let returnvalue = true;
    if(document.admin.photo.value == ""){
         return returnvalue;
    }
    else{
         let photoresponse = "*Please, your file should be less than 2MB!*";
         let size = Math.round((photo.files[0].size)/1024/1024);
         if(size>2){
              document.getElementById("dpresult").innerHTML = photoresponse;
              event.preventDefault();
              returnvalue = false;
         }
         return returnvalue;
    }
}

function send(){
    let a = document.getElementById("e-pword").value;
    let b = document.getElementById("c-pword").value;
    let c = document.getElementById("numb").value;
    let d = document.getElementById("strm").value;
    let stream = ['HM', 'DHM', 'AM', 'DM', 'TEA', 'PRF', 'PRGM'];
    let result = 'Please enter the correct rank!';
    let checkclass= false;
    let alert = '*This field is required!*';
    let pass = '*Please enter more than 9 characters!*';
    let comb = '*Please enter the correct codename!*';
    let confirm = '*Please recheck your password!*';
    let dpresult = "*You cannot submit form with file this large!*";
    let picresponse = check();

    if(document.admin.email.value=="")
    {
         document.getElementById('result5').innerHTML = alert;
         event.preventDefault();
    }
    else{
         document.getElementById('result5').innerHTML = "";
    }
    if(document.admin.uname.value=="")
    {
         document.getElementById('result4').innerHTML = alert;
         event.preventDefault();
    }
    else{
         document.getElementById('result4').innerHTML = "";
    }
    if(a=="" && b=="") 
    {
         document.getElementById('result6').innerHTML = alert;
         event.preventDefault();
    }
    else{
         document.getElementById('result6').innerHTML = "";
    }
    if(a!==b)
    {
         document.getElementById('result7').innerHTML = confirm;
         event.preventDefault();
    }
    else{
         document.getElementById('result7').innerHTML = "";
    }
    if(document.admin.secret.value.length<9) 
    {
         document.getElementById('result6').innerHTML = pass;
         event.preventDefault();
    }
    else{
         document.getElementById('result6').innerHTML = "";
    }
    
    if(c=0 || c<1 || c>7) 
    {
         document.getElementById('result8').innerHTML = result;
         event.preventDefault();
    }
    else{
         document.getElementById('result8').innerHTML = "";
    }

    if(d=="") 
    {
         document.getElementById('strmresult').innerHTML = alert;
         event.preventDefault();
    }
    else{
         for(let i=0; i<stream.length; i++) 
         {
              if(d==stream[i]){
                   checkclass = true;
                   break;
              }
         }
         if(checkclass == false)
         {
              document.getElementById("strmresult").innerHTML = comb;
              event.preventDefault();
         }
         else{
              document.getElementById('strmresult').innerHTML = "";
         }
    }

    if(!picresponse){
         document.getElementById("dpresult").innerHTML = dpresult;
         event.preventDefault();
    }
}