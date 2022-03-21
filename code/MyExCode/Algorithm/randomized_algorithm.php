<?php
// https://www.cnblogs.com/miloyip/archive/2010/04/21/1717109.html
/*
 * 幾率演算法，
 * $proArr是一個預先設定的陣列，
 * 假設陣列為：array(100,200,300，400)，
 * 開始是從1,1000 這個概率範圍內篩選第一個數是否在他的出現概率範圍之內，
 * 如果不在，則將概率空間，也就是k的值減去剛剛的那個數字的概率空間，
 * 在本例當中就是減去100，也就是說第二個數是在1，900這個範圍內篩選的。
 * 這樣 篩選到最終，總會有一個數滿足要求。
 * 就相當於去一個箱子裡摸東西，
 * 第一個不是，第二個不是，第三個還不是，那最後一個一定是。
 * 這個演算法簡單，而且效率非常高，
 * 這個演算法在大資料量的專案中效率非常棒。
 */
function get_rand($proArr)
{
	$result = '';
	//概率陣列的總概率精度
	$proSum = array_sum($proArr);
	//概率陣列迴圈
	foreach ($proArr as $key => $proCur) {
		$randNum = mt_rand(1, $proSum);
		if ($randNum <= $proCur) {
			$result = $key;
			break;
		} else {
			$proSum -= $proCur;
		}
	}
	unset($proArr);
	return $result;
}


/*
 * 獎項陣列
 * 是一個二維陣列，記錄了所有本次抽獎的獎項資訊，
 * 其中id表示中獎等級，prize表示獎品，v表示中獎概率。
 * 注意其中的v必須為整數，你可以將對應的 獎項的v設定成0，即意味著該獎項抽中的機率是0，
 * 陣列中v的總和（基數），基數越大越能體現概率的準確性。
 * 本例中v的總和為100，那麼平板電腦對應的 中獎概率就是1%，
 * 如果v的總和是10000，那中獎概率就是萬分之一了。
 *
 */
$prize_arr = array(
	'0' => array('id' => 1, 'prize' => '平板電腦', 'v' => 1),
	'1' => array('id' => 2, 'prize' => '數碼相機', 'v' => 5),
	'2' => array('id' => 3, 'prize' => '音箱裝置', 'v' => 10),
	'3' => array('id' => 4, 'prize' => '4G優盤', 'v' => 12),
	'4' => array('id' => 5, 'prize' => '10Q幣', 'v' => 22),
	'5' => array('id' => 6, 'prize' => '下次沒準就能中哦', 'v' => 50),
);

/*
 * 每次前端頁面的請求，PHP迴圈獎項設定陣列，
 * 通過概率計算函式get_rand獲取抽中的獎項id。
 * 將中獎獎品儲存在陣列$res['yes']中，
 * 而剩下的未中獎的資訊儲存在$res['no']中，
 * 最後輸出json個數資料給前端頁面。
 */
foreach ($prize_arr as $key => $val) {
	$arr[$val['id']] = $val['v'];
}
$rid = get_rand($arr); //根據概率獲取獎項id

$res['yes'] = $prize_arr[$rid - 1]['prize']; //中獎項
unset($prize_arr[$rid - 1]); //將中獎項從陣列中剔除，剩下未中獎項
shuffle($prize_arr); //打亂陣列順序
for ($i = 0; $i < count($prize_arr); $i++) {
	$pr[] = $prize_arr[$i]['prize'];
}
$res['no'] = $pr;
print_r($res);
