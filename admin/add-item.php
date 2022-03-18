<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Items</h1>
        <br/>

        <?php
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
        ?>



        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">

                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="" placeholder="Enter title">
                    </td>
                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" id="" cols="70" rows="5" placeholder="Description of the item"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price" min="0">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">

                                    <?php 
                                        //Create PHP Code to display categories from database
                                        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                                        //Execute the query
                                        $res = mysqli_query($conn, $sql);

                                        //Count rows to check whether we have categories or not
                                        $count = mysqli_num_rows($res);

                                        //If count is greater than zero, we have categories else we do not have categories.
                                        if($count>0)
                                        {
                                            while($row=mysqli_fetch_assoc($res))
                                            {
                                                $id = $row['id'];
                                                $title = $row['title'];
                                                ?>
                                                <option value="<?php echo $id ?>"><?php echo $title ?></option>
                                                <?php
                                              
                                            }
                                        }else{
                                            ?>
                                            <option value="0">No Category Found</option>
                                            <?php

                                        }

                                        //Display on dropdown

                                    ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>
                        <p><br></p>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="add-admin">
                    </td>
                </tr>

            </table>
        </form>


        <?php
            //Check whether the button is clicked or not
            if(isset($_POST['submit']))
            {
                //Add the food in the Database
                
                //Get the data from form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                //Check whethe the radio button for featured is checked
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }else{
                    $featured = "No"; //Setting the default value
                }
                

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }else{
                    $active = "No"; //Setting the default value
                }

                //Upload the image is available
                if(isset($_FILES['image']['name']))
                {
                    //Get the details of the selected image
                    $image_name = $_FILES['image']['name'];

                    //Check whether the image is selected or not
                    if($image_name != "")
                    {
                        //Image is selected

                        //Rename the image
                        //Get the extension of the selected image
                        $ext = end(explode('.',$image_name));
                        
                        //Create New Name for Image
                        $image_name = "Item-Name-".rand(0000,9999).".".$ext; //New Name

                        //Upload the image
                        $src = $_FILES['image']['tmp_name'];

                        //Destination path for the image to be uploaded
                        $dst = "../images/items/".$image_name;

                        $upload = move_uploaded_file($src, $dst);

                        //Check whether the image uploaded
                        if($upload == false)
                        {
                            $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
                            header('location:'.SITEURL.'admin/add-item.php');
                            //Failed to upload the image
                            die();
                        }


                    }

                }else{
                    $image_name = ""; //Setting default value as blank

                }


                //Inset into database
                $sql2 = "INSERT INTO tbl_items SET
                title='$title',
                description='$description',
                price=$price,
                image_name='$image_name',
                category_id=$category,
                featured='$featured',
                active='$active'
                ";

                //Execute the query
                $res2 = mysqli_query($conn, $sql2);
                //Check whether data is inserted or not
                if($res2 == true){
                    //Data inserted successfully
                    $_SESSION['add'] = "<div class='success'>Item Added Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-items.php');
                }else{
                    //Failed to insert data
                    $_SESSION['add'] = "<div class='error'>Failed to Add Item.</div>";
                    header('location:'.SITEURL.'admin/manage-items.php');
                }

            }        
        
        ?>


    </div>
</div>

<?php include('partials/footer.php'); ?>