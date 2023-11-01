<x-admin.main>

<div class="container mt-5">
    <div class="row justify-content-center">
        <x-flash />
        <div class="container-fluid px-4">
			<h1 class="mt-4">Dashboard</h1>
			<p>Hello, {{ auth()->user()->name }}
			<p>
			@if(!auth()->user()->billing_ends)
			@if(Auth::check() && auth()->user()->user_type == 'employer')
			<p>Your trial {{now()->format('Y-m-d') > auth()->user()->user_trial ? 'was expired': 'will expire'}} on {{auth()->user()->user_trial}}</p>
			@endif
			@endif
			@if(Auth::check() && auth()->user()->user_type == 'employer')
			<p>Your membership {{now()->format('Y-m-d') > auth()->user()->billing_ends ? 'was expired': 'will expire'}} on {{auth()->user()->billing_ends}}</p>
			@endif
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card bg-c-blue order-card">
								<div class="card-block">
									<h6 class="m-b-20">Total jobs posted</h6>
									<h2 class="text-right"><i class="fa fa-cart-plus f-left"></i>&nbsp;&nbsp;<span>{{\App\Models\Listing::where('user_id',auth()->id())->count()}}</span></h2>
									<p class="m-b-0">Your jobs<span class="f-right">{{\App\Models\Listing::where('user_id',auth()->id())->count()}}</span></p>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-xl-3">
							<div class="card bg-c-green order-card">
								<div class="card-block">
									<h6 class="m-b-20">Company Profile</h6>
									<h2 class="text-right"><i class="fa fa-rocket f-left"></i><span>&nbsp;&nbsp;1</span></h2>
									<p class="m-b-0">Your profile<span class="f-right">1</span></p>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-xl-3">
							<div class="card bg-c-yellow order-card">
								<div class="card-block">
									<h6 class="m-b-20">Subscription</h6>
									<h2 class="text-right"><i class="fa fa-refresh f-left"></i><span>$80</span></h2>
									<p class="m-b-0">Monthly<span class="f-right"></span>$80/month</p>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-xl-3">
							<div class="card bg-c-pink order-card">
								<div class="card-block">
									<h6 class="m-b-20">Total applicants</h6>
									<h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>{{$listings->users_count}}</span></h2>
									<p class="m-b-0">Your applicants<span class="f-right">{{$listings->users_count}}</span></p>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-xl-6">
						<div class="card mb-4">
							<div class="card-header">
								<i class="fas fa-chart-area me-1"></i>
								Area Chart Example
							</div>
							<div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="card mb-4">
							<div class="card-header">
								<i class="fas fa-chart-bar me-1"></i>
								Bar Chart Example
							</div>
							<div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
						</div>
					</div>
				</div>

			</div>
		</div>
    </div>
</div>
</x-admin.main>
