<?php

namespace App\Livewire\ShopCart;

use App\Models\Shopcart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cartcounter extends Component
{
    public $total = 0;

    protected $listeners = ['updateCartCount' => 'getCartItemCount'];

    public function render()
    {
        $this->getCartItemCount();

        return view('livewire.shop-cart.cartcounter');
    }

    public function getCartItemCount()
    {

        if (Auth::check()) {
            $this->total = Auth::user()->cart->count() ?? 0;
        } else {
            $this->total = Shopcart::where('session_id', session()->getId())->count() ?? 0;
        }

    }
}
