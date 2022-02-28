<?php
// 定義靜態方法
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

	// 靜態方法
	// 無法使用$this 因為不是作用於物件而是類別
	public static function getSizes()
	{
		return array('small', 'medium', 'large');
	}
}
