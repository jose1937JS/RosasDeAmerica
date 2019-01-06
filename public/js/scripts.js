// <label>Show <select name="dtBasicExample_length" aria-controls="dtBasicExample" class="custom-select browser-default"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>

$(() => {

	$('[data-toggle="tooltip"]').tooltip()
	$('.mdb-select').materialSelect()
	$('#dtBasicExample').DataTable()
	// $('.dataTables_length').addClass('bs-select');
	// console.log($('#dtBasicExample > label'))


	$('#addpbtn').click(() => {
		$('#addpmdl').modal()
	})

	$('#addcatbtn').click(() => {
		$('#addcatmdl').modal()
	})

	$('#addcomprabtn').click(() => {
		$('#addcompramdl').modal()
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
		let idproducto = $(e.target).parent().parent()[0].firstElementChild.textContent

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

})