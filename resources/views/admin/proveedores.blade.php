@include('inc.header')
<body>
@include('admin.navbar')

<div class="container my-5">

	<div class="row">
		<div class="col">

			<div class="card z-depth-1">
				<div class="card-header">
					<h4>Compras a los proveedores</h4>
				</div>
				<div class="card-body">

					<table class="table table-sm table-bordered" id="dtBasicExample">
						<thead>
							<tr>
								<th>ID</th>
								<th>PROVEEDOR</th>
								<th>PRECIO TOTAL (BsS)</th>
								<th>METODO DE PAGO</th>
								<th>FECHA</th>
								<th class="text-center">REPORTE</th>
							</tr>
						</thead>
						<tbody>
							@foreach( $compras as $p )
								<tr>
									<td>{{ $p->id }}</td>
									<td>{{ $p->supplier->name }}</td>
									<td>{{ $p->total_price }}</td>
									<td>{{ $p->pay_method }}</td>
									<td>{{ $p->created_at }}</td>
									<td class="text-center">
										<a href='{{ url("compra/$p->id") }}' class="btn btn-primary btn-sm p-2 dtbtn">
											<i class="fas fa-file-pdf"></i>
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>

</div>


@include('inc.footer')