<?php

// usuwa polskie znaki
function stripAccents($string) {
    return strtr($string, array(
        'Ą' => "A",
        'ą' => 'a',
        'Ć' => 'C',
        'ć' => 'c',
        'Ę' => 'E',
        'ę' => 'e',
        'Ł' => 'L',
        'ł' => 'l',
        'Ń' => 'N',
        'ń' => 'n',
        'Ó' => 'O',
        'ó' => 'o',
        'Ś' => 'S',
        'ś' => 's',
        'Ż' => 'Z',
        'ż' => 'z',
        'Ź' => 'Z',
        'ź' => 'z',
    ));
}
