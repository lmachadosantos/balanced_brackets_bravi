<?php

function verifyCharacters($string)
{
    $arr = [];

	for($i=0; $i < strlen($string); $i++)
	{
        if($string[$i] == '(' || $string[$i] == '{' || $string[$i] == '[')
            array_push($arr, $string[$i]);
        elseif($string[$i] == ')' || $string[$i] == '}' || $string[$i] == ']'){
            if(count($arr) == 0 || !checkOpeningClosing($arr[count($arr) - 1], $string[$i]))
                return $string . ' is not valid.';
            else
                array_pop($arr);
        }
    }
	return (count($arr) == 0) ? $string . ' is valid.' : $string . ' is not valid.';
}

function checkOpeningClosing($opening, $closing)
{
    if($opening == '(' && $closing == ')')
        return true;

    elseif($opening == '{' && $closing == '}')
        return true;

    elseif($opening == '[' && $closing == ']')
        return true;

    return false;
}