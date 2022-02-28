<?php
// 回傳值的屬性宣告
function restaurant_check($meal, $tax, $tip): float
{
	$tax_amount = $meal * ($tax / 100);
	$tip_amount = $meal * ($tip / 100);
	$total_amount = $meal + $tax_amount + $tip_amount;

	return $total_amount;
}
