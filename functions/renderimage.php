<?php 
function renderImg($img,$size){
    if (!empty($img)){
        return '<img src="../uploaded_images/' . htmlspecialchars($img) . '" width="'.$size.'px">';
    }
    else{
        return '<p>Missing image!</p>';
    } 
}

