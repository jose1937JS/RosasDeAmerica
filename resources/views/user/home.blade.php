@include('inc.header')

<body>

	@include('inc.navbar')

	<div class="jumbotron mt-5">
		TODO LIST
		<ol>
			<li>Crear el middleware de autenticacion</li>
			<li>Hacer el pago con la api de instapago</li>
			<li>terminar los reportes pdf</li>
			<li>Acomodar los detalles de las vistas</li>
		</ol>
	</div>

<!--Main layout-->
	<main>
		<div class="container">

			<!--Navbar-->
			<nav class="navbar navbar-expand-lg navbar-dark primary-color mt-3 mb-5">

				<!-- Navbar brand -->
				<span class="navbar-brand">Categorias:</span>

				<!-- Collapse button -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

			<!-- Collapsible content -->
				<div class="collapse navbar-collapse " id="basicExampleNav">

					<!-- Links -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="{{ url('') }}">Todas</a>
						</li>

						@foreach( $categorias as $c )
							<li class="nav-item">
								<a class="nav-link" href='{{ url("categoria/$c->category") }}'>{{ $c->category }}</a>
							</li>
						@endforeach
					</ul>
					<form class="form-inline" method="post" action="{{ url('busqueda') }}">
						@csrf
						<div class="md-form my-0">
							<input class="form-control mr-sm-2" type="search" placeholder="Buscar" name="search">
						</div>
					</form>
				</div>
				<!-- Collapsible content -->

			</nav>
		<!--/.Navbar-->

		<!--Section: Products v.3-->
			<section class="text-center mb-4">

				<div class="row">

					@foreach($products as $producto)

											<!-- Grid column -->
						<div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
							<!-- Card -->
							<div class="card wider card-ecommerce mb-4 hoverable">
								<!-- Card image -->
								<div class="view zoom overlay" style="height: 250px">
									<img src='{{ asset("storage/$producto->image") }}' class="card-img-top img-fluid" alt="sample photo" style="height: inherit;">
									<a href='{{ url("product/$producto->id") }}'>
										<div class="mask rgba-white-slight waves-effect"></div>
									</a>
								</div>
								<!-- Card image -->
								<!-- Card content -->
								<div class="card-body card-body-cascade text-center">
									<!-- Category & Title -->
									<a href="" class="text-muted">
										<h5>{{ $producto->category->category }}</h5>
									</a>
									<h4 class="card-title">
										<strong>
											<a href='{{ url("product/$producto->id") }}'>{{ $producto->product}}</a>
										</strong>
									</h4>
									<!-- Description -->
									<p class="card-text text-truncate">{{ $producto->description }}</p>
									<!-- Card footer -->
									<div class="card-footer px-1">
										<span class="float-left font-weight-bold">
											<strong>{{ $producto->price }} BsS</strong>
										</span>
										<span class="float-right">
											@if( $producto->quantity > 0 )
												<span class="green-text font-weight-bold">Disponible</span>

												@if( Auth::check() )
													<a class="addcart ml-3" data-toggle="tooltip" title="Añadir al carrito"
														data-idproducto="{{ $producto->id }}"
														data-producto="{{ $producto->product }}"
														data-precio="{{ $producto->price }}">
														<i class="fa fa-cart-plus grey-text"></i>
													</a>
												@endif
											@else
												<span class="red-text font-weight-bold">Agotado</span>
											@endif
										</span>
									</div>
								</div>
								<!-- Card content -->
							</div>
							<!-- Card -->
						</div>
						<!-- Grid column -->
					@endforeach

				</div>

			</section>
		<!--Section: Products v.3-->

		<!--Pagination-->
			<nav class="d-flex justify-content-center wow fadeIn">
				<ul class="pagination pg-blue">

					{{ $products->links() }}

				</ul>
			</nav>
			<!--Pagination-->

			@include('inc.aditionalinfo')



		</div>
	</main>
<!--Main layout-->

@include('inc.footer')