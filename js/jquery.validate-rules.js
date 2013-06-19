	$(document).ready(function() {

		// jQuery.validator.addMethod("lettersonly", function(value, element) {
		// 	return this.optional(element) || /^[a-z]+$/i.test(value);
		// }, "Mensaje."); 

	$("#form").validate({
		errorElement: "span", 

		rules: {


			names : {
				required :true
			},

			lastname : {
				required :true
			},	
			email : {
				required :true,
				email: true
			},	
			hotel : {
				required :true
			},	
			datetour : {
				required :true
			},
			country : {
				required :true
			},
			tourtime : {
				required :true
			},
			passengers : {
				required :true
				
			},
			

		},
		messages: {
			// seccion: "El Campo Ruta",
			// casilla: "El Campo <Casilla> es Requerido.",
			
			// numeros: {
			// 	required: "El Campo <Numero> es Requerido.",
			// 	number: "Escribe un numero.",
			// 	range: "El numero deber ser en el rango 1-750."
			// },
			// numero2: {
			// 	required: "El Campo <Numero> es Requerido.",
			// 	number: "Escribe un numero.",
			// 	range: "El numero deber ser en el rango 1-750."
			// },
			// numero3: {
			// 	required: "El Campo <Numero> es Requerido.",
			// 	number: "Escribe un numero.",
			// 	range: "El numero deber ser en el rango 1-750."
			// },
			// numero4: {
			// 	required: "El Campo <Numero> es Requerido.",
			// 	number: "Escribe un numero.",
			// 	range: "El numero deber ser en el rango 1-750."
			// },
			// numero5: {
			// 	required: "El Campo <Numero> es Requerido.",
			// 	number: "Escribe un numero.",
			// 	range: "El numero deber ser en el rango 1-750."
			// },
			// numero6: {
			// 	required: "El Campo <Numero> es Requerido.",
			// 	number: "Escribe un numero.",
			// 	range: "El numero deber ser en el rango 1-750."
			// },
			// numero7: {
			// 	required: "El Campo <Numero> es Requerido.",
			// 	number: "Escribe un numero.",
			// 	range: "El numero deber ser en el rango 1-750."
			// },
			// numero8: {
			// 	required: "El Campo <Numero> es Requerido.",
			// 	number: "Escribe un numero.",
			// 	range: "El numero deber ser en el rango 1-750."
			// },
			// numero9: {
			// 	required: "El Campo <Numero> es Requerido.",
			// 	number: "Escribe un numero.",
			// 	range: "El numero deber ser en el rango 1-750."
			// },
			// numero10: {
			// 	required: "El Campo <Numero> es Requerido.",
			// 	number: "Escribe un numero.",
			// 	range: "El numero deber ser en el rango 1-750."
			// }

		},

			// Use Ajax to send everything to processForm.php
			submitHandler: function(form) {
				$("#elguarda").attr("value", "Sending...");
				$(form).ajaxSubmit({
					success: function(responseText, statusText, xhr, $form) {
  				//$(form).slideUp("fast");
  				$("#tab1").html(response);
  				$("#elguarda").attr("value", "View.");
  			}
  		});
				return false;
			}

			// errorPlacement: function(error, element) {               
			// 	error.appendTo(element.parent());     
			// }

		});
});