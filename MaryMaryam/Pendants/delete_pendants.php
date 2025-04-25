<?php
if(isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Read the content of the file
    $file_content = file_get_contents("Pendants.json");

    // Decode the content of the file
    $pendants = json_decode($file_content, true);

    // Check if the necklace with the specified ID exists
    $index = array_search($delete_id, array_column($pendants, 'id'));
    if($index !== false) {
        // Remove the necklace from the array
        array_splice($pendants, $index, 1);

        // Write the updated records back to the file
        if(file_put_contents("Pendants.json", json_encode($pendants, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "Pendants with ID $delete_id deleted successfully";
        } else {
            $error = "Error deleting necklace, please try again";
        }
    } else {
        $error = "Pendants with ID $delete_id not found";
    }
}
?>
