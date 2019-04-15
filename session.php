<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];

   // echo 'user_check';
   // echo $user_check;
   
   $ses_sql = mysqli_query($db,"SELECT UserID FROM User WHERE UserID = '$user_check' ");

   // echo 'ses_sql';
   // echo $ses_sql;
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

   if(!isset($_SESSION['login_user'])){
      if($host != 'aryasdev.com/test/juan/index.php'){
         // echo "no";
         header("location:index.php");
         die(); 
      }
   }
   else{
      if($host == 'aryasdev.com/test/juan/index.php'){
         // echo "yes";
         header("location:profile.php");
      }
   }
?>