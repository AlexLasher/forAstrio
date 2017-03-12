<?php
	$arr1 = array("<body>", "<span>", "</span>","<a>",   "</a>","<p>", "<i>", "</i>", "</p>", "<div>", "</div>", "</body>");
	$arr2 = array("<body>", "<span>", "<a>", "</a>","<p>", "<i>", "</i>", "</p>", "<div>", "</div>", "</body>");

	function subString($arr,$i){
		for(;$i!=-1;$i--){
			if($arr[$i]!==null){
				return $i;
			}
		}
		return null;
	}
	/*функция находит 2 подряд тега:открывающий и закрывающий, 
	затем удаляет их из массива и читает массив заново
	если весь массив пройдет и не найдено пары подряд идущих 
	тегов такого рода, то проверяется массив, если в итоге
	не осталось элементов в массиве, то структура корректна*/
	function checkDOM($arr){
		$size = count($arr);

		while(1){
			$k=0;
			for($i=1;$i<$size;$i++){
				$temp = subString($arr,$i-1);
				if(($arr[$i]!==null)&&($temp!==null)){
					if(substr($arr[$temp], 1)==substr($arr[$i], 2)){
						unset($arr[$temp]);
						unset($arr[$i]);
						$k++;
					}
				}
			}
			if($k==0) break;
		}

		if(count($arr)==0){
			echo "Структура тегов данного HTML документа - корректна<br/>";
		} else {
			echo "Структура тегов данного HTML документа - некорректна<br/>";
		}
	}
	
	checkDOM($arr1);
	checkDOM($arr2);
?>