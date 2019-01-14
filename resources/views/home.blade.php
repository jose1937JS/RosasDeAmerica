@include('header')

<body>

	@include('navbar')

	<div class="jumbotron mt-5">
		{{ Auth::user()->user }}
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
						<li class="nav-item">
							<a class="nav-link" href="#">Flores</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Peluches</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Tarjetas</a>
						</li>

					</ul>
					<!-- Links -->

					<form class="form-inline">
						<div class="md-form my-0">
							<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
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
							<div class="card wider card-ecommerce">
								<!-- Card image -->
								<div class="view overlay">
									<img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg" class="card-img-top" alt="sample photo">
									<a>
										<div class="mask rgba-white-slight waves-effect waves-light"></div>
									</a>
								</div>
								<!-- Card image -->
								<!-- Card content -->
								<div class="card-body card-body-cascade text-center">
									<!-- Category & Title -->
									<a href="" class="text-muted">
										<h5>categoria</h5>
									</a>
									<h4 class="card-title">
										<strong>
											<a href="">{{ $producto->product}}</a>
										</strong>
									</h4>
									<!-- Description -->
									<p class="card-text">{{ $producto->description }}</p>
									<!-- Card footer -->
									<div class="card-footer px-1">
										<span class="float-left font-weight-bold">
											<strong>{{ $producto->price }} BsS</strong>
										</span>
										<span class="float-right">
											<a class="addcart mr-3" data-idproducto="68">
												<i class="fa fa-shopping-cart grey-text"></i>
											</a>
											<a class="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
												<i class="fa fa-heart grey-text"></i>
											</a>
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

@include('footer')