Selected buns:
<br />
<?php
if (isset($_POST['lunch'])) {
	foreach ($_POST['lunch'] as $choice) {
		print "You want a $choice bun. <br/>";
	}
}
