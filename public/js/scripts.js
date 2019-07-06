// <label>Show <select name="dtBasicExample_length" aria-controls="dtBasicExample" class="custom-select browser-default"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>

$(() => {

	$('[data-toggle="tooltip"]').tooltip()
	$('.mdb-select').materialSelect()
	$('#dtBasicExample').DataTable()
	$('#dt').DataTable()
	$('#tablecat').DataTable()
	// $('.dataTables_length').addClass('bs-select');
	// console.log($('#dtBasicExample > label'))



	function sumarPrecioProductos(){
		let arr = [], acum = 0;

		$('.precio').each((index, elem) => {
			if ( isNaN(parseInt(elem.value)) ) {
				arr.push(0)
			}
			else {
				arr.push(parseInt(elem.value))
			}	
		})

		for (let i = 0; i < arr.length; i++) {
			acum = acum + arr[i]
		}
		
		$('#preciototal').text(`${acum} Bs`)
	}


	// Verificar la existencia del comprador
	$('#cedula').keyup(() => {
		$.ajax({
			method: 'get',
			url : 'http://127.0.0.1:8000/cedula',
			data : { cedula : $('#cedula').val() }
		})

		.done((data) => {
			if (data.length > 0) {
				$('#nombre').val(data[0].first_name)
				$('#apellido').val(data[0].last_name)
				$('#telefono').val(data[0].phone)
				$('#direccion').val(data[0].address)
				$('#nombre, #apellido, #telefono, #direccion').attr('readonly', '')

				$('#newclient').removeAttr('value')
				$('#newclient').attr('value', 0)
			}
			else {
				$('#nombre, #apellido, #telefono, #direccion').removeAttr('readonly')
				$('#newclient').removeAttr('value')
				$('#newclient').attr('value', 1)
			}
		})

		.fail((error) => {
			console.error(error)
		})
	})


	let i = 0

	$('#dsa').click(() => {
		
		i = i + 1

		$('#np').append(`
			<div class="form-row my-4 px-3 precioo">
				<div class="col">
					<label for="producto-${i}">Producto</label>
					<select class="browser-default custom-select producto" data-num="${i}" name="producto-${i}" id="producto-${i}" required>
						<option disabled selected>Producto(s)</option>
					</select>
				</div>
				<div class="col">
					<label for="precio-${i}">Precio</label>
					<input type="text" class="form-control precio" name="precio-${i}" id="price-${i}" readonly required>
				</div>
			</div>
		`)

		$.get('http://127.0.0.1:8000/productos', (data) => {

			for( d of data ){
				$(`#producto-${i}`).append(`<option value="${d.id}" data-precio="${d.price}">${d.product}</option>`)
			}
		})

		$(`select.producto`).change(function(e) {
			console.log(i)
			$(`#${e.target.id} option:selected`).each(function(index, elem) {
				let num = e.target.dataset.num
				$(`#price-${num}`).val(elem.dataset.precio)
			})
			sumarPrecioProductos()
		})
	})

	// añadir campos para la resta de los materiales con lo q esta hecho un producto
	let cont = 0
	$('.addcantpro').click(function() {
		cont = cont + 1

		console.log($(this))

		$(this)
			.parents('.idk')
			.children('.cantidadproducto')
			.append(`
				<div class="form-row mt-3 mb-4 camposcant">
					<div class="col-10 offset-1">
						<div class="form-row">
							<div class="col">
								<label>Material para el producto</label>
								<select class="custom-select browser-default" name="material-${cont}" id="material-${cont}">
									<option disabled selected>Selecciona un material</option>
								</select>
							</div>
							<div class="col-3">
								<label for="cant-${cont}">Cant de material</label>
								<input type="number" id="cant-${cont}" class="form-control" name="cantidad-${cont}" min="0">
							</div>
							<div class="col-3">
								<label for="">Precio del material</label>
								<div class="input-group mb-3">
									<input type="text" class="form-control" disabled>
									<div class="input-group-append">
										<span class="input-group-text">$</span>
									</div>
								</div>
							</div>
							<div class="col-1 d-flex align-items-center">
								<button class="btn btn-sm p-2 btn-danger eliminame" data-toggle="tooltip" type="button">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<div class="form-row">
							<div class="col-4">
							<label for="">Precio del producto</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-dollar"></i></span>
									</div>
									<input type="text" class="form-control" disabled>
								</div>
							</div>
						</div>
					</div>
				</div>
			`)

		// Llenar el select con los productos 
		$.get('http://127.0.0.1:8000/comprasProveedor', (data) => {

			for( d of data ){
				console.log('El truco de los option dinamicos esta en agregar los campos nuevos calmadamente para q se pueda llenar sin ningun inconveniente')
				$(`#material-${cont}`).append(`<option value="${d.id}">${d.product}</option>`)
			}
		})

		// Eliminar los campos correspondientes
		$('.eliminame').click(function() {
			cont = cont - 1
			$(this).parents('.camposcant').remove()
		})

	})




	// Poner en el campo del precio el precio del producto
	$(`#producto-0`).change((e) => {
		console.log('fuera del ciclo')
		$(`#producto-0 option:selected`).each((index, elem) => {
			// Probar elem.dataset.precio en navegadores basados en chrome
			$(`#price-0`).val(elem.dataset.precio)
		})
		sumarPrecioProductos()
	})


	// Eliminar los ultimos inputs producto/precio 
	$('#elimelem').click(() => {
		i = i - 1
		$('.precioo:last').remove()
		sumarPrecioProductos()
	})


	// Eliminar el producto comprado a un proveedor por medio de ajax
	$('.delproduct').click(function(){
		let id = $(this).parents('tr').children('td').first().text()

		$('#idproductocompra').val(id)
	}) 


	// resgistrar compra al proveedor

	let acum = 0
	$('#agcomprapro').click(() => {
		
		acum = acum + 1
		
		$('#compracampo').append(`
			<div class="form-row my-4 provcampo">
				<div class="col">
					<div class="md-form">
						<i class="fas fa-cubes prefix"></i>
						<input type="text" name="producto-${acum}" id="producto-${acum}" class="form-control" required>
						<label for="producto-${acum}">Producto</label>
					</div> 
				</div>
				<div class="col-3">
					<div class="md-form">
						<i class="fas fa-cubes prefix"></i>
						<input type="number" min="0" value="1" name="cantidad-${acum}" id="cantidad-${acum}" class="form-control" required>
						<label for="cantidad-${acum}">Cantidad</label>
					</div>
				</div>
				<div class="col-3">
					<div class="md-form">
						<i class="fas fa-dollar prefix"></i>
						<input type="text" name="precio-${acum}" id="precio-${acum}" class="form-control validate" required pattern="^[0-9]+$">
						<label for="precio-${acum}">Precio</label>
					</div>
				</div>
			</div>
		`)
	})


	// Eliminar los ultimos inputs de compra al proveedor
	$('#elimcomprapro').click(() => {
		acum = acum - 1
		$('.provcampo:last').remove()
	})



	$('#addpbtn').click(() => {
		$('#addpmdl').modal()
	})

	$('#addcatbtn').click(() => {
		$('#addcatmdl').modal()
	})

	$('#addcomprabtn').click(() => {
		$('#addcompramdl').modal()
	})

	$('#addsupplierbtn').click(() => {
		$('#addsupplier').modal()
	})

	$.ajax({
		method: 'get',
		url : 'http://127.0.0.1:8000/count'
	})
	.done((s) => {
		if ( s > 0 ) {
			let n = $('#n')
			n.css('display', 'inline')
			n.text(s)
		}
	})

	// $('#addcompraproveedor').submit(e => {
	// 	e.preventDefault()

	// 	$.ajax({
	// 		method: 'get',
	// 		url: 'http://127.0.0.1:8000/addcompraproveedor',
	// 		data : $('#addcompraproveedor').serialize()
	// 	})

	// 	.done((d) => {

	// 		$('#producto').val('')
	// 		$('#cantidad').val('')
	// 		$('#proveedor').val('')
	// 		$('#precio').val('')
	// 		$('#pay_method').val('')

	// 		toastr.success('Registrado Correctamente')
	// 	})

	// 	.fail((e) => {
	// 		console.log(e)
	// 		toastr.error('Ha ocurrido un error.')
	// 	})
	// })

	function ajax(id, producto, precio, cantidad)
	{
		let qty = 1

		if (arguments[3]) {	qty = cantidad }

		$.ajax({
			method: 'get',
			url : `http://127.0.0.1:8000/add/${id}/${producto}/${qty}/${precio}`,
			// data : $.param({ id: id, name: producto, qty: 1, price: precio, _token: csrf })
		})

		.done((success => {
			console.log(success)
			let n = $('#n')
			n.css('display', 'inline')
			n.text(success)
		}))

		.fail((error) => {
			console.log(error)
		})
	}

	$('.addcart').click((e) => {
		let elemento = $(e.target).parent()[0].dataset

		let id 		 = elemento.idproducto
		let producto = elemento.producto
		let precio 	 = elemento.precio
		// let csrf = elemento.csrf

		ajax(id, producto, precio)
	})

	$('#add').submit(e => {
		e.preventDefault()

		let id 		 = $('#id').val()
		let producto = $('#producto').val()
		let precio 	 = $('#precio').val()
		let cantidad = $('#cantidad').val()

		ajax(id, producto, precio, cantidad)
	})


	$('.dtbtn').click(e => {

		let r = navigator.userAgent.search(/Firefox/)

		if (r != -1) {
			// firefox
			var idproducto = $(e.target).parent().parent().parent()[0].firstElementChild.textContent
		}
		else {
			// otros
			var idproducto = $(e.target).parent().parent().parent().parent()[0].firstElementChild.textContent
			console.log(idproducto)
		}


		console.log(`http://127.0.0.1:8000/producto/${idproducto}`)

		$.ajax({
			method: 'get',
			url : `http://127.0.0.1:8000/producto/${idproducto}`
		})

		.done(done => {

			$('#idproducto').val(done.id)
			$('#product').val(done.product)
			$('#quantity').val(done.quantity)
			$('#description').val(done.description)
			$('#price').val(done.price)
			$('#category').val(done.category_id)
		})

		.fail(err => {
			console.log(err)
			// toastr.error('Ha ocurrido un error!!') doesnt work
		})
	})

	/*$('#checkout_form').submit(() => {
		$.ajax({
			url : 'http://127.0.0.1:8000/instapago',
			method : 'post',
			data : {
				monto	    : $('#monto').val(),
				cc_number   : $('#cc-number').val(),
				cvc   	    : $('#cc-cvv').val(),
				nameincard  : $('#nombretarjeta').val(),
				vencimiento : $('#cc-expiration').val(),
			}
		})

		.done((s) => {
			console.log(s)

			// solicitud json a instapago
			// {
			// 	KeyId : 'Llave generada desde instapago',
			// 	PublicKeyId : 'Llave compartida (Enviada por correo electrónico al crear la cuenta en el portal de InstaPago)',
			// 	Amount : 'monto a debitar, usando . como separador decimal',
			// 	Description: 'descripcino de la operacion',
			// 	CardHolder: 'Nombre del tarjeta habiente',
			// 	CardHolderId : 'cedula del tarjeta habiente',
			// 	CardNumber: 'numero de la tarjeta de credito,'
			// 	CVC : 'codigo secreto de lq tarjeta',
			// 	ExpirationDate: 'fecha de expiracion de la tarjeta',
			// 	StatusId : 'estatus en q se creara la transaccion: 1: Retener (pre-autorización) o 2: Pagar (autorización).'
			// 	IP : 'direccin ip de la maquina'
			// }
		})

		.fail((e) => {
			console.log(e)
		})
	})*/

})