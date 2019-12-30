<?php $this->load->view('templates/head'); ?>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- Navbar -->
		<?php $this->load->view('templates/topnav'); ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view('templates/sidebar'); ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<?php $this->load->view('templates/messages'); ?>
					<div class="row mb-2">
						<div class="col-sm-6">
						</div><!-- /.col -->
						<div class="col-sm-6">

						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- editpack -->
			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<form action="<?= base_url('/main/editpackage/' . $id); ?>" id="entryForm" method="POST" enctype="multipart/form-data" autocomplete="off">
								<div class="form-group row">
									<div class="col-12 text-right">
										<button type="submit" class="btn btn-outline-primary btn-flat" id="saveHandler">Save</button>
										<a href="<?= base_url('/main/'); ?>" class="btn btn-outline-danger btn-flat">Back</a>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<div class="row">
											<label for="pack_code" class="col-form-label col-md-6">Package Code</label>
											<div class="col-md-6">
												<input type="text" name="pack_code" id="pack_code" value="<?= "TAN-$packid"; ?>" class="form-control" readonly>
											</div>
										</div>
									</div>
									<div class="col-md-8">
										<div class="row">
											<label for="title" class="col-form-label col-md-2">Package Title</label>
											<div class="col-md-10">
												<input type="text" name="title" id="title" placeholder="Enter Package Title" class="form-control col-form-label" value="<?= set_value('title', $editpack->title); ?>" autofocus="true">
											</div>
											<?= form_error('title'); ?>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="description" class="col-form-label col-md-2">Description</label>
									<div class="col-md-10">
										<textarea name="description" id="description" rows="2" class="form-control"><?= set_value('description', $editpack->description); ?></textarea>
									</div>
									<?= form_error('description'); ?>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<div class="row">
											<label for="rate_per" class="col-form-label col-md-6">Rate Per Person</label>
											<div class="col-md-6">
												<input type="number" name="rate_per" id="rate_per" value="<?= set_value('rate_per', $editpack->rate_per); ?>" class="form-control text-right">
											</div>
											<?= form_error('rate_per'); ?>
										</div>
									</div>
									<div class="col-md-4">
										<div class="row">
											<label for="nights" class="col-form-label col-md-6">Nights Stay</label>
											<div class="col-md-6">
												<input type="number" name="nights" id="nights" value="<?= set_value('nights', $editpack->nights); ?>" class="form-control text-right">
											</div>
											<?= form_error('nights'); ?>
										</div>
									</div>
									<div class="col-md-4">
										<div class="row">
											<label for="days" class="col-form-label col-md-6">Days Stay</label>
											<div class="col-md-6">
												<input type="number" name="days" id="days" value="<?= set_value('days', $editpack->days); ?>" class="form-control text-right" readonly>
											</div>
											<?= form_error('days'); ?>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-4">
										<div class="row">
											<label for="min_pax" class="col-form-label col-md-6">Minimum PAX</label>
											<div class="col-md-6">
												<input type="number" name="min_pax" id="min_pax" value="<?= set_value('min_pax', $editpack->min_pax); ?>" class="form-control text-right">
											</div>
											<?= form_error('min_pax'); ?>
										</div>
									</div>
									<div class="col-md-4">
										<div class="row">
											<label for="tag" class="col-form-label col-md-6">Package Tag</label>
											<div class="col-md-6">
												<select name="tag" id="tag" class="form-control select2">
													<option value="">Select Tag</option>
													<?php foreach ($tags as $tag) :
														$selected = $tag->name == $editpack->tag ? "selected" : "";
													?>
														<option <?= $selected; ?> value="<?= $tag->name ?>"><?= $tag->name; ?></option>
													<?php endforeach ?>
												</select>
											</div>
											<?= form_error('tag'); ?>
										</div>
									</div>
									<div class="col-md-4">
										<div class="row">
											<label for="status" class="col-form-label col-md-6">Package Status</label>
											<div class="col-md-6">
												<select name="status" id="status" class="form-control select2">
													<option value="">Select Package Status</option>
													<option <?= $editpack->status == 'Active' ? "selected" : ""; ?> value="Active">Active</option>
													<option <?= $editpack->status == 'Inactive' ? "selected" : ""; ?> value="Inactive">Inactive</option>
												</select>
											</div>
											<?= form_error('status'); ?>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<div class="row">
											<label for="itinerary" class="col-form-label col-md-2">Itinerary</label>
											<div class="col-md-10">
												<div class="form-check-inline">
													<?php foreach ($itineraries as $itinerary) :
													?>
														<label class="checkbox-container form-check-label mr-2">
															<span class="checkbox-label" title="<?= $itinerary->value; ?>"> <?= $itinerary->icon; ?>
																<span class="d-none d-lg-inline d-md-inline"><?= $itinerary->value; ?></span>
															</span>
															<input type="checkbox" name="<?= $itinerary->name; ?>" value="1">
															<span class="checkmark"></span>
														</label>
													<?php endforeach; ?>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12">
										<label>Upload Image</label>
										<div class="input-group">
											<span class="input-group-btn">
												<span class="btn btn-default btn-file">
													Browse… <input type="file" id="imgInp" name="imageInp" accept="image/x-png,image/gif,image/jpeg">
												</span>
											</span>
											<input type="text" name="imgPath" class="form-control" readonly>
										</div>
										<img class="img-responsive mt-2" id='img-upload' src="<?= base_url('../uploads/' . $editpack->image); ?>" />
										<?= form_error('imgInp'); ?>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<?php $this->load->view('templates/footer'); ?>
	</div>
	<!-- ./wrapper -->

	<?php $this->load->view('templates/foot'); ?>
	<script src="<?= base_url('assets/dist/js/pages/package-entry.js'); ?>"></script>

</body>

</html>
