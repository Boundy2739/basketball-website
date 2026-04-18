
<?php

function errorMessage($message,$redirect){
    $_SESSION['error'] = $message;
    header('Location:'.$redirect);
    exit;
}
function displayError(){
    if(isset($_SESSION['error'])){
        echo '<p class="error-message">'.htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8').'</p>';
        unset($_SESSION['error']);
    }
}

?>