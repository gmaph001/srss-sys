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

                         $announcer_name = $_POST['announcer_name'];
                         $announcer_rank = $_POST['announcer_rank'];
                         $news_class = $_POST['news_class'];
                         $headline = $_POST['headline'];
                         $news = $_POST['news'];
                         $news_date = $_POST['date'];
                         $update = $_POST['update'];
                         $photo = $_FILES['photo']['name'];
                         $news_photo = $_FILES['photo']['tmp_name'];

                         $news_pic = 'media/images/news/'.$photo;
                         $folder = "media/images/news/".$photo;

                         move_uploaded_file($news_photo, $folder);

                         echo $news_pic;

                         
                         $news = mysqli_real_escape_string($db, $news);

                         $query = "INSERT INTO news(announcer_rank, announcer_name, news_class, headline, news_main, news_date, news_updates, news_photo) VALUES('$announcer_rank', '$announcer_name', '$news_class', '$headline', '$news', '$news_date', '$update', '$news_pic')";
                                  
                         $result = mysqli_query($db, $query);

                         if($result){
                              require_once "config.php";
                              $uname = $_GET['uname'];
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