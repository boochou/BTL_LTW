<?php
include_once("../../model/connectdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the POST request
    $data = json_decode(file_get_contents("php://input"));
    $content = mysqli_real_escape_string($mysqli, $data->content); // Escape input
    $title = mysqli_real_escape_string($mysqli, $data->title); // Escape input

    // Include the file containing the function to add a blog
    include_once '../../model/seller/addBlog.php';

    // Call the function to add the blog post
    $success = addBlog($mysqli, $content, $title);

    // Check if the addition was successful
    if ($success) {
        // Return a success message
        echo "success";
    } else {
        // Return an error message if the addition failed
        echo "error";
    }
}
?>
