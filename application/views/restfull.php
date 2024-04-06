<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container">
	<div class="row">
		<div class="card mt-3">
			<div class="card-head">
				<h1><?= $pageTitle ?></h1>
			</div>
			<div class="card-body">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading page-title" style="display: box; text-align: center;">
						</div>
						<div class="panel-body">
							<table id="myTable" class="table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Temp</th>
										<th>Feels Like</th>
										<th>Min Temp</th>
										<th>Max Temp</th>
										<th>humidity</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach ($data as $row) {
										?>
											<tr>
												<td><?= $row['Id'] ?></td>
												<td><?= $row['temp'] ?></td>
												<td><?= $row['feels_like'] ?></td>
												<td><?= $row['temp_min'] ?></td>
												<td><?= $row['temp_max'] ?></td>
												<td><?= $row['humidity'] ?></td>
												<td><?= $row['Date'] ?></td>
											</tr>
										<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>