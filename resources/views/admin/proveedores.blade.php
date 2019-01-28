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
								<th>PRODUCTO</th>
								<th>CANTIDAD</th>
								<th>PROVEEDOR</th>
								<th>PRECIO (BsS)</th>
								<th>METODO DE PAGO</th>
								{{-- <th class="text-center">EDITAR</th> --}}
							</tr>
						</thead>
						<tbody>
							@foreach( $compras as $p )
								<tr>
									<td>{{ $p->id }}</td>
									<td>{{ $p->product }}</td>
									<td>{{ $p->quantity }}</td>
									<td>{{ $p->supplier->name }}</td>
									<td>{{ $p->price }}</td>
									<td>{{ $p->pay_method }}</td>
									{{-- <td class="text-center">
										<button class="btn btn-primary btn-sm p-2 dtbtn" data-toggle="modal" data-target="#editproduct"><i class="fas fa-cog"></i></button>
									</td> --}}
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