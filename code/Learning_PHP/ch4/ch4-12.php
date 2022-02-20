<?php
// 在for()中使用數值陣列
$dinner = array('Sweet Corn and Asparagus', 'Lemon Chicken', 'Braised Bamboo Fungus');
for ($i = 0, $num_dishes = count($dinner); $i < $num_dishes; $i++) {
	print "Dish number $i is $dinner[$i]\n";
}
