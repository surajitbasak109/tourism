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
							<h1 class="m-0 text-dark">Dashboard <i class="fa fa-angle-double-right" aria-hidden="true"></i> Package details</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">

						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table bg-light text-sm dataTable table-bordered table-condensed table-hover">
									<thead>
										<tr>
											<th>Date</th>
											<th>Code</th>
											<th>Title</th>
											<th>Description</th>
											<th>Rate</th>
											<th>Nights</th>
											<th>Days</th>
											<th>MPax</th>
											<th>Tag</th>
											<th>Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php if ($packages) : ?>
											<?php foreach ($packages as $row) : ?>
												<tr>
													<td><?= date('d-m-Y', strtotime(str_replace('-', '/', $row->created_at))) ?></td>
													<td><?= $row->pack_code; ?></td>
													<td><?= substr($row->title, 0, 28); ?></td>
													<td><?= substr($row->description, 0, 20); ?>...</td>
													<td><?= $row->rate_per; ?></td>
													<td><?= $row->nights; ?></td>
													<td><?= $row->days; ?></td>
													<td><?= $row->min_pax; ?></td>
													<td><?= $row->tag ?></td>
													<td><?= $row->status ?></td>
													<td>
														<div class="btn-group">
															<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
																Action
															</button>
															<div class="dropdown-menu">
																<a class="dropdown-item" href="<?= base_url('/main/editpackage/' . $row->id) ?>">Edit</a>
																<?php
																if ($row->status == 'Active') {
																	$url = '/main/canpackage/' . $row->id;
																	$text = 'Deactivate';
																} else if ($row->status == 'Inactive') {
																	$url = '/main/actpackage/' . $row->id;
																	$text = 'Activate';
																}
																?>
																<a class="dropdown-item" onclick="return confirm('Are you sure?')" href="<?= base_url($url); ?>"><?= $text; ?></a><a class="dropdown-item" onclick="return confirm('Are you sure?')" href="<?= base_url('/main/delpackage/' . $row->id) ?>">Delete</a>
															</div>
														</div>
													</td>
												</tr>
											<?php endforeach; ?>
										<?php endif; ?>
									</tbody>
									<tfoot>
										<tr>
											<th>Date</th>
											<th>Code</th>
											<th>Title</th>
											<th>Description</th>
											<th>Rate</th>
											<th>Nights</th>
											<th>Days</th>
											<th>MPax</th>
											<th>Tag</th>
											<th>Status</th>
											<th class="text-center">Action</th>
										</tr>
									</tfoot>
								</table>
							</div>
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
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
	<script src="<?= base_url('assets/dist/js/pages/main.js'); ?>"></script>

</body>

</html>
