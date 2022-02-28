<?php
// 函式傳回true 或 false
function restaurant_check($meal, $tax, $tip)
{
	$tax_amount = $meal * ($tax / 100);
	$tip_amount = $meal * ($tip / 100);
	$total_amount = $meal + $tax_amount + $tip_amount;

	return $total_amount;
}

function can_pay_cash($cash_on_hand, $amount)
{
	if ($amount > $cash_on_hand) {
		return false;
	} else {
		return true;
	}
}

$total = restaurant_check2(15.22, 8.25, 15);
if (can_pay_cash(20, $total)) {
	print 'I can py with cash.';
} else {
	print 'Time for the credit card.';
}
