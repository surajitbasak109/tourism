<?php
$arr = $this->session->flashdata(); ?>

<div class="row">
	<div class="col-md-10 offset-md-1 text-center">
		<?php if (!empty($arr['error_msg'])) : ?>
			<div style="margin-top: 10px;">
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?= $arr['error_msg']; ?>
				</div>
			</div>
		<?php elseif (!empty($arr['success_msg'])) : ?>
			<div style="margin-top: 10px;">
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?= $arr['success_msg']; ?>
				</div>
			</div>
		<?php else : ?>

		<?php endif; ?>
	</div>
</div>
