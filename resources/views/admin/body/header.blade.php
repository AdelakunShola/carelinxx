<div class="header">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="collapse navbar-collapse justify-content-between">
				<div class="header-left">
					<div class="search_bar dropdown">
						<span class="search_icon p-3 c-pointer" data-bs-toggle="dropdown">
							<i class="mdi mdi-magnify"></i>
						</span>
						<div class="dropdown-menu p-0 m-0">
							<form>
								<input class="form-control" type="search" placeholder="Search" aria-label="Search">
							</form>
						</div>
					</div>
				</div>

				<ul class="navbar-nav header-right">
				
					
				
					<li class="nav-item dropdown header-profile">
						<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
							<img src="public/assets/images/profile/education/pic1.jpg" width="20" alt=""/>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							
							 <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="mobile-logout-btn">Logout</button>
                        </form>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>