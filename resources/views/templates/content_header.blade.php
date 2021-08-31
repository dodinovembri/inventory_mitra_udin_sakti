	<div class="header">
		<div class="header-left">
			<div class="header-search">
				<i data-feather="search"></i>
				<input type="search" class="form-control" placeholder="What are you looking for?">
			</div><!-- header-search -->
		</div><!-- header-left -->

		<div class="header-right">
			<div class="dropdown dropdown-loggeduser">
				<a href="" class="dropdown-link" data-toggle="dropdown">
					<div class="avatar avatar-sm">
						<img src="https://via.placeholder.com/500/637382/fff" class="rounded-circle" alt="">
					</div><!-- avatar -->
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<div class="dropdown-menu-header">
						<div class="media align-items-center">
							<div class="avatar">
								<img src="https://via.placeholder.com/500/637382/fff" class="rounded-circle" alt="">
							</div><!-- avatar -->
							<div class="media-body mg-l-10">
								<h6>{{ auth()->user()->name }}</h6>
								<span>Administrator</span>
							</div>
						</div><!-- media -->
					</div>
					<div class="dropdown-menu-body">
						<a href="{{ url('profile') }}" class="dropdown-item"><i data-feather="user"></i> View Profile</a>											
						<form method="POST" action="{{ url('logout') }}">
							@csrf
							<a href="javascript::" class="dropdown-item"><i data-feather="log-out"></i> <button type="submit">Sign Out</button></a>
						</form>
					</div>
				</div><!-- dropdown-menu -->
			</div>
		</div><!-- header-right -->
	</div><!-- header -->