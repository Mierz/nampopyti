<?php		
if(isset($routes)) 
{
	foreach ($routes as $route) {
		echo "";
	}
} else {
	echo "<div class=\"alert alert-danger\" role=\"alert\"><b>Ой!</b> Такого маршрута нету</div>";
}		
?>