<?php

// Connect the database
include("../initialize.php");

// Retrieve the variables
$postId = $_GET['postID'];
$username = $_GET['user'];

// If a user is connected
if (!empty($username)) {

// Format the variables
    $formatted_post = htmlspecialchars($postId);
    $formatted_user = htmlspecialchars($username);

// Check if the post has already been liked by the user
    $query = "SELECT * FROM `likes` WHERE (upper(`postId`) LIKE upper('$formatted_post')) AND (upper(`username`) LIKE upper('$formatted_user'))";
    $result = $SQLconn->conn->query($query);

    if (mysqli_num_rows($result) != 0) {
        // Yes: The like is deleted
        $query = "DELETE FROM `likes` WHERE (upper(`postId`) LIKE upper('$formatted_post')) AND (upper(`username`) LIKE upper('$formatted_user'))";
    } else {
        // No: The like is added
        $query = "INSERT INTO `likes`(`username`, `postId`) VALUES ('$username', '$postId')";
    }
    $result = $SQLconn->conn->query($query);

    if (!empty($result)) {
        echo 'OK';
    } else {
        echo 'ERROR';
    }
}
?>