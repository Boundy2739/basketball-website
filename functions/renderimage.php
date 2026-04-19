<?php 
function renderImg($img,$size,$alt){
    if (!empty($img)){
        return '<img src="'.BASE_URL.'uploaded_images/' . htmlspecialchars($img) . '" width="'.$size.'" alt="'.htmlspecialchars($alt).'">';
    }
    else{
        return '<p>Missing image!</p>';
    } 
}

