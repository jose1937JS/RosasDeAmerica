@include('inc.header')
<body>

@include('admin.navbar')

<div class="container my-5">
	<div class="col">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h4 class="font-weight-light">Reporte de Ventas</h4>
				<div>
					<button class="btn btn-primary btn-md px-2"><i class="fas fa-file-pdf mr-2"></i>  Total</button>
					<button class="btn btn-primary btn-md px-2"><i class="fas fa-file-pdf mr-2"></i> Diario</button>
				</div>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-sm" id="dtBasicExample">
					<thead>
						<tr>
							<th>Fecha</th>
							<th>Cliente</th>
							<th>Precio</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>2019-01-01</td>
							<td>Jose Lopez</td>
							<td>23000.99</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@include('inc.footer')