<?php 
function renderImg($img){
    if (!empty($img)){
        return '<img src="../uploaded_images/' . htmlspecialchars($img) . '" width="150px">';
    }
    else{
        return '<p>Missing image!</p>';
    } 
}

