<?php
// 使用for() 修改表格列的class
$row_styles = array('even', 'odd');
$dinner = array('Sweet Corn and Asparagus', 'Lemon Chicken', 'Braised Bamboo Fungus');
print "<table>\n";
for ($i = 0, $num_dishes = count($dinner); $i < $num_dishes; $i++) {
	print '<tr class = "' . $row_styles[$i % 2] . '">';
	print "<td>Element $i </td><td>$dinner[$i]</td></tr>\n";
}
print "</table>";
// 利用$i % 2計算出是第幾列
