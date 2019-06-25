@include('inc.header')
<body>

@include('admin.navbar')

<div class="container my-5">

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="d-flex justify-content-between mb-4 ">
						<h3 class="font-weight-light">Datos para Pago Movil</h3>
						<button class="btn btn-primary p-2" data-toggle="modal" data-target="#addpm"><i class="fas fa-plus mr-2"></i>Añadir</button>
					</div>
					<table class="table table-sm table-bordered text-center">
						<thead>
							<th>BANCO</th>
							<th>CODIGO DEL BANCO</th>
							<th>TELEFONO</th>
							<th>CEDULA</th>
							<th>BORRAR?</th>
						</thead>
						<tbody>
							@foreach ($pagomovil as $pm)
								<tr>
									<td>{{ $pm->banco }}</td>
									<td>{{ $pm->cod_banco }}</td>
									<td>{{ $pm->telefono }}</td>
									<td>{{ $pm->cedula }}</td>
									<td>
										<form action='{{ url("BorrarCuentaPagoMovil/$pm->id") }}' method="post">
											@csrf
											<button onclick="return confirm('are you sure?')" class="btn btn-sm red px-2"><i class="fas fa-trash"></i></button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div class="d-flex justify-content-between mb-4 ">
						<h3 class="font-weight-light">Datos para las Transferencias</h3>
						<button class="btn btn-primary p-2" data-toggle="modal" data-target="#addtrans"><i class="fas fa-plus mr-2"></i>Añadir</button>
					</div>
					<table class="table table-sm table-bordered text-center">
						<thead>
							<th>BANCO</th>
							<th>NUMERO DE CUENTA</th>
							<th>TIPO DE CUENTA</th>
							<th>CEDULA</th>
							<th>TITULAR</th>
							<th>CORREO</th>
							<th>TELEFONO</th>
							<th>BORRAR?</th>
						</thead>
						<tbody>
							@foreach ($transferencias as $trans)
								<tr>
									<td>{{ $trans->banco }}</td>
									<td>{{ $trans->nro_cuenta }}</td>
									<td>{{ $trans->tipo_cuenta }}</td>
									<td>{{ $trans->cedula }}</td>
									<td>{{ $trans->titular }}</td>
									<td>{{ $trans->correo }}</td>
									<td>{{ $trans->telefono }}</td>
									<td>
										<form action='{{ url("BorrarCuentaTransferencia/$trans->id") }}' method="post">
											@csrf
											<button onclick="return confirm('are you sure?')" class="btn btn-sm red px-2"><i class="fas fa-trash"></i></button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>


{{-- MODAL PARA REGISTRAR PAGO MOVIL --}}
<!-- Modal -->
<div class="modal fade" id="addpm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registrar cuenta para Pago Movil</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('addCuentaPagoMovil') }}" method="post">
				@csrf
				<div class="modal-body">
					
					<div class="form-row">
						<div class="col">
							<label for="cedula">Cédula</label>
							<input type="text" name="cedula" placeholder="25887282" class="form-control" id="cedula" minlength="8" maxlength="9" pattern="^[0-9]+$">
						</div>
						<div class="col">
							<label for="banco">Nombre del Banco</label>
							<select name="banco" id="banco" class="custom-select browser-default" required>
								<option disabled selected>Selecciona un banco</option>
								<option>100%BANCO</option>
								<option>ABN AMRO BANK</option>
								<option>BANCAMIGA BANCO MICROFINANCIERO, C.A.</option>
								<option>BANCO ACTIVO BANCO COMERCIAL, C.A.</option>
								<option>BANCO AGRICOLA</option>
								<option>BANCO BICENTENARIO</option>
								<option>BANCO CARONI, C.A. BANCO UNIVERSAL</option>
								<option>BANCO DE DESARROLLO DEL MICROEMPRESARIO</option>
								<option>BANCO DE VENEZUELA S.A.I.C.A.</option>
								<option>BANCO DEL CARIBE C.A.</option>
								<option>BANCO DEL PUEBLO SOBERANO C.A.</option>
								<option>BANCO DEL TESORO</option>
								<option>BANCO ESPIRITO SANTO, S.A.</option>
								<option>BANCO EXTERIOR C.A.</option>
								<option>BANCO INDUSTRIAL DE VENEZUELA.</option>
								<option>BANCO INTERNACIONAL DE DESARROLLO, C.A.</option>
								<option>BANCO MERCANTIL C.A.</option>
								<option>BANCO NACIONAL DE CREDITO</option>
								<option>BANCO OCCIDENTAL DE DESCUENTO.</option>
								<option>BANCO PLAZA</option>
								<option>BANCO PROVINCIAL BBVA</option>
								<option>BANCO VENEZOLANO DE CREDITO S.A.</option>
								<option>BANCRECER S.A. BANCO DE DESARROLLO</option>
								<option>BANESCO BANCO UNIVERSAL</option>  
								<option>BANFANB</option>
								<option>BANGENTE</option>
								<option>BANPLUS BANCO COMERCIAL C.A</option>
								<option>CITIBANK.</option>
								<option>CORP BANCA.</option>
								<option>DELSUR BANCO UNIVERSAL</option>
								<option>FONDO COMUN</option>
								<option>INSTITUTO MUNICIPAL DE CR&#201;DITO POPULAR</option>
								<option>MIBANCO BANCO DE DESARROLLO, C.A.</option>
								<option>SOFITASA</option>
							</select>
						</div>
					</div>

					<div class="form-row mt-3">
						<div class="col">
							<label for="codbanco">Codigo del banco</label>
							<select name="cod_banco" id="codbanco" class="browser-default custom-select" required>
								<option disabled selected>Selecciona un codigo de banco</option>
								<option value="0156">(0156) - 100%BANCO</option>
								<option value="0196">(0196) - ABN AMRO BANK</option>
								<option value="0172">(0172) - BANCAMIGA BANCO MICROFINANCIERO, C.A.</option>
								<option value="0171">(0171) - BANCO ACTIVO BANCO COMERCIAL, C.A.</option>
								<option value="0166">(0166) - BANCO AGRICOLA</option>
								<option value="0175">(0175) - BANCO BICENTENARIO</option>
								<option value="0128">(0128) - BANCO CARONI, C.A. BANCO UNIVERSAL</option>
								<option value="0164">(0164) - BANCO DE DESARROLLO DEL MICROEMPRESARIO</option>
								<option value="0102">(0102) - BANCO DE VENEZUELA S.A.I.C.A.</option>
								<option value="0114">(0114) - BANCO DEL CARIBE C.A.</option>
								<option value="0149">(0149) - BANCO DEL PUEBLO SOBERANO C.A.</option>
								<option value="0163">(0163) - BANCO DEL TESORO</option>
								<option value="0176">(0176) - BANCO ESPIRITO SANTO, S.A.</option>
								<option value="0115">(0115) - BANCO EXTERIOR C.A.</option>
								<option value="0003">(0003) - BANCO INDUSTRIAL DE VENEZUELA.</option>
								<option value="0173">(0173) - BANCO INTERNACIONAL DE DESARROLLO, C.A.</option>
								<option value="0105">(0105) - BANCO MERCANTIL C.A.</option>
								<option value="0191">(0191) - BANCO NACIONAL DE CREDITO</option>
								<option value="0116">(0116) - BANCO OCCIDENTAL DE DESCUENTO.</option>
								<option value="0138">(0138) - BANCO PLAZA</option>
								<option value="0108">(0108) - BANCO PROVINCIAL BBVA</option>
								<option value="0104">(0104) - BANCO VENEZOLANO DE CREDITO S.A.</option>
								<option value="0168">(0168) - BANCRECER S.A. BANCO DE DESARROLLO</option>
								<option value="0134">(0134) - BANESCO BANCO UNIVERSAL</option>  
								<option value="0177">(0177) - BANFANB</option>
								<option value="0146">(0146) - BANGENTE</option>
								<option value="0174">(0174) - BANPLUS BANCO COMERCIAL C.A</option>
								<option value="0190">(0190) - CITIBANK.</option>
								<option value="0121">(0121) - CORP BANCA.</option>
								<option value="0157">(0157) - DELSUR BANCO UNIVERSAL</option>
								<option value="0151">(0151) - FONDO COMUN</option>
								<option value="0601">(0601) - INSTITUTO MUNICIPAL DE CR&#201;DITO POPULAR</option>
								<option value="0169">(0169) - MIBANCO BANCO DE DESARROLLO, C.A.</option>
								<option value="0137">(0137) - SOFITASA</option>
							</select>
						</div>
						<div class="col">
							<label for="telefono">Teléfono</label>
							<input type="text" name="telefono" class="form-control" id="telefono" maxlength="11" pattern="^[0-9]+$" required>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary p-3">Registrar</button>
				</div>
			</form>
		</div>
	</div>
</div>




{{-- MODAL PARA REGISTRAR transferencias --}}
<!-- Modal -->
<div class="modal fade" id="addtrans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registrar cuenta para Transferencia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('addCuentaTransferencia') }}" method="post">
				@csrf
				<div class="modal-body">
					
					<div class="form-row">
						<div class="col">
							<label for="nocuenta">Nro de Cuenta</label>
							<input type="text" name="nro_cuenta" placeholder="0000-0000-00-0000000000" class="form-control" id="nocuenta" minlength="23" maxlength="23" pattern="^[0-9]{4}-[0-9]{4}-[0-9]{2}-[0-9]{10}+$">
						</div>
						<div class="col">
							<label for="banco">Nombre del Banco</label>
							<select name="banco" id="banco" class="custom-select browser-default" required>
								<option disabled selected>Selecciona un banco</option>
								<option >100%BANCO</option><!--value="0156"-->
								<option >ABN AMRO BANK</option><!--value="0196"-->
								<option >BANCAMIGA BANCO MICROFINANCIERO, C.A.</option><!--value="0172"-->
								<option >BANCO ACTIVO BANCO COMERCIAL, C.A.</option><!--value="0171"-->
								<option >BANCO AGRICOLA</option><!--value="0166"-->
								<option >BANCO BICENTENARIO</option><!--value="0175"-->
								<option >BANCO CARONI, C.A. BANCO UNIVERSAL</option><!--value="0128"-->
								<option >BANCO DE DESARROLLO DEL MICROEMPRESARIO</option><!--value="0164"-->
								<option >BANCO DE VENEZUELA S.A.I.C.A.</option><!--value="0102"-->
								<option >BANCO DEL CARIBE C.A.</option><!--value="0114"-->
								<option >BANCO DEL PUEBLO SOBERANO C.A.</option><!--value="0149"-->
								<option >BANCO DEL TESORO</option><!--value="0163"-->
								<option >BANCO ESPIRITO SANTO, S.A.</option><!--value="0176"-->
								<option >BANCO EXTERIOR C.A.</option><!--value="0115"-->
								<option >BANCO INDUSTRIAL DE VENEZUELA.</option><!--value="0003"-->
								<option >BANCO INTERNACIONAL DE DESARROLLO, C.A.</option><!--value="0173"-->
								<option >BANCO MERCANTIL C.A.</option><!--value="0105"-->
								<option >BANCO NACIONAL DE CREDITO</option><!--value="0191"-->
								<option >BANCO OCCIDENTAL DE DESCUENTO.</option><!--value="0116"-->
								<option >BANCO PLAZA</option><!--value="0138"-->
								<option >BANCO PROVINCIAL BBVA</option><!--value="0108"-->
								<option >BANCO VENEZOLANO DE CREDITO S.A.</option><!--value="0104"-->
								<option >BANCRECER S.A. BANCO DE DESARROLLO</option><!--value="0168"-->
								<option >BANESCO BANCO UNIVERSAL</option>  <!--value="0134"-->
								<option >BANFANB</option><!--value="0177"-->
								<option >BANGENTE</option><!--value="0146"-->
								<option >BANPLUS BANCO COMERCIAL C.A</option><!--value="0174"-->
								<option >CITIBANK.</option><!--value="0190"-->
								<option >CORP BANCA.</option><!--value="0121"-->
								<option >DELSUR BANCO UNIVERSAL</option><!--value="0157"-->
								<option >FONDO COMUN</option><!--value="0151"-->
								<option >INSTITUTO MUNICIPAL DE CR&#201;DITO POPULAR</option><!--value="0601"-->
								<option >MIBANCO BANCO DE DESARROLLO, C.A.</option><!--value="0169"-->
								<option >SOFITASA</option><!--value="0137"-->
							</select>
						</div>
						<div class="col">
							<label for="tipocuenta">Tipo de Cuenta</label>
							<select name="tipo_cuenta" id="tipocuenta" class="custom-select browser-default">
								<option selected disabled>Seleccione el tipo de Cuenta</option>
								<option>Corriente</option>
								<option>Ahorro</option>
							</select>
						</div>
					</div>

					<div class="form-row mt-3">
						<div class="col">
							<label for="cedula">Cédula</label>
							<input type="text" name="cedula" placeholder="25887282" class="form-control" id="cedula" minlength="8" maxlength="9" pattern="^[0-9]+$">
						</div>
						<div class="col">
							<label for="telefono">Titular</label>
							<input type="text" name="titular" class="form-control" id="titular" required>
						</div>
					</div>

					<div class="form-row mt-3">
						<div class="col">
							<label for="telefono">Teléfono</label>
							<input type="text" name="telefono" class="form-control" id="telefono" maxlength="11" pattern="^[0-9]+$" required>
						</div>
						<div class="col">
							<label for="correo">Correo Electrónico</label>
							<input type="email" name="correo" class="form-control" id="correo" required>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary p-3">Registrar</button>
				</div>
			</form>
		</div>
	</div>
</div>

@include('inc.footer')