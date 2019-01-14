	<!-- Navbar -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark primary-color scrolling-navbar">
		<div class="container">

			<!-- Brand -->
			<a class="navbar-brand waves-effect" href="">
				<strong class="">Rosas de América</strong>
			</a>

			<!-- Collapse -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span></button>

			<!-- Links -->
			<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<!-- <ul class="navbar-nav nav-flex-icons mr-auto">

				</ul> -->

				<!-- Right -->
				<ul class="navbar-nav nav-flex-icons ml-auto">
					<li class="nav-item">
						<a class="nav-link waves-effect" href="{{ url('/') }}">
							<i class="fas fa-cubes mr-2"></i>Productos
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link waves-effect" href="{{ route('about') }}">
							<i class="fas fa-users mr-2"></i>Nosotros
						</a>
					</li>
				@guest
					<li class="nav-item">
						<a class="nav-link waves-effect" href="{{ route('login') }}">
							<i class="fas fa-sign-in-alt mr-2"></i>Entrar
						</a>
					</li>
				@else
					<li class="nav-item">
						<a class="nav-link waves-effect" href="{{ url('profile') }}">
							<i class="fas fa-user mr-2"></i>Perfil
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link waves-effect" href="{{ route('checkout') }}">
							<span class="badge red z-depth-1 mr-1" id="n" style="display: none;"></span>
							<i class="fas fa-shopping-cart"></i>
							<span class="clearfix d-none d-sm-inline-block"> Cart </span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"
							onclick="event.preventDefault();document.getElementById('logout-form').submit();">
							<i class="fas fa-power-off mr-2"></i>Logout
                        </a>
					</li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
				@endguest
				</ul>
			</div>

		</div>
	</nav>
<!-- Navbar -->