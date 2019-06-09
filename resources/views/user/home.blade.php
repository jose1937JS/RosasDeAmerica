@include('inc.header')

<body>

@include('inc.navbar')

<div class="container-fluid mt-5 px-0">

	<!--Carousel Wrapper-->
	<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
		<!--Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-1z" data-slide-to="1"></li>
			<li data-target="#carousel-example-1z" data-slide-to="2"></li>
			<li data-target="#carousel-example-1z" data-slide-to="3"></li>
		</ol>
		<!--/.Indicators-->
		<!--Slides-->
		<div class="carousel-inner" role="listbox">
			<!--First slide-->
			<div class="carousel-item active">
				<img class="d-block w-100" src="{{ asset('images/image.jpg') }}" alt="First slide">
			</div>
			<!--/First slide-->
			<!--Second slide-->
			<div class="carousel-item">
				<img class="d-block w-100" src="{{ asset('images/image2.jpg') }}" alt="Second slide">
			</div>
			<!--/Second slide-->
			<!--Third slide-->
			<div class="carousel-item">
				<img class="d-block w-100" src="{{ asset('images/image3.jpg') }}" alt="Third slide">
			</div>
			<!--/Third slide-->
			<!--fourth slide-->
			<div class="carousel-item">
				<img class="d-block w-100" src="{{ asset('images/image4.jpg') }}" alt="fourth slide">
			</div>
			<!--/fourth slide-->
		</div>
		<!--/.Slides-->
		<!--Controls-->
		<a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!--/.Controls-->
	</div>
	<!--/.Carousel Wrapper-->
</div>


<!--Main layout-->
	<main>
		<div class="container">

			<h2 class="text-center my-5">Desarrollo web para la gestión administrativa de procesos, productos y requerimientos de la Floristeria Rosas de América C.A, San Juan de los Morros</h2>


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

					@if( $products )
						@foreach($products as $producto)

												<!-- Grid column -->
							<div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
								<!-- Card -->
								<div class="card wider card-ecommerce mb-4 hoverable">
									<!-- Card image -->
									<div class="view zoom overlay" style="height: 250px">
										<img src='{{ asset("$producto->image") }}' class="card-img-top img-fluid" alt="404" style="height: inherit;">
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
					@else
						<div class="col">
							<h3 class="text-center my-4">No hay productos registrados.</h3>
						</div>	
					@endif
					

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