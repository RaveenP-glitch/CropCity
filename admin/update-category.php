<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br/>
        <br/>

        <?php
        
            //Check whether the id is set or not
            if(isset($_GET['id']))
            {
                //Get the ID and all other details
                $id = $_GET['id'];
                //Create SQL Query to get all other details
                $sql = "SELECT * FROM tbl_category WHERE id=$id";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                //Count the Rows to check whether the id is valid or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Get all the data
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];

                }else{
                    //Redirect to manage category page with session message
                    $_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                    
                }

            }else{
                //Redirect to manage category
                header('location:'.SITEURL.'admin/manage-category.php');

            }

        ?>

        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php
                        if($current_image != "")
                        {
                            //Display the image
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="150px">
                            <?php
                            
                        }else{
                            //Display Message
                            echo "<div class='error'>Image Not Added.</div>";
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>New Image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>
                    Featured:
                </td>
                <td>
                    <input <?php if($featured == "Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">Yes
                    <input <?php if($featured == "No"){echo "checked";} ?> type="radio" name="featured" value="No">No
                </td>
            </tr>
        
            <tr>
                <td>
                    Active:
                </td>
                <td>
                    <input <?php if($active == "Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                    <input <?php if($active == "No"){echo "checked";} ?> type="radio" name="active" value="No">No
                </td>
            </tr>

            <tr>
                <td>
                    <p><br/></p>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">    
                    <input type="hidden" name="id" value="<?php echo $id; ?>">    
                    <input type="submit" name="submit" value="Update Category" class="update-admin">
            </td>
        </tr>

        </table>
        </form>


        <?php

            if(isset($_POST['submit']))
            {
                //Get all the values from our form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //Updating New image if selected
                //Check whether the image is selected or not
                if(isset($_FILES['image']['name']))
                {
                    //Get the image details
                    $image_name = $_FILES['image']['name'];

                    if($image_name != "")
                    {
                        //Image Available


                        
                        $image_name = $_FILES['image']['name'];

                        //Check

                        //Auto Rename our image
                        //Get the extension of our image
                        $ext = end(explode('.',$image_name));

                        //Rename the Image
                        $image_name = "Food_Category_".rand(000, 999).'.'.$ext;


                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/".$image_name;

                        //Finally upload image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //Check whether the image is uploaded
                        if($upload == false)
                        {
                            //set message
                            $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                            header('location:'.SITEURL.'admin/manage-category.php');
                            //stop the process
                            die();
                        }

                        //Remove the current image
                        if($current_image!="")
                        {
                            $remove_path = "../images/category/".$current_image;
                            $remove = unlink($remove_path);
    
                            //Check whether the image is removed
                            if($remove == false){
                                //Failed to remove image
                                $_SESSION['failed-remove']="<div class='error'>Failed to remove current image.</div>";
                                header('location:'.SITEURL.'admin/manage-category.php');
                                die(); //Stop the process
                            }
    
                        }
                       



                    }else{
                        $image_name = $current_image;
                    }

                }else{
                    $image_name = $current_image;
                }

                //Update the Database
                $sql2 = "UPDATE tbl_category SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE id=$id
                ";

                //Execute the query
                $res2  = mysqli_query($conn, $sql2);

                //Redirect to manage category page with message
                //Check whether query executed
                if($res2 == true){
                    $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');

                }else{
                    $_SESSION['update'] = "<div class='error'>Failed to Update Category.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }

            }
        
        ?>

    </div>
</div>





<?php include('partials/footer.php'); ?>