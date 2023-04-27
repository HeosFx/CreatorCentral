<?php

class ImgFileUploader
{

    private $savePath = "uploads/";
    private $SQLconn;
    public $hasAdequateFile = false;
    public $errorText = "";

    // Constructor for the class. Needs reference to database connection
    //----------------------------------------------------------
    function __construct(&$connect)
    {
        $this->SQLconn = $connect;
        $this->hasAdequateFile = $this->IsBufferFileAdequate();
    }

    // Method to identify if an adequate image file is buffered in $_FILES
    //----------------------------------------------------------
    function IsBufferFileAdequate()
    {
        if ($_FILES['imageFile']['size'] != 0) {
            if ($_FILES['imageFile']['size'] > 5242880) {
                $this->errorText = "Fichier trop grand! Respectez la limite de 5Mo.";
                return false;
            } elseif ($_FILES['imageFile']['type'] == "image/jpeg" || $_FILES['imageFile']['type'] == "image/png" || $_FILES['imageFile']['type'] == "image/gif") {
                return true;
            } else {
                $this->errorText = "Type de fichier non accepté! Images JPG et PNG seulement.";
                return false;
            }
        } else {
            $this->errorText = "No file or file size = 0";
            return false;
        }
    }

    // Attempt to save the buffered file in the server. If successful, updates post to add image
    //----------------------------------------------------------
    function SaveFileAsNew($postID)
    {

        if ($this->hasAdequateFile) {

            $file = $_FILES['imageFile']['name'];
            $path = pathinfo($file); //permet d'analyser le fichier et d'obtenir des choses comme son extension
            $ext = $path['extension'];

            //Get the temp name of the file and build the destination path
            $temp_name = $_FILES['imageFile']['tmp_name'];
            $new_filename = $this->SQLconn->loginStatus->userName . "_" . date("mdyHis");
            $path_filename_ext = $this->savePath . $new_filename . "." . $ext;

            // Check if file already exists
            if (file_exists($path_filename_ext)) {
                $this->errorText = "Error, somehow the file already exists";
            } else {
                $test = move_uploaded_file($temp_name, __ROOT__ . '/' . $path_filename_ext);
                echo "<h1> '$test'</h1>";

                //If we reach here, upload is successful. so we update the post matching the ID
                $this->UpdateImageInPost($postID, $path_filename_ext);

                $this->errorText = "Congratulations! File Uploaded Successfully.";
            }
            echo $this->errorText;
        }
    }

    // Constructor for the class. Needs reference to database connection
    //----------------------------------------------------------
    function OverrideOldFile($postID)
    {
        //The difference with saving a new file : we have to delete the old
        //Get path of old through query
        $this->DeleteImage($postID);

        //After that, save new file as if it were new
        $this->SaveFileAsNew($postID);
    }

    // Method to update the img URL in the database using SQLconn
    //----------------------------------------------------------
    function UpdateImageInPost($postID, $path_filename_ext)
    {
        // Parse the path so that the image can be loaded
        $query = "UPDATE `posts` SET `picturePath`='$path_filename_ext' WHERE `postId`= $postID";
        $this->SQLconn->conn->query($query);
    }

    // Method to delete an image from the files
    //----------------------------------------------------------
    function DeleteImage($postID){
        $query = "SELECT `picturePath` FROM `posts` WHERE `postId`= $postID";
        $result = $this->SQLconn->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            if (file_exists(__ROOT__ . '/' . ($row["picturePath"]))) {
                unlink(__ROOT__ . '/' . $row["picturePath"]);
            }
        }
    }
}

?>