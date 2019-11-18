<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">	
</head>
<body>
	<header>
		<h1 class="name">Библиотека</h1>
	</header>
	<div class="block">	
		<aside>
			<p><a href="index.html">Главная</a></p>
			<p><a href="plus.php">Добавление информации</a></p>
			<p><a href="look.php">Просмотр сведений</a></p>
		</aside> 
		<main>
			<div class="input-group">
				<span class="input-group-addon">Поиск</span>
				<input type="text" name="search_text" id="search_text"  class="form-control" />
				</div>
			<br>	
			<div id="result"></div>
						
			<script>
				$(document).ready(function(){
				load_data();

				function load_data(query) {
					$.ajax({
							url:"ayax.php",
							method:"POST",
							data:{query:query},
							success:function(data){
									$('#result').html(data);
							}
					});
				}
				$('#search_text').keyup(function(){
					var search = $(this).val();
					if(search != ''){
							load_data(search);
					}
				else {
					load_data();
				}
				});
				});
			</script>
			
	</main>
	</div>
	<footer>
		<p class="footer_text">Магнитогорск, 2019</p>
	</footer>
</body>
</html>


