<?php
	$file = file("data/data.csv");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border="1">
	<?php foreach ($file as $key => $line) : ?>
		<?php $data = explode(',',$line); ?>
		<tr>
			<td><?php echo $key + 1 ?></td>
			<td><?php echo $data[0] ?></td>
			<td><?php echo $data[1] ?></td>
			<td><?php echo $data[2] ?></td>
		</tr>
	<?php endforeach; ?>
	</table>

</body>
</html>