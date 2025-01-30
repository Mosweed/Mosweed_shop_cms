<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\coupon;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{
    public $userData = [];

    public $couponData = [];

    public $productData = [];

    public function mount()
    {
        // Get user data
        $this->userData = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(function ($item) {
                return [
                    'date' => Carbon::parse($item->date)->format('Y-m-d'),
                    'count' => $item->count,
                ];
            })
            ->toArray();

        // Get coupon data
        $this->couponData = Coupon::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(function ($item) {
                return [
                    'date' => Carbon::parse($item->date)->format('Y-m-d'),
                    'count' => $item->count,
                ];
            })
            ->toArray();

        // Get product data
        $this->productData = Product::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(function ($item) {
                return [
                    'date' => Carbon::parse($item->date)->format('Y-m-d'),
                    'count' => $item->count,
                ];
            })
            ->toArray();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.dashboard')->layout('components.chart');
    }
}
