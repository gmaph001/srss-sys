<?php
     $uname = $_GET['uname'];
     require "address.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Upload News</title>
     <link rel="stylesheet" type="text/css" href="upload.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>     
     <div class="main">
          <div class="form">
               <div class="title"></div><br><br>
               <?php echo "<form action='uploadNews.php?uname=$uname' method='POST' name='upload' class='upload' enctype='multipart/form-data'>";?>
               <fieldset>
                         <legend><b>Upload notes</b></legend>
                         <label><b>Class of news: </b></label> 
                         <select name="news_class" class="list">
                              <option value="none">SELECT</option>
                              <option value="academics">ACADEMICS</option>
                              <option value="events">EVENTS</option>
                              <option value="sports">SPORTS</option>
                         </select><br>
                         <p id="result3"></p><br>
                         <label><b>News: </b></label><br><br>
                         <input type="text" name="headline" id="hline" placeholder="headline"><br>
                         <p id="headmiss"></p><br>
                         <textarea cols="40" rows="10" name="news" class="news_exp" placeholder="Insert the details of the news here..."></textarea><br>
                         <p id="result4"></p><br>
                         <label>
                              Is this news an update?
                         </label>&nbsp; &nbsp;
                         <label>Yes</label><input type="radio" name="update" value="important" id="yes">&nbsp; &nbsp;
                         <label>No</label><input type="radio" name="update" value="not_important" id="no"><br>
                         <p id="result5"></p><br>
                         <label>
                              Do you have any photo to upload?
                         </label>&nbsp; &nbsp;
                         <label>Yes</label><input type="checkbox" name="updatephoto" value="photo" onclick="showphoto()" id="true">&nbsp; &nbsp;
                         <!-- <label>No</label><input type="checkbox" name="update" value="no" onclick="hidephoto()" id="false"><br> -->
                         <p id="result7"></p><br>
                         <label class="upload-photo">
                              Upload your photo here:
                         </label>
                         <input type="file" name="photo" class="photo-input" id="photo" placeholder="Not more than 2MB!" onchange="photosize()"><br>
                         <p id="result8"></p><br>
                         <label>Date:  </label><input type="date" name="date" id="date" placeholder="date"><br>
                         <p id="result6"></p><br>
                    </fieldset><br><br>
                    <button onclick="send()" name="upload" id="signUp">Upload</button><br><br>
               </form>
          </div>
          <div class="photo3">
               
          </div>
     </div>
     <script>
          let result3 = "Please input the right class!";
          let result4 = "Please input news!";
          let result5 = "Please tell us if it is an update!";
          let result6 = "Please input date!";
          let result8 = "Please insert the photo!"
          let headmiss = "Please insert your headline!";
          let photoresponse = "*Your photo should be less than 2MB!*";

          let headline = document.getElementById("hline").value.length;
          let photo = document.getElementById("photo");
          let n = 1;
          let news = document.upload.news.value;

          if(news.includes("'")){
               
          }

          let news_date;
          console.log(n);

          news_date = Date();

          store_date = document.getElementById("date").value

          date = "";

          for(let i = 0; i<15; i++){
               date += news_date[i];
          }

          store_date = date;

          console.log(store_date);

          function showphoto(){
               let label = document.querySelector('.upload-photo');
               let input = document.querySelector('.photo-input');
               let result = document.getElementById("result8");

               input.classList.remove('close');
               label.classList.remove('close');
               result.classList.remove('close');

               input.classList.toggle('open');
               label.classList.toggle('open');
               result.classList.toggle('open');

               n++

               console.log(n);

               return true;
          }
          function hidephoto(){
               let label = document.querySelector('.upload-photo');
               let input = document.querySelector('.photo-input');

               input.classList.remove('open');
               label.classList.remove('open');

               input.classList.toggle('close');
               label.classList.toggle('close');

               return true;
          }

          function even(n){
               if(n%2 == 0){
                    return true;
               }
               else{
                    return false;
               }
          }

          function photosize(){
               let size = Math.round((photo.files[0].size)/1024/1024);
               let returnValue = true;
               if(size>2){
                    document.getElementById("result8").innerHTML = photoresponse;
                    returnValue = false;
               }
               else{
                    document.getElementById("result8").innerHTML = "";
                    returnValue = true;
               }
               return returnValue;
          }

          function send(){

               console.log(headline);

               if(document.upload.news_class.value == "none"){
                    document.getElementById("result3").innerHTML = result3;
                    event.preventDefault();
               }

               if(document.upload.headline.value == ""){
                    document.getElementById("headmiss").innerHTML = headmiss;
               }

               console.log(n)

               if(document.upload.headline.value.length>100){
                    document.getElementById("headmiss").innerHTML = "Headline is too long!";
               }

               if(document.upload.news.value == ""){
                    document.getElementById("result4").innerHTML = result4;
                    event.preventDefault();
               }
               if(even(n)){
                    if(document.upload.photo.value == ""){
                         document.getElementById("result8").innerHTML = result8;
                         event.preventDefault();
                    }
                    else if(!photosize()){
                         document.getElementById("result8").innerHTML = photoresponse;
                         event.preventDefault();
                    }
               }

               if(document.upload.update.value == ""){
                    document.getElementById("result5").innerHTML = result5;
                    event.preventDefault();
               }
               if(document.upload.date.value == ""){
                    document.getElementById("result6").innerHTML = result6;
                    event.preventDefault();
               }
               
          }
     </script>
</body>
</html>