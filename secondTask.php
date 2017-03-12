<?php
	//функция, преобразующая список в строку
	function saveResult($result){
		$i=0;
		while(($row = $result->fetch_assoc())!=false){
			$array[$i] = $row["department_id"];
			$i++;
		}
		$array = '\'' . implode ( "','", $array ) . '\'';
		return $array;
	}

	function printResult($result){
		echo "Названия отделов, в которых имеется 5 и более сотрудников<br/><br/>";
		while(($row = $result->fetch_assoc())!=false){
			echo $row["name"]."<br/	>";
		}
		echo "<br/><br/>";
	}

	function printResult2($result){
		echo "<td>";
		while(($row = $result->fetch_assoc())!=false){
			echo $row["id"].",";
		}
		echo "</td></tr>";
	}
	

	function drawResult2($result, $connection){
		echo "Названия отделов и id сотрудников, которые в них работают<br/><br/>";
		echo "<table border=1><th>Отдел</th><th>ID сотрудников</th>";
		while(($row = $result->fetch_assoc())!=false){
			echo "<tr>";
			$temp = (int)$row["id"];
			echo "<td>".$row["name"]."</td>";
			$result1 = mysqli_query($connection ,"SELECT `id` FROM `worker` WHERE `department_id`=$temp");
			printResult2($result1);
			}
		echo "</table>";
	}

	$connection = mysqli_connect("localhost","root","","test");
	
	$result = mysqli_query($connection ,"SELECT `department_id` FROM `worker` GROUP BY `department_id` HAVING COUNT(*)>=5");
	
	$result = mysqli_query($connection ,"SELECT `name` FROM `department` WHERE `id` IN (".saveResult($result).")");
	//получаем отделы, в которых 5 и более сотрудников
	printResult($result);

	$result = mysqli_query($connection ,"SELECT * FROM `department`");
	//получаем таблицу с отделами и id сотрудников, работающих в этих отделах
	drawResult2($result,$connection);
	
	$connection->close();
?>


