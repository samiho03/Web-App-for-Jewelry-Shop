<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Gold Jewellery - Necklaces </title>
    <!-- You can include any necessary CSS stylesheets here -->
    <style>
        /* Example CSS for the table */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>

<style>
        /* Example CSS for the table */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

        /* Add Product button styles */
        .add-product-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Add Product button icon styles */
        .add-product-button i {
            margin-right: 5px;
        }
    </style>

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


      <!-- Navigation Bar -->
      <div class="navbar">
        <div class="dropdown">
            <a href="#">Aura</a>
            <div class="dropdown-content">
                <a href="/MaryMaryam/MaryMaryam/AuEarrings/Table.php">Earrings</a>
                <a href="/MaryMaryam/MaryMaryam/AuBangles/Table.php">Bangles</a>
                <a href="/MaryMaryam/MaryMaryam/AuRings/Table.php">Rings</a>
                <a href="/MaryMaryam/MaryMaryam/AuBracelets/Table.php">Bracelets</a>
                <a href="/MaryMaryam/MaryMaryam/AuPendants/Table.php">Pendants</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#">Gold Jewellery</a>
            <div class="dropdown-content">
                <a href="/MaryMaryam/MaryMaryam/Necklaces/Table.php">Necklaces</a>
                <a href="/MaryMaryam/MaryMaryam/Earings/Table.php">Earrings</a>
                <a href="/MaryMaryam/MaryMaryam/Bangles/Bangles.html">Bangles</a>
                <a href="/MaryMaryam/MaryMaryam/Rings/Table.php">Rings</a>
                <a href="/MaryMaryam/MaryMaryam/Bracelets/Table.php">Bracelets</a>
                <a href="/MaryMaryam/MaryMaryam/Pendants/Table.php">Pendants</a>
                <a href="/MaryMaryam/MaryMaryam/Chains/Table.php">Chains</a>
                <a href="/MaryMaryam/MaryMaryam/Anklets/Table.php">Anklets</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#">Wedding & Engagement</a>
            <div class="dropdown-content">
                <a href="/MaryMaryam/MaryMaryam/WedNecklaces/Table.php">Necklaces</a>
                <a href="/MaryMaryam/MaryMaryam/WedEarrings/Table.php">Earrings</a>
                <a href="/MaryMaryam/MaryMaryam/WedRings/Table.php">Rings</a>
                <a href="/MaryMaryam/MaryMaryam/WedBangles/Table.php">Bangles</a>
            </div>
        </div>

        <div class="dropdown">
            <a href="#">Angel Collection</a>
            <div class="dropdown-content">
                <a href="#">Necklaces</a>
                <a href="#">Earrings</a>
                <a href="#">Rings</a>
                <a href="#">Bangles</a>
            </div>
        </div>

        <div class="dropdown">
            <a href="#">Mens</a>
            <div class="dropdown-content">
                <a href="#">Necklaces</a>
                <a href="#">Earrings</a>
                <a href="#">Rings</a>
                <a href="#">Bangles</a>
            </div>
        </div>
    </div>



<?php
// Read JSON file
$json_file = 'Necklace.json';
$json_data = file_get_contents($json_file);
// Decode JSON data into an associative array
$necklaces = json_decode($json_data, true);
?>

<!-- Display the table -->
<h1>Necklaces Details</h1>
<table id="necklaceTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Category</th>
           
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($necklaces as $necklace) { ?>
            <tr>
                <td><?php echo $necklace['id']; ?></td>
                <td><?php echo $necklace['name']; ?></td>
                <td><?php echo $necklace['price']; ?></td>
                <td><img src="<?php echo $necklace['image']; ?>" alt="<?php echo $necklace['name']; ?>" style="max-width: 100px;"></td>
                <td><?php echo $necklace['category']; ?></td>
                
                
            </tr>
        <?php } ?>
    </tbody>
</table>

<a href="Add_Gold_Je_Necklaces.php" class="add-product-button">
    <i class="fa fa-plus-circle"></i> Add Product
</a>


<h1>Delete Gold Jewellery - Necklaces </h1>

<form action="delete_necklace.php" method="post">
    <label for="delete_id">Enter ID to delete:</label><br>
    <input type="text" id="delete_id" name="delete_id"><br><br>
    <input type="submit" value="Delete Necklace">
</form>


<h1>Update Gold Jewellery - Necklaces </h1>

<form action="update_necklace.php" method="post">
    <label for="update_id">Enter ID to update:</label><br>
    <input type="text" id="update_id" name="update_id"><br><br>
    <label for="update_name">New Name:</label><br>
    <input type="text" id="update_name" name="update_name"><br><br>
    <label for="update_price">New Price:</label><br>
    <input type="number" id="update_price" name="update_price"><br><br>
    <label for="update_image">New Image URL:</label><br>
    <input type="text" id="update_image" name="update_image"><br><br>
    <label for="update_category">New Category:</label><br>
    <select id="update_category" name="update_category">
            <option value="twoLayer">Double Layered</option>
            <option value="trendy">Trendy</option>
            <option value="lweight">Light Weight</option>
            <option value="tradit">Traditional</option>
    </select><br><br>
    <input type="submit" value="Update Necklace">
</form>



</body>
</html>
