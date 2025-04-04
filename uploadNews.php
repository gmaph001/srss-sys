<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Upload Notes</title>
     <link rel="stylesheet" type="text/css" href="login-page.css">
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>     
     <div class="main">
          <div class="title"></div><br><br>
          <div class="registration-success">
               <?php
                    if(isset($_POST['upload'])){
                         require_once ("config.php");
                         require "address.php";

                         $uname = $_GET['uname'];

                         require "timer.php";

                         $query1 = "SELECT *  FROM admin";
                         $result1 = mysqli_query($db, $query1);

                         if($result1){
                              for($i=0; $i<mysqli_num_rows($result1); $i++){
                                   $row = mysqli_fetch_array($result1);
                                   if($uname === $row['userkey']){
                                        $announcer_name = $row['username'];
                                        $announcer_rank = $row['rank'];
                                   }
                              }
                         }

                         $news_class = $_POST['news_class'];
                         $headline = $_POST['headline'];
                         $news = $_POST['news'];
                         $news_date = $_POST['date'];
                         $photo = $_FILES['photo']['name'];
                         $news_photo = $_FILES['photo']['tmp_name'];
                         $update = $_POST['update'];
                         $announcerID = $uname;

                         if($photo == ""){
                              $photo = "tangazo.webp";
                              $news_pic = "media/images/news/tangazo.webp";
                              $folder = "media/images/news/".$photo;
                         }else{
                              $news_pic = 'media/images/news/'.$photo;
                              $folder = "media/images/news/".$photo;
                              move_uploaded_file($news_photo, $folder);
                         }
                    
          
                         $news = mysqli_real_escape_string($db, $news);

                         $query = "INSERT INTO news(announcer_rank, announcer_name, news_class, headline, news_main, news_date, news_updates, news_photo, announcer_ID) VALUES('$announcer_rank', '$announcer_name', '$news_class', '$headline', '$news', '$news_date', '$update', '$news_pic', '$announcerID')";
                                  
                         $result = mysqli_query($db, $query);

                         if($result){
                              echo "<p>Upload Successful</p>";
                              echo "<p>You can now continue as normal <a href='news.php?uname=$uname'>User</a>!</p>";
                         }
                         else{

                              echo "<p>Upload Failed</p><br>";
                              echo "<p><a href='upload_news.php?uname=$uname'>Go back</a></p><br>";
                         }
                    }
               ?>
          </div>
     </div>
</body>
</html>