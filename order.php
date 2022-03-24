<?php include('partials-front/menu.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-black">Fill this form to confirm your order.</h2>

            <form action="#" class="order" style="text-shadow: 1px 1px white;">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="images/items/Item-Name-1003.jpg" alt="" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3>Food Title</h3>
                        <p class="food-price">Rs.230.00</p>

                        <div class="order-label">Quantity (KG)</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required min="0">
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Raveen Panditha" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 077 32xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

     <?php include('partials-front/footer.php') ?>