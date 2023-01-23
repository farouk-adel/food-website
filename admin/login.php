<?php include('../config/constants.php'); ?>


<html>
	<head>
		<title>Login - Food Order System</title>
		<link rel="stylesheet" href="../css/admin.css">
	</head>

	<body>
		
    <div class="login">
    	<h1 class="text-center">Login</h1>
        <br><br>

        <?php 
          if(isset($_SESSION['login']))
          {
          	echo $_SESSION['login'];
          	unset($_SESSION['login']);	
          }

          if(isset($_SESSION['no login message']))
          {
          	echo $_SESSION['no login message'];
          	unset($_SESSION['no login message']);
          }
        ?>
        <br><br>
    	<!-- login form starts here -->
    	<form action="" method="POST" class="text-center">
    		Username: <br>
    		<input type="text" name="username" placeholder="Enter Username"> <br><br>

    		Password: <br>
    		<input type="password" name="password" placeholder="Enter Password"> <br><br>

    		<input type="submit" name="submit" value="Login" class="btn-primary">
    		<br><br>
    	</form>
    	<!-- login form ends here -->	


    	<p class="text-center">Created By Farouk Adel</p>
    </div>


	</body>
</html>

<?php 

//check whether submit button is clicked or not
if(isset($_POST['submit']))
{
    //proccess for login
    //get the data from login form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //sql to check whether username and password exists or not
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    // execute the query
    $res = mysqli_query($conn, $sql);

    //count rows to check whether the user exists or not 
    $count = mysqli_num_rows($res);

    if($count==1)
    {
    	//user available
    	$_SESSION['login'] = "<div class='success'>Login Successful</div>";
    	$_SESSION['user'] = $username; //to check whether user is logged in or not and logout will unset it

    	//redirect to home page dashboard
    	header('location:'.SITEURL.'admin/');
    }
    else
    {
    	//user not available
    	$_SESSION['login'] = "<div class='error text-center'>username or password did not match</div>";
    	//redirect to home page dashboard
    	header('location:'.SITEURL.'admin/login.php');

    }
}

?>