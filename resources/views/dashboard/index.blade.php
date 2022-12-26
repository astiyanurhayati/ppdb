<x-layout-app title="Dashboard - PPDB">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			@if(Auth::user()->role == "user")
				<h1 class="app-page-title">Student Dashboard</h1>
			@elseif (Auth::user()->role == "admin")
				<h1 class="app-page-title">Admin Dashbaord</h1>
			@endif

			<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				<div class="inner">
					<div class="app-card-body p-3 p-lg-4">
						<h3 class="mb-3">Hi {{Auth::user()->nama_lengkap}}!</h3>
						<div class="row gx-5 gy-3">
							<div class="col-12 col-lg-9">
								<div>Selamat Datang!</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			@if(Auth::user()->role == "user")
				@if(Session::get('success'))
				<div class="alert alert-success">
					{{session('success')}}
				</div>
				@endif
			{{-- @elseif (Auth::user()->role == "admin")
				<h1 class="app-page-title">Admin Dashbaord</h1> --}}
			@endif

		
		</div>
	</div>
</x-layout-app>