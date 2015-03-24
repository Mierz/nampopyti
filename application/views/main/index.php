<div class="row-fluid">
	<div class="span3">
		Найти попутчика легко!!!
	</div>

	<div class="span3">
		чувак со стоулом
	</div>

	<div class="span6">	
		<form action="/routes/search" method="get">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-map-marker icon-white"></i></span>
				<input type="text" name="from" id="from" />
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-map-marker icon-white"></i></span>
				<input type="text" name="to" id="to" />
			</div>
			<div class="form-group">			
				<button class="btn"><i class="icon-search"></i> Найти</button>
				<a href="/routes/create">+ Добавить маршрут</a>
			</div>
		</form> 
	</div>
</div>

<?php
echo $this->router->fetch_class();
echo $this->router->fetch_method();
?>

<div class="row-fluid">
	<div class="span6">
		<table class="table table-bordered">
  			<tr>
  				<th>Попутчики</th>
  			</tr>
  			<?php
  			if(!empty($companions)) {
  				foreach ($companions as $companion) {
  					echo "<tr><td><a href=\"/routes/view/$companion->id\">$companion->from => $companion->to</a></td></tr>";
  				}  				
  			} else {
  				echo "<tr><td><div class=\"alert alert-error\"><b>Ой!</b> Сейчас маршрутов нету.</div><td></tr>";
  			}
  			?>  			
		</table>
	</div>

	<div class="span6">
		<table class="table table-bordered">
  			<tr>
  				<th>Водители</th>
  			</tr>
  			<?php
  			if(!empty($drivers)) {
  				foreach ($drivers as $driver) {
  					echo "<tr><td><a href=\"/routes/view/$driver->id\">$driver->from => $driver->to</a></td></tr>";
  				} 
  			} else {
  				echo "<tr><td><div class=\"alert alert-error\"><b>Ой!</b> Сейчас маршрутов нету.</div></td></tr>";
  			}
  			?>  			
		</table>
	</div>
</div>