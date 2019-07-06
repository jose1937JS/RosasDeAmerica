@include('inc.header')

<body>

	@include('inc.navbar')





<!--Main layout-->
	<main class="mt-5 pt-4">
		<div class="container dark-grey-text mt-5">

			<!--Grid row-->
			<div class="row wow fadeIn">

				<!--Grid column-->
				<div class="col-md-6 mb-4">

					<div class="view overlay zoom">
						<img src='{{ asset("$product->image") }}' class="img-fluid" alt="">
					</div>

				</div>
				<!--Grid column-->

				<!--Grid column-->
				<div class="col-md-6 mb-4">

					<!--Content-->
					<div class="p-4">

						<div class="d-flex justify-content-start">
							<p class="h2 font-weight-bold mr-3">{{ $product->product }} </p>
							<p class="h5"><span class="badge purple">{{ $product->category->category }}</span></p>
						</div>

						<p class="h3 font-weight-light">
							desde <span class="font-weight-bold">{{ $product->price }} Bs </span> hasta <span class="font-weight-bold">00000 Bs</span>
						</p>

						<p class="lead font-weight-bold mt-5">Tipo de detalle:</p>
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
								aria-selected="true">Básico</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
								aria-selected="false">Estandar</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
								aria-selected="false">Premium</a>
							</li>
						</ul>
						<div class="tab-content mb-4" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">basico</div>
							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">standar</div>
							<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">premuin</div>
						</div>

						<form class="d-flex justify-content-left" id="add">

							<input type="hidden" id="id" value="{{ $product->id }}">
							<input type="hidden" id="producto" value="{{ $product->product }}">
							<input type="hidden" id="precio" value="{{ $product->price }}">

							@if(Auth::check())
								<input type="number" value="1" id="cantidad" min="1" class="form-control" style="width: 100px">
								<button class="btn btn-primary btn-md my-0" type="submit">Añadir al carro
									<i class="fas fa-shopping-cart ml-1"></i>
								</button>
							@else
								<input type="number" readonly value="1" class="form-control" style="width: 100px">
								<button class="btn btn-primary btn-md my-0" data-toggle="tooltip" title="Inicia sesión para poder añadir éste producto al carrito.">Añadir
									<i class="fas fa-shopping-cart ml-1"></i>
								</button>
							@endif
						</form>

						<p class="lead font-weight-bold mt-5">Descripción</p>
						<p>{{ $product->description }}</p>

					</div>
					<!--Content-->

				</div>
				<!--Grid column-->

			</div>
			<!--Grid row-->

			@include('inc.aditionalinfo')

		</div>
	</main>
	<!--Main layout-->

@include('inc.footer')