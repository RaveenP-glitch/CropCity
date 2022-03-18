<?php
    include('../config/constants.php');

?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">

    </head>
    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br/> 

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset( $_SESSION['no-login-message']))
                {
                    echo  $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br/>

            <!-- Login form Starts here -->
            <form action="" method="POST" class="text-center">
                Username:  <br/>
                <input type="text" name="username" placeholder="Enter Username">
                <br/> <br/>
                Password: <br/>
                <input type="password" name="password" placeholder="Enter Password">
                <br/>
                <br/>
                <input type="submit" name="submit" value="Login" class="btn-primary">
          

            </form>

            <!-- Login form Ends here -->
            <br/>
            <p class="text-center">Created By - <a href="https://raveenpanditha.netlify.app">T.R.Panditha</a></p>

        </div>    


    </body>

</html>

<?php
    //Check whether the submit button is clicked or not 
    if(isset($_POST['submit']))
    {
        //Process for login

        $username = $_POST['username'];
        $password = md5(md5($_POST['password']));

        //SQL to check whether the user exists
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //Execute the sql query
        $res = mysqli_query($conn, $sql);

        //Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);
        
        if($count == 1){
            //User available
            $_SESSION['login'] = "<div class='success text-center'>Login successful.</div>";
            $_SESSION['user'] = $username;

            header('location:'.SITEURL.'admin/');

        }else{
            //User not available
            $_SESSION['login'] = "<div class='error text-center'>Login Failed, Username or Password did not match.</div>";
            header('location:'.SITEURL.'admin/login.php');

        }

    }

?>