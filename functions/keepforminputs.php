<?php
function saveFormData()
{
    $_SESSION['form_data'] = $_POST;
}

function deleteFormData()
{
    unset($_SESSION['form_data']);
}

function restoreFormData($key,$dbdata)
{
    return $_SESSION['form_data'][$key] ?? $dbdata;
}
