<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Umur Akun</th>
				<th>Status Akun</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($semuaPedagang as $row): ?>
				<tr>
					<td><?= $row->umurAkun ?></td>
					<td><?= $row->statusAkun ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>