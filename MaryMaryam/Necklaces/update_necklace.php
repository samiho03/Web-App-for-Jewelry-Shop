<?php
if(isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_image = $_POST['update_image'];
    $update_category = $_POST['update_category'];

    // Read the content of the file
    $file_content = file_get_contents("Necklace.json");

    // Decode the content of the file
    $necklaces = json_decode($file_content, true);

    // Find the index of the necklace with the specified ID
    $index = array_search($update_id, array_column($necklaces, 'id'));

    if($index !== false) {
        // Update the values of the necklace
        $necklaces[$index]['name'] = $update_name;
        $necklaces[$index]['price'] = (int)$update_price;
        $necklaces[$index]['image'] = $update_image;
        $necklaces[$index]['category'] = $update_category;

        // Write the updated records back to the file
        if(file_put_contents("Necklace.json", json_encode($necklaces, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "Necklace with ID $update_id updated successfully";
        } else {
            $error = "Error updating necklace, please try again";
        }
    } else {
        $error = "Necklace with ID $update_id not found";
    }
}
?>
