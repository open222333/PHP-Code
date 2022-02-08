<?php
// 用for() 印出select選單
print '<select name="people">';
for ($i = 1; $i <= 10; $i++) {
    print "<option>$i</option>\n";
}
print '</select>';
