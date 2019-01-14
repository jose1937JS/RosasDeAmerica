@include('inc.header')

<body>

@include('inc.navbar')

<main class="mt-5 pt-5">
	<div class="container wow fadeIn">
		<h3 class="mb-4">Acerca de nosotros</h3>
		<div class="row mb-5">
			<div class="col">
				<div class="clearfix">
					<div class="view overlay zoom ml-3 float-right">
						<img src="{{ asset('images/image.jpg') }}" class="img-thumbnail" style="width: 300px" alt="404">
					</div>
					<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe omnis impedit, quisquam iste odio dignissimos. Placeat earum atque, porro. Quis blanditiis, non eos corporis recusandae deleniti consequuntur officia neque dolorum?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non est illo maiores magni eaque voluptatibus beatae velit vel veniam quos, vero fugit, voluptates nisi minima quaerat excepturi porro asperiores enim!</p>
					<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, rerum officiis cum aspernatur incidunt reprehenderit expedita. Quia voluptatibus amet tenetur commodi, beatae explicabo nihil consequatur non recusandae corporis? Veniam, rem?</p>
				</div>
			</div>
		</div>

		<h3 class="mb-4">Galeria de imágenes</h3>
		<div class="row">
			<div class="col">
				<!--Carousel Wrapper-->
				<div id="carousel-with-lb" class="carousel slide carousel-multi-item" data-ride="carousel">

					<!--Controls-->
					<!-- <div class="controls-top">
						<a class="btn-floating btn-secondary" href="#carousel-with-lb" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
						<a class="btn-floating btn-secondary" href="#carousel-with-lb" data-slide="next"><i class="fa fa-chevron-right"></i></a>
					</div> -->
					<!--/.Controls-->

					<!--Indicators-->
					<ol class="carousel-indicators">
						<li data-target="#carousel-with-lb" data-slide-to="0" class="active secondary-color"></li>
						<li data-target="#carousel-with-lb" data-slide-to="1" class="secondary-color"></li>
						<li data-target="#carousel-with-lb" data-slide-to="2" class="secondary-color"></li>
					</ol>
					<!--/.Indicators-->

					<!--Slides and lightbox-->

					<div class="carousel-inner mdb-lightbox" role="listbox">
						<div id="mdb-lightbox-ui"></div>
						<!--First slide-->
						<div class=" carousel-item active text-center">

							<figure class="col-md-4 d-md-inline-block view overlay zoom view overlay zoom">
								<a href="{{ asset('images/image.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image.jpg') }}" class="img-fluid">
								</a>
							</figure>

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image2.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image2.jpg') }}" class="img-fluid">
								</a>
							</figure>

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image3.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image3.jpg') }}" class="img-fluid">
								</a>
							</figure>

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image4.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image4.jpg') }}" class="img-fluid">
								</a>
							</figure>
							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image5.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image5.jpg') }}" class="img-fluid">
								</a>
							</figure>
							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image3.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image3.jpg') }}" class="img-fluid">
								</a>
							</figure>

						</div>
						<!--/.First slide-->

						<!--Second slide-->
						<div class="carousel-item text-center">

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image.jpg') }}" class="img-fluid">
								</a>
							</figure>

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image2.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image2.jpg') }}" class="img-fluid">
								</a>
							</figure>

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image4.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image4.jpg') }}" class="img-fluid">
								</a>
							</figure>

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image5.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image5.jpg') }}" class="img-fluid">
								</a>
							</figure>
							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image.jpg') }}" class="img-fluid">
								</a>
							</figure>
							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image2.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image2.jpg') }}" class="img-fluid">
								</a>
							</figure>

						</div>
						<!--/.Second slide-->

						<!--Third slide-->
						<div class="carousel-item text-center">

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image5.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image5.jpg') }}" class="img-fluid">
								</a>
							</figure>

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image4.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image4.jpg') }}" class="img-fluid">
								</a>
							</figure>

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image.jpg') }}" class="img-fluid">
								</a>
							</figure>

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image2.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image2.jpg') }}" class="img-fluid">
								</a>
							</figure>
							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image3.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image3.jpg') }}" class="img-fluid">
								</a>
							</figure>
							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/image4.jpg') }}" data-size="1452x966">
									<img src="{{ asset('images/image4.jpg') }}" class="img-fluid">
								</a>
							</figure>

						</div>
						<!--/.Third slide-->

					</div>
					<!--/.Slides-->

				</div>
				<!--/.Carousel Wrapper-->
			</div>
		</div>
	</div>
</main>


@include('inc.footer')