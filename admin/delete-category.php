<?php

    //Include constants
    include('../config/constants.php');

    //Check whether the id and image name is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {   
        //Get the value and delete
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove the physical image file if available
        if($image_name != "")
        {
            $path = "../images/category/".$image_name;
            //Remove the image
            $remove = unlink($path);

            if($remove == false){
                //Set the session message
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
                //Redirect to manage category
               header('location:'.SITEURL.'admin/manage-category.php');
                //Stop the process
                die();
            }else{

            }
        }

        //Delete data from the database
        //SQL Query to delete data from database
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether the data is deleted from the database or not
        if($res == true)
        {
            //set success msg and redirect
            $_SESSION['delete'] = "<div class='success'>Category deleted successfully.</div>";
            //Redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }else{
            //set success msg and redirect
            $_SESSION['delete'] = "<div class='error'>Failed to delete category.</div>";
            //Redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');

        }

        //Redirect to manage admin page


    }else{
        //Redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');

    }
