<?php
if(isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_image = $_POST['update_image'];
    $update_category = $_POST['update_category'];

    // Read the content of the file
    $file_content = file_get_contents("Bracelets.json");

    // Decode the content of the file
    $bracelets = json_decode($file_content, true);

    // Find the index of the bracelet with the specified ID
    $index = array_search($update_id, array_column($bracelets, 'id'));

    if($index !== false) {
        // Update the values of the bracelet
        $bracelets[$index]['name'] = $update_name;
        $bracelets[$index]['price'] = (int)$update_price;
        $bracelets[$index]['image'] = $update_image;
        $bracelets[$index]['category'] = $update_category;

        // Write the updated records back to the file
        if(file_put_contents("Bracelets.json", json_encode($bracelets, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "Bracelet with ID $update_id updated successfully";
        } else {
            $error = "Error updating bracelet, please try again";
        }
    } else {
        $error = "Bracelet with ID $update_id not found";
    }
}
?>
