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
								<br/>
								<?php echo form_error('Title');?>
								<br/>
								<?php echo form_label('Text', 'Text'); ?>
								<textarea name="Text" id="Text" rows="5" cols="48"></textarea>
								<br/>
								<?php echo form_error('Text');?>
								<br/>
								<div>
									<input type="submit" class="btn btn-primary btn-sm" value="Submit" />
									<a href="<?=site_url('home/getAll')?>" name="back" class="btn btn-primary btn-sm">Back</a>
								</div>
							<?php echo form_close();?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>