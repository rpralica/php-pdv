<?php
function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function redirect($url) //Redirect 
{
    header("Location: $url");
}


function sanitizeData($val) //Sanitize and cast to string
{
    return isset($_POST[$val]) ? htmlspecialchars((string) $_POST[$val]) : '';
}

// Funkcija za validaciju grešaka
function validate($errors, $field)
{
    if (isset($errors[$field]) && !empty($errors[$field])) {
        return '<div class="alert alert-danger text-center fw-bold alert-dismissible fade show container border border-5 border-white" role="alert">' .
            htmlspecialchars($errors[$field], ENT_QUOTES) .
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' .
            '</div>';
    }
    return ''; // Ako nema greške, vraća praznu vrednost
}

function calcMinus($vrijednost, $postotak)
{
    $pdv = $vrijednost / (1 + ($postotak / 100));
    $pdv = round($pdv, 2);
    $iznosBezPdv = $vrijednost - $pdv;
    $iznosBezPdv = round($iznosBezPdv, 2);
    return [$iznosBezPdv, $pdv];
}

function calcPlus($vrijednost, $postotak)
{
    $pdv = $vrijednost * (($postotak / 100));
    $pdv = round($pdv, 2);
    $iznosSaPdv = $vrijednost + $pdv;
    $iznosSaPdv = round($iznosSaPdv, 2);
    return [$iznosSaPdv, $pdv];
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


function vdm ($a) {

    echo "<pre>";
        var_dump($a);
        echo "</pre>";
    
};


$firstName = sanitizeData('firstName');
$lastName = sanitizeData('lastName');
$address = sanitizeData('address');

$data = [
    ':firstName' => $firstName,
    ':lastName' => $lastName,
    ':address' => $address
];
