<?php
if(isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_image = $_POST['update_image'];
    $update_category = $_POST['update_category'];

    // Read the content of the file
    $file_content = file_get_contents("Chains.json");

    // Decode the content of the file
    $chains = json_decode($file_content, true);

    // Find the index of the chain with the specified ID
    $index = array_search($update_id, array_column($chains, 'id'));

    if($index !== false) {
        // Update the values of the chain
        $chains[$index]['name'] = $update_name;
        $chains[$index]['price'] = (int)$update_price;
        $chains[$index]['image'] = $update_image;
        $chains[$index]['category'] = $update_category;

        // Write the updated records back to the file
        if(file_put_contents("Chains.json", json_encode($chains, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "Chain with ID $update_id updated successfully";
        } else {
            $error = "Error updating chain, please try again";
        }
    } else {
        $error = "Chain with ID $update_id not found";
    }
}
?>
