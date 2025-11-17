@extends('admin.layouts.app')
@section('title', 'Dashboard | Admin Panel')
@section('content')
<div class="page-wrapper">
    <!-- Breadcrumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Admin Dashboard</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
        <div>
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10">
                <i class="ti-settings text-white"></i>
            </button>
        </div>
    </div>

    <div class="container-fluid">

        <!-- Statistics Cards -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card card-inverse card-success">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="align-self-center">
                                <h1 class="text-white"><i class="mdi mdi-car"></i></h1>
                            </div>
                            <div class="ml-auto align-self-center">
                                <h2 class="font-light text-white">{{ $statistics['total_cars'] }}</h2>
                                <h6 class="text-white">Total Cars</h6>
                                <small class="text-white-50">{{ $statistics['cars_this_month'] }} this month</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card card-inverse card-info">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="align-self-center">
                                <h1 class="text-white"><i class="mdi mdi-car-side"></i></h1>
                            </div>
                            <div class="ml-auto align-self-center">
                                <h2 class="font-light text-white">{{ $statistics['total_brands'] }}</h2>
                                <h6 class="text-white">Total Brands</h6>
                                <small class="text-white-50">Active brands</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card card-inverse card-warning">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="align-self-center">
                                <h1 class="text-white"><i class="mdi mdi-format-list-bulleted"></i></h1>
                            </div>
                            <div class="ml-auto align-self-center">
                                <h2 class="font-light text-white">{{ $statistics['total_models'] }}</h2>
                                <h6 class="text-white">Car Models</h6>
                                <small class="text-white-50">Available models</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card card-inverse card-primary">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="align-self-center">
                                <h1 class="text-white"><i class="mdi mdi-account-multiple"></i></h1>
                            </div>
                            <div class="ml-auto align-self-center">
                                <h2 class="font-light text-white">{{ $statistics['total_users'] }}</h2>
                                <h6 class="text-white">Total Users</h6>
                                <small class="text-white-50">{{ $statistics['users_this_month'] }} this month</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Statistics Row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-danger">
                                <i class="mdi mdi-account-star"></i>
                            </div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">{{ $statistics['total_dealers'] }}</h3>
                                <h5 class="text-muted m-b-0">Dealers</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-info">
                                <i class="mdi mdi-email"></i>
                            </div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">{{ $statistics['total_messages'] }}</h3>
                                <h5 class="text-muted m-b-0">Messages</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-warning">
                                <i class="mdi mdi-clock"></i>
                            </div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">{{ $statistics['pending_cars'] }}</h3>
                                <h5 class="text-muted m-b-0">Pending Cars</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-success">
                                <i class="mdi mdi-chart-line"></i>
                            </div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0">{{ $statistics['cars_this_month'] }}</h3>
                                <h5 class="text-muted m-b-0">Cars This Month</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Quick Actions</h4>
                        <h6 class="card-subtitle">Management shortcuts and controls</h6>
                        <div class="row m-t-30">
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <a href="{{ route('admin.settings') }}" class="text-decoration-none">
                                    <div class="card text-center">
                                        <div class="card-body p-3">
                                            <i class="mdi mdi-settings fa-2x text-info"></i>
                                            <h6 class="m-t-10 m-b-0">Settings</h6>
                                            <small class="text-muted">System Config</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <a href="{{ route('admin.cars.index') }}" class="text-decoration-none">
                                    <div class="card text-center">
                                        <div class="card-body p-3">
                                            <i class="mdi mdi-car fa-2x text-success"></i>
                                            <h6 class="m-t-10 m-b-0">Cars</h6>
                                            <small class="text-muted">Manage Cars</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <a href="{{ route('admin.brands.index') }}" class="text-decoration-none">
                                    <div class="card text-center">
                                        <div class="card-body p-3">
                                            <i class="mdi mdi-car-side fa-2x text-primary"></i>
                                            <h6 class="m-t-10 m-b-0">Brands</h6>
                                            <small class="text-muted">Car Brands</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <a href="{{ route('admin.models.index') }}" class="text-decoration-none">
                                    <div class="card text-center">
                                        <div class="card-body p-3">
                                            <i class="mdi mdi-format-list-bulleted fa-2x text-warning"></i>
                                            <h6 class="m-t-10 m-b-0">Models</h6>
                                            <small class="text-muted">Car Models</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <a href="{{ route('admin.users') }}" class="text-decoration-none">
                                    <div class="card text-center">
                                        <div class="card-body p-3">
                                            <i class="mdi mdi-account-multiple fa-2x text-purple"></i>
                                            <h6 class="m-t-10 m-b-0">Users</h6>
                                            <small class="text-muted">User Management</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <a href="{{ route('admin.blogs.index') }}" class="text-decoration-none">
                                    <div class="card text-center">
                                        <div class="card-body p-3">
                                            <i class="mdi mdi-blogger fa-2x text-dark"></i>
                                            <h6 class="m-t-10 m-b-0">Blogs</h6>
                                            <small class="text-muted">Content Management</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Charts Row -->
        <div class="row">
            <!-- Monthly Statistics Chart -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap">
                            <div>
                                <h4 class="card-title">Monthly Statistics</h4>
                                <h6 class="card-subtitle">Cars and Users Over Time</h6>
                            </div>
                            <div class="ml-auto">
                                <ul class="list-inline">
                                    <li><h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10"></i>Cars</h6></li>
                                    <li><h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10"></i>Users</h6></li>
                                </ul>
                            </div>
                        </div>
                        <div id="earning" style="height: 400px; margin-top: 20px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Cars -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Cars</h4>
                        <h6 class="card-subtitle">Latest car listings</h6>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Car</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Owner</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentCars as $car)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="m-r-10">
                                                    <img src="{{ $car->primaryImageUrl }}" alt="car" class="rounded" width="40">
                                                </div>
                                                <div>
                                                    <h6 class="m-b-0 font-medium">{{ Str::limit($car->title, 25) }}</h6>
                                                    <small class="text-muted">{{ $car->year ?? 'N/A' }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $car->brand->title ?? 'N/A' }}</td>
                                        <td>{{ $car->model->title ?? 'N/A' }}</td>
                                        <td>{{ $car->user->name ?? 'N/A' }}</td>
                                        <td><strong>${{ number_format($car->price ?? 0) }}</strong></td>
                                        <td><small>{{ $car->created_at->format('M d, Y') }}</small></td>
                                        <td>
                                            @if($car->status == 'active')
                                                <span class="label label-success">Active</span>
                                            @elseif($car->status == 'pending')
                                                <span class="label label-warning">Pending</span>
                                            @else
                                                <span class="label label-danger">Inactive</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted p-4">
                                            <i class="mdi mdi-car"></i>
                                            <p>No cars available</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Admin Session Card -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Current Admin Session</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <div class="m-r-20">
                                        <img src="{{ auth()->user()->profile_image ?? '/admin/assets/images/users/default.jpg' }}" alt="admin" class="rounded-circle" width="60">
                                    </div>
                                    <div>
                                        <h5 class="m-b-0">{{ auth()->user()->name }}</h5>
                                        <small class="text-muted">{{ auth()->user()->email }}</small>
                                        <div class="m-t-10">
                                            <span class="label label-success label-rounded">Online</span>
                                            <small class="text-muted m-l-10">Last login: {{ auth()->user()->updated_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-center">
                                            <h3 class="text-info">{{ $statistics['total_cars'] }}</h3>
                                            <small class="text-muted">Cars Managed</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center">
                                            <h3 class="text-success">{{ $statistics['total_users'] }}</h3>
                                            <small class="text-muted">Users Managed</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recent Activity -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Activity</h4>
                        <h6 class="card-subtitle">Latest system activities and changes</h6>
                        <div class="steamline m-t-30">
                            @forelse($recentActivity as $activity)
                            <div class="sl-item">
                                <div class="sl-left {{ $activity['color'] }}">
                                    <i class="{{ $activity['icon'] }}"></i>
                                </div>
                                <div class="sl-right">
                                    <div class="font-medium">{{ $activity['message'] }}</div>
                                    <div class="desc text-muted">
                                        <small>
                                            <i class="mdi mdi-clock-outline"></i>
                                            {{ $activity['time']->diffForHumans() }} 
                                            <span class="m-l-15">
                                                <i class="mdi mdi-calendar"></i>
                                                {{ $activity['time']->format('M d, Y h:i A') }}
                                            </span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="text-center text-muted p-4">
                                <i class="mdi mdi-information-outline fa-3x m-b-20"></i>
                                <h5>No Recent Activity</h5>
                                <p>No recent activities to display at the moment.</p>
                            </div>
                            @endforelse
                        </div>
                        
                        @if(count($recentActivity) > 0)
                        <div class="m-t-30 text-center">
                            <small class="text-muted">
                                <i class="mdi mdi-information"></i>
                                Showing {{ count($recentActivity) }} most recent activities
                            </small>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Right sidebar -->
        <div class="right-sidebar">
            <div class="slimscrollright">
                <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                <div class="r-panel-body">
                    <ul id="themecolors" class="m-t-20">
                        <li><b>With Light sidebar</b></li>
                        <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                        <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                        <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                        <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                        <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                        <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                        <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                        <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                        <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                        <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                        <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                        <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                        <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                    </ul>
                </div>
            </div>
        </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2019 Admin Press Admin by themedesigner.in
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Chart data from PHP
    const chartData = @json($chartData);
    
    // Initialize Morris chart with dynamic data
    setTimeout(function() {
        try {
            // Create Morris Area chart with dynamic data
            if (chartData && chartData.monthly) {
                // Transform data for Morris.js
                var morrisData = [];
                for (let i = 0; i < chartData.monthly.labels.length; i++) {
                    morrisData.push({
                        period: chartData.monthly.labels[i],
                        Cars: chartData.monthly.cars[i] || 0,
                        Users: chartData.monthly.users[i] || 0
                    });
                }
                
                // Initialize Morris Area Chart
                Morris.Area({
                    element: 'earning',
                    data: morrisData,
                    xkey: 'period',
                    ykeys: ['Cars', 'Users'],
                    labels: ['Cars', 'Users'],
                    pointSize: 3,
                    fillOpacity: 0.3,
                    pointStrokeColors: ['#1976d2', '#26c6da'],
                    behaveLikeLine: true,
                    gridLineColor: '#e0e0e0',
                    lineWidth: 3,
                    hideHover: 'auto',
                    lineColors: ['#1976d2', '#26c6da'],
                    resize: true
                });
            } else {
                // Fallback data if no dynamic data
                Morris.Area({
                    element: 'earning',
                    data: [
                        {period: 'Jan', Cars: 10, Users: 15},
                        {period: 'Feb', Cars: 20, Users: 25},
                        {period: 'Mar', Cars: 30, Users: 35},
                        {period: 'Apr', Cars: 40, Users: 45},
                        {period: 'May', Cars: 50, Users: 55},
                        {period: 'Jun', Cars: 60, Users: 65}
                    ],
                    xkey: 'period',
                    ykeys: ['Cars', 'Users'],
                    labels: ['Cars', 'Users'],
                    pointSize: 3,
                    fillOpacity: 0.3,
                    pointStrokeColors: ['#1976d2', '#26c6da'],
                    behaveLikeLine: true,
                    gridLineColor: '#e0e0e0',
                    lineWidth: 3,
                    hideHover: 'auto',
                    lineColors: ['#1976d2', '#26c6da'],
                    resize: true
                });
            }
            
            // Initialize Sparkline charts
            $('.spark-count').sparkline([4, 5, 0, 10, 9, 12, 4, 9, 4, 5, 3, 10, 9, 12, 10, 9], {
                type: 'bar',
                width: '100%',
                height: '70',
                barWidth: '2',
                resize: true,
                barSpacing: '6',
                barColor: 'rgba(255, 255, 255, 0.3)'
            });

        } catch (error) {
            console.log('Error initializing charts:', error);
        }
    }, 1000); // 1 second delay to ensure all libraries are loaded
    
    // Auto refresh statistics every 5 minutes
    setInterval(function() {
        fetch('{{ route("admin.dashboard.stats") }}')
            .then(response => response.json())
            .then(data => {
                updateStatisticsCards(data);
            })
            .catch(error => console.log('Error updating stats:', error));
    }, 300000); // 5 minutes
    
    function updateStatisticsCards(stats) {
        console.log('Stats updated:', stats);
    }
});
</script>
@endsection


