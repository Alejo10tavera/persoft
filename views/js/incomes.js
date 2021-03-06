/*$.ajax({

	"url":"ajax/tables/incomes.ajax.php",
	success: function(response){
		
		console.log("response", response);

	}

})*/


$('#tableIncomes').DataTable({
	"ajax": "ajax/tables/incomes.ajax.php",
	"dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
	"<'table-responsive'tr>" +
	"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
	"oLanguage": {
		"oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
	},
	"stripeClasses": [],
	"lengthMenu": [10,20,50,100],
	"pageLength": 10
});


window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
}, false);

/*=============================================
Editar ingreso
=============================================*/

$(document).on("click", ".editIncome", function(){

	var sIncomeEdit = $(this).attr("sincome");
	
	var data = new FormData();
  	data.append("sIncomeEdit", sIncomeEdit);

  	$.ajax({
  		url:"ajax/process/income.ajax.php",
  		method: "POST",
  		data: data,
  		cache: false,
		contentType: false,
    	processData: false,
    	dataType: "json",
    	success:function(response){ 	

    		var dataPerson = new FormData();
    		dataPerson.append("iPersonData", response["iperson"]);

			$.ajax({
		  		url:"ajax/process/person.ajax.php",
		  		method: "POST",
		  		data: dataPerson,
		  		cache: false,
				contentType: false,
		    	processData: false,
		    	dataType: "json",
		    	success:function(response){ 

		    		$('.editPersonOption').val(response["iperson"]);
    				$('.editPersonOption').html(response["name"]);

		    	}

		    })	

		    var dataCategory = new FormData();
    		dataCategory.append("iCategoryData", response["icategory"]);

			$.ajax({
		  		url:"ajax/process/category.ajax.php",
		  		method: "POST",
		  		data: dataCategory,
		  		cache: false,
				contentType: false,
		    	processData: false,
		    	dataType: "json",
		    	success:function(response){ 
		    		
		    		$('.editCategoryOption').val(response["icategory"]);
    				$('.editCategoryOption').html(response["name"]);

		    	}

		    })	

    		$('input[name="editCode"]').val(response["sincome"]);
    		$('input[name="editReference"]').val(response["reference"]);
    		$('input[name="editDate"]').val(response["date"]);
    		$('input[name="editValue"]').val(response["value"]);
    		$('textarea[name="editDescription"]').val(response["description"]);

    	}

  	})

})


/*=============================================
Eliminar ingreso
=============================================*/

$(document).on("click", ".deleteIncome", function(){

	var iIncomeDelete = $(this).attr("sincome");

	swal({
		title: '¿Está seguro de eliminar este ingreso?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, eliminar ingreso!'
	}).then(function(result){

		if(result.value){

			var data = new FormData();
			data.append("iIncomeDelete", iIncomeDelete);

			$.ajax({

				url:"ajax/process/income.ajax.php",
				method: "POST",
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				success:function(response){

					if(response == "ok"){

						swal({
							type: "success",
							title: "¡CORRECTO!",
							text: "El ingreso ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						}).then(function(result){

							if(result.value){

								window.location = "incomes";

							}

						})

					}

				}

			})  

		}

	})

})