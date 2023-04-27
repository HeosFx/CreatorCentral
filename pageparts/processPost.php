<?php

include("../initialize.php");
include(__ROOT__ . "/Classes/imgFileUploader.php");

//The forms that bring the user here have hidden fields to tell if we're here to add or edit...
if (isset($_POST["action"])) {

    // when editing an existing post
    if ($_POST["action"] == "edit") {

        if (isset($_POST["title"]) && isset($_POST["content"])) {
            $query = "UPDATE `posts` SET 
                    `title` = '" . $SQLconn->SecurizeString_ForSQL($_POST["title"]) . "',  
                    `content` = '" . $SQLconn->SecurizeString_ForSQL($_POST["content"]) . "' 
                    WHERE `postId` = " . $_POST["postID"];

            $result = $SQLconn->conn->query($query);
            if ($_FILES["imageFile"]["size"] > 0) {
                $img = new ImgFileUploader($SQLconn);
                $img->OverrideOldFile($_POST["postID"]);
            }
        }
    }
    // when creating a new post
    elseif ($_POST["action"] == "new") {

        if (isset($_POST["title"]) && isset($_POST["content"])) {
            $query = "INSERT INTO `posts` (title, content, username) VALUES            
                    ('" . $SQLconn->SecurizeString_ForSQL($_POST["title"]) . "', '" . $SQLconn->SecurizeString_ForSQL($_POST["content"]) . "', '" . $SQLconn->loginStatus->userName . "')";

            $result = $SQLconn->query($query);
            $img = new ImgFileUploader($SQLconn);
            $img->SaveFileAsNew($SQLconn->conn->insert_id);
        }
    }
    // removing an old post
    elseif ($_POST["action"] == "delete") {
        //delete the image first
        $img = new ImgFileUploader($SQLconn);
        $img->DeleteImage($_POST["postID"]);

        // then remove the post from the database
        $query = "DELETE FROM `posts` WHERE `postId` = " . $_POST["postID"];
        $result = $SQLconn->query($query);
    }

    header("Location: ../feed.php");

}

?>