<?php  
 session_start();  
 if(isset($_SESSION["user"]))  
 {  
      header("location:home.php");  
 }  
 
 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>SUN RISE RECEPTIONIST</title>
  
  
     
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
 

 <!--<div class="container">-->


      
       
            <div class="w3_navigation">

            <nav class="navbar navbar-default">
            <div class="container">
            <nav class="menu menu--iris">
            <ul class="nav navbar-nav menu__list">

            <li class="menu__item"><a href="index.php" >Admin login</a></li>
            <li class="menu__item"><a href="index2.php" >User login</a></li>
                   <!--   <div class="panel panel-info">
                      <a href="index.php" class='btn btn-primary'>Admin Login</a>
                      </div>
                      <div class="panel panel-info">
                      <a href="index2.php" class='btn btn-primary'>Receptionist Login</a>
                      </div>
            -->
            </ul>
          </nav>
        </div>
      </nav>
    </div>

          
       

       

       <!-- end login -->

    <!--</div>-->
   
  
  
</body>
</html>


