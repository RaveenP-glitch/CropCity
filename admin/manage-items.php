<?php include('partials/menu.php') ?>



<div class="main-content">
    <div class="wrapper">
        <h3>Manage Items</h3>
        <br />
        <!-- Button to add an food -->
        <a href="<?php echo SITEURL; ?>admin/add-item.php"><button class="add-admin">Add Item</button></a>
        <br />
        <br />

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
      
        if(isset($_SESSION['unauthorized'])){
            echo $_SESSION['unauthorized'];
            unset($_SESSION['unauthorized']);
        }
      
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
       
        if(isset($_SESSION['remove-failed'])){
            echo $_SESSION['remove-failed'];
            unset($_SESSION['remove-failed']);
        }
      
      
        ?>

        <table class="tbl-full text-center">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Price (Rs.)</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php
            //Create sql query to get all the items
            $sql = "SELECT * FROM tbl_items";

            //Execute the query
            $res = mysqli_query($conn, $sql);

            //Count Rows to check whether we have items
            $count = mysqli_num_rows($res);

            //Create serial number
            $sn = 1;

            if ($count > 0) {
                //Get the items from database and display
                while ($row = mysqli_fetch_assoc($res)) {
                    //Get values from individual columns
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];

            ?>

                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $price; ?></td>
                        <td>
                            <?php 
                            //Check whether image is there
                            if($image_name=="")
                            {
                                //Image missing
                                echo "<div class='error'>Image not Added.</div>";
                            }else{
                                ?>
                                <img src="<?php echo SITEURL; ?>images/items/<?php echo $image_name; ?>" alt="" width="150px">
                                <?php

                            }
                            ?>
                        </td>
                        <td><?php echo $featured; ?></th>
                        <td><?php echo $active; ?></th>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-item.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>"><button class="update-admin">Update Item</button></a>
                            <a href="<?php echo SITEURL; ?>admin/delete-item.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>"><button class="del-admin">Delete Item</button></a>
                        </td>
                    </tr>


            <?php


                }
            } else {
                echo "<tr><td colspan='7' class='error'>Items Not Added Yet. </td></tr>";
            }

            ?>



        </table>

    </div>


</div>



<?php include('partials/footer.php'); ?>