<?php include('partials-front/menu.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

        <?php  
            $search = $_POST['search'];
        ?>
            
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                //Get the search keyword
                $search = $_POST['search'];

                //sql query to get food on search keyword
                $sql = "SELECT * FROM tbl_items WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                //Count rows
                $count = mysqli_num_rows($res);

                //Check whether food available or not
                if($count>0)
                {
                    //Food available
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                        //Check whether image name is available or not
                                        if($image_name=="")
                                        {
                                            //Image not available
                                            echo "<div class='error'>Image not available.</div>";
                                        }else{
                                            //Image Available
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/items/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">

                                            <?php
                                        }
                                    
                                    ?>
                                   
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price">Rs. <?php echo $price; ?>/KG</p>
                                    <p class="food-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>

                                    <a href="#" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>



                    <?php

                    
                    }
                }else{
                    //Food not available
                    echo "<div class='error'>No matching items.</div>";
                }

            ?>

    


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
    
    <?php include('partials-front/footer.php') ?>