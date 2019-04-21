<?php
  include("config.php");
  session_start();
  //session_destroy();
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['typef']))
    {
      //echo("TRY"."ING".$_POST['typef']);
      if($_POST['typef']=='Login'){
        // username and password sent from form 
        
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
        
        $sql = "SELECT * FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
        $result = mysqli_query($db,$sql);
        
        
        $count = mysqli_num_rows($result);
        
        // If result matched $myusername and $mypassword, table row must be 1 row
        if($count >= 1) { 
          //$error = "DONE";
          $_SESSION['login_user'] = $myusername;
          //header("location: welcome.php");
        }
      }
      else if($_POST['typef']=='Logout'){
        
        //echo('DESTROY');
        session_unset();
        session_destroy();
        session_start();
      }
      else if($_POST['typef']=="Register"){

        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
        $sql = "insert into admin(username,passcode)  values('$myusername','$mypassword')";
        session_unset();
        session_destroy();
        session_start();
        if(!($result = mysqli_query($db,$sql)) ){
          $_SESSION['LRE']="Registration failed";
        }
          
      }
    }
    else{
      $error="Not set";
    }
  }
?>
<html>
<head>
<title>Travel</title>
</head>
<link rel = "stylesheet" href = "home.css">
<body>
<img src="Images/travel1.png">
<div id="nav">
 <div id="nav_wrapper">
 <ul>
 <li><a href = "home.html">Home</a></li><li>
  <a href = "#">About Us</a>
   <ul>
     <li><a href = "about.html">About</a></li>
   </ul>
</li><li>
  <a href = "#">Continents</a>
   <ul>
     <li><a href = "Asia.html">Asia</a></li>
     <li><a href = "Europe.html">Europe</a></li>
     <li><a href = "Australia.html">Australia</a></li>
     <li><a href = "Africa.html">Africa</a></li>
     <li><a href = "SAmerica.html">South America</a></li>
     <li><a href = "NAmerica.html">North America</a></li>
   </ul>
</li><li>
  <a href = "#">Hotels </a>
  <ul>
   <li><a href = "https://www.trivago.in/">Trivago</a></li>
   <li><a href = "https://www.makemytrip.com/">Make my trip</a></li>
   <li><a href = "https://www.goibibo.com/">Go Ibibo</a></li>
  </ul>
</li><li>
  <a href = "#">Transport</a>
  <ul>
   <li><a href = "https://www.uber.com/in/en/">Uber</a></li>
   <li><a href = "https://www.redbus.in/">Red bus</a></li>
  </ul>
</li><li>
  <a href = "testimonial.html">Testimonials</a>
</li><li>
  <a href = "gallery.html">Gallery</a>
</li><li>
  <a href = "contact.html">Contact Us</a>
</li>
 </ul>
 <ul class = "top">
    <li><a href = "">Login</a>
      <?php 
      if( isset($_SESSION['login_user']) )
        echo('<ul><li>LOGGED: '.$_SESSION['login_user'].'</li>
        <ul>
          <form action="" method="post">
            <input type="hidden" name="typef" value="Logout" />
            <li><button type="submit">Logout</button></li>
          </ul>
          </form>
        </ul>
        ');
        else
        echo('
    <form action="" method="post">
     <ul>
      <li id = "name">Username<input name="username"/></li>
      <li id = "pass">Password <input name="password" type="password"/></li>
      <li><input type="hidden" name="typef" value="Login" /></li>
      <li><button type = "submit">Log In</button></li>
     </ul>
    </form>');
    ?>
</li><li>
    <a href = "register.html">Register</a>
    <form action="" method="post">
      <ul>
       <?php
        if(isset($_SESSION['LRE'])){echo '<li>Registration Error</li>';}
       ?>
       <li id = "name">Username<input name = "username" type="text"/></li>
       <li id = "pass">Password <input name = "password" type="password"/></li>
       <li id = "pho">Phone number<input name = "phone" type="text"/></li>
       <li id = "email">Email<input name = "email" type="email"/></li>
       <input type="hidden" name="typef" value="Register" />
       <li><button type = "submit">Register</button></li>
      </ul>
    </form>  
</li><li>
    <a href = "enquiry.html">Enquiry</a>
  </li>
 </ul>
 </div>
</div>
</body>
</html>
