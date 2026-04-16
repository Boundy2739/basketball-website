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
        errorMessage("Invalid email","../staff-member-area/addmember.php");
    }
}

function validate_integers($number){
        return filter_var($number,FILTER_VALIDATE_INT);
    
}

function validate_floats($float){
    
        return filter_var($float,FILTER_VALIDATE_FLOAT);
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
}

function validateSurfaceType($surface){
    if(in_array(strtolower($surface), ['outdoor','indoor','both']));
    return strtolower($surface);
}