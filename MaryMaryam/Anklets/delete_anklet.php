<?php
if(isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Read the content of the file
    $file_content = file_get_contents("Anklets.json");

    // Decode the content of the file
    $anklets = json_decode($file_content, true);

    // Check if the anklet with the specified ID exists
    $index = array_search($delete_id, array_column($anklets, 'id'));
    if($index !== false) {
        // Remove the anklet from the array
        array_splice($anklets, $index, 1);

        // Write the updated records back to the file
        if(file_put_contents("Anklets.json", json_encode($anklets, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "Anklet with ID $delete_id deleted successfully";
        } else {
            $error = "Error deleting anklet, please try again";
        }
    } else {
        $error = "Anklet with ID $delete_id not found";
    }
}
?>
