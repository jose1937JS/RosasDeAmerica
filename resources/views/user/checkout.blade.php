@include('inc.header')
<br>
<body class="grey lighten-3">

@include('inc.navbar')

<!--Main layout-->
	<main class="mt-5 pt-4">
		<div class="container wow fadeIn">

		<br>

			@if ( session('errorcompra') )
			    <div class="alert alert-danger alert-dismissible fade show my-3 z-depth-1" role="alert">
					<i class="fas fa-bug mr-2"></i>{{ session('errorcompra') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			@elseif ( session('success') )
				 <div class="alert alert-success alert-dismissible fade show my-3 z-depth-1" role="alert">
					<i class="fas fa-check mr-2"></i>{{ session('success') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			@endif

			<div class="row">

				<div class="col-md-8 mb-4">
					<div class="card">
						<div class="card-header d-flex justify-content-between">
							<h3>Método de pago</h3>
							<a class="btn btn-primary btn-md" href="{{ url('factura') }}"><i class="fas fa-file-pdf mr-2"></i>factura</a>
						</div>
						<div class="card-body">

							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
									aria-selected="true"><i class="fas fa-credit-card mr-2"></i>Tarjeta de crédito</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
									aria-selected="false"><i class="fas fa-exchange-alt mr-2"></i>Transferencia</a>
								</li>
								<!--<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
									aria-selected="false"><i class="fas fa-mobile-alt mr-2"></i>Pago movil</a>
								</li> -->
							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

									<form id="checkout_form" method="post" action="{{ url('tarjeta') }}">
										@csrf

										<input type="hidden" name="people_id" value="{{ Auth::user()->people_id }}">
										<input type="hidden" name="cantidad" value="{{ $cantidad }}">
										<input type="hidden" name="monto" value="{{ $total }}">
										<input type="hidden" name="pay_method" value="Tarjeta de crédito">

										<input type="hidden" name="productos" value="{{ json_encode($productos) }}">

										<p class="small mb-2">Todos los campos marcados con (*) son requeridos.</p>

										<h4 class="my-4">Información del cliente</h4>

										<div class="form-row">
											<div class="col-md-4 mb-2">
												<div class="md-form ">
													<input type="text" value="{{ $user->people->pin }}" disabled class="form-control">
													<label for="firstName">Cédula</label>
												</div>
											</div>
											<div class="col-md-4 mb-2">
												<div class="md-form ">
													<input type="text" value="{{ $user->people->first_name }}" disabled class="form-control">
													<label for="firstName">Nombre</label>
												</div>
											</div>

											<div class="col-md-4 mb-2">
												<div class="md-form">
													<input type="text" value="{{ $user->people->last_name }}" disabled class="form-control" required>
													<label for="lastName">Apellido</label>
												</div>
											</div>
										</div>

										<div class="form-row">
											<div class="col-md-6">
												<div class="md-form">
													<input type="text" name="phone" class="form-control validate" id="telefono" value="{{ $user->people->phone }}" maxlength="11" pattern="^[0-9]+$">
													<label for="telefono">Teléfono</label>
													@if( $errors->has('phone') )
														@foreach( $errors->get('phone') as $error )
															<p class="small text-danger">{{ $error }}</p>
														@endforeach
													@endif
												</div>
											</div>
											<div class="col-md-6">
												<div class="md-form">
													<input type="email" id="email" class="form-control validate" name="email" value="{{ $user->people->email }}" required>
													<label for="email">Email *</label>
													@if( $errors->has('email') )
														@foreach( $errors->get('email') as $error )
															<p class="small text-danger">{{ $error }}</p>
														@endforeach
													@endif
												</div>
											</div>
										</div>

										<h4 class="my-4">Información de la entrega</h4>

										<div class="md-form my-5">
											<input type="text" id="address" name="address_one" class="form-control" placeholder="1234 Main St" required>
											<label for="address">Dirección *</label>
											<small class="text-muted">Dirección de la entrega</small>
											@if( $errors->has('address_one') )
												@foreach( $errors->get('address_one') as $error )
													<p class="small text-danger">{{ $error }} </p>
												@endforeach
											@endif
										</div>

										<div class="md-form mb-5">
											<input type="text" id="address-2" name="address_two" class="form-control" placeholder="Apartment or suite">
											<label for="address-2">Dirección 2</label>
											@if( $errors->has('address_two') )
												@foreach( $errors->get('address_two') as $error )
													<p class="small text-danger">{{ $error }} </p>
												@endforeach
											@endif
										</div>

										<!-- <div class="form-row">
											<div class="col-lg-4 col-md-12 mb-4">

												<select class="mdb-select md-form" required>
													<option selected disabled>Choose ...</option>
													<option value="1">Option 1</option>
												</select>
												<label>Estado</label>

											</div>

											<div class="col-lg-4 col-md-6 mb-4">

												<select class="mdb-select md-form" required>
													<option selected disabled>Choose ...</option>
													<option value="1">Option 1</option>
												</select>
												<label>Ciudad</label>

											</div>

											<div class="col-lg-4 col-md-6 mb-4">

												<label for="zip">Zip</label>
												<input type="text" class="form-control" id="zip" placeholder="" required>
												<div class="invalid-feedback">
													Zip code required.
												</div>

											</div>

										</div> -->

										<h4 class="my-4">Información de la tarjeta de crédito</h4>

										<div class="form-row">
											<div class="col-md-6 mb-3">
												<div class="md-form">
													<label for="cc-number">Credit card number</label>
													<input type="text" maxlength="19" minlength="16" pattern="^[0-9]+$" class="form-control validate" id="cc-number" name="cc-number" required>
													@if( $errors->has('cc-number') )
														@foreach( $errors->get('cc-number') as $error )
															<p class="small text-danger">{{ $error }} </p>
														@endforeach
													@endif
												</div>
											</div>
											<div class="col-md-3"><img class="img-fluid" src="{{ asset('images/visa.jpg') }}"></div>
											<div class="col-md-3"><img class="img-fluid" style="height: 55px" src="{{ asset('images/mastercard.png') }}"></div>
										</div>

										<div class="form-row">

											<div class="col-md-3 mb-3">
												<div class="md-form">
													<label for="cc-cvv">CVC</label>
													<input type="password" maxlength="3" name="cvc" class="form-control" id="cc-cvv" required>
													@if( $errors->has('cvc') )
														@foreach( $errors->get('cvc') as $error )
															<p class="small text-danger">{{ $error }} </p>
														@endforeach
													@else
														<small class="text-muted">Últimos 3 dígitos del reverso de la tarjeta</small>
													@endif
												</div>
											</div>
											<div class="col-md-6">
												<div class="md-form">
													<label for="nombretarjeta">Nombre en la tarjeta</label>
													<input type="text" class="form-control validate" name="nameincard" id="nombretarjeta" pattern="^[a-zA-Z]+(?:\s?[a-zA-Z]\s?)+$" required>
													@if( $errors->has('nameincard') )
														@foreach( $errors->get('nameincard') as $error )
															<p class="small text-danger">{{ $error }} </p>
														@endforeach
													@else
														<small class="text-muted">Nombre en la tarjeta sin acentos ni puntos.</small>
													@endif
												</div>
											</div>
											<div class="col-md-3 mb-3">
												<div class="md-form">
													<label for="cc-expiration">Vencimiento</label>
													<input type="text" name="vencimiento" maxlength="5" minlength="5" class="form-control validate" id="cc-expiration" placeholder="MM/YY" pattern="^[0-9]{2}/[0-9]{2}$">
												</div>
												@if( $errors->has('vencimiento') )
													@foreach( $errors->get('vencimiento') as $error )
														<p class="small text-danger">{{ $error }} </p>
													@endforeach
												@endif
											</div>

										</div>

										<div class="form-row mb-5">
											<div class="col-md-12">
												<div class="md-form">
													<label for="descripcion">Descripción de la operación</label>
													<input type="text" class="form-control" name="descripcion" id="descripcion" required>
												</div>
											</div>
										</div>

										@if( count($productos) > 0 )
											<button class="btn btn-primary btn-lg btn-block" type="submit"><i class="fas fa-cart-arrow-down mr-3"></i>Continue to checkout</button>
										@else
											<button type="button" class="btn btn-light btn-lg btn-block" data-toggle="tooltip" title="No tienes ningún producto en el carrito."><i class="fas fa-cart-arrow-down mr-2"></i>Continue to checkout</button>
										@endif

										<div class="mt-5 text-center small">
											<p>Esta transacción será procesada de forma segura gracias a la plataforma de</p>
											<img class="img-fluid" width="300px" src="{{ url('images/instapago.jpg') }}" alt="instapago image">
										</div>
									</form>
								</div>

								<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

									<h4 class="my-4">Información de la transferencia</h4>

									<p>Aceptamos transferencias de los siguientes bancos:</p>

									<!--Accordion wrapper-->
									<div class="accordion mb-4" id="accordionEx" role="tablist" aria-multiselectable="true">

										<!-- Accordion card -->
										<div class="card mb-3 hoverable">

											<!-- Card header -->
											<div class="card-header bg-primary" role="tab" id="headingOne">
												<a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													<h5 class="mb-0 d-flex justify-content-between text-white">
														<span>Banco de Venezuela</span><i class="fa fa-angle-down rotate-icon"></i>
													</h5>
												</a>
											</div>
											<!-- Card body -->
											<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionEx">
												<div class="card-body">

													<div class="row mb-2">
														<div class="col-md-3">
															<span class="font-weight-bold">Nro. de cuenta:</span>
														</div>
														<div class="col">
															<span>0102 0467 11 0000001234</span>
														</div>
													</div>
													<div class="row mb-2">
														<div class="col-md-3">
															<span class="font-weight-bold">Tipo de cuenta:</span>
														</div>
														<div class="col">
															<span>Corriente</span>
														</div>
													</div>
													<div class="row mb-2">
														<div class="col-md-3">
															<span class="font-weight-bold">Titular:</span>
														</div>
														<div class="col">
															<span>Jessica del Carmen Lopez Ortiz</span>
														</div>
													</div>
													<div class="row mb-2">
														<div class="col-md-3">
															<span class="font-weight-bold">Correo:</span>
														</div>
														<div class="col">
															<span>jessica@lopez.com</span>
														</div>
													</div>

												</div>
											</div>
										</div>
										<!-- Accordion card -->

										<!-- Accordion card -->
										<div class="card mb-3 hoverable">

											<!-- Card header -->
											<div class="card-header bg-primary" role="tab" id="headingTwo">
												<a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
													<h5 class="mb-0 d-flex justify-content-between text-white">
														<span>Banco Occidental de Descuento</span><i class="fa fa-angle-down rotate-icon"></i>
													</h5>
												</a>
											</div>

											<!-- Card body -->
											<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx">
												<div class="card-body">

													<div class="row mb-2">
														<div class="col-md-3">
															<span class="font-weight-bold">Nro. de cuenta:</span>
														</div>
														<div class="col">
															<span>0102 0467 11 0000001234</span>
														</div>
													</div>
													<div class="row mb-2">
														<div class="col-md-3">
															<span class="font-weight-bold">Tipo de cuenta:</span>
														</div>
														<div class="col">
															<span>Corriente</span>
														</div>
													</div>
													<div class="row mb-2">
														<div class="col-md-3">
															<span class="font-weight-bold">Titular:</span>
														</div>
														<div class="col">
															<span>Jessica del Carmen Lopez Ortiz</span>
														</div>
													</div>
													<div class="row mb-2">
														<div class="col-md-3">
															<span class="font-weight-bold">Correo:</span>
														</div>
														<div class="col">
															<span>jessica@lopez.com</span>
														</div>
													</div>

												</div>
											</div>
										</div>
										<!-- Accordion card -->

										<!-- Accordion card -->
										<div class="card hoverable">

											<!-- Card header -->
											<div class="card-header bg-primary" role="tab" id="headingThree">
												<a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
													<h5 class="mb-0 d-flex justify-content-between text-white">
														<span>Banco Bicentenario</span><i class="fa fa-angle-down rotate-icon"></i>
													</h5>
												</a>
											</div>

											<!-- Card body -->
											<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordionEx">
												<div class="card-body">

													<div class="row mb-2">
														<div class="col-md-3">
															<span class="font-weight-bold">Nro. de cuenta:</span>
														</div>
														<div class="col">
															<span>0102 0467 11 0000001234</span>
														</div>
													</div>
													<div class="row mb-2">
														<div class="col-md-3">
															<span class="font-weight-bold">Tipo de cuenta:</span>
														</div>
														<div class="col">
															<span>Corriente</span>
														</div>
													</div>
													<div class="row mb-2">
														<div class="col-md-3">
															<span class="font-weight-bold">Titular:</span>
														</div>
														<div class="col">
															<span>Jessica del Carmen Lopez Ortiz</span>
														</div>
													</div>
													<div class="row mb-2">
														<div class="col-md-3">
															<span class="font-weight-bold">Correo:</span>
														</div>
														<div class="col">
															<span>jessica@lopez.com</span>
														</div>
													</div>

												</div>
											</div>
										</div>
										<!-- Accordion card -->
									</div>
									<!--/.Accordion wrapper-->



									<form action="{{ url('tarjeta') }}" method="post">
										@csrf

										<input type="hidden" name="people_id" value="{{ Auth::user()->people_id }}">
										<input type="hidden" name="cantidad" value="{{ $cantidad }}">
										<input type="hidden" name="monto" value="{{ $total }}">
										<input type="hidden" name="pay_method" value="Transferencia bancaria">

										<input type="hidden" name="productos" value="{{ json_encode($productos) }}">

										<h4 class="my-5">Información del cliente</h4>

										<div class="form-row">
											<div class="col-md-4 mb-2">
												<div class="md-form ">
													<input type="text" value="{{ $user->people->pin }}" disabled class="form-control">
													<label for="firstName">Cédula</label>
												</div>
											</div>
											<div class="col-md-4 mb-2">
												<div class="md-form ">
													<input type="text" value="{{ $user->people->first_name }}" disabled class="form-control">
													<label for="firstName">Nombre</label>
												</div>
											</div>

											<div class="col-md-4 mb-2">
												<div class="md-form">
													<input type="text" value="{{ $user->people->last_name }}" disabled class="form-control" required>
													<label for="lastName">Apellido</label>
												</div>
											</div>
										</div>

										<div class="form-row">
											<div class="col-md-6">
												<div class="md-form">
													<input type="text" name="phone" class="form-control" id="telefono" value="{{ $user->people->phone }}" pattern="^[0-9]+$" maxlength="11">
													<label for="telefono">Teléfono</label>
												</div>
											</div>
											<div class="col-md-6">
												<div class="md-form">
													<input type="email" id="email" class="form-control validate" name="email" value="{{ $user->people->email }}" required>
													<label for="email">Email *</label>
												</div>
											</div>
										</div>

										<h4 class="my-4">Información de la entrega</h4>

										<div class="md-form my-5">
											<input type="text" id="address" name="address_one" class="form-control" placeholder="1234 Main St" required>
											<label for="address">Dirección *</label>
											<small class="text-muted">Dirección de la entrega</small>
										</div>

										<div class="md-form mb-5">
											<input type="text" id="address-2" name="address_two" class="form-control" placeholder="Apartment or suite">
											<label for="address-2">Dirección 2</label>
										</div>

										<!-- <div class="form-row">
											<div class="col-lg-4 col-md-12 mb-4">

												<select class="mdb-select md-form" required>
													<option selected disabled>Choose ...</option>
													<option value="1">Option 1</option>
												</select>
												<label>Estado</label>

											</div>

											<div class="col-lg-4 col-md-6 mb-4">

												<select class="mdb-select md-form" required>
													<option selected disabled>Choose ...</option>
													<option value="1">Option 1</option>
												</select>
												<label>Ciudad</label>

											</div>

										</div> -->

										<h4 class="my-4">Comprobante de la transferencia</h4>

										<div class="form-row mb-5">
											<div class="col">
												<div class="md-form">
													<input type="text" id="ref" name="referencia" maxlength="15" min="8" class="form-control validate" pattern="^\d+$" required>
													<label for="ref">Número de referencia bancario</label>
												</div>
											</div>
										</div>

										@if( count($productos) > 0 )
											<button class="btn btn-primary btn-lg btn-block" type="submit"><i class="fas fa-cart-arrow-down mr-3"></i>Continue to checkout</button>
										@else
											<button type="button" class="btn btn-light btn-lg btn-block" data-toggle="tooltip" title="No tienes ningún producto en el carrito."><i class="fas fa-cart-arrow-down mr-2"></i>Continue to checkout</button>
										@endif

									</form>

								</div>


								{{-- Pago movil --}}
								<!--<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
									de igual manera con esta forma de pago. campo para el numero de referencia y esas cosas.
									{{ csrf_token() }}
								</div>-->
							</div>

						</div>
					</div>

				</div>

				<div class="col-md-4 mb-4">
					<!-- Heading -->
					<div class="card">
						<div class="card-header d-flex justify-content-between align-items-center">
							<h3>Tu carrito</h3>
							@if( $cantidad > 0 )
								<h3><span class="badge badge-primary ">{{ $cantidad }}</span></h3>
							@endif
						</div>
					</div>

					<!-- Cart -->
					<ul class="list-group mb-3 z-depth-1">

						@foreach( $productos as $producto )
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div>
									<h6 class="my-0">{{ $producto->name }}</h6>
									<small class="text-muted">Cantidad: {{ $producto->qty }}</small>
								</div>
								<form method="post" action="{{ url('deleteitem') }}">
									@csrf
									<input type="hidden" name="rowid" value="{{ $producto->rowId }}">

									<span class="text-muted">{{ number_format($producto->priceTax, 2, ',', '.') }} BsS</span>
									<button class="btn p-0 btn-flat" data-toggle="tooltip" title="Eliminar producto" type="submit">
										<span class="red-text ml-3"><i class="fas fa-times fa-2x"></i></span>
									</button>
								</form>
							</li>
						@endforeach
						<li class="list-group-item d-flex justify-content-between">
							<span class="font-weight-bold">IVA (BsS)</span>
							<span class="font-weight-bold">{{ $tax }}</span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span class="font-weight-bold">Total (BsS)</span>
							<span class="font-weight-bold">{{ number_format($total, 2, ',', '.') }}</span>
						</li>
					</ul>

					@if( count($productos) > 0 )
						<form action="{{ url('destroy') }}" method="post">
							@csrf
							<button class="btn btn-lg btn-primary btn-block mt-4 waves-effect" type="submit"><i class="fas fa-trash mr-2"></i>Limpiar carrito</button>
						</form>
					@endif
				</div>

			</div>

		</div>
	</main>

@include('inc.footer')