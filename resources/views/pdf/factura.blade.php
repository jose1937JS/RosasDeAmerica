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

body. html
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
	margin: 1rem auto;
}

footer
{
	text-align:center;
	margin-top: 10rem;
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
	border-radius: .5rem;
	margin: 2% auto;
	height: 100%;
	text-align: left;

}
.table-container  table
{
	margin-top: 1rem;
	text-align: left;
	width: 100%;
}
.col-4
{
	width: 30.5%;
}
.date-table
{
	background: #90caf9;
	border-radius: .5rem;
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
}

	</style>
</head>
<body>
	<div class="container">
		<!-- Datos principales de la empresa-->
		<header>
			<!-- <p>FACTURA:</p> -->
			<p>FLORISTERIA ROSAS DE AMÉRICA C.A</p>
			<p>Calle 21, local 8 of Gold Avenue Center</p>
			<p>Amsterdam, Holanda.</p>
		</header>

		<div class="table-container">
			<!-- Datos principales de la factura parte 1-->
			<table >
				<thead>
					<tr>
						<th>Facturar a:</th>
						<th>Direccion de entrega:</th>
						<th>N° de factura:</th>
						<th>Fecha:</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Deyker Alexander Gil Aponte.</td>
						<td>Brookling New York, 1120. USA</td>
						<td>952</td>
						<td>03-02-1943</td>
					</tr>
				</tbody>
			</table>
			<!-- Datos principales de la factura parte 2-->
			<table>
				<thead>
					<tr>
						<th>Fecha de vencimiento:</th>
						<th  class="col-4">N° de pedido:</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>03-02-1943</td>
						<td  class="col-4">462</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- Datos del pedido -->
		<table class="date-table">
			<thead>
				<tr>
					<th>CANT:</th>
					<th>DESCRIPCION:</th>
					<th>PRECIO UNITARIO</th>
					<th>PRECIO TOTAL:</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>2</td>
					<td>Rosas Argentinas</td>
					<td>5$</td>
					<td>10$</td>
				</tr>
				<tr>
					<td>5</td>
					<td>Claveles Australianos</td>
					<td>3$</td>
					<td>15$</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Cataleyas Colombianas</td>
					<td>1.5$</td>
					<td>4.5$</td>
				</tr>
				<tr>
					<td>15</td>
					<td>Margaritas</td>
					<td>2$</td>
					<td>30$</td>
				</tr>
				<!-- Rows vacias para rellenar la tabla -->
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<!-- Final de las rows vacias para rellenar la tabla -->
				<tr>
					<td></td>
					<td></td>
					<td >TOTAL:</td>
					<td>59.5$</td>
				</tr>
			</tbody>
		</table>
		<!-- Final de la factura -->
		<footer class="footer">
			<p>¡Disfrute su compra!</p>
		</footer>
	</div>
</body>
</html>