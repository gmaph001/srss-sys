<?php
     require_once "config.php";
     require "address.php";

     $uname = $_GET['uname'];

     require "timer.php";

     $exist = false;

     $query = "SELECT * FROM admin";
     $result = mysqli_query($db, $query);

     if($result){
          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);

               if($uname === $row['userkey']){
                    $rank = $row['rank'];
                    $exist = true;
                    break;
               }
          }
     }
     if(!$exist){
          header("location:failed.php?uname=$uname"); 
     }
     else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Upload Assignments</title>
     <link rel="stylesheet" type="text/css" href="upload.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>     
     <div class="main">
          <div class="form">
               <div class="title"></div><br><br>
               <?php echo "<form action='uploadAssignment.php?uname=$uname' method='POST' name='upload' enctype='multipart/form-data'>";?>
                    <fieldset>
                         <legend><b>Upload notes</b></legend>
                         <label><b>Teacher's name: </b></label> <input type="text" name="teacher" id="tname"><br>
                         <p id="result"></p><br>
                         <label><b>Subject: </b></label> <input type="text" name="subject" id="sname"><br>
                         <p id="result2"></p><br>
                         <label><b>Class: </b></label> <input type="number" name="class" id="form"><br>
                         <p id="result3"></p><br>
                         <label><b>Enter number of streams: </b></label><input type="number" name="streamnumber" id="snumber"><br>
                         <p id="result4"></p><br>
                         <label class="stream" onclick="stream()" id="strm"><b>Choose Streams: </b></label><br>
                         <div class="streams">
                              <div class="olevel">
                                   <label><b>T</b></label><input type="checkbox" name="stream1" value="T">
                                   <label><b>K</b></label><input type="checkbox" name="stream2" value="K">
                                   <label><b>U</b></label><input type="checkbox" name="stream3" value="U">
                                   <label><b>A</b></label><input type="checkbox" name="stream4" value="A">
                                   <label><b>B</b></label><input type="checkbox" name="stream5" value="B">
                                   <label><b>E</b></label><input type="checkbox" name="stream6" value="E">
                              </div>
                              <div class="alevel">
                                   <label><b>PMC</b></label><input type="checkbox" name="stream1" value="PMC">
                                   <label><b>PCM</b></label><input type="checkbox" name="stream2" value="PCM">
                                   <label><b>PCB</b></label><input type="checkbox" name="stream3" value="PCB">
                                   <label><b>PGM</b></label><input type="checkbox" name="stream4" value="PGM">
                                   <label><b>ECA</b></label><input type="checkbox" name="stream5" value="ECA">
                                   <label><b>EGM</b></label><input type="checkbox" name="stream6" value="EGM">
                                   <label><b>HGL</b></label><input type="checkbox" name="stream7" value="HGL">
                                   <label><b>HKL</b></label><input type="checkbox" name="stream8" value="HKL">
                                   <label><b>HGE</b></label><input type="checkbox" name="stream9" value="HGE">
                                   <label><b>CBG</b></label><input type="checkbox" name="stream10" value="CBG">
                              </div>
                         </div>
                         <p id="result5"></p><br>
                         <label><b>Assigned date:</b></label><input type="date" name="assigned" id="assign"><br>
                         <p id="result6"></p><br>
                         <label><b>Due date:</b></label><input type="date" name="due" id="due"><br>
                         <p id="result7"></p><br>
                         <label><b>Upload notes:</b></label><input type="file" name="assignment">
                    </fieldset><br><br>
                    <button onclick="send()" name="upload" id="signUp">Upload</button><br><br>
               </form>
          </div>
          <div class="photo4">
               
          </div>
     </div>
     <script>
          let result = "Please insert your name!";
          let result2 = "Please input your rank!";
          let result3 = "Please input the right class!";
          let result4 = "Please input news!";
          let result5 = "Please tell us if it is an update!";
          let result6 = "Please input date!";

          let olevel = document.querySelector('.olevel');
          let alevel = document.querySelector('.alevel');
          let form = document.upload.class.value;
          let strm = document.getElementById("strm");

          
          // strm.onclick = function(){
          //      if(form>=1 || form<=4){
          //           olevel.classList.toggle('open');
          //      }
          //      if(form>=5 || form<=6){
          //           alevel.classList.toggle('open');
          //      }
          // }

          function stream(){
               if(document.upload.class.value==""){
                    document.getElementById("result3").innerHTML = result3;
               }
               else if(document.upload.class.value==1 || document.upload.class.value<5){
                    olevel.classList.toggle('open');
               }
               else if(document.upload.class.value==5 || document.upload.class.value<7){
                    alevel.classList.toggle('open');
               }
               else{
                    document.getElementById("result3").innerHTML = result3;
               }
          }

          function send(){

               if(document.upload.teacher.value == ""){
                    document.getElementById("result").innerHTML = result;
                    event.preventDefault();
               }

               if(document.upload.subject.value == ""){
                    document.getElementById("result2").innerHTML = result2;
                    event.preventDefault();
               }

               if(document.upload.class.value == ""){
                    document.getElementById("result3").innerHTML = result3;
                    event.preventDefault();
               }

               if(form=0 || form<0 || form>6){
                    document.getElementById("result3").innerHTML = result3;
                    event.preventDefault();
               }

               if(document.upload.streamnumber.value == ""){
                    document.getElementById("result4").innerHTML = result4;
                    event.preventDefault();
               }
               if(document.upload.assigned.value == ""){
                    document.getElementById("result5").innerHTML = result5;
                    event.preventDefault();
               }
               if(document.upload.due.value == ""){
                    document.getElementById("result6").innerHTML = result6;
                    event.preventDefault();
               }
               
          }
     </script>
</body>
</html>
<?php
     }
?>