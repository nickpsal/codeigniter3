<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Demo Content Modal
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleModa2" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Demo Content Modal2
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

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
							<a href="<?= site_url('home/insert') ?>" class="btn btn-primary btn-sm">Insert</a>
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
								Launch demo modal
							</button>
							<table id="myTable" class="table table-striped">
								<thead>
									<tr>
										<th data-sort="id">#</th>
										<th data-sort="title">Title</th>
										<th data-sort="text">Text</th>
										<th data-sort="date">Date</th>
										<th>Actons</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($Data as $row) {
									?>
										<tr>
											<td><?= $row['Id'] ?></td>
											<td><?= $row['Title'] ?></td>
											<td><?= $row['Text'] ?></td>
											<td><?= date('d/m/Y', strtotime($row['Date'])) ?></td>
											<td>
												<a href="<?= site_url('home/update/' . $row['Id']) ?>" name="update" class="btn btn-primary btn-sm">Update</a>
												<a href="<?= site_url('home/delete/' . $row['Id']) ?>" name="delete" class="btn btn-danger btn-sm">Delete</a>
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