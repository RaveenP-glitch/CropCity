<?php include('partials/menu.php'); ?>



    <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>
            <br/>

            <?php
                if(isset($_SESSION['add']))  //checking whether the session is set or not
                {
                    echo $_SESSION['add'];    //Display the session message if set 
                    unset($_SESSION['add']);   //Remove the session message
                    
                }

            ?>
            
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name: </td>
                        <td><input type="text" name="full_name" placeholder="Enter your full name"></td>
                    </tr>

                    <tr>
                        <td>Username: </td>
                        <td><input type="text" name="username" placeholder="Your Username"></td>
                    </tr>
                   
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="password" placeholder="Your Password"></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="add-admin">
                        </td>
                    </tr>

                </table>

            </form>

        </div>

    </div>




<?php include('partials/footer.php') ?>


<?php  
    //Process the value from Form and Save it in Database
    
    //Check whether the button is clicked or not
    if(isset($_POST['submit'])){
        //Button Clicked

        //echo "Button Clicked"
        
        //Get the data from our form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5(md5($_POST['password'])); //Password encryption with MD5


        //SQL to insert data into the DB
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //check whether the data is inserted or not
        if($res == TRUE){
            //Data inserted
           // echo "Data Inserted";
            //Create a Session Variable to display message
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');

        }else{
            //Failed to insert Data
            //echo "Failed to insert data"
            //Create a Session variable to display message
            $_SESSION['add'] = "<div class='error'>Failed to add Admin</div>";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/add-admin.php');

        }



    }


?>