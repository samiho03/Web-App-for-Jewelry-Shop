<?php
if(isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Read the content of the file
    $file_content = file_get_contents("Bangles.json");

    // Decode the content of the file
    $bangles = json_decode($file_content, true);

    // Check if the bangle with the specified ID exists
    $index = array_search($delete_id, array_column($bangles, 'id'));
    if($index !== false) {
        // Remove the bangle from the array
        array_splice($bangles, $index, 1);

        // Write the updated records back to the file
        if(file_put_contents("Bangles.json", json_encode($bangles, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "Bangle with ID $delete_id deleted successfully";
        } else {
            $error = "Error deleting bangle, please try again";
        }
    } else {
        $error = "Bangle with ID $delete_id not found";
    }
}
?>
