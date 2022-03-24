<?php include('partials/menu.php'); ?>


<?php
    //Check whether id is set or not 
    if(isset($_GET['id']))
    {
        //Get all the details
        $id = $_GET['id'];

        //SQL query to get all the selected items
        $sql2 = "SELECT * FROM tbl_items WHERE id=$id";

        //Execute the query
        $res2 = mysqli_query($conn, $sql2);

        //Get the values based on query executed
        $row2 = mysqli_fetch_assoc($res2);

        //Get the individual values of selected items
        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];


    }else{
        //Redirect to manage food
        header('location:'.SITEURL.'admin/manage-items.php');
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Items</h1>
        <br/>

        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">

            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" placeholder="" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Description: </td>
                <td>
                    <textarea name="description" id="" cols="70" rows="4"><?php echo $description; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price" value="<?php echo $price; ?>">
                </td>
            </tr>

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php
                        if($current_image == "")
                        {
                            //Image not available
                            echo "<div class='error'>Image not available.</div>";
                        }else{
                            //Image available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/items/<?php echo $current_image; ?>" <?php echo $title; ?> width="150px">
                            <?php
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Select New Image:</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Category: </td>
                <td>
                    <select name="category">

                        <?php
                            //Query to get active categories
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                            //Execute the query
                            $res = mysqli_query($conn, $sql);
                            //Count rows
                            $count = mysqli_num_rows($res);

                            //Check whether category is available or not
                            if($count>0)
                            {
                                //Category available
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];
                                    
                                    // echo "<option value='$category_id'>$category_title</option>";
                                    ?>
                                    <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                }
                            }else{
                                //Category not available
                                echo "<option value='0'>Category Not Available.</option>";
                            }
                        ?>

                    </select>
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($featured == "Yes") {echo "checked";} ?> type="radio" name="featured" value="Yes">Yes
                    <input <?php if($featured == "No") {echo "checked";} ?> type="radio" name="featured" value="No">No
                </td>
            </tr>
        
            <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active == "Yes") {echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                    <input <?php if($active == "No") {echo "checked";} ?> type="radio" name="active" value="No">No
                </td>
            </tr>

            <tr>
                <td><p><br></p></td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                    <input type="submit" name="submit" value="Update Item" class="update-admin">
                </td>
            </tr>

        </table>

        </form>

        <?php
            
            if(isset($_POST['submit']))
            {
                //Get all the details of the form
                $id = $_POST['id'];
                $title  = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];

                $featured = $_POST['featured'];
                $active = $_POST['active'];


                //Upload the image if selected
                if(isset($_FILES['image']['name']))
                {
                    //Upload button clicked
                    $image_name = $_FILES['image']['name']; //New image name

                    //Check whether the file is available or not
                    if($image_name!="")
                    {

                        $image_name = $_FILES['image']['name']; 
                        //Image is available
                        $ext = end(explode('.', $image_name));

                        $image_name = "Item-Name-".rand(0000, 9999).'.'.$ext; //New image name
                        
                        //Get the source path and destination path
                        $src_path = $_FILES['image']['tmp_name'];
                        $dest_path = "../images/items/".$image_name;

                        //Upload the image
                        $upload = move_uploaded_file($src_path, $dest_path);

                        //Check whether the image is uploaded or not
                        if($upload == false){

                            $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                            header('location:'.SITEURL.'admin/manage-items.php');
                            //Stop the process
                            die();
                        }

                        //Remove current image if available
                        if($current_image!="")
                        {
                            //Current image is available
                            $remove_path = "../images/items".$current_image;

                            $remove = unlink($remove_path);

                            //Check whether the image is removed or not
                            if($remove == false)
                            {
                                //failed to remove current image
                                $_SESSION['remove-failed'] = "<div class='error'>Failed to remove current image.</div>";
                                //Redirect
                                header('location:'.SITEURL.'admin/manage-items.php');
                                //Stop the process
                                die();
                            }
                        }

                    }else{
                        $image_name = $current_image;
                    }

                }else{
                    $image_name = $current_image;

                }

                //Remove the image if new image is uploaded and current image exists
                $sql3 = "UPDATE tbl_items SET
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = '$category',
                    featured = '$featured',
                    active = '$active'
                    WHERE id = $id
                ";

                //Execute the sql query
                $res3 = mysqli_query($conn, $sql3);

                //Check whether the query is executed or not
                if($res3 == true)
                {
                    //Query executed
                    $_SESSION['update'] = "<div class='success'>Item updated successfull.</div>";
                    header('location:'.SITEURL.'admin/manage-items.php');
                }else{
                    //Failed to update food
                    $_SESSION['update'] = "<div class='error'>Failed to upload item.</div>";
                    header('location:'.SITEURL.'admin/manage-items.php');
                }

                //Redirect to manage items page



            }

        
        ?>

    </div>
</div>



<?php include('partials/footer.php'); ?>