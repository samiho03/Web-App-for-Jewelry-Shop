<?php
if(isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Read the content of the file
    $file_content = file_get_contents("WedBangles.json");

    // Decode the content of the file
    $wedBangles = json_decode($file_content, true);

    // Check if the wedBangle with the specified ID exists
    $index = array_search($delete_id, array_column($wedBangles, 'id'));
    if($index !== false) {
        // Remove the wedBangle from the array
        array_splice($wedBangles, $index, 1);

        // Write the updated records back to the file
        if(file_put_contents("WedBangles.json", json_encode($wedBangles, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "WedBangle with ID $delete_id deleted successfully";
        } else {
            $error = "Error deleting wedBangle, please try again";
        }
    } else {
        $error = "WedBangle with ID $delete_id not found";
    }
}
?>
