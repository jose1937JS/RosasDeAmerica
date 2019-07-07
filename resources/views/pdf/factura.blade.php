<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Factura| FLORISTERIA ROSAS DE AMERICA C.A</title>
	<style>

*{
	margin: 0;
	border: 0;
	box-sizing: border-box;
}

body, html
{
	font-size: 16px;
	font-family: sans-serif;
}

/* Datos de la empresa. */
header
{
	text-align: center;
	font-size: 1.2em;
}
header p
{
	/*margin: 1rem auto;*/
}

footer
{
	text-align:center;
	margin-top: 2rem;
	font-size: 1.5rem;
}

/* Contenedor principal. */
.container
{
	/*border: thin solid black;*/
	margin: 2% 5%;
	width: 90%;
}

/* Contenedor de las tablas superiores */
.table-container
{
	background: #90caf9;
	border-radius: .5rem .5rem 0 0;
	margin-top: 4%;
}
.table-container table
{
	margin-top: 1rem;
	text-align: left;
	width: 100%;
}
.date-table
{
	background: #90caf9;
	border-radius: 0 0 .5rem .5rem;
	text-align: left;
	width: 100%;
}
.date-table thead
{
	height: 2rem;
}
.date-table td, .table-container td
{
	background: #e3f2fd;
	height: 3rem;
	padding-left: 8px:
}

th { padding-left: 8px: }

.info{
	text-align: center;
	margin-top: 20px
}

.qr {
	text-align: center;
	margin-top: 20px;
}

	</style>
</head>
<body>
	<div class="container">
		@if( $data )
			<!-- Datos principales de la empresa-->
			<header>
				<!-- <p>FACTURA:</p> -->
				<p>FLORISTERIA ROSAS DE AMÉRICA C.A</p>
				<p>Avenida Santa Isabel, Sector Cementerio</p>
				<p>San Juan de los Morros, Edo Guárico</p>
			</header>

			<div class="table-container">
				<!-- Datos principales de la factura parte 1-->
				<table >
					<thead>
						<tr>
							<th>Facturar a:</th>
							<th>Direccion de entrega:</th>
							<th>Fecha:</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $people[0]->pin.' - '.$people[0]->first_name.' '.$people[0]->last_name }}</td>
							<td>{{ $people[0]->address.', '.$data[0]->sale->address_one.', '.$data[0]->sale->address_two }}</td>
							<td>{{ $data[0]->created_at }}</td>
						</tr>
					</tbody>
				</table>
				<!-- Datos principales de la factura parte 2-->
				<table>
					<thead>
						<tr>
							<th>N° de factura:</th>
							<th>Método de pago:</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $data[0]->sale->id }}</td>
							<td>{{ $data[0]->sale->pay_method }}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- Datos del pedido -->
			<table class="date-table">
				<thead>
					<tr>
						<th>CANT:</th>
						<th>PRODUCTO:</th>
						<th>DESCRIPCION:</th>
						<th>PRECIO:</th>
						<th>PRECIO TOTAL:</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data as $d )
						<tr>
							<td>{{ $d->quantity }}</td>
							<td>{{ $d->product->product }}</td>
							<td>{{ $d->product->description }}</td>
							<td>{{ $d->product->price }}</td>
							<td>{{ $d->product->price * $d->quantity }} Bs</td>
						</tr>
					@endforeach
					<!-- Rows vacias para rellenar la tabla -->
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<!-- Final de las rows vacias para rellenar la tabla -->
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td >IVA:</td>
						<td>{{ $iva }} Bs</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td >TOTAL:</td>
						<td>{{ $data[0]->sale->amount }} Bs</td>
					</tr>
				</tbody>
			</table>

			<div class="qr">
				<img src="./qrcodes/facturacliente.png" alt="404">
			</div>

			<!-- Final de la factura -->
			<footer class="footer">
				<p>¡Disfrute su compra!</p>
			</footer>
		@else
			<h1 class="info">No hay data para mostrar</h1>
		@endif
	</div>
</body>
</html>