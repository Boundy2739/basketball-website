<?php
function update_img($pdo, $oldImg, $newImg, $item)
{

    $image = validateImg($pdo, $newImg);

    // Add the image to the "image" folder"        
    if ($image) {
        $sql = "UPDATE items
                SET image = :img
                WHERE id = :itemid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':img' => $image,
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
