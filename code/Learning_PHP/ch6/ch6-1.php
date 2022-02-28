<?php
// 定義一個類別
class Entree
{
	// 屬性
	public $name;
	public $ingredients = array();

	// 方法
	public function hasIngredient($ingredients)
	{
		return in_array($ingredients, $this->ingredients);
	}
}
