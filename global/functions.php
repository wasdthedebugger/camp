<?php

function displayLimited($string, $limit){
    if(strlen($string) > $limit){
        $string = substr($string, 0, $limit) . "...";
    }
    return $string;
}