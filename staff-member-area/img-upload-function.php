<?php
require_once "../pdo.php";
require_once '../project_header.php';
session_start();
if (!isset($_SESSION['authorised']) || $_SESSION['authorised'] !== true) {
    
    header('Location: login_form.php');
    exit;
    }
else{
    $result = NULL;

function upload_img(){
    require_once "pdo.php";
    $itemid = $_GET['itemid'];
    if (!isset($_SESSION['authorized']) || $_SESSION['authorized'] !== true) {
    
    header('Location: login_form.php');
    exit;
    }
    else {
            
            $filename = $_FILES["choosefile"]["name"];
            $filesize = $_FILES["choosefile"]["size"];
            $tempname = $_FILES["choosefile"]["tmp_name"];
            

            if(empty($filename)){
                return "please select a file";
                
            }
            if (!isset($_FILES['choosefile']) || $_FILES['choosefile']['error'] !== UPLOAD_ERR_OK) {
                return "File upload failed";
            }
            
            if (!is_uploaded_file($tempname)) {
                return "Invalid uploaded file";
            }
            

            $file_info = new finfo(FILEINFO_MIME_TYPE);
            $mime_type = $file_info ->file($tempname);

            $allowed_images = ['image/jpg','image/jpeg','image/png','image/gif','image/x-gif'];

            if (in_array($mime_type,$allowed_images) == false){
                return "Only jpeg,jpg and png images are allowed";
                

            }
            $max_size = 4 * 1024 * 1024;

            if($max_size < $filesize){
                return "The image must not be larger than 2mb";
            }

            



            $folder = "uploaded_images/" . $filename;
            // query to insert the submitted data
            $sql = "INSERT INTO images(filename) 
                    VALUES (:theFile)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':theFile' => $filename));
            // Add the image to the "image" folder"        
            if (move_uploaded_file($tempname, $folder)) {
                $sql = "UPDATE items
                SET image = :img
                WHERE id = :itemid";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                    ':img' => $filename,
                    'itemid' => $itemid));
                echo "<script>document.location = 'stock' </script>";
            } else {
                $msg = "Failed to upload image";
                return $msg;
            }
            /*echo "<br><br>";
            $stmt = $pdo->query("SELECT * FROM images");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            print_r($rows);*/
            
        
    }}}

/*$sql = "SELECT * FROM users WHERE user_id = :user";
//just for demonstration - delete
//echo("<pre>\n".$sql."\n</pre>\n");
$stmt = $pdo->prepare($sql);
$stmt->execute(['user' => $_SESSION['user']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
//$user = $stmt->fetchColumn();
//just for demonstration - delete
//print_r($user);
$username = $user["name"];
$page_title = "Image Upload in PHP";
title_bar($page_title);*/
?>