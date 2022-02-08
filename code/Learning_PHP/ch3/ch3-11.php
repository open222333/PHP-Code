<?php
// 數字與字串的比較
// 這兩個值使用字典順序進行比較
if ("x54321" > "x5678") {
    print 'The string "x54321" is greater than the string "x5678".';
} else {
    print 'The string "x54321" is not greater than the string "x5678".';
}

// 這兩個值使用數值大小進行比較
if ("54321" > "5678") {
    print 'The string "54321" is greater than the string "5678".';
} else {
    print 'The string "54321" is not greater than the string "5678".';
}

// 這兩個值使用字典順序進行比較
if ("6 pack" < "55 card stud") {
    print 'The string "6 pack" is less than the string "55 card stud".';
} else {
    print 'The string "6 pack" is not less than the string "55 card stud".';
}

// 這兩個值使用數值大小進行比較
if ("6 pack" < "55") {
    print 'The string "6 pack" is less than the string "55".';
} else {
    print 'The string "6 pack" is not less than the string "55".';
}
