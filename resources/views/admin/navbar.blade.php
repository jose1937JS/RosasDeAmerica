<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color sticky-top">

	<!-- Navbar brand -->
	<a class="navbar-brand" href="#">Admin</a>

	<!-- Collapse button -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
	aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>

<!-- Collapsible content -->
<div class="collapse navbar-collapse" id="basicExampleNav">

	<!-- Links -->
	<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a class="nav-link" href="{{ url('admin') }}">
				<span><i class="fas fa-chart-bar mr-2"></i>Inventario</span>
			</a>
		</li>
		<!-- Dropdown -->
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" haspopup="true" aria-expanded="false"><i class="fas fa-cubes mr-2"></i> Pedidos</a>
			<div class="dropdown-menu dropdown-primary dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="{{ url('pedidos/despachado') }}">Listos (despachados)</a>
				<a class="dropdown-item" href="{{ url('pedidos/pagado') }}">Pagados (por despachar)</a>
			</div>
		</li>

		<!-- Dropdown -->
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-pdf mr-2"></i>Reportes</a>
			<div class="dropdown-menu dropdown-primary dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="{{ url('compra') }}">Compra</a>
				<a class="dropdown-item" href="{{ url('venta') }}">Venta</a>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ url('') }}">
				<span><i class="fas fa-power-off mr-2"></i> Logout</span>
			</a>
		</li>

	</ul>

</div>
<!-- Collapsible content -->

</nav>
<!--/.Navbar-->

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
	<a class="btn-floating btn-md red">
		<i class="fas fa-mouse-pointer"></i>
	</a>

	<ul class="list-unstyled">
		<li><a id="addpbtn" class="btn-floating red" data-toggle="tooltip" data-placement="left" title="Añadir producto"><i class="fas fa-cubes"></i></a></li>
		<li><a id="addcatbtn" class="btn-floating yellow darken-1" data-toggle="tooltip" data-placement="left" title="Añadir categoria"><i class="fas fa-tags"></i></a></li>
		<li><a id="addcomprabtn" class="btn-floating green" data-toggle="tooltip" data-placement="left" title="Registrar una compra al proveedor"><i class="fas fa-plus-square"></i></a></li>
	</ul>
</div>




<!-- Modal añadir produco -->
<div class="modal fade" id="addpmdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Añadir Producto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('addproduct') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">

					<div class="form-row">
						<div class="col-md-8">
							<div class="md-form">
								<i class="fas fa-cubes prefix"></i>
								<input type="text" name="producto" class="form-control validate" id="producto" maxlength="64" pattern="^[a-zA-Záéíóúñ]+(?:\s?[a-zA-Záéíóúñ]\s?)+$" required>
								<label for="producto">Producto</label>
							</div>
						</div>
						<div class="col">
							<div class="md-form">
								<i class="fas fa-cubes prefix"></i>
								<input type="number" min="0" placeholder="0" class="form-control validate" name="cantidad" id="cantidad" required>
								<label for="cantidad">Cantidad disponible</label>
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col">
							<div class="md-form">
								<i class="fas fa-cubes prefix"></i>
								<input type="text" class="form-control validate" name="descripcion" id="descripcion" pattern="^[a-zA-Záéíóúñ]+(?:\s?[a-zA-Záéíóúñ]\s?)+$" required>
								<label for="descripcion">Descripción</label>
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col">
							<div class="md-form">
								<i class="fas fa-dollar prefix"></i>
								<input type="text" class="form-control validate" name="precio" id="precio" placeholder="1234.56" pattern="^[\d]+(\.[\d]{2})?$" required>
								<label for="precio">Precio por unidad</label>
							</div>
						</div>
						<div class="col">
							<select class="mdb-select md-form" name="categoria" id="categoria" required>
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
										<input type="file" name="image" accept="image/*" required>
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
					<button type="submit" class="btn btn-primary btn-md">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="addcatmdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Añadir Categoria</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('addcategoria') }}" method="post">
				<div class="modal-body">
					@csrf
					<div class="md-form">
						<label for="categoria">Categoria</label>
						<input type="text" id="categoria" name="categoria" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-md">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="addcompramdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registrar compra al proveedor</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('addcompraproveedor') }}" method="post">
				@csrf
				<div class="modal-body">

					<div class="form-row">
						<div class="col-md-8">
							<div class="md-form">
								<i class="fas fa-cubes prefix"></i>
								<input type="text" name="producto" id="producto" class="form-control" required>
								<label for="producto">Producto</label>
							</div>
						</div>
						<div class="col">
							<div class="md-form">
								<i class="fas fa-cubes prefix"></i>
								<input type="number" min="0" value="0" name="cantidad" id="cantidad" class="form-control" required>
								<label for="cantidad">Cantidad</label>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col">
							<div class="md-form">
								<i class="fas fa-user prefix"></i>
								<input type="text" name="proveedor" id="proveedor" class="form-control" required>
								<label for="proveedor">Proveedor</label>
							</div>
						</div>
						<div class="col">
							<select class="mdb-select md-form" name="pay_method" id="pay_method" required>
								<option selected disabled>Escoge un método de pago</option>
								<option>Tarjeta de crédito</option>
								<option>Transferencia</option>
								<option>Pago movil</option>
							</select>
							<label>Método de pago</label>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-md">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>