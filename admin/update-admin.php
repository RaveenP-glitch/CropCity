<?php 
    include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br/>

        <?php
            //Get the ID of the selected admin
            $id = $_GET['id'];
            //Create sql query to get details
            $sql = "SELECT * FROM tbl_admin WHERE id=$id";
            //Run the sql query
            $res = mysqli_query($conn, $sql);
           
            //Check whether the query is executed or not
            if($res == true){
                //Check data is available?
                $count=mysqli_num_rows($res);
                if($count==1){
                    //Get the details
                    $row = mysqli_fetch_assoc($res);
                   
                    $full_name = $row['full_name'];
                    $username = $row['username'];

                    
                }else{
                    //Redirect to manage Admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }

            }


        ?>
  
        <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>Full Name</td>
                <td>
                    <input type="text" name="full_name" value="<?php echo $full_name ?>">
                </td>
            </tr>

            <tr>
                <td>
                    Username: 
                </td>
                <td>
                    <input type="text" name="username" value="<?php echo $username ?>">
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
                    <input type="submit" name="submit" value="Update Admin" class="update-admin">
                </td>
            </tr>


        </table>

        </form>
        

    </div>


</div>


<?php 
    //Check whether the submit button is Clicked or not
    if(isset($_POST['submit']))
    {
        //Get all the values from the form
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //Create sql query to update admin
        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username',
        WHERE id='$id'
        ";

        //Execute the query
        $res = mysqli_query($conn, $sql);
     

        //Check whether the query executed
        if($res == true){
            $_SESSION['update'] = "<div class='success'>Admin updated Successfully.</div>";
            //Redirect to the Manage admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }else{
            $_SESSION['update'] = "<div class='error'>Failed to Update Admin.</div>";
            //Redirect to the Manage admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }

    }

?>



<?php 
    include('partials/footer.php');
?>