<?php include('partials-front/menu.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Items</h2>

            <?php
                //Display items that are active
                $sql = "SELECT * FROM tbl_items WHERE active='Yes'";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                //Count rows
                $count = mysqli_num_rows($res);

                //Check whether items are available
                if($count>0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];

                        ?>

                            <div class="food-menu-box">
                                <div class="food-menu-img">

                                <?php
                                    //Check whether image available or not
                                    if($image_name == "")
                                    {
                                        echo "<div class='error'>Image not Available.</div>";
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
                                       
                                    </p>
                                    <br>

                                    <a href="#" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>


                        <?php

                    }


                }else{
                    echo "<div class='error'>Food Item not found.</div>";
                }
            ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php') ?>