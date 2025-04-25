<?php
if(isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Read the content of the file
    $file_content = file_get_contents("WedRings.json");

    // Decode the content of the file
    $wedRings = json_decode($file_content, true);

    // Check if the wedRing with the specified ID exists
    $index = array_search($delete_id, array_column($wedRings, 'id'));
    if($index !== false) {
        // Remove the wedRing from the array
        array_splice($wedRings, $index, 1);

        // Write the updated records back to the file
        if(file_put_contents("WedRings.json", json_encode($wedRings, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "WedRing with ID $delete_id deleted successfully";
        } else {
            $error = "Error deleting wedRing, please try again";
        }
    } else {
        $error = "WedRing with ID $delete_id not found";
    }
}
?>
