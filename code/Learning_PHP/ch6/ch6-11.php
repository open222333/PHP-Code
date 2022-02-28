<?php
// 使用子類別
require "ch6-7.php";
require "ch6-10.php";

$soup = new Entree('CHicken Soup', array('chicken', 'water'));
$sandwich = new Entree('Chicken Sandwich', array('chicken', 'bread'));
$combo = new ComboMeal('Soup + Sandwich', array($soup, $sandwich));

foreach (['chicken', 'water', 'pickles'] as $ing) {
	if ($combo->hasIngredient($ing)) {
		print "Somthing in the combo contains $ing.\n";
	}
}
