<?php
// 製造被丟出的例外
require "ch6-7.php";

$drink = new Entree('Glass of Milk', 'milk');
if ($drink->hasIngredient('milk')) {
	print "Yummy!";
}