@include('inc.header')
<body>

@include('admin.navbar')

<div class="container my-5">
	<div class="col">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h4 class="font-weight-light">Reporte de todas las Ventas</h4>
				<div>
					{{-- <button class="btn btn-primary btn-md px-2"><i class="fas fa-file-pdf mr-2"></i>  Total</button> --}}
					<a href="{{ url('ventasdiarias') }}" class="btn btn-primary p-3"><i class="fas fa-file-pdf mr-2"></i>Ventas del dia</a>
				</div>
			</div>
			<div class="card-body">

				@if ( count($ventas) > 0 )
					{{-- expr --}}
					<table class="table table-bordered table-condensed text-center">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Precio Total</th>
								<th>Cliente</th>
								<th>Productos Comprados</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($ventas as $v)
								<tr>
									<td>{{ $v->created_at }}</td>
									<td>{{ $v->amount }}</td>
									<td>{{ $v->first_name .' '. $v->last_name }}</td>
									<td>
										<table class="table table-condensed">
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
				@else
					<p class="text-center">No hay ventas para mostrar en el reporte.</p>
				@endif
			</div>
		</div>
	</div>
</div>

@include('inc.footer')