@include('inc.header')
<body>

@include('admin.navbar')

<div class="container my-5">

	<div class="row">
		<div class="col">

			<div class="card z-depth-1">
				<div class="card-header">
					<h4>Productos</h4>
				</div>
				<div class="card-body">

					<table class="table table-sm table-bordered" id="dtBasicExample">
						<thead>
							<tr>
								<th>ID</th>
								<th>PRODUCTO</th>
								<th>CANTIDAD</th>
								<th>PRECIO (Bs)</th>
								<th>CATEGORIA</th>
								<th class="text-center">EDITAR</th>
							</tr>
						</thead>
						<tbody>
							@foreach( $productos as $p )
								<tr>
									<td>{{ $p->id }}</td>
									<td>{{ $p->product }}</td>
									<td>{{ $p->quantity }}</td>
									<td>{{ $p->price }}</td>
									<td>{{ $p->category }}</td>
									<td class="text-center">
										<button class="btn btn-primary btn-sm p-2 dtbtn" data-toggle="modal" data-target="#editproduct"><i class="fas fa-cog"></i></button>
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


<!-- Modal editar prodicto -->
<div class="modal fade" id="editproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('editproduct') }}" method="post" enctype="multipart/form-data">
				@csrf

				<input type="hidden" name="idproducto" id="idproducto">

				<div class="modal-body">

					<div class="form-row">
						<div class="col-md-8">
							<div class="md-form">
								<i class="fas fa-cubes prefix"></i>
								<input type="text" class="form-control" name="producto" id="product" required>
								<label for="product">Producto</label>
							</div>
						</div>
						<div class="col">
							<div class="md-form">
								<i class="fas fa-cubes prefix"></i>
								<input type="number" min="0" name="cantidad" class="form-control" id="quantity" required>
								<label for="quantity">Cantidad</label>
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col">
							<div class="md-form">
								<i class="fas fa-cubes prefix"></i>
								<input type="text" class="form-control" name="descripcion" id="description" required>
								<label for="description">Descripción</label>
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col">
							<div class="md-form">
								<i class="fas fa-dollar prefix"></i>
								<input type="text" name="precio" class="form-control" id="price" required>
								<label for="price">Precio</label>
							</div>
						</div>
						<div class="col">
							<select class="mdb-select md-form" name="categoria" id="category" required>
								<option disabled selected>Selecciona una categoria</option>
								@foreach( $categorias as $cat )
									<option value="{{ $cat->id }}">{{ $cat->category }}</option>
								@endforeach
							</select>
							<label>Categoria</label>
						</div>
					</div>

					<div class="form-row">
						<div class="col">
							<div class="md-form">
								<div class="file-field">
									<div class="btn btn-primary btn-sm float-left">
										<span>Escoge imagen</span>
										<input type="file" name="image" accept="image/*">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text" placeholder="Upload your image file">
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-md">Editar</button>
				</div>
			</form>
		</div>
	</div>
</div>

@include('inc.footer')