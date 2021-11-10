<!-- here document -->
<?php
$page_title = "Menu";
$meat = "pork";
$vegetable = "bean sprout";
print <<<MENU
<html>
<head><title>$page_title</title></head>
<body>
<ul>
<li> Barbecued $meat
<li> Sliced $meat
<li> Braised $meat with $vetetable
</ul>
</body>
</html>
MENU;