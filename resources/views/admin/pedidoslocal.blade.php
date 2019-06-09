@include('inc.header')
<body>

@include('admin.navbar')

<div class="container my-5">
	<div class="row">
		<div class="col">

			<div class="card z-depth-1">
				<div class="card-header">
					<h4>Ventas Local</h4>
				</div>
				<div class="card-body">

					{{!! QrCode::size(200)->generate("jose") !!}}

					@if ( count($ventas) > 0 )

						<div class="card mb-3">

							<div class="card-body">
								
								<table class="table table-bordered" id="dt">
									<thead>
										<th>ID</th>
										<th>Cédula</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Teléfono</th>
										<th>Direccion</th>
										<th>Producto</th>
										<th>Precio (Bs)</th>
									</thead>
									<tbody>
										@foreach ( $ventas as $k => $v )
											<tr>
												<td>{{ $v->id }}</td>
												<td>{{ $v->cedula }}</td>
												<td>{{ $v->first_name }}</td>
												<td>{{ $v->last_name }}</td>
												<td>{{ $v->phone }}</td>
												<td>{{ $v->address }}</td>
												<td>{{ $v->product }}</td>
												<td>{{ $v->price }}</td>
											</tr>
										@endforeach
									</tbody>
								</table>

							</div>
						</div>
					@else
						<h3 class="my-4">Por los momentos no hay ventas para mostrar.</h3>
					@endif

				</div>
			</div>

		</div>
	</div>
</div>



@include('inc.footer')