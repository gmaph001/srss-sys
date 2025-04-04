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
     <title>Upload Notes</title>
     <link rel="stylesheet" type="text/css" href="upload.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.png">
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>     
     <div class="main">
          <div class="form">
               <div class="title"></div><br><br>
               <?php echo "<form action='upload_notes.php?uname=$uname' method='POST' name='upload' enctype='multipart/form-data'>";?>
                    <fieldset>
                         <legend><b>Upload notes</b></legend>
                         <label><b>Teacher's name: </b></label> <input type="text" name="teachername" id="tname"><br>
                         <p id="result"></p><br>
                         <label><b>Subject's name: </b></label> <input type="text" name="subjectname" id="sname"><br>
                         <p id="result2"></p><br>
                         <label><b>Topic: </b></label> <input type="text" name="topic" id="tpname"><br>
                         <p id="result5"></p><br>
                         <label><b>Class: </b></label> <input type="number" name="class" id="form"><br>
                         <p id="result3"></p><br>
                         <label><b>Notes: </b></label> <input type="file" name="notes" id="file" style="border: none; background-color: whitesmoke;"><br>
                         <p id="result4"></p><br>
                    </fieldset><br><br>
                    <button onclick="send()" name="signup" id="signUp">Upload</button><br><br>
               </form>
          </div>
          <div class="photo">
               
          </div>
     </div>
     <script>
          let result = "Please insert your name Dear Teacher!";
          let result2 = "Please input your subject!";
          let result3 = "Please input the right class!";
          let result4 = "Please input notes!";
          let result5 = "Please input the topic";

          let a = "GEOGRAPHY";

          function send(){

               if(document.upload.teachername.value == ""){
                    document.getElementById("result").innerHTML = result;
                    event.preventDefault();
               }

               if(document.upload.subjectname.value == ""){
                    document.getElementById("result2").innerHTML = result2;
                    event.preventDefault();
               }

               if(document.upload.topic.value == ""){
                    document.getElementById("result5").innerHTML = result5;
                    event.preventDefault();
               }

               if(document.upload.class.value == ""){
                    document.getElementById("result3").innerHTML = result3;
                    event.preventDefault();

                    if(document.upload.class.value > 6 || document.upload.class.value < 1){
                         document.getElementById("result3").innerHTML = result3;
                         event.preventDefault();
                    }
               }

               if(document.upload.notes.value == ""){
                    document.getElementById("result4").innerHTML = result4;
                    event.preventDefault();
               }
          }
     </script>
</body>
</html>
<?php
     }
?>