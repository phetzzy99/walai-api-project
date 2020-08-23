<style>
img {
	width: 100%;
}
.img {
	width: 30%;
}
.country-info {
	display: flex;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>

<h1 class="text-muted text-center"> Countries of the World</h1>
<div class="container">
	<form>
		<div class="form-group col-xs-12">
			<label for="name">Enter country</label>
			<input class="form-control" type="search" name="name">
			<br/>
			<input class="form-control" type="submit" id="search" value="Search by Name">
		</div>
	</form>
	<button id="show" class="btn btn-success form-control">Show All</button>
	<div id="display" class="col-xs-12"></div>
</div>

<script>
$("form").submit(function(e) {
e.preventDefault();
	$("#display").empty();
let name =  e.currentTarget.name.value;
if(!name){

alert("Enter name");

return;
}
	getCountryName(name)
	.then(result =>{
		result.forEach(element => {
			var card = $('<div>', {class: "card"}).appendTo('#display');
			var country = $('<div>', {class: "country-info"}).appendTo(card);
			// var img = $('<div>', {class: "img"}).appendTo(country);
			// $('<img>', {src: element.flag}).appendTo(img);
			var text = $('<div>', {class: "right-text"}).appendTo(country);
			$('<p>', {text: "Barcode: " + element.BARCODE}).appendTo(text);
			$('<p>', {text: "Title: " + element.TITLE}).appendTo(text);
			$('<p>', {text: "Checkout Date: " + element.CHECKOUTDATE}).appendTo(text);
			$('<p>', {text: "Duedate: " + element.DUEDATE}).appendTo(text);
			// element.currencies.forEach(element =>{
			// 	var currencies = $('<div>', {
			// 		class: "currencies"
			// 	}).appendTo(text);
			// 	$('<span>', {text: element.code + " "}).appendTo(currencies);
			// })
		});

	})
	.catch(err =>console.log(err));
});

$("button").click(function() {
	$("#display").empty();
	getCountries()
	.then(result =>{
		result.forEach(element => {
			var card = $('<div>', {class: "card"}).appendTo('#display');
			var country = $('<div>', {class: "country-info"}).appendTo(card);
			var img = $('<div>', {class: "img"}).appendTo(country);
			$('<img>', {src: element.flag}).appendTo(img);
			var text = $('<div>', {class: "right-text"}).appendTo(country);
			$('<p>', {text: "Name: " + element.name}).appendTo(text);
			$('<p>', {text: "Top Level Domain: " + element.topLevelDomain}).appendTo(text);
			$('<p>', {text: "Capital: " + element.capital}).appendTo(text);
			$('<h4>', {text: 'Currencies:'}).appendTo(text);
			element.currencies.forEach(element =>{
				var currencies = $('<div>', {
					class: "currencies"
				}).appendTo(text);
				$('<span>', {text: element.code + " "}).appendTo(currencies);
			})
		});

	})
	.catch(err =>console.log(err));
});



async function getCountries(){
	const response = await fetch(`https://restcountries.eu/rest/v2/all`);
	const responseData = await response.json();

	return responseData;
}

async function getCountryName(name){
	const response = await fetch(`https://imagesopac.sru.ac.th/v1/api/GetPatronBorrow/${name}`);
	const responseData = await response.json();
debugger
	return responseData;
}

</script>
