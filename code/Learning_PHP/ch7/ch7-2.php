<?php
// 有兩個元素的表單
print <<<_HTML_
<form method="POST" action="catalog.php">
	<input type="text" name="product_id">
	<select name="category">
		<option value="ovenmitt">Pot Holder</option>
		<option value="fryingpan">Frying Pan</option>
		<option value="torch">Kitchen Torch</option>
	</select>
	<input type="submit" name="submit">
</form>
_HTML_;
