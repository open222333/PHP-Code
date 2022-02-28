<?php
// 宣告參數型態
function countdown(int $top)
{
	while ($top > 0) {
		print "$top..";
		$top--;
	}
	print "boom!\n";
}

$counter = 5;
countdown($counter);
print "Now, counter is $counter";
