<?php 
require 'errormessages.php';
function validate_names($name){
    if(!preg_match("/^[\p{L}'-]+$/u", $name)){
        return false;
    }
    else {
        return true;
    }
}

function validate_email($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return $email ;
    }
    else{
        errorMessage("Invalid email",$_SESSION['return_page']);
    }
}

function validate_integers($number){
    if(filter_var($number,FILTER_VALIDATE_INT)){
        return $number;
    }
    errorMessage("Invalid quantity",$_SESSION['return_page']);
    
}

function validate_floats($float){
    if(filter_var($float,FILTER_VALIDATE_FLOAT)){
        return $float;
    }
    errorMessage("Invalid price",$_SESSION['return_page']);
}

function validate_passwords($password) {

    // Minimum 8 chars, at least 1 uppercase, 1 special char
    $pattern = "/^(?=.*[A-Z])(?=.*[\W_]).{8,}$/";

    if (!preg_match($pattern, $password)) {
        return false;
    }

    return $password;
}

function nameLength($name){
    if (strlen($name) <= 50) {
        return $name;
    }
    errorMessage("Text exceeded 50 characters limit",$_SESSION['return_page']);

}
function descriptionLength($description){
    if (strlen($description) <= 500) {
        return $description;
    }
    errorMessage("Text exceeded 500 characters limit",$_SESSION['return_page']);
}

function validateSurfaceType($surface){
    if(in_array(strtolower($surface), ['outdoor','indoor','both']));
    return strtolower($surface);
}