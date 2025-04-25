<?php
if(isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Read the content of the file
    $file_content = file_get_contents("WedEarrings.json");

    // Decode the content of the file
    $wedEarrings = json_decode($file_content, true);

    // Check if the wedEarring with the specified ID exists
    $index = array_search($delete_id, array_column($wedEarrings, 'id'));
    if($index !== false) {
        // Remove the wedEarring from the array
        array_splice($wedEarrings, $index, 1);

        // Write the updated records back to the file
        if(file_put_contents("WedEarrings.json", json_encode($wedEarrings, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "WedEarring with ID $delete_id deleted successfully";
        } else {
            $error = "Error deleting wedEarring, please try again";
        }
    } else {
        $error = "WedEarring with ID $delete_id not found";
    }
}
?>
