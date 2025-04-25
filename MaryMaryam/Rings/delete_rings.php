<?php
if(isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Read the content of the file
    $file_content = file_get_contents("Rings.json");

    // Decode the content of the file
    $rings = json_decode($file_content, true);

    // Check if the ring with the specified ID exists
    $index = array_search($delete_id, array_column($rings , 'id'));
    if($index !== false) {
        // Remove the ring from the array
        array_splice($rings , $index, 1);

        // Write the updated records back to the file
        if(file_put_contents("Rings.json", json_encode($rings , JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "Ring with ID $delete_id deleted successfully";
        } else {
            $error = "Error deleting ring, please try again";
        }
    } else {
        $error = "Ring with ID $delete_id not found";
    }
}
?>
