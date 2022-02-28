<?php
// 將回傳值傳到另一個函式
function restaurant_check($meal, $tax, $tip)
{
	$tax_amount = $meal * ($tax / 100);
	$tip_amount = $meal * ($tip / 100);
	$total_amount = $meal + $tax_amount + $tip_amount;

	return $total_amount;
}

function payment_method($cash_on_hand, $amount)
{
	if ($amount > $cash_on_hand) {
		return 'credit card';
	} else {
		return 'cash';
	}
}

$total = restaurant_check(15.22, 8.25, 15);
$method = payment_method(20, $total);
print 'I will pay with' . $method;
