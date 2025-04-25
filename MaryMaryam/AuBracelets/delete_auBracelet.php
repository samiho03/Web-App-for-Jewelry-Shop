<?php
if(isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Read the content of the file
    $file_content = file_get_contents("AuBracelets.json");

    // Decode the content of the file
    $auBracelets = json_decode($file_content, true);

    // Check if the auBracelet with the specified ID exists
    $index = array_search($delete_id, array_column($auBracelets, 'id'));
    if($index !== false) {
        // Remove the auBracelet from the array
        array_splice($auBracelets, $index, 1);

        // Write the updated records back to the file
        if(file_put_contents("AuBracelets.json", json_encode($auBracelets, JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "AuBracelet with ID $delete_id deleted successfully";
        } else {
            $error = "Error deleting auBracelet, please try again";
        }
    } else {
        $error = "AuBracelet with ID $delete_id not found";
    }
}
?>
