<nav class="main-header navbar navbar-expand navbar-danger navbar-dark">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
		</li>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a class="nav-link" title="Logout" href="<?= base_url('/main/logout'); ?>">
				<?= $name; ?>
				<i class="fa fa-sign-out" aria-hidden="true"></i>
			</a>
		</li>
	</ul>
</nav>
