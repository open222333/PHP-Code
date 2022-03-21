<?php
$str1 = 'http://tttt.ieada.casdcawd.awdsdsacs.dasdwxcacwf.com/ccccddada';
$str2 = 'https://tttt.ddd/ccccddada';

$pat = '/[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(\.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+\.?/';

$isMatched1 = preg_match($pat, $str1, $matches1);
$isMatched2 = preg_match($pat, $str2, $matches2);

// 替換
$r_replace = preg_replace($pat, 'test.com', $str2);

$test_str = 'tttt.ieada.casdcawd.awdsdsacs.dasdwxcacwf.com';
$r_bool = ($test_str === $matches1[0]);

var_dump($isMatched1, $matches1[0]);
var_dump($r_replace);
var_dump($r_bool);