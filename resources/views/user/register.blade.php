@include('inc.header')

<!-- Material form register -->

<div class="d-flex justify-content-center my-5">

<div class="card hoverable" style="width: 600px">

	<div class="card-header info-color white-text py-4 text-center">
		<h5 class="font-weigth-bold">Regístrate</h5>
	</div>

	<!--Card content-->
	<div class="card-body px-lg-5 pt-0">

		<!-- Form -->
		<form class="text-center" method="post" action="{{ url('register') }}" style="color: #757575;">
			@csrf

			<p class="small mt-3">Todos los campos marcados con (*) son requeridos.</p>

			<div class="form-row">
				<div class="col-md-3">
					<div class="md-form">
						<input type="text" id="cedula" name="pin" class="form-control validate" minlength="7" maxlength="9" pattern="^[\d]+$" required>
						<label for="cedula">Cédula *</label>
						@if( $errors->has('pin') )
							@foreach( $errors->get('pin') as $error )
								<p class="text-left small red-text">{{ $error }}</p>
							@endforeach
						@endif
					</div>
				</div>
				<div class="col">
					<!-- First name -->
					<div class="md-form">
						<input type="text" id="nombre" class="form-control validate" name="nombre" pattern="^[a-zA-Záéíóú]+(?:\s?[a-zA-Záéíóú]\s?)+$" required>
						<label for="nombre">Nombre *</label>
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
						<input type="text" id="apellido" name="apellido" class="form-control validate" pattern="^[a-zA-Záéíóú]+(?:\s?[a-zA-Záéíóú]\s?)+$" required>
						<label for="apellido">Apellido *</label>
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
						<input type="text" name="direccion" id="direccion" class="form-control" required>
						<label for="direccion">Dirección de habitación *</label>
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
						<input type="text" id="telefono" class="form-control validate" name="telefono" minlength="10" maxlength="11" pattern="^\d{11}$" required>
						<label for="telefono">Número de teléfono *</label>
						@if( $errors->has('telefono') )
							@foreach( $errors->get('telefono') as $error )
								<p class="text-left small red-text">{{ $error }}</p>
							@endforeach
						@endif
					</div>
				</div>
				<div class="col">
					<div class="md-form">
						<input type="email" name="email" id="email" class="form-control validate" minlength="6" required>
						<label for="email">Correo electrónico *</label>
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
						<input type="text" id="usuario" class="form-control validate" name="user"  maxlength="10" minlength="2" pattern="^\w+$">
						<label for="usuario">Usuario *</label>
						@if( $errors->has('user') )
							@foreach( $errors->get('user') as $error )
								<p class="text-left small red-text">{{ $error }}</p>
							@endforeach
						@endif
					</div>
				</div>
				<div class="col">
					<div class="md-form text-left">
						<input type="text" id="clave" class="form-control" minlength="6" name="clave" required>
						<label for="clave">Contraseña *</label>
						@if( $errors->has('clave') )
							@foreach( $errors->get('clave') as $error )
								<p class="text-left small red-text">{{ $error }}</p>
							@endforeach
						@endif
					</div>
				</div>
				<div class="col">
					<div class="md-form text-left">
						<input type="text" id="repclave" class="form-control" name="clave_confirmation" required>
						<label for="repclave">Repita contraseña *</label>
					</div>
				</div>
			</div>

			<!-- Sign up button -->
			<button class="btn btn-outline-info btn-rounded btn-block my-5 waves-effect z-depth-0" type="submit">Registrarse</button>

			<hr>

			<p>Volver al <a href="{{ url('') }}">inicio</a></p>

		</form>
		<!-- Form -->

	</div>

</div>
<!-- Material form register -->
</div>

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>