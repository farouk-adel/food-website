<?php

//include constants.php file here 
include('../config/constants.php');

// 1- get the id of the admin to be deleted 
$id = $_GET['id'];

// 2- create sql query to delete 
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//execute query
$res = mysqli_query($conn, $sql);

//check whether the query executed or not 
if($res==TRUE)
{
	// executed
	// echo "Admin Deleted";
	// create session variable to display message
	$_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
	//redirect to manage admin page
	header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
	// failed
	// echo "Failed to Delete Admin";
	$_SESSION['delete'] = "<div class='error'>Failed To Delete Admin<div>";
	header('location:'.SITEURL.'admin/manage-admin.php');
}

// 3- redirect to manage admin page with message (success/error)

?>