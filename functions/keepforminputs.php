<?php

function saveFormData()
{
    deleteFormData();
    $_SESSION['form_data'] = array();
    foreach ($_POST as $data) {
        array_push($_SESSION['form_data'], $data);
    }
}
function deleteFormData(){
    if (isset($_SESSION['form_data'])) {
        unset($_SESSION['form_data']);
    }
}
function restoreFormData($data)
{
    if (isset($_SESSION['form_data'][$data])) {
        return $_SESSION['form_data'][$data];
    }
}
