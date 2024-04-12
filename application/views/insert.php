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
							<?php echo form_open('home/insert'); ?>
							<?php echo form_label('Title', 'Title'); ?>
							<input type="text" name="Title" id="Title" size="50" />
							<br />
							<span id="title-error-message"></span>
							<?php echo form_error('Title'); ?>
							<br />
							<?php echo form_label('Text', 'Text'); ?>
							<textarea name="Text" id="Text" rows="5" cols="48"></textarea>
							<br />
							<span id="text-characters-counter"></span>
							<span id="text-error-message"></span>
							<?php echo form_error('Text'); ?>
							<br />
							<label for="dropdown1">Dropdown 1</label>
							<select name="dropdown1" id="dropdown1">
								<option value="option1">None</option>
								<option value="option2">Option 1</option>
								<option value="option3">Option 2</option>
								<option value="option4">Option 3</option>
							</select>
							<br />
							<label for="dropdown2">Dropdown 2</label>
							<select name="dropdown2" id="dropdown2">

							</select>
							<br />
							<div>
								<input type="submit" id="Submit" class="btn btn-primary btn-sm" value="Submit" />
								<a href="<?= site_url('home/getAll') ?>" name="back" class="btn btn-primary btn-sm">Back</a>
							</div>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	
</script>