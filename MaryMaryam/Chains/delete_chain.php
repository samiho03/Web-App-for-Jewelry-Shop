<?php
if(isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Read the content of the file
    $file_content = file_get_contents("Chains.json");

    // Decode the content of the file
    $chains = json_decode($file_content, true);

    // Check if the chain with the specified ID exists
    $index = array_search($delete_id, array_column($chains, 'id'));
    if($index !== false) {
        // Remove the chain from the array
        array_splice($chains, $index, 1);

        // Write the updated records back to the file
        if(file_put_contents("Chains.json", json_encode($chains, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "Chain with ID $delete_id deleted successfully";
        } else {
            $error = "Error deleting chain, please try again";
        }
    } else {
        $error = "Chain with ID $delete_id not found";
    }
}
?>
