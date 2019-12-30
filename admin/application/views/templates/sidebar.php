<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url(); ?>" class="brand-link">
		<img src="<?= base_url('assets/dist/img/logo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light"><?= $site_title; ?></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('assets/dist/img/avatar5.png'); ?>" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="<?= base_url(); ?>" class="d-block"><?= $name; ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
							 with font-awesome or any other icon font library -->

				<?php foreach ($menus as $menu) { ?>
					<li class="nav-item has-treeview menu-open">
						<a href="<?= $menu->url; ?>" class="nav-link">
							<?= $menu->icon; ?>
							<p>
								<?= $menu->name; ?>
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<?php foreach ($menu->child as $submenu) { ?>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url($submenu->url); ?>" class="nav-link">
										<?= $submenu->icon; ?>
										<p><?= $submenu->name; ?></p>
									</a>
								</li>
							</ul>
						<?php } ?>
					</li>
				<?php } ?>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
