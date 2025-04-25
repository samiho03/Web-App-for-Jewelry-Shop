<?php
if(isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Read the content of the file
    $file_content = file_get_contents("Bracelets.json");

    // Decode the content of the file
    $bracelets = json_decode($file_content, true);

    // Check if the bracelet with the specified ID exists
    $index = array_search($delete_id, array_column($bracelets, 'id'));
    if($index !== false) {
        // Remove the bracelet from the array
        array_splice($bracelets, $index, 1);

        // Write the updated records back to the file
        if(file_put_contents("Bracelets.json", json_encode($bracelets, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "Bracelet with ID $delete_id deleted successfully";
        } else {
            $error = "Error deleting bracelet, please try again";
        }
    } else {
        $error = "Bracelet with ID $delete_id not found";
    }
}
?>
