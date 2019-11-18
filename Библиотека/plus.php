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
			<h3>Добавьте новый жанр:</h3>
					<form method="POST" action="obrab.php">
							<input class="form-control" name="g_name" type="text"/><br>
							<input class="btn btn-primary" href= 'vivod.php' type="submit" value="Добавить"/>
					</form><br>
			<h3>Добавьте новую книгу:</h3>
			<?php 
				$link = new mysqli ('localhost', 'root', '','dt_library');
				function get_categories () {
					global $link;
					$query = 'SELECT * FROM tb_genre';  
					$result = mysqli_query($link, $query)or die(mysqli_error($link));
					$genre = mysqli_fetch_all ($result, MYSQLI_ASSOC);
					echo mysqli_error ($link);
					return $genre;
				}
				$tb_genre = get_categories($link);?>  			
					<form method="GET" action="obrab.php">
							<small id="emailHelp" class="form-text">Выберите жанр</small>
								<select name="id_genre" class="form-control">
								<?php foreach ($tb_genre as $category):  
								echo "<option value=".$category['id'].">".$category['g_name']."</option>";
								endforeach; ?>  
								</select>
							<br>
							<small class="form-text">Автор</small>
							<input class="form-control" name="autor" type="text"/> <br>
							<small class="form-text">Книга</small>
							<input class="form-control" name="b_name" type="text"/> <br>
							<small class="form-text">Количество страниц</small>
							<input class="form-control" name="sheets" type="number"/> <br>
							<small class="form-text">Издательтво</small>
							<input class="form-control" name="publisher" type="text"/> <br>
							<small class="form-text">Год издания</small>
							<input class="form-control" name="year" type="number" min="1900" max="2099"/><br>
							<input class="btn btn-primary" type="submit" value="Добавить"/>
					</form> 	
		</main>
	</div>
	<footer>
		<p class="footer_text">Магнитогорск, 2019</p>
	</footer>
</body>
</html>

