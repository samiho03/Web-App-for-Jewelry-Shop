<?php
if(isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_image = $_POST['update_image'];
    $update_category = $_POST['update_category'];

    // Read the content of the file
    $file_content = file_get_contents("AuBracelets.json");

    // Decode the content of the file
    $auBracelets = json_decode($file_content, true);

    // Find the index of the AuBracelet with the specified ID
    $index = array_search($update_id, array_column($auBracelets, 'id'));

    if($index !== false) {
        // Update the values of the AuBracelet
        $auBracelets[$index]['name'] = $update_name;
        $auBracelets[$index]['price'] = (int)$update_price;
        $auBracelets[$index]['image'] = $update_image;
        $auBracelets[$index]['category'] = $update_category;

        // Write the updated records back to the file
        if(file_put_contents("AuBracelets.json", json_encode($auBracelets, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "AuBracelet with ID $update_id updated successfully";
        } else {
            $error = "Error updating auBracelet, please try again";
        }
    } else {
        $error = "AuBracelet with ID $update_id not found";
    }
}
?>
