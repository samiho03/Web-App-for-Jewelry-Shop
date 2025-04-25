<?php
if(isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_image = $_POST['update_image'];
    $update_category = $_POST['update_category'];

    // Read the content of the file
    $file_content = file_get_contents("WedRings.json");

    // Decode the content of the file
    $wedRings = json_decode($file_content, true);

    // Find the index of the WedRing with the specified ID
    $index = array_search($update_id, array_column($wedRings, 'id'));

    if($index !== false) {
        // Update the values of the WedRing
        $wedRings[$index]['name'] = $update_name;
        $wedRings[$index]['price'] = (int)$update_price;
        $wedRings[$index]['image'] = $update_image;
        $wedRings[$index]['category'] = $update_category;

        // Write the updated records back to the file
        if(file_put_contents("WedRings.json", json_encode($wedRings, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "WedRing with ID $update_id updated successfully";
        } else {
            $error = "Error updating wedRing, please try again";
        }
    } else {
        $error = "WedRing with ID $update_id not found";
    }
}
?>
