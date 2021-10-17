<!-- 顯示資料庫中的資料 -->
<?php
// 使用SQLite資料庫名稱'dinner.db'
$db = new PDO('sqlite:dinner.db');
// 定義餐點的種類
$meals = array('breakfast', 'lunch', 'dinner');
// 檢查送出的表單中"meal"變數值是不是"breakfast"
// "lunch"或"dinner"其中之一
if (in_array($_POST['meal'], $meals)) {
    // 如果是的話，取的相關餐點的菜名
    $stmt = $db->prepare('SELECT dish,price FROM meals WHERE meal LIKE ?');
    $stmt->execute(array($_POST['meal']));
    $rows = $stmt->fetchAll();
    // 如果找不到菜名
    if (count($rows) == 0) {
        print "No dishes available.";
    } else {
        // 再HTML表格中
        // 印出所有菜名與價格
        print '<table><tr><th>Dish</th><th>Price</th></tr>';
        foreach ($rows as $row) {
            print "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
        }
        print "</table>";
    }
} else {
    // 如果表單"meal" 變數值不是"breakfast"
    // "lunch"或"dinner"
    print "Unknow meal.";
}
