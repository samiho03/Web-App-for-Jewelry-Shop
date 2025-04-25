<?php
if(isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_image = $_POST['update_image'];
    $update_category = $_POST['update_category'];

    // Read the content of the file
    $file_content = file_get_contents("WedNecklace.json");

    // Decode the content of the file
    $WedNecklace = json_decode($file_content, true);

    // Find the index of the WedNecklace with the specified ID
    $index = array_search($update_id, array_column($WedNecklace, 'id'));

    if($index !== false) {
        // Update the values of the WedNecklace
        $WedNecklace[$index]['name'] = $update_name;
        $WedNecklace[$index]['price'] = (int)$update_price;
        $WedNecklace[$index]['image'] = $update_image;
        $WedNecklace[$index]['category'] = $update_category;

        // Write the updated records back to the file
        if(file_put_contents("WedNecklace.json", json_encode($WedNecklace, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "WedNecklace with ID $update_id updated successfully";
        } else {
            $error = "Error updating wedNecklace, please try again";
        }
    } else {
        $error = "WedNecklace with ID $update_id not found";
    }
}
?>
