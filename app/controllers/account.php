<?php

namespace Controller;
session_start();
class Account 
{
    public function get()
    {
        $_SESSION['current'] = "account";
        $posts = \Model\Latest::getAccount();
        echo \View\Loader::make()->render("templates/latest.twig",
        array(
            "posts" => $posts,
            "current" => $_SESSION['current'],
            "username" => $_SESSION['username'],
            "dp" => $_SESSION['DPurl'],
            "uploadError" => $_SESSION['uploadError'],
            "uploadMsg" => $_SESSION['uploadMsg']
        ));
        $_SESSION['uploadError'] = "";
        $_SESSION['uploadMsg'] = "";
    }
    public function post()
    {
        $target_dir = "profilePICS/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $i = 0;
        for ($i = 0; $i < strlen($target_file); $i++)
        {
            echo $i;
            if($target_file[$i] == " ")
            {
                $target_file[$i] = "_";
            }
        }
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) 
        {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) 
            {
                $uploadOk = 1;
            } 
            else 
            {
                $uploadOk = 0;
                $_SESSION['uploadError'] = "File is not an image.";
                header("Location: /");
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) 
        {
            $uploadOk = 0;
            $_SESSION['uploadError'] = "Sorry, file already exists.";
            header("Location: /");
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) 
        {
            $uploadOk = 0;
            $_SESSION['uploadError'] = "Sorry, your file is too large.";
            header("Location: /");
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
        {
            $uploadOk = 0;
            $_SESSION['uploadError'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            header("Location: /");
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) 
        {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } 
        else 
        {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
            {
                \Model\Post::changeDP($target_file);
                $_SESSION['uploadMsg'] = "DP changed successfully.";
                header("Location: /");
            } 
            else 
            {
                $_SESSION['uploadError'] = "Sorry, there was an error uploading your file.";
                header("Location: /");
            }
        }
    }
}