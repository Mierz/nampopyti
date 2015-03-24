<div class="row-fluid" id="search-place">
	<div class="span4 slogan"></div>

	<div class="span4 man_bottom"></div>

	<div class="span4">	
		<form action="/routes/search" class="main-form" method="get">
			<div class="input-prepend">
				<span class="add-on" style="background: #e81c4e;"><i class="icon-map-marker icon-white"></i></span>
				<input type="text" name="from" id="from" placeholder="От..." />
			</div>
			<div class="input-prepend">
				<span class="add-on" style="background: #b4e42c;"><i class="icon-map-marker icon-white"></i></span>
				<input type="text" name="to" id="to" placeholder="До..." />
			</div>
			<div class="form-group">			
				<button class="btn"><i class="icon-search"></i> Найти</button>
				<a href="/routes/create">+ Добавить маршрут</a>
			</div>
		</form> 
	</div>
</div>

<div class="row-fluid mtop">
	<div class="span6">
		<table class="table table-bordered table-red">
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
		<table class="table table-bordered table-green">
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