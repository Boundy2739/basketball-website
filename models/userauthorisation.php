<?php 
function alreadyAuthorised(){
    if(isset($_SESSION['authorised']) && $_SESSION['authorised'] === true) {

        header('Location: membersarea.php');
        exit;
    }
}

function requireAuthorisation(){
    if (!isset($_SESSION['authorised']) || $_SESSION['authorised'] !== true) {

        header('Location: login_form.php');
        exit;
    }
    
}

?>