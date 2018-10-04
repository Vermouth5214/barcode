<!-- sidebar menu -->
<?php
	$segment =  Request::segment(2);
	$sub_segment =  Request::segment(3);
?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
        <h3>Undangan</h3>
		<ul class="nav side-menu">
			<li class="{{ ($segment == 'dashboard' ? 'active' : '') }}">
				<a href="<?=url('backend/dashboard');?>"><i class="fa fa-dashboard"></i> Dashboard</a>
			</li>
			<li class="{{ ($segment == 'daftar-peserta' ? 'active' : '') }}">
				<a href="<?=url('backend/daftar-peserta');?>"><i class="fa fa-user"></i> Daftar Peserta</a>
            </li>
			<li class="{{ ($segment == 'daftar-hadiah' ? 'active' : '') }}">
				<a href="<?=url('backend/daftar-hadiah');?>"><i class="fa fa-gift"></i> Daftar Hadiah</a>
            </li>
			<li class="{{ ($segment == 'input-hadir' ? 'active' : '') }}">
				<a href="<?=url('backend/input-hadir');?>"><i class="fa fa-user-plus"></i> Input Kehadiran</a>
            </li>
			<li class="{{ ($segment == 'daftar-undian' ? 'active' : '') }}">
				<a href="<?=url('backend/daftar-undian');?>"><i class="fa fa-ticket"></i> Daftar Undian</a>
			</li>
			<li class="{{ ($segment == 'verifikasi-undian' ? 'active' : '') }}">
				<a href="<?=url('backend/verifikasi-undian');?>"><i class="fa fa-ticket"></i> Verifikasi Undian</a>
            </li>
			<li class="{{ ($segment == 'laporan-undian' ? 'active' : '') }}">
				<a href="<?=url('backend/laporan-undian');?>"><i class="fa fa-file"></i> Laporan Undian</a>
            </li>
		</ul>
	</div>
	<div class="menu_section">
        <h3>General</h3>
		<ul class="nav side-menu">
			<li class=" {{ ((($segment == 'setting') || ($segment == 'modules') || ($segment == 'access-control')) ? 'active' : '') }}">
				<a><i class="fa fa-cog"></i> System Admin <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu" style="{{ ((($segment == 'setting') || ($segment == 'modules') || ($segment == 'access-control')) ? 'display : block' : '') }}">
					<li class="{{ ($segment == 'setting' ? 'active' : '') }}">
						<a href="<?=url('backend/setting');?>">Setting</a>
					</li>
					<?php
						// SUPER ADMIN //
						if ($userinfo['user_level_id'] == 1):
		
					?>
					<li class="{{ ($segment == 'modules' ? 'active' : '') }}">
						<a href="<?=url('backend/modules');?>">Modules</a>
					</li>
					<?php
						endif;
					?>
					<li class="{{ ($segment == 'access-control' ? 'active' : '') }}">
						<a href="<?=url('backend/access-control');?>">Access Control</a>
					</li>
				</ul>
            </li>
			<li class=" {{ ((($segment == 'users-level') || ($segment == 'users-user')) ? 'active' : '') }}">
				<a><i class="fa fa-users"></i> Membership <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu" style="{{ ((($segment == 'users-level') || ($segment == 'users-user')) ? 'display : block' : '') }}">
					<li class="{{ ($segment == 'users-level' ? 'active' : '') }}">
						<a href="<?=url('backend/users-level');?>">Master User Level</a>
					</li>
					<li class="{{ ($segment == 'users-user' ? 'active' : '') }}">
						<a href="<?=url('backend/users-user');?>">Master User</a>
					</li>
				</ul>
			</li>
			<li class="{{ ($segment == 'media-library' ? 'active' : '') }}">
				<a href="<?=url('backend/media-library');?>"><i class="fa fa-picture-o"></i> Media Library</a>
            </li>
		</ul>
	</div>
</div>

