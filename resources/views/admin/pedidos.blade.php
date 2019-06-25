@include('inc.header')
<body>

@include('admin.navbar')

<div class="container my-5">
	<div class="row">
		<div class="col">

			<div class="card z-depth-1">
				@if ( count($ventas) > 0 )
					<div class="card-header">
						<h4>Ventas {{ $ventas[0]->state == 'despachado' ? 'por despachar' : 'pagadas' }}</h4>
					</div>
				@endif
				<div class="card-body">


					<!--Accordion wrapper-->
					@if ( count($ventas) > 0 )
						<div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

						@foreach ( $ventas as $v )
							<div class="card">

								<div class="card-header" role="tab" id="heading-{{ $v->id }}">
									<a data-toggle="collapse" href="#collapse-{{ $v->id }}" aria-expanded="true" aria-controls="collapse-{{ $v->id }}">
										<h5 class="mb-0 d-flex justify-content-between">
											<span>{{ $v->first_name.' '.$v->last_name.' - '.$v->amount.' - '.$v->created_at }}</span>
											<i class="fa fa-angle-down rotate-icon"></i>
										</h5>
									</a>
								</div>

								<div id="collapse-{{ $v->id }}" class="collapse" role="tabpanel" aria-labelledby="heading-{{ $v->id }}" data-parent="#accordionEx">
									<div class="card-body">

										<div class="row">

											<div class="col">
												<div class="row mb-3">
													<div class="col-md-3">
														<span class="font-weight-bold">Cédula:</span>
													</div>
													<div class="col">
														<span>{{ $v->pin }}</span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-md-3">
														<span class="font-weight-bold">Nombre Completo:</span>
													</div>
													<div class="col">
														<span>{{ $v->first_name.' '.$v->last_name }}</span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-md-3">
														<span class="font-weight-bold">Correo electrónico:</span>
													</div>
													<div class="col">
														<span>{{ $v->email }}</span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-md-3">
														<span class="font-weight-bold">Correo electrónico opcional:</span>
													</div>
													<div class="col">
														<span>{{ $v->customer_email }}</span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-md-3">
														<span class="font-weight-bold">Teléfono:</span>
													</div>
													<div class="col">
														<span>{{ $v->phone }}</span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-md-3">
														<span class="font-weight-bold">Teléfono opcional:</span>
													</div>
													<div class="col">
														<span>{{ $v->customer_phone }}</span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-md-3">
														<span class="font-weight-bold">Dirección:</span>
													</div>
													<div class="col">
														<span>{{ $v->address }}</span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-md-3">
														<span class="font-weight-bold">Método de pago:</span>
													</div>
													<div class="col">
														<span>{{ $v->pay_method }}</span>
													</div>
												</div>
											</div>

											<div class="col">
												<div class="row mb-3">

													<div class="col-md-3">
														<span class="font-weight-bold">Producto:</span>
													</div>
													<div class="col">
														<table class="table table-sm">
															<thead>
																<th>Producto</th>
																<th>Cantidad</th>
															</thead>
															<tbody>
																@foreach( $v->productos as $producto )
																	<tr>
																		<td>{{ $producto->product }}</td>
																		<td>{{ $producto->quantity }}</td>
																	</tr>
																@endforeach
															</tbody>
														</table>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-md-3">
														<span class="font-weight-bold">Precio Total:</span>
													</div>
													<div class="col">
														<span>{{ $v->amount }} BsS</span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-md-3">
														<span class="font-weight-bold">Dirección de entrega:</span>
													</div>
													<div class="col">
														<span>{{ $v->address_one }}</span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-md-3">
														<span class="font-weight-bold">Dirección de entrega 2:</span>
													</div>
													<div class="col">
														<span>{{ $v->address_two }}</span>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-md-3">
														<span class="font-weight-bold">Fecha de compra</span>
													</div>
													<div class="col">
														<span>{{ $v->created_at }}</span>
													</div>
												</div>

												@if( $v->nro_referencia != '')
													<div class="row mb-3">
														<div class="col-md-3">
															<span class="font-weight-bold">Código de la transferencia</span>
														</div>
														<div class="col">
															<span>{{ $v->nro_referencia }}</span>
														</div>
													</div>
												@endif
											</div>
										</div>

										@if ( preg_match('/pedidos\/pagado/', url()->current()) )
											<div class="row">
												<div class="col d-flex justify-content-end">
													<form action="{{ url('marcarcomodespachado') }}" method="post">
														@csrf
														<input type="hidden" name="idsale" value="{{ $v->id }}">
														<button type="submit" class="btn btn-primary btn-sm mr-2" data-toggle="tooltip" title="Marcar como despachado"><i class="fas fa-check"></i></button>
													</form>
												</div>
											</div>
										@endif
									</div>
								</div>
							</div>

						@endforeach
						</div>
					@else
						<h3 class="my-4">Por los momentos no hay ventas para mostrar.</h3>
					@endif

				</div>
			</div>

		</div>
	</div>
</div>



@include('inc.footer')