<?php 

  //include constants.php for return
  include('../config/constants.php');
  
  //destroy session
  session_destroy(); //Unset $_SESSION['user']

  //redirect to login page 
  header('location:'.SITEURL.'admin/login.php');



?>