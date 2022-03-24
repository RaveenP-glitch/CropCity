<?php  

    //Include constants page
    include('../config/constants.php');


    if(isset($_GET['id']) AND isset($_GET['image_name'])) 
    {
        //Process to Delete
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove the image if available
        if($image_name != ""){
            //Get the image path
            $path = "../images/items/".$image_name;

            //Remove image file from folder
            $remove = unlink($path);

            //Check whether the image is removed
            if($remove == False){
                //Failed to remove image
                $_SESSION['upload'] = "<div class='error'>Failed to remove image file.</div>";
                header('location:'.SITEURL.'admin/manage-items.php');
                //Stop the process
                die();
            }
        }

        //Delete the image from database
        $sql = "DELETE FROM tbl_items WHERE id=$id";
        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed to not
         //Redirect to manage items page

        if($res == true){
            //Food deleted
            $_SESSION['delete'] = "<div class='success'>Item deleted successfully.</div>";
            header('location:'.SITEURL.'admin/manage-items.php');
        }else{
            //Failed to delete
            $_SESSION['delete'] = "<div class='error'>Failed to delete item.</div>";
            header('location:'.SITEURL.'admin/manage-items.php');
        }

       

    }else{

        //Redirect to Manage Food Page
        $_SESSION['unauthorized'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-items.php');

    }



?>