<style>
	.ul-color-issue{
		overflow-y: scroll;
	}
	
</style>
<script src="https://unpkg.com/feather-icons"></script>


<div class="nk-sidebar" id="sidebar-menu">
	<div class="nk-nav-scroll">
		<ul class="metismenu ul-color-issue" id="menu">
			<!-- DASHBOARD -->
			<li class="s_meun dashboard_active">
				<a href="{{url('/admin/dashboard')}}"> <i data-feather="airplay"></i> <span class="nav-text">Dashboard</span> </a>
			</li>
			<li class="s_meun banner_active">
				<a href="{{url('/admin/banners')}}"><i class="icon-notebook"></i> <span>Banner</span></a>
			</li>
			<li class="s_meun theater_active">
				<a href="{{url('/admin/theaters')}}"><i class="icon-notebook"></i> <span>Theater</span></a>
			</li>
			<li class="s_meun event_active">
				<a href="{{url('/admin/events')}}"><i class="icon-notebook"></i> <span>Event</span></a>
			</li>
				
			<li class="s_meun logout_active">
				<a href="{{url('/admin/logout')}}"><i class="icon-logout"></i> <span>Logout</span></a>
			</li>
			</li>
		</ul>
	</div>
</div>
<script>
	feather.replace();
</script>