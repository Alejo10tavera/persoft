/*$.ajax({

	"url":"ajax/tables/users.ajax.php",
	success: function(response){
		
		console.log("response", response);

	}

})

*/
$('#tableUsers').DataTable({
	"ajax": "ajax/tables/users.ajax.php",
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
Activar o desactivar usuarios
=============================================*/

$(document).on("click", ".btnActivate", function(){

	var sUserActive = $(this).attr("sUser");
	var statusUser = $(this).attr("statusUser");
	var button = $(this);

	var data = new FormData();
	data.append("sUserActive", sUserActive);
	data.append("statusUser", statusUser);

	$.ajax({

		url:"ajax/process/user.ajax.php",
		method: "POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		success: function(response){

			if(response == "ok"){

				if(statusUser == 0){

					$(button).removeClass('btn-success');
					$(button).addClass('btn-dark');
					$(button).html('Inactivo');
					$(button).attr('statusUser', 1);

				}else{

					$(button).addClass('btn-success');
					$(button).removeClass('btn-dark');
					$(button).html('Activo');
					$(button).attr('statusUser',0);

				}

			}

		}

	})  

})

/*=============================================
Revisar si el usuario ya esta registrado
=============================================*/

$("#addUser").change(function(){

	$(".alert").remove();

	var user = $(this).val();

	var data = new FormData();
	data.append("validateUser", user);

	$.ajax({
		url:"ajax/process/user.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(response){

			if(response){

				$("#addUser").parent().parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

				$("#addUser").val("");

			}

		}

	})

})

/*=============================================
Editar Administrador
=============================================*/

$(document).on("click", ".editUser", function(){

	var sUserEdit = $(this).attr("suser");
	
	var data = new FormData();
  	data.append("sUserEdit", sUserEdit);

  	$.ajax({
  		url:"ajax/process/user.ajax.php",
  		method: "POST",
  		data: data,
  		cache: false,
		contentType: false,
    	processData: false,
    	dataType: "json",
    	success:function(response){ 	

    		$('input[name="editCode"]').val(response["suser"]);
    		$('input[name="editName"]').val(response["name"]);
    		$('input[name="editUser"]').val(response["user"]);
    		$('input[name="existingPassword"]').val(response["password"]);
    		if(response["type_user"] == 1){
    			$('.editProfileOption').val(response["type_user"]);
    			$('.editProfileOption').html("Administrador");
    		}else{
    			$('.editProfileOption').val(response["type_user"]);
    			$('.editProfileOption').html("Especial");
    		}

    	}

  	})

})

/*=============================================
Eliminar usuario
=============================================*/

$(document).on("click", ".deleteUser", function(){

	var iUserDelete = $(this).attr("suser");

	if(iUserDelete == 1){

		swal({
			title: "Error",
			text: "Este usuario no se puede eliminar",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

		return;

	}

	swal({
		title: '¿Está seguro de eliminar este usuario?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, eliminar usuario!'
	}).then(function(result){

		if(result.value){

			var data = new FormData();
			data.append("iUserDelete", iUserDelete);

			$.ajax({

				url:"ajax/process/user.ajax.php",
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
							text: "El usuario ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
						}).then(function(result){

							if(result.value){

								window.location = "users";

							}

						})

					}

				}

			})  

		}

	})

})