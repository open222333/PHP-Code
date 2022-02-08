<?php
// 在for()中使用多個條件是
print '<select name="doughnuts"';
for ($min = 1, $max = 10; $min < 50; $min += 10, $max += 10) {
    print "<option>$min - $max</option>\n";
}
print '</select>';
