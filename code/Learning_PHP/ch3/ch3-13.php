<?php
// 用太空船運算子做不同資料型態的比較
// 因為1比12.7小，所以$a是負值
$a = 1 <=> 12.7;

// 因為字元"c"在"b"後面，所以$b是正值
$b = "charlie" <=> "bob";

// 進行數值字串比較時，行為同<跟>，不同於strcmp()
$x = "6 pack" <=> "55 card stud";
if ($x > 0) {
    print 'The string "6 pack" is greater than the string "55 card stud".';
} elseif ($x < 0) {
    print 'The string "6 pack" is less than the string "55 card stud".';
}

// 進行數值字串比較時，行為同<跟>，不同於strcmp()
$x = "6 pack" <=> "55";
if ($x > 0) {
    print 'The string "6 pack" is greater than the string "55".';
} elseif ($x < 0) {
    print 'The string "6 pack" is less than the string "55".';
}
