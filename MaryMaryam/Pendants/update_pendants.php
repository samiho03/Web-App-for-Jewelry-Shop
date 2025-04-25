<?php
if(isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_image = $_POST['update_image'];
    $update_category = $_POST['update_category'];

    // Read the content of the file
    $file_content = file_get_contents("Pendants.json");

    // Decode the content of the file
    $pendants = json_decode($file_content, true);

    // Find the index of the  pendant with the specified ID
    $index = array_search($update_id, array_column($pendants, 'id'));

    if($index !== false) {
        // Update the values of the  pendant
        $pendants[$index]['name'] = $update_name;
        $pendants[$index]['price'] = (int)$update_price;
        $pendants[$index]['image'] = $update_image;
        $pendants[$index]['category'] = $update_category;

        // Write the updated records back to the file
        if(file_put_contents("Pendants.json", json_encode($pendants, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "Pendant with ID $update_id updated successfully";
        } else {
            $error = "Error updating pendant, please try again";
        }
    } else {
        $error = "Pendant with ID $update_id not found";
    }
}
?>
