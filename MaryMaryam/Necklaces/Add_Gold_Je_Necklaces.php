<?php
require("Add_Gold_Je_Necklaces_script.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Gold Jewellery - Necklaces </title>
    <!-- You can include any necessary CSS stylesheets here -->
    <style>
        /* Example CSS for the navigation bar */
        .navbar {
            background-color: #333;
            overflow: hidden;
            display: flex;
            justify-content: space-around;
            padding: 10px 0;
        }

        .navbar a {
            color: #f2f2f2;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Style the dropdown content */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            overflow-y: auto;
            max-height: 200px; /* Adjust max-height as needed */
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            display: block;
            padding: 10px;
            color: #0099ff; /* Light blue color for subcategories */
        }

        .dropdown-content a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>
<body>


    <h1>Add Gold Jewellery - Necklaces </h1>

    <form action="" method="post">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id"><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price"><br>
        <label for="image">Image URL:</label><br>
        <input type="text" id="image" name="image"><br>
        <label for="category">Category:</label><br>
        <select id="category" name="category">
            <option value="twoLayer">Double Layered</option>
            <option value="trendy">Trendy</option>
            <option value="lweight">Light Weight</option>
            <option value="tradit">Traditional</option>
        </select><br><br>
        <input type="submit" id="submit" name="submit" value="Add Product"><br><br>
    </form>
</body>
</html>

