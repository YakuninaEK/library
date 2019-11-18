<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
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
			<?php 
				if (isset($_POST['g_name'])){
					$g_name = $_POST['g_name'];
    
					$mysqli = new mysqli ('localhost', 'root', '','dt_library');
					if ($mysqli->connect_error) {
						die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
					}
    
					$result = $mysqli->query("INSERT INTO `tb_genre` (`id`, `g_name`) VALUES (null, '$g_name')");
	
					if ($result == true){
						echo "Информация добавлена!";
					}	
					else{
						echo "При добавлении информации возникла ошибка! Жанр не добавлен!";
					}
				}?>


			<?php
				if (isset($_GET['id_genre']) && isset($_GET['autor']) && isset($_GET['b_name'])&& isset($_GET['sheets'])&& isset($_GET['publisher'])&& isset($_GET['year'])){
					$id_genre = (INT)$_GET['id_genre'];
					$autor = $_GET['autor'];
					$b_name = $_GET['b_name'];
					$sheets = $_GET['sheets'];
					$publisher = $_GET['publisher'];
					$year = $_GET['year'];
    
					$mysqli = new mysqli ('localhost', 'root', '','dt_library');
					if ($mysqli->connect_error) {
						die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
					}
									
					$result = $mysqli->query("INSERT INTO `tb_books` (`id`, `id_ganre`, `autor`, `b_name`, `sheets`, `publisher`, `year`) VALUES (null,'$id_genre','$autor','$b_name','$sheets','$publisher','$year')");
    
					if ($result == true){
						echo "Информация добавлена!";
					}	
					else{
						echo "При добавлении информации возникла ошибка! Информация не добавлена!";
					}
				}?>
			
		</main>
	</div>
	<footer>
		<p class="footer_text">Магнитогорск, 2019</p>
	</footer>
</body>
</html>


