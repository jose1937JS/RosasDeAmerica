@include('inc.header')
<body>

@include('inc.navbar')

<div class="mt-5 pt-5">
	<div class="container">

		@if( session('success') )
			<div class="alert alert-success alert-dismissible fade show my-3" role="alert">
				<i class="fas fa-check mr-2"></i>{{ session('success') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif

		<div class="row">
			<div class="col">

				<div class="card wow fadeIn">
					<div class="card-header">
						<div class="d-flex justify-content-between align-items-center">
							<h4>Perfil del usuario</h4>
							<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editprofile">
								<i class="fas fa-edit mr-2"></i>Editar
							</button>
						</div>
					</div>
					<div class="card-body">

						<div class="row mb-2">
							<div class="col-md-2">
								<h5 class="font-weight-bold text-right">Cédula:</h5>
							</div>
							<div class="col-md-2">
								<p>{{ $user->people->pin }}</p>
							</div>

							<div class="col-md-2">
								<h5 class="font-weight-bold text-right">Nombre:</h5>
							</div>
							<div class="col-md-2">
								<p>{{ $user->people->first_name }}</p>
							</div>

							<div class="col-md-2">
								<h5 class="font-weight-bold text-right">Apellido:</h5>
							</div>
							<div class="col-md-2">
								<p>{{ $user->people->last_name }}</p>
							</div>
						</div>

						<div class="row mb-2">
							<div class="col-md-2">
								<h5 class="font-weight-bold text-right">E-mail:</h5>
							</div>
							<div class="col-md-2">
								<p>{{ $user->people->email }}</p>
							</div>

							<div class="col-md-2">
								<h5 class="font-weight-bold text-right">Teléfono:</h5>
							</div>
							<div class="col-md-2">
								<p>{{ $user->people->phone }}</p>
							</div>

							<div class="col-md-2">
								<h5 class="font-weight-bold text-right">Usuario:</h5>
							</div>
							<div class="col-md-2">
								<p>{{ $user->user }}</p>
							</div>

						</div>

						<div class="row mb-2">
							<div class="col-md-2">
								<h5 class="font-weight-bold text-right">Dirección:</h5>
							</div>
							<div class="col">
								<p>{{ $user->people->address }}</p>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		@include('inc.aditionalinfo')

	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar perfil</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('editprofile') }}" method="post">
				<div class="modal-body">
					@csrf

					<!-- <p class="small">Debes colocar tu contraseña al final como un factor de seguridad, coloca una diferente si la deseas cambiar.</p> -->

					<input type="hidden" name="personid" value="{{ $user->people_id }}">
					<input type="hidden" name="userid" value="{{ $user->id }}">

					<div class="form-row">
						<div class="col-md-3">
							<div class="md-form">
								<input type="text" id="cedula" value="{{ $user->people->pin }}" class="form-control disabled" readonly>
								<label for="cedula">Cédula</label>
							</div>
						</div>
						<div class="col">
							<!-- First name -->
							<div class="md-form">
								<input type="text" id="nombre" class="form-control validate" name="nombre" pattern="^[a-zA-Záéíóú]+(?:\s?[a-zA-Záéíóú]\s?)+$"value="{{ $user->people->first_name }}" required>
								<label for="nombre">Nombre</label>
								@if( $errors->has('nombre') )
									@foreach( $errors->get('nombre') as $error )
										<p class="text-left small red-text">{{ $error }}</p>
									@endforeach
								@endif
							</div>
						</div>
						<div class="col">
							<!-- Last name -->
							<div class="md-form">
								<input type="text" id="apellido" name="apellido" class="form-control validate" pattern="^[a-zA-Záéíóú]+(?:\s?[a-zA-Záéíóú]\s?)+$" value="{{ $user->people->last_name }}" required>
								<label for="apellido">Apellido</label>
								@if( $errors->has('apellido') )
									@foreach( $errors->get('apellido') as $error )
										<p class="text-left small red-text">{{ $error }}</p>
									@endforeach
								@endif
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col">
							<div class="md-form">
								<input type="text" name="direccion" id="direccion" value="{{ $user->people->address }}" class="form-control" required>
								<label for="direccion">Dirección de habitación</label>
								@if( $errors->has('direccion') )
									@foreach( $errors->get('direccion') as $error )
										<p class="text-left small red-text">{{ $error }}</p>
									@endforeach
								@endif
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col">
							<div class="md-form text-left">
								<input type="text" id="telefono" class="form-control validate" value="{{ $user->people->phone }}" name="telefono" minlength="10" maxlength="11" pattern="^\d{11}$" required>
								<label for="telefono">Número de teléfono</label>
								@if( $errors->has('telefono') )
									@foreach( $errors->get('telefono') as $error )
										<p class="text-left small red-text">{{ $error }}</p>
									@endforeach
								@endif
							</div>
						</div>
						<div class="col">
							<div class="md-form">
								<input type="email" name="email" id="email" value="{{ $user->people->email }}" class="form-control validate" minlength="6" required>
								<label for="email">Correo electrónico</label>
								@if( $errors->has('email') )
									@foreach( $errors->get('email') as $error )
										<p class="text-left small red-text">{{ $error }}</p>
									@endforeach
								@endif
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col">
							<div class="md-form">
								<input type="text" id="usuario" value="{{ $user->user }}" class="form-control validate" name="user"  maxlength="10" minlength="2" pattern="^\w+$">
								<label for="usuario">Usuario</label>
								@if( $errors->has('user') )
									@foreach( $errors->get('user') as $error )
										<p class="text-left small red-text">{{ $error }}</p>
									@endforeach
								@endif
							</div>
						</div>
						<div class="col">
							<div class="md-form text-left">
								<input type="password" id="clave" class="form-control" minlength="6" name="clave" required>
								<label for="clave">Contraseña</label>
								@if( $errors->has('clave') )
									@foreach( $errors->get('clave') as $error )
										<p class="text-left small red-text">{{ $error }}</p>
									@endforeach
								@endif
							</div>
						</div>
						<div class="col">
							<div class="md-form text-left">
								<input type="password" id="repclave" class="form-control" name="clave_confirmation" required>
								<label for="repclave">Repita contraseña</label>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit mr-2"></i>Editar</button>
				</div>
			</form>
		</div>
	</div>
</div>

@include('inc.footer')