<?php
	$connect = mysqli_connect("localhost", "root", "", "dt_library");
	$output = '';
	if(isset($_POST["query"])){
		$search = mysqli_real_escape_string($connect, $_POST["query"]);
		$query = "
			SELECT * FROM tb_books
			WHERE autor LIKE '%".$search."%' 
			OR b_name LIKE '%".$search."%' 
			OR publisher LIKE '%".$search."%' 
			OR id_ganre IN (SELECT id FROM tb_genre
			WHERE g_name LIKE '%".$search."%' )
			";
	}
	else{
		$query = "
			SELECT * FROM tb_books ORDER BY id
		";
	}
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0){
		$output .= '
		<div class="table-responsive">
		<table class="table" border = "1">
			<tr>
				<th>Жанр</th>
				<th>Автор</th>
				<th>Название</th>
				<th>Кол-во страниц</th>
				<th>Издательство</th>
				<th>Год</th>
			</tr>
		';
	while($row = mysqli_fetch_array($result)){
		$k=$row['id_ganre'];
		$que = "SELECT * FROM tb_genre WHERE id = '$k'";
		$res = mysqli_query($connect, $que);
		$id = mysqli_fetch_array ($res);
		$output .= '
			<tr>
				<td>'.$id["g_name"].'</td>
				<td>'.$row["autor"].'</td>
				<td>'.$row["b_name"].'</td>
				<td>'.$row["sheets"].'</td>
				<td>'.$row["publisher"].'</td>
				<td>'.$row["year"].'</td>
			</tr>
		';
	}
	echo $output;
	}
	else{
		echo 'Ничего не найдено :<';
	}
?>

