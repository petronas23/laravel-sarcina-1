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
	 console.log(data);
  $.ajax({
	 
    type: "GET",
    url: "http://poo-lab/add_country",
    data: data,
    success: function(msg){
		console.log(msg);
        alert(msg);
    }
	});
});


</script>