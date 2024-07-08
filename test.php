<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Registration | PHP</title>
     <link rel="icon" type="image/x-icon" href="media/images/srss-logo.jfif">
     <link rel="stylesheet" type="text/css" href="register.css">
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
     <center>
          <div class="data">
               <table border="2">
                    <tr>
                         <td>Students_ID</td>
                         <td>Firstname</td>
                         <td>Secondname</td>
                         <td>Lastname</td>
                         <td>Username</td>
                         <td>Email</td>
                         <td>Password</td>
                         <td>Form</td>
                         <td>Stream</td>
                         <td>Age</td>
                    </tr>
                         <?php
                              $dbhost = "localhost";
                              $dbuser = "root";
                              $dbpass = "";
                              $dbname = "students_info";

                              $db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                              $data = "SELECT * FROM students ORDER BY Students_ID";

                              $result = mysqli_query( $db, $data );

                              
                         ?>

                         <?php

                              if( mysqli_num_rows($result) > 0 ) {
                                   for($i = 0; $i<mysqli_num_rows($result); $i++){
                                        $user = mysqli_fetch_array($result);
                         ?>
                                        <tr>
                                             <td>
                                                  <?php
                                                       echo $user["Students_ID"];
                                                            
                                                  ?>
                                             </td>
                                             <td>
                                                  <?php
                                                       echo $user["firstname"];
                                                            
                                                  ?>
                                             </td>
                                             <td>
                                                  <?php
                                                       echo $user["secondname"];
                                                            
                                                  ?>
                                             </td>
                                             <td>
                                                  <?php
                                                       echo $user["lastname"];
                                                            
                                                  ?>
                                             </td>
                                             <td>
                                                  <?php
                                                       echo $user["username"];
                                                            
                                                  ?>
                                             </td>
                                             <td>
                                                  <?php
                                                       echo $user["email"];
                                                            
                                                  ?>
                                             </td>
                                             <td>
                                                  <?php
                                                       echo $user["password"];
                                                            
                                                  ?>
                                             </td>
                                             <td>
                                                  <?php
                                                       echo $user["form"];
                                                            
                                                  ?>
                                             </td>
                                             <td>
                                                  <?php
                                                       echo $user["stream"];
                                                            
                                                  ?>
                                             </td>
                                             <td>
                                                  <?php
                                                       echo $user["age"];
                                                            
                                                  ?>
                                             </td>
                                        </tr>
                         <?php
                                   }
                              }
                         ?>
               </table>
          </div>
     </center>
</body>
</html>