<?php
// 建立與使用物件
require "ch6-1.php";

// 實例化
$soup = new Entree;
$soup->name = 'Chicken Soup';
$soup->ingredients = array('chicken', 'water');

// 實例化
$sandwich = new Entree;
$sandwich->name = 'Chicken Sandwich';
$sandwich->ingredients = array('chicken', 'bread');

foreach (['chicken', 'lemon', 'bread', 'water'] as $ing) {
	if ($soup->hasIngredient($ing)) {
		print "Soup contains $ing.";
		echo "<br>";
	}
	if ($sandwich->hasIngredient($ing)) {
		print "Sandwich contains $ing.";
		echo "<br>";
	}
}
