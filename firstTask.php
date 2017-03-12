<?php
	//функция, вызывающая рекурсию, которая вызывает по очереди
	//две функции в случае, если у массива находятся дочерние массивы
	function fibonacci_1($array, $id){
		if($array["id"]==$id){
			return $array ["title"];
		}
		if($array["children"]){
			$title="0";
			for($i=0; $i<sizeof($array["children"]); $i++){
				$title = fibonacci_2($array["children"][$i], $id);
				if($title!="0"){
					break;
				}
			}
			return $title;
		}
		return "0";
	}

	function fibonacci_2($array, $id){
		if($array["id"]==$id){
			return $array ["title"];
		}
		if($array["children"]){
			for($i=0; $i<sizeof($array["children"]); $i++){
				$title = fibonacci_1($array["children"][$i], $id);
				if($title!="0"){
					break;
				}
			}
			return $title;
		} 
		return "0";
	}
	//основная функция
	function searchCategory($categories, $id){
		$title="0";
		for($i=0;$i<sizeof($categories);$i++){
			$title = fibonacci_1($categories[$i], $id);
			if($title!="0"){
				return $title;
			}
		}
	}

	$categories = array(
					array(
					"id" => 1,
					"title" => "Обувь",
					'children' => array(
									array(
										'id' => 2,
										'title' => 'Ботинки',
										'children' => array(
														array('id' => 3, 
															'title' => 'Кожа'),
														array('id' => 4, 
															'title' => 'Текстиль'),
														),
									),
									array('id' => 5, 
										'title' => 'Кроссовки',),
									)
					),
					array(
					"id" => 6,
					"title" => "Спорт",
					'children' => array(
									array(
									'id' => 7,
									'title' => 'Мячи'
									)
								)
					),

					);

	echo searchCategory($categories,7);
	
?>


