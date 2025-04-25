<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Checkout Table</h2>

<table>
    <tr>
        
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>ZIP</th>
        <th>Item Names</th>
        <th>PhoneNo</th>
    </tr>

    <?php
    

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "jewelry";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch data from the checkout table
    $sql = "SELECT * FROM checkout";
    $result = $conn->query($sql);

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["address"]."</td>";
        echo "<td>".$row["city"]."</td>";
        echo "<td>".$row["state"]."</td>";
        echo "<td>".$row["zip"]."</td>";
        echo "<td>".$row["item_names"]."</td>";
        echo "<td>".$row["phone"]."</td>";
        echo "</tr>";
    }
    $conn->close();
    ?>

</table>

</body>
</html>
