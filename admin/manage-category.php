<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h3>Manage Categories</h3>
        <br />

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['remove'])){
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if(isset($_SESSION['no-category-found'])){
            echo $_SESSION['no-category-found'];
            unset($_SESSION['no-category-found']);
        
        }

        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        
        }
      
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        
        }
      
        if(isset($_SESSION['failed-remove'])){
            echo $_SESSION['failed-remove'];
            unset($_SESSION['failed-remove']);
        
        }

        ?>

        <br />
        <!-- Button to add an category -->
        <a href="<?php echo SITEURL; ?>admin/add-category.php"><button class="add-admin">Add Category</button></a>
        <br />
        <br />

        <table class="tbl-full text-center">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php

            //Query to get all categories from the database
            $sql = "SELECT * FROM tbl_category";

            //Execute Query
            $res = mysqli_query($conn, $sql);

            //Create serial number variable and assign value=1
            $sn=1;

            //Count rows
            $count = mysqli_num_rows($res);

            //Check whether we have data in the database
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
            ?>

                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>

                        <td>
                            <?php
                             //check whether image name is available or not
                             if($image_name!="")
                             {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="150px">
                                <?php
                                
                             }else{
                                echo "<div class='error'>Image not Added</div>"; 

                             }
                             ?>
                        </td>

                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id;?>"><button class="update-admin">Update Category</button></a>
                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>"><button class="del-admin">Delete Category</button></a>
                        </td>
                    </tr>

                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">
                        <div class="error">No Category Added.</div>
                    </td>
                </tr>

            <?php

            }


            ?>





        </table>

    </div>


</div>




<?php include('partials/footer.php'); ?>