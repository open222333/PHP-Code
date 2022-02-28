<?php
// 在一個函式中加入多個return述句
function payment_method($cash_on_hand, $amount)
{
	if ($amount > $cash_on_hand) {
		return 'credit card';
	} else {
		return 'cash';
	}
}
