<?php
// 改變參數的值
function countdown($top)
{
	while ($top > 0) {
		print "$top..";
		$top--;
	}
	print "boom!\n";
	echo "<br>";
}

$counter = 5;
countdown($counter);
print "Now, counter is $counter";
