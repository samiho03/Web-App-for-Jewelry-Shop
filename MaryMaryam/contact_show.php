<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Entries</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
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
</head>
<body>

<h2>Contact Form Entries</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Subject</th>
        <th>Message</th>
    </tr>

    <?php
    // Connect to your MySQL database
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "jewelry"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch data from the contact_form table
    $sql = "SELECT * FROM contact_form";
    $result = $conn->query($sql);

    // Display data in table rows
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["subject"] . "</td>";
            echo "<td>" . $row["message"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>

</table>

</body>
</html>
