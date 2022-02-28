<?php
// 變更屬性的可視性
class Entree
{
	private $name;
	protected $ingredients = array();

	/* 因為$name是private 所以建立此方法讀取 */
	public function getName()
	{
		return $this->name;
	}

	public function __construct($name, $ingredients)
	{
		if (!is_array($ingredients)) {
			throw new Exception('$ingredients must be an array');
		}
		$this->name = $name;
		$this->ingredients = $ingredients;
	}

	public function hasIngredient($ingredient)
	{
		return in_array($ingredient, $this->ingredients);
	}
}
