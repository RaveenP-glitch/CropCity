<?php include('partials-front/menu.php') ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL;?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Food Items</h2>

        <?php
        //Create SQL Query to display categories from database
        $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured = 'Yes' LIMIT 3";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Count rows to check whether the category is available
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            //Categories available
            while ($row = mysqli_fetch_assoc($res)) {
                //Get the values
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
        ?>

                <a href="category-foods.html">
                    <div class="box-3 float-container">
                        <?php
                        if($image_name=="")
                        {
                            //Display Message
                            echo "<div class='error'>Image not Available.</div>";

                        }else{
                            ?>
                            <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                              <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                            </a>
                           
                            <?php

                        }
                        
                      
            
            ?>

                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                </a>


        <?php

            }
        } else {
            //Categories not available
            echo "<div class='error'>No Categories Available.</div>";
        }

        ?>



        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Items in the Store</h2>

        <?php

            //Getting food items from the database that are active and featured
            //SQL Query
            $sql2 = "SELECT * FROM tbl_items WHERE active='Yes' AND featured = 'Yes' LIMIT 8";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count rows
            $count2 = mysqli_num_rows($res2);

            //Check whether food available or not
            if($count2>0){
                //Food available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];

                    ?>


                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    //Check whether image available or not
                                    if($image_name=="")
                                    {
                                        //Image not available
                                        echo "<div class='error'>Image not available.</div>";

                                    }else{
                                        //Image available
                                        ?>
                                          <img src="<?php echo SITEURL; ?>images/items/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                         
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">Rs.<?php echo $price; ?>/KG</p>
                                <p class="food-detail">
                                   <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php" class="btn btn-primary">Order Now</a>
                            </div>
                       </div>

                    <?php

                }


            }else{
                //Food not available
                echo "<div class='error'>Food not available.</div>";

            }
        
        ?>

     


        <div class="clearfix"></div>



    </div>

    <p class="text-center">
        <a href="#">See All Foods</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php') ?>