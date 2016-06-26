<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">Menu</li>

			<li><a href="{{ action('UserController@index') }}"><i class="fa fa-dashboard"></i> <span>Quản lý User</span></a></li>
			<li><a href="{{ action('CategoryController@index') }}"><i class="fa fa-dashboard"></i> <span>Quản lý thể loại truyện</span></a></li>
			<li><a href="{{ action('StoryController@index') }}"><i class="fa fa-dashboard"></i> <span>Quản lý  truyện</span></a></li>
		
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>