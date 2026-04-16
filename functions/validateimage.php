<?php
function validateImg($pdo,$image)
{
    if (isset($image) && $image['error'] === 0) {
        $imagename = $image['name'];
        $imagesize = $image["size"];
        $tempname = $image["tmp_name"];


        $file_info = new finfo(FILEINFO_MIME_TYPE);
        $mime_type = $file_info->file($tempname);

        $allowed_images = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/x-gif'];

        if (in_array($mime_type, $allowed_images) === false) {
            errorMessage("Invalid image type, jpg/jpeg/png only",$_SESSION['return_page']);
        }
        $max_size = 4 * 1024 * 1024;

        if ($max_size < $imagesize) {
            errorMessage("Image size exceeds 4MB",$_SESSION['return_page']);
            exit;
        }

        $folder = "../uploaded_images/" . $imagename;
        // query to insert the submitted data
        $sql = "INSERT INTO images(filename) 
                VALUES (:theFile)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':theFile' => $imagename
        ));
        if(move_uploaded_file($tempname, $folder)){
            return $imagename; 
        }
        errorMessage("Invalid image",$_SESSION['return_page']);
    }
}
