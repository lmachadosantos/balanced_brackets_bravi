<?php

include_once 'verify_characters.php';

if ( ! isset( $_POST ) || empty( $_POST ) ) {

    echo json_encode( ['code' => 0, 'text' => 'Please check the characters.'] );
    exit;
}

$string = str_replace(' ', '', $_POST['characters']);


if ( preg_match('/^([(){}[\]]+)$/', $string) ) {
    echo json_encode( ['code' => 1,  'text' => verifyCharacters($string)] );
    exit;
}else{
    echo json_encode( ['code' => 0, 'text' => 'Please check the characters'] );
    exit;
}

