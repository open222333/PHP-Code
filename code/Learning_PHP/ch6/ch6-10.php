<?php
// 繼承類別
require "ch6-7.php";

class ComboMeal extends Entree
{
	public function hasIngredient($ingredients)
	{
		foreach ($this->ingredients as $entree) {
			if ($entree->hasIngredient($ingredients)) {
				return true;
			}
		}
		return false;
	}
}
