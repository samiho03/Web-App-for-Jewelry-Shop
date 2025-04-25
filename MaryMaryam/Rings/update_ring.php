<?php
if(isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_image = $_POST['update_image'];
    $update_category = $_POST['update_category'];

    // Read the content of the file
    $file_content = file_get_contents("Rings.json");

    // Decode the content of the file
    $rings = json_decode($file_content, true);

    // Find the index of the ring with the specified ID
    $index = array_search($update_id, array_column($rings, 'id'));

    if($index !== false) {
        // Update the values of the ring
        $rings[$index]['name'] = $update_name;
        $rings[$index]['price'] = (int)$update_price;
        $rings[$index]['image'] = $update_image;
        $rings[$index]['category'] = $update_category;

        // Write the updated records back to the file
        if(file_put_contents("Rings.json", json_encode($rings, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "Ring with ID $update_id updated successfully";
        } else {
            $error = "Error updating ring, please try again";
        }
    } else {
        $error = "Ring with ID $update_id not found";
    }
}
?>
