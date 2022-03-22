<?php
// https://www.cnblogs.com/miloyip/archive/2010/04/21/1717109.html
// 參照 https://www.gushiciku.cn/pl/pw6W/zh-tw
function get_rand(array $item_array)
{
	$total = array_sum($item_array);

	// 機率陣列迴圈
	foreach ($item_array as $key => $value) {
		$num = mt_rand(1, $total);
		if ($num <= $value) {
			// $result = $key;
			break;
		} else {
			$total -= $value;
		}
	}

	return $key;
}

function get_rate(array $item_array)
{
	// 取的百分比
	$result = array();
	$total = array_sum($item_array);
	foreach ($item_array as $key => $value) {
		$result[$key] = (round($value / $total, 2) * 100);
	}
	arsort($result);
	return $result;
}

$target = array(
	'1' => 1,
	'2' => 5,
	'6' => 50,
	'3' => 10,
	'4' => 12,
	'5' => 22,
);


// 測試程式
$temple_amount = 100000; // 樣本數
$count = 0;
$test_array = array();
while ($count <= $temple_amount) {
	// print($count);
	$count += 1;
	//根據回傳獲取獎項id
	$result = get_rand($target);
	if (!array_key_exists($result, $test_array)) {
		$test_array[$result] = 1;
	} else {
		$test_array[$result] += 1;
	}
}
$ans = get_rate($test_array);
asort($ans);
print_r($ans);
// asort($target);
// print_r($target);
