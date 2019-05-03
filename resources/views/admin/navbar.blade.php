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
		<li class="nav-item mr-5">
			<a class="nav-link" data-toggle="modal" href="#registrarventa">
				<span><i class="fas fa-user-plus mr-2"></i>Nueva Venta</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ url('admin') }}">
				<span><i class="fas fa-chart-bar mr-2"></i>Inventario</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ url('compras') }}">
				<span><i class="fas fa-chart-line mr-2"></i>Compras</span>
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
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#"
				onclick="event.preventDefault();document.getElementById('logout').submit();">
				<i class="fas fa-power-off mr-2"></i>Salir
            </a>
		</li>
        <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

	</ul>

</div>
<!-- Collapsible content -->

</nav>
<!--/.Navbar-->

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
	<a class="btn-floating btn-md red">
		<i class="fas fa-bars"></i>
	</a>

	<ul class="list-unstyled">
		<li><a id="addpbtn" class="btn-floating red" data-toggle="tooltip" data-placement="left" title="Añadir producto"><i class="fas fa-cubes"></i></a></li>
		<li><a id="addcatbtn" class="btn-floating yellow darken-1" data-toggle="tooltip" data-placement="left" title="Añadir categoria"><i class="fas fa-tags"></i></a></li>
		<li><a id="addcomprabtn" class="btn-floating green" data-toggle="tooltip" data-placement="left" title="Registrar una compra al proveedor"><i class="fas fa-plus-square"></i></a></li>
		<li><a id="addsupplierbtn" class="btn-floating blue" data-toggle="tooltip" data-placement="left" title="Registrar proveedor"><i class="fas fa-user-plus"></i></a></li>
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


<!-- Modal añadir categoria -->
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
						<i class="fas fa-clipboard-list prefix"></i>
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


<!-- Modal compra progveedor -->
<div class="modal fade" id="addcompramdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registrar compra al proveedor</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="{{ url('addcompraproveedor') }}">
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
								<i class="fas fa-user-circle prefix"></i>
								<select name="proveedor" class="ml-5 mdb-select" required id="proveedor">
									<option disabled selected>Selecciona un proveedor</option>
									@foreach( $proveedores as $p )
										<option value="{{ $p->id }}">{{ $p->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col">
							<div class="md-form">
								<i class="fas fa-dollar prefix"></i>
								<input type="text" name="precio" id="precio" class="form-control" placeholder="1234.56" required pattern="^[\d]+(\.[\d]{2})?$">
								<label for="precio">Precio</label>
							</div>
						</div>
					</div>
					<div class="form-row">
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


<!-- Modal registrar proveedor-->
<div class="modal fade" id="addsupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registrar Proveedor</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('addsupplier') }}" class="md-form" method="post">
				<div class="modal-body">
					@csrf
					<div class="form-row">
						<div class="col">
							<i class="fas fa-user-circle prefix"></i>
							<label for="name">Nombre</label>
							<input type="text" id="name" name="name" class="form-control validate" pattern="^[a-zA-Z\.]+(?:\s?[a-zA-Z\.]\s?)+$" required>
						</div>
						<div class="col">
							<i class="fas fa-envelope prefix"></i>
							<label for="email">E-mail</label>
							<input type="email" id="email" name="email" class="form-control validate"required>
						</div>
					</div>
					<div class="form-row my-5">
						<div class="col">
							<i class="fas fa-phone prefix"></i>
							<label for="phone">Teléfono</label>
							<input type="text" id="phone" name="phone" class="form-control validate" minlength="10" maxlength="11" pattern="^[\d]{10,11}$" required>
						</div>
						<div class="col">
							<i class="fas fa-id-card prefix"></i>
							<label for="rif">RIF</label>
							<input type="text" id="rif" name="rif" class="form-control validate" pattern="^(J-).+" required>
						</div>
					</div>
					<div class="form-row">
						<div class="col">
							<i class="fas fa-road prefix"></i>
							<label for="address">Dirección</label>
							<input type="text" id="address" name="address" class="form-control validate" pattern="^[a-zA-Z]+(?:\s?[a-zA-Z]\s?)+$" required>
						</div>
					</div>

					@if( $proveedores->isNotEmpty() )
						<div class="form-row mt-5">
							<div class="col">
								<h4 class="mb-3">Proveedores registrados</h4>
								<table class="table table-sm table-hover table-bordered">
									<thead>
										<tr>
											<th>NOMBRE</th>
											<th>EMAIL</th>
											<th>TELEFONO</th>
											<th>RIF</th>
											<th>DIRECCION</th>
										</tr>
									</thead>
									<tbody>
										@foreach( $proveedores as $p )
											<tr>
												<td>{{ $p->name }}</td>
												<td>{{ $p->email }}</td>
												<td>{{ $p->phone }}</td>
												<td>{{ $p->rif }}</td>
												<td>{{ $p->address }}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					@endif
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-md">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>



<!-- Modal registrar compra a cliente -->
<div class="modal fade" id="registrarventa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registrar Venta</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form  action="{{ url('newsale') }}" method="post" id="newsale">
				@csrf
				<input type="hidden" name="newclient" id="newclient" value="0">
				<div class="modal-body">

					<div class="form-row">
						<div class="col-md-4 col-sm-6">
							<div class="md-form">
								<i class="fas fa-id-card prefix"></i>
								<input type="text" name="cedula" class="form-control validate" id="cedula" maxlength="10" minlength="7" pattern="^[\d]{7,10}$" required>
								<label for="cedula">Cédula cliente</label>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="md-form">
								<i class="fas fa-user prefix"></i>
								<input type="text" min="0" class="form-control validate" readonly name="nombre" id="nombre" pattern="^[a-zA-Záéíóúñ]+(?:\s?[a-zA-Záéíóúñ]\s?)+$" required>
								<label for="nombre">Nombre del cliente</label>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="md-form">
								<i class="fas fa-user prefix"></i>
								<input type="text" min="0" class="form-control validate" readonly name="apellido" id="apellido" pattern="^[a-zA-Záéíóúñ]+(?:\s?[a-zA-Záéíóúñ]\s?)+$" required>
								<label for="apellido">Apellido del cliente</label>
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-md-3 col-sm-6">
							<div class="md-form">
								<i class="fas fa-phone prefix"></i>
								<input type="text" name="telefono" class="form-control validate" readonly id="telefono" minlength="10" maxlength="11" pattern="^[\d]{10,11}$" readonly>
								<label for="phone">Teléfono</label>
							</div>
						</div>
						<div class="col-md-9 col-sm-6">
							<div class="md-form">
								<i class="fas fa-home prefix"></i>
								<input type="text" class="form-control validate" name="direccion" readonly id="direccion" pattern="^[a-zA-Záéíóúñ]+(?:\s?[a-zA-Záéíóúñ]\s?)+$" required>
								<label for="direccion">Dirección del cliente</label>
							</div>
						</div>
					</div>

					<!-- <div class="form-row">
						<div class="col">
							<div class="md-form">
								<i class="fas fa-dollar prefix"></i>
								<input type="text" class="form-control validate" name="precio" id="precio" placeholder="1234.56" pattern="^[\d]+(\.[\d]{2})?$" required>
								<label for="precio">Precio total</label>
							</div>
						</div>
					</div> -->

					<div class="form-row mb-3	">
						<div class="col-md-6 col-12">
							<select class="mdb-select md-form" name="producto" id="producto-0" required>
								<option disabled selected>Producto</option>
								@foreach( $products as $p )
									<option value="{{ $p->id }}" data-precio="{{ $p->price }}">{{ $p->product }}</option>
								@endforeach
							</select>
							<label>Producto</label>
						</div>
						<div class="col-md-4 col-9">
							<div class="md-form">
								<i class="fas fa-dollar prefix"></i>
								<input type="text" class="form-control precio" placeholder="Precio" name="precio" readonly id="price-0"> <!--pattern="^[\d]+(\.[\d]{2})?$"  -->
								<!-- <label for="precio">Precio</label> -->
							</div>
						</div>
						<div class="col-1 d-flex align-items-center mr-xs-3">
							<button class="btn btn-primary btn-sm" data-toggle="tooltip" title="Agregar otro producto" type="button" id="dsa">
								<i class="fas fa-plus"></i>
							</button>
						</div>
						<div class="col-1 d-flex align-items-center">
							<button class="btn btn-sm btn-danger" data-toggle="tooltip" title="Eliminar el último producto" type="button" id="elimelem">
								<i class="fas fa-times"></i>
							</button>
						</div>
					</div>

					<div id="np"></div>

					<div class="form-row">
						<div class="col">
							<select class="mdb-select md-form" name="metpago" required>
								<option selected>Tarjeta de Débito</option>
								<option value="Transferencia">Transferecia</option>
								<option value="PagoMovil">Pago Movil</option>
								<option value="Efectivo">Efectivo</option>
							</select>
							<label>Método de pago</label>
						</div>
						<div class="col d-flex align-items-center">
							<p class="text-center lead">
								<i class="fas fa-dollar mr-2"></i>Precio Total: <code id="preciototal" class="text-dark ml-2">0 Bs</code>
							</p>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-md"><i class="fas fa-save mr-3"></i>Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>