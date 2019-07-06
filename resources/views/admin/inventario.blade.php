@include('inc.header')
<body>

@include('admin.navbar')

<div class="container my-5">

	<div class="row">
		<div class="col">

			<div class="card z-depth-1">
				<div class="card-header">
					<h4>Materia Prima</h4>
				</div>
				<div class="card-body">

					<table class="table table-sm table-bordered" id="dtBasicExample">
						<thead>
							<tr>
								<th>ID</th>
								<th>PRODUCTO</th>
								<th>CANTIDAD</th>
								<th>PRECIO (Bs)</th>
								<th>PRECIO PROMEDIO (Bs)</th>
								<th class="text-center">BORRAR</th>
							</tr>
						</thead>
						<tbody>
							@foreach( $productos as $p )
								<tr>
									<td class="id">{{ $p->id }}</td>
									<td>{{ $p->product }}</td>
									<td>{{ $p->quantity }}</td>
									<td>{{ $p->price }}</td>
									<td>{{ round(($p->price / $p->quantity) * 2, 2) }}</td>
									<td class="text-center">
										<button class="btn btn-danger btn-sm p-2 delproduct" data-toggle="modal" data-target="#delproduct">
											<i class="fas fa-trash"></i>
										</button>
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


<!-- Modal eliminar prodicto -->
<div class="modal fade" id="delproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header d-flex justify-content-center">
				<h5 class="modal-title" id="exampleModalLabel">¿Estás Seguro?</h5>
			</div>
			<form action="{{ url('delproduct') }}" method="post">
				@csrf

				<input type="hidden" name="idproducto" id="idproductocompra">
				<p class="text-center my-4">Ésta acción eliminará el registro de la base de datos y no se podrá deshacer después.</p>

				<div class="modal-footer d-flex justify-content-center">
					<button type="button" class="btn btn-primary btn-md" data-dismiss="modal" aria-label="Close">No</button>
					<button type="submit" class="btn btn-danger btn-md">Eliminar</button>
				</div>
			</form>
		</div>
	</div>
</div>

@include('inc.footer')