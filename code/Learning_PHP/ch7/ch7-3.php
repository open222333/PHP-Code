<!-- 印出表單參數 -->
<form method="POST" action="catalog.php">
	<input type="text" name="product_id">
	<select name="category">
		<option value="ovenmitt">Pot Holder</option>
		<option value="fryingpan">Frying Pan</option>
		<option value="torch">Kitchen Torch</option>
	</select>
	<input type="submit" name="submit">
</form>

<!-- 使用空連結運算子?? 避免PHP沒有POST變數值時產生錯誤 -->
Here are the submitted values:
</br>
product_id: <?php
			print $_POST['product_id'] ?? '';
			// 如果POST沒有product_id值 則回傳 ''
			?>
</br>
category: <?php print $_POST['category'] ?? '' ?>