<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte de ventas diarias</title>
	<link rel="stylesheet" href="{{ asset('css/mdb.css') }}">
</head>
<body>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<h3 class="text-center">FLORISTERIA ROSAS DE AMÉRICA C.A <br>
				Avenida Santa Isabel, Sector Cementerio <br>
				San Juan de los Morros, Edo Guárico</h3>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col">
				<h4 class="text-center mb-5 font-weight-bold">Reporte de Ventas de hoy {{ today() }}</h4>
				<table class="table table-bordered table-sm text-center">
					<thead>
						<tr>
							<th>Fecha</th>
							<th>Precio Total</th>
							<th>Cliente</th>
							<th>Productos Comprados</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($data as $v)
							<tr>
								<td>{{ $v->created_at }}</td>
								<td>{{ $v->amount }}</td>
								<td>{{ $v->first_name .' '. $v->last_name }}</td>
								<td>
									<table class="table table-sm">
										<thead>
											<th>Producto</th>
											<th>Cantidad</th>
										</thead>
										<tbody>
											@foreach ($v->productos as $p)
												<tr>
													<td>{{ $p->product }}</td>
													<td>{{ $p->quantity }}</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script>
		addEventListener('load', () => {
			setTimeout(function(){
				print()
				history.back()
			}, 800)

		})
	</script>

</body>
</html>