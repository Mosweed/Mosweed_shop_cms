<?php

namespace App\Livewire\Admin\Coupons;

use App\Models\coupon;
use Livewire\Component;
use Livewire\WithPagination;

class Couponsoverview extends Component
{
    use WithPagination;

    public $searchTerm = '';

    protected $queryString = ['searchTerm' => ['except' => '']];

    public function updatedSearchTerm()
    {
    }

    public function deleteCoupon($id)
    {
        $coupon = Coupon::find($id);

        $coupon->delete();
    }

    public function render()
    {

        if ($this->searchTerm == '') {
            $coupons = Coupon::paginate(20);
        } else {
            $searchTerm = '%'.$this->searchTerm.'%';
            $coupons = Coupon::where('name', 'like', $searchTerm)
                ->orWhere('code', 'like', $searchTerm)
                ->paginate(20);
        }

        return view('livewire.admin.coupons.couponsoverview', [
            'coupons' => $coupons,
        ])->layout('components.admin');
    }
}
