<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
            <br/><br/>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
               
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

            ?>

            <br/>

            <!-- Add Cetegory form starts here -->
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" placeholder="Category Title">
                        </td>
                    </tr>

                    <tr>
                        <td>Select image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="Yes">Yes
                            <input type="radio" name="featured" value="No">No
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                        <td>
                            <input type="radio" name="active" value="Yes">Yes
                            <input type="radio" name="active" value="No">No
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><br/></p>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Category" class="add-admin">
                        </td>
                    </tr>

                </table>

            </form>

            <!-- Add Cetegory form ends here -->


            <?php
                //Check whether the submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    //echo "Clicked";
                    //Get the value from Category form
                    $title = $_POST['title'];

                    //For Radio input, check whether the button is selected
                    if(isset($_POST['featured']))
                    {
                        //Get the value from form
                        $featured = $_POST['featured'];
                    }else{
                        //Set the default value
                        $featured = "No";

                    }

                    if(isset($_POST['active']))
                    {
                        $active = $_POST['active'];
                    }else{
                        $active = "No";
                    }

                    //Check whether the image is selected of not
                    // print_r($_FILES['image']);

                    // die(); //Break the code here
                    if(isset($_FILES['image']['name']))
                    {
                        //Upload the image only if available
                        if($image_name != "")
                        {

                    

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
                            header('location:'.SITEURL.'admin/add-category.php');
                            //stop the process
                            die();
                        }

                    }

                    }else{
                        //Do not upload image
                        $image_name="";
                    }

                    //Create SQL Query to enter category into database
                    $sql = "INSERT INTO tbl_category SET
                        title='$title',
                        image_name='$image_name',
                        featured='$featured',
                        active='$active'
                    ";

                    //Execute the Query and save
                    $res = mysqli_query($conn, $sql);

                    //Check whether the query executed or not
                    if($res == true)
                    {
                        $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                        header('location:'.SITEURL.'admin/manage-category.php');

                    }else{
                        $_SESSION['add'] = "<div class='error'>Failed to add Category.</div>";
                        header('location:'.SITEURL.'admin/manage-category.php');

                    }

                }
            ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>