<?php
if(isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_image = $_POST['update_image'];
    $update_category = $_POST['update_category'];

    // Read the content of the file
    $file_content = file_get_contents("Earring.json");

    // Decode the content of the file
    $earings = json_decode($file_content, true);

    // Find the index of the earing with the specified ID
    $index = array_search($update_id, array_column($rings, 'id'));

    if($index !== false) {
        // Update the values of the earing
        $earings[$index]['name'] = $update_name;
        $earings[$index]['price'] = (int)$update_price;
        $earings[$index]['image'] = $update_image;
        $earings[$index]['category'] = $update_category;

        // Write the updated records back to the file
        if(file_put_contents("Earring.json", json_encode($rings, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "Earing with ID $update_id updated successfully";
        } else {
            $error = "Error updating earing, please try again";
        }
    } else {
        $error = "Earing with ID $update_id not found";
    }
}
?>
