<?php
include('partials/menu.php');
?>



<!-- Main Content Section Start -->
<div class="main-content">
    <div class="wrapper">

        <h3>Manage Admins</h3>
        <br />
        <!-- Button to add an admin -->

        <?php
        if (isset($_SESSION['add'])) 
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']); //Removing session message


        } else {
        }

        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if(isset($_SESSION['user-not-found']))
        {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }

        if(isset($_SESSION['pwd-not-match']))
        {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }

        if(isset($_SESSION['change-pwd']))
        {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }

        ?>
        <br />
     

        <a href="add-admin.php"><button class="add-admin">Add Admin</button></a>
        <br />
        <br />

        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php
            //Query to Get all admin
            $sql = "SELECT * FROM tbl_admin";
            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Check is query is executed
            if ($res == TRUE) {
                //count rows 
                $count = mysqli_num_rows($res);  //Function to get all rows

                $n = 1; //Create a variable for id

                //Check the number of rows
                if ($count > 0) {
                    //display admins
                    while ($rows = mysqli_fetch_assoc($res)) {
                        //Using while loop to get all the data from database
                        //Get individual data
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

            ?>

                        <tr>
                            <th><?php echo $n++  ?> </th>
                            <th> <?php echo $full_name  ?></th>
                            <th><?php echo $username  ?></th>
                            <th>
                                 <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>"><button class="btn-primary">Update Password</button></a>
                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>"><button class="update-admin">Update Admin</button></a>
                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>"><button class="del-admin">Delete Admin</button></a>
                            </th>
                        </tr>

            <?php


                    }
                } else {
                    //No admins


                }
            } else {


            }

            ?>

            

        </table>


    </div>

</div>

<!-- Main Content Section End -->

<?php
include('partials/footer.php');
?>


<?php


?>