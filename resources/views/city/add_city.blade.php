<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<form id="add_city">
City: <input type="text" name="city" value="<?=(isset($city) ? $city->city : '')?>"><br>
Country: <select name="country">
	<option selected disabled>Select Country</option>
@foreach($countries  as $country)
	<option value="{{$country->id}}">{{$country->country}}</option>
	@endforeach
</select><br></br>
<input type="hidden" name="id_country" value="<?=(isset($city) ? $city->id : '')?>"><br>

<input type="submit"><br>

<a href="http://laravel-sarcina-1/cities-list"> Go to cities list </a>

</form>

<script>
$( "#add_city" ).submit(function(e) {
  e.preventDefault();
  let data = $(this).serialize();
  
  $.ajax({ 
    type: "GET",
    url: "http://laravel-sarcina-1/<?=(isset($country) ? 'edit_city' : 'add_city')?>",
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
			//window.location.replace('http://laravel-sarcina-1/cities-list');
		}
	alert(message);
	
	},
 	
	error: function() {
       alert('Error please try again');
    }
	
	});
});


</script>