<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container">
	<div class="row">
		<div class="card mt-3">
			<div class="card-head">
				<h1><?=$pageTitle?></h1>
			</div>
			<div class="card-body">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading page-title" style="display: box; text-align: center;">
						</div>
						<div class="panel-body">
							<a href="<?=site_url('home/insert')?>" class="btn btn-primary btn-sm">Insert</a>
							<table id="myTable" class="table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Title</th>
										<th>Text</th>
										<th>Date</th>
										<th>Actons</th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach($Data as $row) {
											?>
												<tr>
													<td><?=$row['Id']?></td>
													<td><?=$row['Title']?></td>
													<td><?=$row['Text']?></td>
													<td><?=$row['Date']?></td>
													<td>
														<a href="<?=site_url('home/update/' . $row['Id'])?>" name="update" class="btn btn-primary btn-sm">Update</a>
														<a href="<?=site_url('home/delete/' . $row['Id'])?>" name="delete" class="btn btn-danger btn-sm">Delete</a>
													</td>
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