<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\User;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Get statistics
        $statistics = $this->getStatistics();

        // Get recent activity
        $recentActivity = $this->getRecentActivity();

        // Get chart data
        $chartData = $this->getChartData();

        // Get recent cars
        $recentCars = Car::with(['brand', 'model', 'user'])
            ->latest()
            ->take(5)
            ->get();

        // Get recent users
        $recentUsers = User::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'statistics',
            'recentActivity',
            'chartData',
            'recentCars',
            'recentUsers'
        ));
    }

    private function getStatistics()
    {
        $now = Carbon::now();
        $lastMonth = $now->copy()->subMonth();

        return [
            'total_cars' => Car::count(),
            'total_brands' => Brand::count(),
            'total_models' => CarModel::count(),
            'total_users' => User::count(),
            'total_dealers' => User::role('dealer')->count(),
            'total_messages' => ContactMessage::count(),
            'cars_this_month' => Car::where('created_at', '>=', $lastMonth)->count(),
            'users_this_month' => User::where('created_at', '>=', $lastMonth)->count(),
            'messages_this_month' => ContactMessage::where('created_at', '>=', $lastMonth)->count(),
            'pending_cars' => Car::where('status', 'pending')->count(),
        ];
    }

    private function getRecentActivity()
    {
        $activities = [];

        // Recent cars
        $recentCars = Car::with(['brand', 'user'])
            ->latest()
            ->take(3)
            ->get();

        foreach ($recentCars as $car) {
            $activities[] = [
                'type' => 'car',
                'message' => "New car '{$car->title}'  added",
                'time' => $car->created_at,
                'icon' => 'mdi mdi-car',
                'color' => 'text-success'
            ];
        }

        // Recent users
        $recentUsers = User::latest()
            ->take(3)
            ->get();

        foreach ($recentUsers as $user) {
            $activities[] = [
                'type' => 'user',
                'message' => "New user '{$user->name}' registered",
                'time' => $user->created_at,
                'icon' => 'mdi mdi-account-plus',
                'color' => 'text-info'
            ];
        }

        // Recent messages
        $recentMessages = ContactMessage::latest()
            ->take(2)
            ->get();

        foreach ($recentMessages as $message) {
            $activities[] = [
                'type' => 'message',
                'message' => "New message from {$message->name}",
                'time' => $message->created_at,
                'icon' => 'mdi mdi-email',
                'color' => 'text-warning'
            ];
        }

        // Sort by time and take latest 10
        usort($activities, function ($a, $b) {
            return $b['time']->timestamp - $a['time']->timestamp;
        });

        return array_slice($activities, 0, 10);
    }

    private function getChartData()
    {
        $now = Carbon::now();
        $months = [];
        $carCounts = [];
        $userCounts = [];

        // Get data for last 6 months
        for ($i = 5; $i >= 0; $i--) {
            $month = $now->copy()->subMonths($i);
            $months[] = $month->format('M Y');

            $carCounts[] = Car::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();

            $userCounts[] = User::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();
        }

        // Get cars by brand data
        $brandData = Brand::withCount('cars')
            ->having('cars_count', '>', 0)
            ->orderBy('cars_count', 'desc')
            ->take(6)
            ->get();

        $brandLabels = $brandData->pluck('title')->toArray();
        $brandCounts = $brandData->pluck('cars_count')->toArray();

        return [
            'monthly' => [
                'labels' => $months,
                'cars' => $carCounts,
                'users' => $userCounts
            ],
            'brands' => [
                'labels' => $brandLabels,
                'data' => $brandCounts
            ]
        ];
    }

    public function getStatsApi()
    {
        return response()->json($this->getStatistics());
    }

    public function getActivityApi()
    {
        return response()->json($this->getRecentActivity());
    }
}
