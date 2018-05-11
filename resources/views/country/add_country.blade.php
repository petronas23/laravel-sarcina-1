<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<form action="" id="add_country">
Country: <input type="text" name="country_name" value="<?=(isset($country) ? $country->country : '')?>"><br><br>
Cod <input type="text" name="country_cod" value="<?=(isset($country) ? $country->cod : '')?>"><br><br>
<input type="hidden" name="id_country" value="<?=(isset($country) ? $country->id : '')?>"><br>
<input type="submit"><br>
</form>

<a href="http://laravel-sarcina-1/countries-list"> Go to cities list </a>

<script>
$( "#add_country" ).submit(function(e) {
  e.preventDefault();
  let data = $(this).serialize();
  
  $.ajax({ 
    type: "GET",
    url: "http://laravel-sarcina-1/<?=(isset($country) ? 'edit_country' : 'add_country')?>",
    data: data,
    success: function(msg){
		let message = "";
		if(msg.success == false){
			let x;
			for (x in msg.errors.original) {
				message += msg.errors.original[x] + '\n';
			}
		}
		
		if(msg.success == true){
			message = msg.message;
			window.location.replace('http://laravel-sarcina-1/countries-list');
		}
	alert(message);
	
	},
 	
	error: function() {
       alert('Error please try again');
    }
	
	});
});


</script>