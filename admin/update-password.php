<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change password</h1>
        <br>

        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
        ?>

        <form action="" method="POST">
             <table class="tbl-30">
                <tr>
                    <td>Old password: </td>
                    <td>
                        <input type="password" name="old_password" placeholder="Old password">
                    </td>
                  
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td>
                    <input type="password" name="new_password" placeholder="New Password">
                </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p></p>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" value="Change Password" class="update-admin">

                    </td>
                </tr>
              

             </table>

        </form>

    </div>

</div>

<?php
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Get the data from the form
        echo $id = $_POST['id'];
        $current_password = md5(md5($_POST['old_password']));
        $new_password = md5(md5($_POST['new_password']));
        $confirm_password = md5(md5($_POST['confirm_password']));

        //Check whether the user with current id and password exists
        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

        $res = mysqli_query($conn, $sql);

        if($res == true){
            //Check whether data is available
            $count= mysqli_num_rows($res);

            if($count==1)
            {
                //User exists
                if($new_password==$confirm_password)
                {
                    //Update the password
                    $sql2 = "UPDATE tbl_admin SET 
                    password = '$new_password'
                    WHERE id=$id
                    ";

                    //Execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether the query executed or not
                    if($res2 == true){
                        //Display success message
                        $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully.</div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }else{
                        //Display error message
                        $_SESSION['change-pwd'] = "<div class='error'>Failed to change Password.</div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }

                }else{
                    //Redirect to manage Admin with Error message
                    $_SESSION['pwd-not-match'] = "<div class='error'>Password Did not match.</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');

                }

            }else{
                //User does not exist and Redirect
                $_SESSION['user-not-found'] = "<div class='error'>User not found.</div>";
                //Redirect the user
                header('location:'.SITEURL.'admin/manage-admin.php');

            }

        }
        //Check whether the new passoword and confirm password match or not

        //Change password if all above is true



    }

?>



<?php  include('partials/footer.php'); ?>