<?php
function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function validate($errors, $field) //Validation errors
{
    if (isset($errors[$field]) && !empty($errors[$field])) {
        echo '<div class="alert alert-danger text-center fw-bold alert-dismissible fade show" role="alert">';
        echo htmlspecialchars($errors[$field], ENT_QUOTES);
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }
}

function redirect($url) //Redirect 
{
    header("Location: $url");
}


function sanitizeData($val) //Sanitize and cast to string
{
    return isset($_POST[$val]) ? htmlspecialchars((string) $_POST[$val]) : '';
}

function sanitizeAndValidate($val, $type = 'string')
{
    if (!isset($_POST[$val])) {
        return '';
    }

    // Uzimanje vrednosti
    $value = $_POST[$val];

    // Kastovanje i validacija tipa podataka
    switch ($type) {
        case 'int':
            return filter_var($value, FILTER_VALIDATE_INT) !== false ? (int) $value : 0;

        case 'float':
            return filter_var($value, FILTER_VALIDATE_FLOAT) !== false ? (float) $value : 0.0;

        case 'boolean':
            return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) !== null ? (bool) $value : false;

        case 'string':
        default:
            // Sanitizacija stringa
            return htmlspecialchars((string) $value);
    }
}
/* Upotreba: */
/* $name = sanitizeAndValidateData('name', 'string'); */
/* $age = sanitizeAndValidateData('age', 'int'); */
/* $price = sanitizeAndValidateData('price', 'float');*/
/* $isActive = sanitizeAndValidateData('active', 'boolean');*/





$firstName = sanitizeData('firstName');
$lastName = sanitizeData('lastName');
$address = sanitizeData('address');

$data = [
    ':firstName' => $firstName,
    ':lastName' => $lastName,
    ':address' => $address
];
