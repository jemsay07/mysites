<div id="jWrapAdminMenu">
	<div id="jAdminNavBG"></div>
	<div id="jAdminNavWrap">
		<div id="sidebarCollapse" class="position-absolute">
			<i class="fas fa-chevron-right"></i>
		</div>
		<ul class="nav flex-column">
			<li class="nav-item">
				<a href="{{ url('/dashboard') }}" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
					<i class="fas fa-columns"></i> Dashboard
				</a>
			</li>
			<li class="nav-item">
				<a href="@#" class="nav-link">
					<i class="fas fa-thumbtack"></i> Post
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ url('/media') }}" class="nav-link {{ request()->is('media*') ? 'active' : '' }}">
					<i class="fas fa-photo-video"></i> Media
				</a>
			</li>
			<li class="nav-item">
				<a href="@#" class="nav-link">
					<i class="fas fa-clone"></i> Page
				</a>
			</li>
			<li class="nav-item">
				<a href="@#" class="nav-link">
					<i class="fas fa-palette"></i> Appearance
				</a>
			</li>
{{-- 			<li class="nav-item dropdown">
				<a id="navUsersDropdown" href="{{ url('/users') }}" class="nav-link dropdown-toggle {{ request()->is('users*') ? 'active' : '' }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
					<i class="fas fa-user"></i> User
				</a>
                <div class="dropdown-menu" aria-labelledby="navUsersDropdown">
                    <a class="dropdown-item" href="{{ url('/users') }}">
                       <i class="fas fa-user"></i> View Profile
                    </a>
                    <a class="dropdown-item" href="{{ url('/users/edit-profile') }}">
                       <i class="fas fa-user"></i> Edit Profile
                    </a>
                </div>
			</li> --}}
			<li class="nav-item">
				<a data-toggle="collapse" data-target="#navUsersDropdown" href="{{ url('/users') }}" class="nav-link collapsed {{ request()->is('users*') ? 'active' : '' }}" >
					<i class="fas fa-user"></i> User
				</a>
                <div class="collapse {{ request()->is('users*') ? 'show' : '' }}" id="navUsersDropdown" aria-expanded="false">
                	<ul class="nav flex-column py-0 submenu">
                		<li class="nav-item">
		                    <a class="nav-link {{ request()->is('users') ? 'current-active' : '' }}" href="{{ route('users.index') }}">
		                       <i class="fas fa-user"></i> View Profile
		                    </a>               			
                		</li>
                		<li class="nav-item">
		                    <a class="nav-link {{ request()->is('users/edit-profile') ? 'current-active' : '' }}" href="{{ route('users.edit', [ 'id' => Auth::id() ]) }}">
		                       <i class="fas fa-user"></i> Edit Profile
		                    </a>
                		</li>
                	</ul>
                </div>
			</li>
			<li class="nav-item">
				<a data-toggle="collapse" data-target="#navSettings" href="{{ url('/settings') }}" class="nav-link collapsed {{ request()->is('settings*') ? 'active' : '' }}">
					<i class="fas fa-sliders-h"></i> Settings
				</a>
				<div class="collapse {{ request()->is('settings*') ? 'show' : '' }}" id="navSettings" aria-expanded="false">
					<ul class="nav flex-column py-0 submenu">
						<li class="nav-item">
							<a class="nav-link {{ request()->is('/settings/general') ? 'current-active' : '' }}" href="{{ route('settings.edit') }}">General Settings</a>
						</li>
						{{-- <li class="nav-item">
							<a href="" class="nav-link"></a>
						</li> --}}
					</ul>
				</div>
			</li>
		</ul>
	</div>
</div>

{{-- <i class="fas fa-sign-out-alt"></i> --}}