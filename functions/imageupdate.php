<?php

function update_img($pdo, $oldImg, $newImg, $item)
{



    $filename = $newImg["name"];
    $filesize = $newImg["size"];
    $tempname = $newImg["tmp_name"];


    if (empty($filename)) {
        return "please select a file";
    }
    if (!isset($newImg) || $newImg['error'] !== UPLOAD_ERR_OK) {
        return "File upload failed";
    }

    if (!is_uploaded_file($tempname)) {
        return "Invalid uploaded file";
    }


    $file_info = new finfo(FILEINFO_MIME_TYPE);
    $mime_type = $file_info->file($tempname);

    $allowed_images = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/x-gif'];

    if (in_array($mime_type, $allowed_images) == false) {
        return "Only jpeg,jpg and png images are allowed";
    }
    $max_size = 4 * 1024 * 1024;

    if ($max_size < $filesize) {
        return "The image must not be larger than 2mb";
    }





    $folder = "../uploaded_images/" . $filename;
    // query to insert the submitted data
    $sql = "INSERT INTO images(filename) 
                    VALUES (:theFile)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':theFile' => $filename
    ));
    // Add the image to the "image" folder"        
    if (move_uploaded_file($tempname, $folder)) {


        $sql = "UPDATE items
                SET image = :img
                WHERE id = :itemid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':img' => $filename,
            'itemid' => $item['id']
        ));


        $sql = "DELETE from images where filename=:oldImg";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":oldImg" => $oldImg]);
        $oldPath = '../uploaded_images/' . $oldImg;

        if (file_exists($oldPath)) {
            unlink($oldPath);
        }
    } else {
        $msg = "Failed to upload image";
        return $msg;
    }
}
