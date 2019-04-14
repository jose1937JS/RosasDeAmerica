@include('inc.header')

<div class="centro">
	<div class="card hoverable" style="width: 400px">

		<div class="card-header info-color white-text py-4 text-center">
			<h5 class="font-weigth-bold">Inicio de Sesión</h5>
		</div>

		<div class="card-body px-lg-5 pt-0">

			@if ( $errors->has('email') )
				<div class="alert alert-danger alert-dismissible fade show my-4" role="alert">
					<i class="fas fa-info mr-2"></i><span>{{ $errors->first('email') }}</span>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
            @endif

			<form class="" method="post" action="{{ url('login') }}" style="color: #757575;">

				@csrf

				<div class="mb-4">
					<!-- user -->
					<div class="md-form">
						<i class="fas fa-user prefix"></i>
						<input type="text" name="user" id="user" class="form-control" required>
						<label for="user">Usuario</label>
					</div>
					@if ($errors->has('user'))
						<p class="small text-danger text-left">{{ $errors->first('user') }}</p>
					@endif

					<!-- Password -->
					<div class="md-form">
						<i class="fas fa-key prefix"></i>
						<input type="password" name="password" id="clave" class="form-control" required>
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
				<!-- <p class="text-center">
					<a href="#" data-toggle="modal" data-target="#resetpass">Olvidé mi contraseña</a>
				</p> -->
				<p class="text-center">Volver al <a href="{{ url('') }}">inicio</a></p>

			</form>

		</div>
	</div>
</div>


<!-- Modal reestablecer contraseña -->
<div class="modal fade" id="resetpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Reestablecer contraseña</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('clave/email') }}" method="post">
				@csrf
				<div class="modal-body">
					<div class="md-form">
						<i class="fas fa-envelope prefix"></i>
						<input type="email" class="form-control validate" name="email" required id="email">
						<label for="email">Correo electrónico</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-md btn-primary">Enviar link</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>