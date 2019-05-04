@include('inc.header')

<body>

@include('inc.navbar')
<br>

<main class="mt-5 pt-5">
	<div class="container wow fadeIn">
		<h3 class="mb-4">Acerca de nosotros</h3>
		<div class="row mb-5">
			<div class="col">
				<div class="clearfix">
					<div class="view overlay zoom ml-3 float-right">
						<img src="{{ asset('images/49234229_1197835913703000_3831947010919890944_n.jpg') }}" class="img-thumbnail" style="width: 300px" alt="404">
					</div>
					<p class="text-justify">Creada en San Juan de los Morros, Venezuela en el año 2011 con la misión de prestar un servicio de altura, con innovación diaria y creatividad en los diseños, además de la garantía de un excelente servicio, con un equipo de trabajo que siempre ha tenido como meta, LA EXCELENCIA y la buena atención a sus clientes. Disponemos de servicio a nivel nacional a más de 10 estados, garantizando un 100% de satisfacción.</p>

					<p class="text-justify">Ofrecemos frescura y puntualidad en todas nuestras entregas y garantizamos la calidad de nuestras creaciones florales y atención. Trabajamos con los mejores cultivos Colombianos, Ecuatorianos y Venezolanos, ofertando gran variedad de colores y matices en las diferentes flores y follajes con los que trabajamos.</p>

					<p class="text-justify">La Floristeria Rosas de América expande su servicio a través de Internet desde 2018, y ha sido una de las floristerías pioneras en todo el centro del pais. La respuesta de los clientes no se ha hecho esperar, superando las expectativas , lo que ha llevado a mejorar cada vez más nuestro servicio. La receptividad ha sido la recompensa, por la facilidad de uso y el esmero que ponemos en el cuidado de nuestros clientes. Nuestro formato, espera complacer al usuario que nos visita y realiza sus compras por nuestro portal en Internet.</p>

					<p class="text-justify">Si Usted tiene una pregunta específica acerca de nuestra empresa o los servicios provistos por nosotros, envíenos un comunicado y le haremos llegar la información solicitada a la brevedad posible.</p>

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
					</ol>
					<!--/.Indicators-->

					<!--Slides and lightbox-->

					<div class="carousel-inner mdb-lightbox" role="listbox">
						<div id="mdb-lightbox-ui"></div>
						<!--First slide-->
						<div class=" carousel-item active text-center">

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/49143079_356699498445850_3333375907141255168_n.jpg') }}">
									<img src="{{ asset('images/49143079_356699498445850_3333375907141255168_n.jpg') }}" class="img-fluid" style="height: 500px; width: 300px">
								</a>
							</figure>

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/50870281_1561592883943672_8870469451909169152_n.jpg') }}">
									<img src="{{ asset('images/50870281_1561592883943672_8870469451909169152_n.jpg') }}" class="img-fluid" style="height: 500px; width: 300px">
								</a>
							</figure>

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/50405223_1731211286982880_2423251064145838080_n.jpg') }}">
									<img src="{{ asset('images/50405223_1731211286982880_2423251064145838080_n.jpg') }}" class="img-fluid" style="height: 500px; width: 300px">
								</a>
							</figure>

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/50078631_368405970616169_8192968271117418496_n.jpg') }}">
									<img style="height: 300px; width: 300px" src="{{ asset('images/50078631_368405970616169_8192968271117418496_n.jpg') }}" class="img-fluid">
								</a>
							</figure>
							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/50229526_2032867466789579_9097872684443762688_n.jpg') }}">
									<img style="height: 300px; width: 300px" src="{{ asset('images/50229526_2032867466789579_9097872684443762688_n.jpg') }}" class="img-fluid">
								</a>
							</figure>
							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/50734542_2233179860269821_8332679163504754688_n.jpg') }}">
									<img style="height: 300px; width: 300px" src="{{ asset('images/50734542_2233179860269821_8332679163504754688_n.jpg') }}" class="img-fluid">
								</a>
							</figure>

						</div>
						<!--/.First slide-->

						<!--Second slide-->
						<div class="carousel-item text-center">

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/50534665_1276646912487129_518228967228964864_n.jpg') }}">
									<img src="{{ asset('images/50534665_1276646912487129_518228967228964864_n.jpg') }}" style="height: 500px; width: 300px" class="img-fluid">
								</a>
							</figure>

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/50763277_235327277369631_7649231866779664384_n.jpg') }}">
									<img src="{{ asset('images/50763277_235327277369631_7649231866779664384_n.jpg') }}" style="height: 500px; width: 300px" class="img-fluid">
								</a>
							</figure>

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/50796975_220480312240921_8769849492129185792_n.jpg') }}">
									<img src="{{ asset('images/50796975_220480312240921_8769849492129185792_n.jpg') }}" style="height: 500px; width: 300px" class="img-fluid">
								</a>
							</figure>

							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/50249875_386148148615894_7266743459745103872_n.jpg') }}">
									<img style="height: 300px; width: 300px" src="{{ asset('images/50249875_386148148615894_7266743459745103872_n.jpg') }}" class="img-fluid">
								</a>
							</figure>
							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/50464633_387346442070310_8122469775977742336_n.jpg') }}">
									<img style="height: 300px; width: 300px" src="{{ asset('images/50464633_387346442070310_8122469775977742336_n.jpg') }}" class="img-fluid">
								</a>
							</figure>
							<figure class="col-md-4 d-md-inline-block view overlay zoom">
								<a href="{{ asset('images/50454591_390348788462689_7917641887983337472_n.jpg') }}">
									<img style="height: 300px; width: 300px" src="{{ asset('images/50454591_390348788462689_7917641887983337472_n.jpg') }}" class="img-fluid">
								</a>
							</figure>

						</div>
						<!--/.Second slide-->


					</div>
					<!--/.Slides-->

				</div>
				<!--/.Carousel Wrapper-->
			</div>
		</div>
	</div>
</main>


@include('inc.footer')