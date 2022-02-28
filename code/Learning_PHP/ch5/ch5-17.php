<?php
// 在if()中使用回傳值
function restaurant_check($meal, $tax, $tip)
{
	$tax_amount = $meal * ($tax / 100);
	$tip_amount = $meal * ($tip / 100);
	$total_amount = $meal + $tax_amount + $tip_amount;

	return $total_amount;
}

if (restaurant_check2(15.22, 8.25, 15)) {
	print 'Less than $20, I can pay cash.';
} else {
	print 'Too expensive, I need my credit card.';
}
