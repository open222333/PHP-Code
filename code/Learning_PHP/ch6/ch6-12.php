<?php
// 使用子類別
require "ch6-7.php";

class ComboMeal extends Entree
{
	public function __construct($name, $entrees)
	{
		// parent與this類似 在ComboMeal,parent表示Entree
		parent::__construct($name, $entrees);
		foreach ($entrees as $entree) {
			// 判斷 $entree 是否為 Entree物件
			if (!$entree instanceof Entree) {
				throw new Exception('Element of $entrees must be Entree objects');
			}
		}
	}

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
