@include('inc.header')

<body>

	@include('inc.navbar')

	<div class="jumbotron mt-5">
		{{ Auth::user() }}
	</div>

<!--Main layout-->
	<main>
		<div class="container">

			<!--Navbar-->
			<nav class="navbar navbar-expand-lg navbar-dark primary-color mt-3 mb-5">

				<!-- Navbar brand -->
				<span class="navbar-brand">Categories:</span>

				<!-- Collapse button -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

			<!-- Collapsible content -->
				<div class="collapse navbar-collapse " id="basicExampleNav">

					<!-- Links -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#">All
								<span class="sr-only">(current)</span>
							</a>
						</li>

						@foreach( $categorias as $c )
							<li class="nav-item">
								<a class="nav-link" href="#">{{ $c->category }}</a>
							</li>
						@endforeach
					</ul>
					<form class="form-inline" method="post" action="{{ url('busqueda') }}">
						@csrf
						<div class="md-form my-0">
							<input class="form-control mr-sm-2" type="search" placeholder="Search" name="search">
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
									<img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg" class="card-img-top img-fluid" alt="sample photo" style="height: inherit;">
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

					<!--Arrow left-->
					<li class="page-item disabled">
						<a class="page-link" href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
							<span class="sr-only">Previous</span>
						</a>
					</li>

					<li class="page-item active">
						<a class="page-link" href="#">1
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">2</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">3</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">4</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="#">5</a>
					</li>

					<li class="page-item">
						<a class="page-link" href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							<span class="sr-only">Next</span>
						</a>
					</li>
				</ul>
			</nav>
			<!--Pagination-->

			<hr>

			<!--Grid row-->
			<div class="row d-flex justify-content-center wow fadeIn">

				<!--Grid column-->
				<div class="col-md-6 text-center">

					<h4 class="my-4 h4">Additional information</h4>

					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta odit voluptates,
					quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>

				</div>
				<!--Grid column-->

			</div>
			<!--Grid row-->

			<!--Grid row-->
			<div class="row wow fadeIn">

				<!--Grid column-->
				<div class="col-lg-4 col-md-12 mb-4">

					<img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/11.jpg" class="img-fluid" alt="">

				</div>
				<!--Grid column-->

				<!--Grid column-->
				<div class="col-lg-4 col-md-6 mb-4">

					<img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/12.jpg" class="img-fluid" alt="">

				</div>
				<!--Grid column-->

				<!--Grid column-->
				<div class="col-lg-4 col-md-6 mb-4">

					<img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/13.jpg" class="img-fluid" alt="">

				</div>
				<!--Grid column-->

			</div>
			<!--Grid row-->

		</div>
	</main>
<!--Main layout-->

@include('inc.footer')