<?php
// 使用use關鍵字
require "ch6-14.php";

use Tiny\Fruit as Snack;
use Tiny\Fruit;

Snack::munch("strawbreey");
echo "<br>";
Fruit::munch("orange");
