<?php
if(isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Read the content of the file
    $file_content = file_get_contents("WedNecklace.json");

    // Decode the content of the file
    $wedNecklace = json_decode($file_content, true);

    // Check if the wedNecklace with the specified ID exists
    $index = array_search($delete_id, array_column($wedNecklace, 'id'));
    if($index !== false) {
        // Remove the wedNecklace from the array
        array_splice($wedNecklace, $index, 1);

        // Write the updated records back to the file
        if(file_put_contents("WedNecklace.json", json_encode($wedNecklace, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "WedNecklace with ID $delete_id deleted successfully";
        } else {
            $error = "Error deleting wedNecklace, please try again";
        }
    } else {
        $error = "WedNecklace with ID $delete_id not found";
    }
}
?>
