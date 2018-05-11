<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<form action="/add_country" id="add_country">
Denumire: <input type="text" name="country_name"><br><br>
Cod <input type="text" name="country_cod"><br><br>
<input type="submit"><br>
</form>

<script>
$( "#add_country" ).submit(function(e) {
  e.preventDefault();
  let data = $(this).serialize();
  
  $.ajax({ 
    type: "GET",
    url: "http://laravel-sarcina-1/add_country",
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
			window.location.replace('http://laravel-sarcina-1/show-countries');
		}
	alert(message);
	
	},
 	
	error: function() {
       alert('Error please try again');
    }
	
	});
});


</script>