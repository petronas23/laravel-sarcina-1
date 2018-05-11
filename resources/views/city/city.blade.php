<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<table class="blueTable">
<thead>
<tr>
<th>Country</th>
<th>Cod</th>
<th>Add new company</th>
<th>Edit company</th>
<th>Delete company</th>
</tr>
</thead>
<tfoot>
<tr>
<td colspan="4">
<div class="links"><a href="#">&laquo;</a> <a class="active" href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">&raquo;</a></div>
</td>
</tr>
</tfoot>
<tbody>
	@foreach($cities as $city)
		<tr>
			<td>{{$city->city}}</td>
			<td>{{$city->country}}</td>
			<td><a href="http://laravel-sarcina-1/add-city">Add City</a></td>
			<td><a href="http://laravel-sarcina-1/edit-city/{{$city->id}}">Edit City</a></td>
			<td><a class="delete_city" data-id="<?=$city->id?>" href="#">Delete City</a></td>
		</tr>
	@endforeach
</tbody>
</tr>
</table>

<style>
table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 13px;
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #FFFFFF;
  background: #D0E4F5;
  background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  border-top: 2px solid #444444;
}
table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}
</style>

<script>
$( ".delete_city" ).click(function(e) {
		e.preventDefault();
		
		var id = $(this).data('id');
		
		var verify = confirm("Do you really want to delete it?");
		if(verify){
			$.ajax({
				url: "http://laravel-sarcina-1/delete_city",
				dataType: 'JSON',
				type: "get",
				data: {
					id: id
					},
				success: function(msg){

					let message = "";
					if(msg.success == true){
						message = msg.message;
						window.location.reload();
					}
					
				alert(message);
					
				},
				error: function(){
					alert('error');
				}
			})
		}
	})
</script>