<?php
if(isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_image = $_POST['update_image'];
    $update_category = $_POST['update_category'];

    // Read the content of the file
    $file_content = file_get_contents("WedEarrings.json");

    // Decode the content of the file
    $wedEarrings = json_decode($file_content, true);

    // Find the index of the necklace with the specified ID
    $index = array_search($update_id, array_column($wedEarrings, 'id'));

    if($index !== false) {
        // Update the values of the necklace
        $wedEarrings[$index]['name'] = $update_name;
        $wedEarrings[$index]['price'] = (int)$update_price;
        $wedEarrings[$index]['image'] = $update_image;
        $wedEarrings[$index]['category'] = $update_category;

        // Write the updated records back to the file
        if(file_put_contents("WedEarrings.json", json_encode($wedEarrings, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "wedEarrings with ID $update_id updated successfully";
        } else {
            $error = "Error updating wedEarrings, please try again";
        }
    } else {
        $error = "wedEarrings with ID $update_id not found";
    }
}
?>
