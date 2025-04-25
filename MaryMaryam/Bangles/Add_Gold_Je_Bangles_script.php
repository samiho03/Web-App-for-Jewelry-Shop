<?php

if(isset($_POST['submit'])) {

    $new_message = array(
        'id'=> (int)$_POST['id'],
        'name'=> $_POST['name'],
        'price'=> (int)$_POST['price'],
        'image'=> $_POST['image'],
        'category'=> $_POST['category']
    );

    // Read the content of the file
    $file_content = file_get_contents("Bangles.json");
    // Debugging: Output the content of the file
    

    // Decode the content of the file
    $old_records = json_decode($file_content, true);
    // Debugging: Output the result of json_decode
    

    // Check if decoding was successful
    if($old_records === null) {
        // If decoding failed, initialize $old_records as an empty array
        $old_records = array();
    }

    // Push the new message into the array of old records
    array_push($old_records, $new_message);

    // Write the updated records back to the file
    if(file_put_contents("Bangles.json", json_encode($old_records, JSON_PRETTY_PRINT), LOCK_EX)) {
        $success = "Message is stored successfully";
    } else {
        $error = "Error storing message, please try again";
    }
}

?>
