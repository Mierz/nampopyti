<div class="row-fluid">
	<div class="span4">
		фильтр
	</div>

	<div class="span8">

		<table class="table table-bordered">
  			<tr>
  				<th>Результаты поиска</th>
  			</tr>
  			<?php
  			if(!empty($routes)) {
  				foreach ($routes as $route) {
  					echo "<tr><td><a href=\"/routes/view/$route->id\">$route->from => $route->to</a></td></tr>";
  				}  				
  			} else {
  				echo "<tr><td><div class=\"alert alert-error\"><b>Ой!</b> Сейчас маршрутов нету.</div></td></tr>";
  			}
  			?>  			
		</table>

	</div>
</div>