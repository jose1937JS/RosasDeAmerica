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
						<img src='{{ asset("storage/$product->image") }}' class="img-fluid" alt="">
					</div>

				</div>
				<!--Grid column-->

				<!--Grid column-->
				<div class="col-md-6 mb-4">

					<!--Content-->
					<div class="p-4">

						<div class="mb-3">
							<a href="">
								<span class="badge purple mr-1">{{ $product->category->category }}</span>
							</a>
<!-- 							<a href="">
								<span class="badge blue mr-1">New</span>
							</a>
							<a href="">
								<span class="badge red mr-1">Bestseller</span>
							</a> -->
						</div>

						<p class="lead font-weight-bold">
							{{ $product->product }}
						</p>

						<p class="lead">
							<span>{{ $product->price }} BsS </span>
							<span class="mr-1">
								<del>5200 BsS</del>
							</span>
						</p>

						<p class="lead font-weight-bold">Descripción</p>

						<p>{{ $product->description }}</p>

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