<?php
   session_start();
   include('configure.php');
   
   $user_check = $_SESSION['login_user'];

   $sqlUser = "SELECT UserID, username FROM User WHERE UserID = '$user_check'";
   
   $ses_sql = mysqli_query($db,$sqlUser);
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_id = $row['UserID'];
   $login_username = $row['username'];
      
   $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

   if(!isset($_SESSION['login_user'])){
      if($host != 'aryasdev.com/test/juan/index.php'){
         header("location:index.php");
         die(); 
      }
   }
   else{
      if($host == 'aryasdev.com/test/juan/index.php'){
         header("location:profile.php");
      }
   }
?>