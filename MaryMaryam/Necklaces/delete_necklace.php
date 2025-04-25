<?php
if(isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Read the content of the file
    $file_content = file_get_contents("Necklace.json");

    // Decode the content of the file
    $necklaces = json_decode($file_content, true);

    // Check if the necklace with the specified ID exists
    $index = array_search($delete_id, array_column($necklaces, 'id'));
    if($index !== false) {
        // Remove the necklace from the array
        array_splice($necklaces, $index, 1);

        // Write the updated records back to the file
        if(file_put_contents("Necklace.json", json_encode($necklaces, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "Necklace with ID $delete_id deleted successfully";
        } else {
            $error = "Error deleting necklace, please try again";
        }
    } else {
        $error = "Necklace with ID $delete_id not found";
    }
}
?>
