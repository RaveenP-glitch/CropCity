<?php 
    include('../config/constants.php'); 
    include('login-check.php');
?>



<html>

<head>
    <title>Food Order Website - Home Page</title>
    <link rel="icon" href="../images/SSlogo.png">

    <link rel="stylesheet" href="../css/admin.css">


</head>

<body>
    <br/>
    <h1 class="text-center">Admin Panel</h1>
    <br/>
</body>

        <!-- Menu Section Start -->
        <div class="menu">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-items.php">Items</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="logout.php" style="color: red;">LogOut</a></li>
                </ul>
            </div>

        </div>