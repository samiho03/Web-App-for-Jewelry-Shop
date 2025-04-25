<?php
if(isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_image = $_POST['update_image'];
    $update_category = $_POST['update_category'];

    // Read the content of the file
    $file_content = file_get_contents("Bangles.json");

    // Decode the content of the file
    $bangles = json_decode($file_content, true);

    // Find the index of the bangle with the specified ID
    $index = array_search($update_id, array_column($bangles, 'id'));

    if($index !== false) {
        // Update the values of the bangle
        $bangles[$index]['name'] = $update_name;
        $bangles[$index]['price'] = (int)$update_price;
        $bangles[$index]['image'] = $update_image;
        $bangles[$index]['category'] = $update_category;

        // Write the updated records back to the file
        if(file_put_contents("Bangles.json", json_encode($bangles, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "Bangle with ID $update_id updated successfully";
        } else {
            $error = "Error updating bangle, please try again";
        }
    } else {
        $error = "Bangle with ID $update_id not found";
    }
}
?>
