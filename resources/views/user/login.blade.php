@include('inc.header')

<div class="centro">
	<div class="card hoverable" style="width: 400px">

		<div class="card-header info-color white-text py-4 text-center">
			<h5 class="font-weigth-bold">Inicio de Sesión</h5>
		</div>

		<div class="card-body px-lg-5 pt-0">

			<form class="" method="post" action="{{ url('login') }}" style="color: #757575;">

				@csrf

				<div class="my-5">
					<!-- user -->
					<div class="md-form">
						<i class="fas fa-user prefix"></i>
						<input type="text" name="user" id="user" class="form-control">
						<label for="user">Usuario</label>
					</div>
					@if ($errors->has('user'))
						<p class="small text-danger text-left">{{ $errors->first('user') }}</p>
					@endif

					<!-- Password -->
					<div class="md-form">
						<i class="fas fa-key prefix"></i>
						<input type="password" name="password" id="clave" class="form-control">
						<label for="clave">Contraseña</label>
					</div>
					@if ($errors->has('password'))
						<p class="small text-danger text-left">{{ $errors->first('password') }}</p>
					@endif
				</div>

				<button class="btn btn-outline-info btn-rounded btn-block my-4 z-depth-0" type="submit">Entrar</button>

				<p class="text-center">
					¿No tienes cuenta?
					<a href="{{ url('register') }}">Regístrate</a>
				</p>
				<p class="text-center">Volver al <a href="{{ url('') }}">inicio</a></p>

			</form>

		</div>
	</div>
</div>

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>