
<?php

function errorMessage($message,$redirect){
    $_SESSION['error'] = $message;
    header('Location:'.$redirect);
    exit;
}
function displayError(){
    if(isset($_SESSION['error'])){
        echo '<p class="error-message">'.$_SESSION['error'].'</p>';
        unset($_SESSION['error']);
    }
}

?>