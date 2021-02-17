<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>Document</title>
</head>

<body>
	
	<p>Code postal</p>
	<input type="text" maxlength="5" id="postalCode"  name="" value="">


	<p>ville</p>
	<input type="text" id="city" name="" value="">


</body>

<script>
	$( document ).ready(function() {
		$("#city").prop("disabled",true); 
	});



	$('#postalCode').keyup(function () {
		this.value = this.value.replace(/[^0-9\.]/g,'');

		if($("#postalCode").val().length > 4){
			var postalCode = $( "#postalCode" ).val();
			$.ajax({  
				url: 'https://geo.api.gouv.fr/communes?codePostal='+postalCode,  
				type: 'GET',  
				dataType: 'json',  
				data: "",  
				success: function (data, textStatus, xhr) {  
					console.log(data[0].nom);
					$('#city').val(data[0].nom);

				},  
				error: function (xhr, textStatus, errorThrown) {  
					console.log('Error in Operation');  
				}  
			}); 
		}

		if($("#postalCode").val().length <= 4){
			$('#city').val("");
		}
	});








</script>
</html>
