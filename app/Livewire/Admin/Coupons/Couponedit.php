<?php

namespace App\Livewire\Admin\Coupons;

use App\Models\coupon;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Livewire\Component;

class Couponedit extends Component
{
    public $couponId;

    public $name;

    public $code;

    public $start_date;

    public $end_date;

    public $percentage;

    public $fast_price;

    public $discount_type;

    public $today;

    public $tomorrow;

    public $Use_Limites_Type;

    public $limit;

    public function mount(Request $request, $id)
    {
        $coupon = coupon::find($id);
        $this->couponId = $coupon->id;
        $this->name = $coupon->name;
        $this->code = $coupon->code;
        $this->start_date = $coupon->start_date;
        $this->end_date = $coupon->end_date;
        $this->percentage = $coupon->percentage;
        $this->fast_price = $coupon->fast_price;
        $this->discount_type = $coupon->percentage ? 'percentage' : 'fast_price';
        $this->Use_Limites_Type = $coupon->use_limites_type;
        $this->limit = $coupon->limit;

    }

    public function Select_type()
    {
        // Reset the other field when the discount type changes
        if ($this->discount_type == 'percentage') {
            $this->fast_price = null;
        } elseif ($this->discount_type == 'fast_price') {
            $this->percentage = null;
        }
    }

    public function change_use_limites_type()
    {

        // Reset the other field when the discount type changes
        if ($this->Use_Limites_Type == 'unlimited') {
            $this->limit = null;
        } elseif ($this->Use_Limites_Type == 'limited') {
            $this->limit = null;
        } elseif ($this->Use_Limites_Type == 'one_time') {
            $this->limit = 1;
        }
    }

    public function updateCoupon()
    {

        $this->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'discount_type' => 'required|string|in:percentage,fast_price',
            'percentage' => 'nullable|required_if:discount_type,percentage|numeric|min:0|max:100',
            'fast_price' => 'nullable|required_if:discount_type,fast_price|numeric|min:0',
            'Use_Limites_Type' => 'required|string|in:unlimited,limited,one_time',
            // limit integer not a decimal number
            'limit' => 'nullable|required_if:Use_Limites_Type,limited|integer|min:1',

        ]);

        $coupon = coupon::find($this->couponId);
        $coupon->update([
            'name' => $this->name,
            // 'code' => $this->code,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'percentage' => $this->discount_type === 'percentage' ? $this->percentage : null,
            'fast_price' => $this->discount_type === 'fast_price' ? $this->fast_price : null,
            'use_limites_type' => $this->Use_Limites_Type,
            'limit' => $this->Use_Limites_Type === 'limited' ? $this->limit : null,

        ]);

        // Optionally, show a success message
        session()->flash('message', 'Coupon updated successfully.');

        return redirect()->to(route('admin.show.coupons'));

    }

    public function render()
    {
        $this->today = now();
        $this->tomorrow = now()->addDay();

        return view('livewire.admin.coupons.couponedit')->layout('components.admin');
    }
}
