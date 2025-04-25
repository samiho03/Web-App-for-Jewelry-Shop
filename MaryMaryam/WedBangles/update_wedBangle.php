<?php
if(isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_image = $_POST['update_image'];
    $update_category = $_POST['update_category'];

    // Read the content of the file
    $file_content = file_get_contents("WedBangles.json");

    // Decode the content of the file
    $wedBangles = json_decode($file_content, true);

    // Find the index of the wedBangle with the specified ID
    $index = array_search($update_id, array_column($wedBangles, 'id'));

    if($index !== false) {
        // Update the values of the wedBangle
        $wedBangles[$index]['name'] = $update_name;
        $wedBangles[$index]['price'] = (int)$update_price;
        $wedBangles[$index]['image'] = $update_image;
        $wedBangles[$index]['category'] = $update_category;

        // Write the updated records back to the file
        if(file_put_contents("WedBangles.json", json_encode($wedBangles, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "WedBangle with ID $update_id updated successfully";
        } else {
            $error = "Error updating wedBangle, please try again";
        }
    } else {
        $error = "WedBangle with ID $update_id not found";
    }
}
?>
