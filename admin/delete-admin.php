<?php

//Include constants.php
include('../config/constants.php');

//Get the ID of the admin to be deleted
$id = $_GET['id'];


//SQL Query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

$res = mysqli_query($conn, $sql);

//Check whether the query executed successfully
if($res == true)
{
    //echo "Admin deleted";
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
    //Redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');



}else{
    echo "Failed to delete admin";
    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');

}

//Redirect to Manage admin page with (success/error) message




?>