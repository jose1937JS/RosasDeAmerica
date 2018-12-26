<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<h3>add item</h3>
	<form method="post" action="{{ url('add') }}">
		@csrf
		<input type="text" name="id" placeholder="id">
		<input type="text" name="name" placeholder="name">
		<input type="text" name="qty" placeholder="qty">
		<input type="text" name="price" placeholder="price">

		<button type="submit">enviar</button>
	</form><br><br>

	<h3>all items</h3><br><br>

	<table border="1">
		<thead>
			<th>rowid</th>
			<th>id</th>
			<th>name</th>
			<th>quantity</th>
			<th>price</th>
			<th>iva</th>
			<th>total</th>
		</thead>
		<tbody>
			@isset($items)
				@foreach ($items as $item)

					<tr>
						<td>{{ $item->rowId }}</td>
						<td>{{ $item->id }}</td>
						<td>{{ $item->name }}</td>
						<td>{{ $item->qty }}</td>
						<td>{{ $item->price }}</td>
						<td>{{ $item->tax }}</td>
						<td>{{ $item->total }}</td>
					</tr>

				@endforeach
			@endisset
		</tbody>
	</table>

</body>
</html>