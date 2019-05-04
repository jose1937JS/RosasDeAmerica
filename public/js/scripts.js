// <label>Show <select name="dtBasicExample_length" aria-controls="dtBasicExample" class="custom-select browser-default"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>

$(() => {

	$('[data-toggle="tooltip"]').tooltip()
	$('.mdb-select').materialSelect()
	$('#dtBasicExample').DataTable()
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

	// Agragar otro producto que el cliente compro en modal del administrador
	// if($('.precio').val().length > 0){
	// 	sumarPrecioProductos()
	// }


	let i = 0

	$('#dsa').click(() => {

		i = i + 1

		$('#np').append(`
			<div class="form-row my-4 px-3 precioo">
				<div class="col">
					<label for="producto-${i}">Producto</label>
					<select class="browser-default custom-select" name="producto-${i}" id="producto-${i}" required>
						<option disabled selected>Producto(s)</option>
						<option>Producto 1</option>
						<option>Producto 2</option>
						<option>Producto 3</option>
					</select>
				</div>
				<div class="col">
					<label for="precio-${i}">Precio</label>
					<input type="text" class="form-control precio" name="precio-${i}" id="precio-${i}" placeholder="1234.56" pattern="^[0-9]+(\.[0-9]{2})?$" required>
				</div>
			</div>
		`)

		// if($('.precio').val().length > 0){
		// 	sumarPrecioProductos()
		// }
	})

	$('#elimelem').click(() => {
		$('.precioo:last').remove()
		sumarPrecioProductos()
	})

	// Poner en el campo del precio el precio del producto
	$('#pro1').change((e) => {
		$('#pro1 option:selected').each((index, elem) => {
			// Probar elem.dataset.precio en navegadores basados en chrome
			$('#price').val(elem.dataset.precio)
			sumarPrecioProductos()
			console.log($('#precio'))
		})
	})

/*

	@foreach( $categorias as $p )
		<option value="{{ $p->id }}">{{ $p->category }}</option>
	@endforeach

*/

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
			var idproducto = $(e.target).parent().parent()[0].firstElementChild.textContent
		}
		else {
			// otros
			var idproducto = $(e.target).parent().parent().parent()[0].firstElementChild.textContent
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