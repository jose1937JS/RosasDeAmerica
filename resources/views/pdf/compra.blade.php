<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Reporte de entrega</title>
	<style>

@media all {

	*
	{
		margin:0;
		padding: 0;
	}

	body,html
	{
		font-size: 16px;
		box-sizing: border-box;
	}

	.container
	{
		width: 90%;
		margin: 1rem 5%;
	}

	.header
	{
		padding: .5rem;
		background: #e3f2fd;
		border-radius: .5rem;
		margin-bottom: .8rem;
		border: thin solid #90caf9;
	}
	.header-item-1
	{
		display: inline-block;
		width: 100%;
		/*background: #e3f2fd;*/
	}


	.header-item-2
	{
		margin-top: 1rem;
		/*background: #e3f2fd;*/
	}

	.header-item-3
	{
		margin-top: 1rem;
		margin-bottom: 1rem;
		/*background: #e3f2fd;*/
	}

	table
	{
		background-color: #90caf9;
		border-radius: .5rem;
		text-align: center;
		width: 100%;
	}

	.date-table thead
	{
		height: 2rem;
	}

	.date-table td,  td
	{
		background: #e3f2fd;
		height: 3rem;
	}

	.footer
	{
		margin-top: 4rem;
		text-align: right;
	}
}
	</style>
</head>
<body>
	<div class="container">
		<header class="header">
			<div class="header-item-1">
				<p class="date">Proveedor: {{ $data->supplier->name }}</p>
				<p>Dirección: {{ $data->supplier->address }}</p>
				<p>Telefono: {{ $data->supplier->phone }}</p>
				<p>Email: {{ $data->supplier->email }}</p>
				<p>Rif: {{ $data->supplier->rif }}</p>
			</div>
			<div class="header-item-2">
				<p>Cliente: Rosas de América C.A.</p>
				<p>Direccion: Avenida Santa Isabel, Sector Cementerio</p>
				<p>Telefono: 0000-000-00-00</p>
			</div>
			<div class="header-item-3">
				<p>Fecha: {{ $data->created_at }}</p>
				<p>Factura: {{ $data->id }}</p>
			</div>
		</header>
		<table>
			<thead>
				<tr>
					<th>Cantidad:</th>
					<th>Producto:</th>
					<th>Total:</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{ $data->quantity }}</td>
					<td>{{ $data->product }}</td>
					<td>{{ $data->price }} BsS</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td >TOTAL:</td>
					<td>{{ $data->price * $data->quantity }} BsS</td>
				</tr>
			</tbody>
		</table>
		<footer class="footer">
			<p>N° control:</p>
			<p>{{ random_int(10, 99).'-'.random_int(00001, 99999) }}</p>
		</footer>
	</div>
</body>
</html>