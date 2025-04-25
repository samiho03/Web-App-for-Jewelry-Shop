<?php
if(isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_image = $_POST['update_image'];
    $update_category = $_POST['update_category'];

    // Read the content of the file
    $file_content = file_get_contents("Anklets.json");

    // Decode the content of the file
    $anklets = json_decode($file_content, true);

    // Find the index of the anklet with the specified ID
    $index = array_search($update_id, array_column($anklets, 'id'));

    if($index !== false) {
        // Update the values of the anklet
        $anklets[$index]['name'] = $update_name;
        $anklets[$index]['price'] = (int)$update_price;
        $anklets[$index]['image'] = $update_image;
        $anklets[$index]['category'] = $update_category;

        // Write the updated records back to the file
        if(file_put_contents("Anklets.json", json_encode($anklets, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "Anklet with ID $update_id updated successfully";
        } else {
            $error = "Error updating anklet, please try again";
        }
    } else {
        $error = "Anklet with ID $update_id not found";
    }
}
?>
