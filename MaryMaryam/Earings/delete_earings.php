<?php
if(isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Read the content of the file
    $file_content = file_get_contents("Earring.json");

    // Decode the content of the file
    $earings = json_decode($file_content, true);

    // Check if the earing with the specified ID exists
    $index = array_search($delete_id, array_column($earings , 'id'));
    if($index !== false) {
        // Remove the earing from the array
        array_splice($earings , $index, 1);

        // Write the updated records back to the file
        if(file_put_contents("Earring.json", json_encode($rings , JSON_PRETTY_PRINT), LOCK_EX)) {
            $success = "Earing with ID $delete_id deleted successfully";
        } else {
            $error = "Error deleting earing, please try again";
        }
    } else {
        $error = "Earing with ID $delete_id not found";
    }
}
?>
