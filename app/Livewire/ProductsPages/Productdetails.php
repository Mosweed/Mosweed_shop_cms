<?php

namespace App\Livewire\ProductsPages;

use App\Models\Product;
use App\Models\Shopcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Productdetails extends Component
{
    public $product;

    #[Validate('required', message: 'Dit is een verplicht veld')]
    #[Validate('min:1', message: 'Dit moet minimaal 1 zijn')]
    #[Validate('numeric', message: ' Dit moet een nummer zijn')]
    public $quantity = 1;

    public $size;

    public function mount($id)
    {
        $this->product = Product::find($id);
    }

    public function decrementQty()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function incrementQty()
    {

        if ($this->quantity < $this->product->stock) {
            $this->quantity++;
        } else {
            session()->flash('error', 'You can not add more than 50 items');
        }

    }

    public function add_to_cart(Request $request)
    {
        $this->validate();
        // if size is selected  make the size  als json  with name size
        if ($this->size) {
            $this->size = json_encode(['size' => $this->size]);
        }

        if (auth()->check()) {
            $cart = auth()->user()->cart()->where('product_id', $this->product->id)->first();

            if ($cart) {
                if ($cart->quantity + $this->quantity > $cart->product->stock) {
                    session()->flash('error', 'You can not add more than 50 items');

                    return;
                }

                $cart->update([
                    'quantity' => $cart->quantity + $this->quantity,
                    'shopcartitem_price' => $cart->shopcartitem_price + ($this->quantity * $this->product->price),
                ]);
            } else {
                if ($this->quantity > 50) {
                    session()->flash('error', 'You can not add more than 50 items');

                    return;
                }

                auth()->user()->cart()->create([
                    'product_id' => $this->product->id,
                    'quantity' => $this->quantity,
                    'shopcartitem_price' => $this->quantity * $this->product->price,
                    'options' => $this->size,
                ]);
            }
            $this->dispatch('updateCartCount');
            session()->flash('success', 'Product added to cart');
        } else {

            $session_id = session()->getId();
            $cart = Shopcart::where('product_id', $this->product->id)->where('session_id', $session_id)->first();

            if ($cart) {
                if ($cart->quantity + $this->quantity > 50) {
                    session()->flash('error', 'You can not add more than 50 items');

                    return;
                }

                $cart->update([
                    'quantity' => $cart->quantity + $this->quantity,
                    'shopcartitem_price' => $cart->shopcartitem_price + ($this->quantity * $this->product->price),
                ]);
            } else {
                if ($this->quantity > 50) {
                    session()->flash('error', 'You can not add more than 50 items');

                    return;
                }

                Shopcart::create([
                    'product_id' => $this->product->id,
                    'quantity' => $this->quantity,
                    'shopcartitem_price' => $this->quantity * $this->product->price,
                    'session_id' => $session_id,
                    'options' => $this->size,

                ]);
            }
            $this->dispatch('updateCartCount');
            session()->flash('success', 'Product added to cart');
        }

    }

    public function render()
    {
        return view('livewire.products-pages.productdetails');
    }

    public function add_to_database_cart()
    {

    }

    public function add_to_session_cart(Request $request)
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');

            if (array_key_exists($this->product->id, $cart)) {

                if ($cart[$this->product->id]['quantity'] + $this->quantity > 50) {
                    session()->flash('error', 'You can not add more than 50 items');

                    return;
                }

                $cart[$this->product->id] = [
                    'product_id' => $this->product->id,
                    'product_name' => $this->product->product_name,
                    'product_price' => $this->product->price,
                    'product_image' => $this->product->image,
                    'quantity' => $cart[$this->product->id]['quantity'] + $this->quantity,
                    'item_price' => $cart[$this->product->id]['quantity'] * $this->product->price,
                ];

            } else {

                if ($this->quantity > 50) {
                    session()->flash('error', 'You can not add more than 50 items');

                    return;
                }

                $cart[$this->product->id] = [
                    'product_id' => $this->product->id,
                    'product_name' => $this->product->product_name,
                    'product_price' => $this->product->price,
                    'product_image' => $this->product->image,
                    'quantity' => $this->quantity,
                    'item_price' => $this->quantity * $this->product->price,
                ];
            }
            session()->put('cart', $cart);
            $this->dispatch('updateCartCount');
            session()->flash('success', 'Product added to cart');

        } else {
            $cart = [];

            if ($this->quantity > 50) {
                session()->flash('error', 'You can not add more than 50 items');

                return;
            }
            $cart[$this->product->id] = [
                'product_id' => $this->product->id,
                'product_name' => $this->product->product_name,
                'product_price' => $this->product->price,
                'product_image' => $this->product->image,
                'quantity' => $this->quantity,
                'item_price' => $this->quantity * $this->product->price,
            ];
            session()->put('cart', $cart);
            $this->dispatch('updateCartCount');
            session()->flash('success', 'Product added to cart');
        }
    }

    //  add to cookies cart

    //  public function  add_to_cookies_cart()
    //{

    //    $test = [
    //                 'product_id' => $this->product->id,
    //                 'product_name' => $this->product->product_name,
    //                 'product_price' => $this->product->price,
    //                 'product_image' => $this->product->image,
    //                 'quantity' => $this->quantity,
    //                 'item_price' => $this->quantity * $this->product->price,
    //             ];

    //             $cart = $this->getCartFromCookie($request);
    //             if (isset($cart[$this->product->id])) {
    //                 $cart[$this->product->id]['quantity'] = $cart[$this->product->id]['quantity'] + $this->quantity;
    //                // $cart[$this->product->id]['quantity'] + $this->quantity;
    //                 //$cart[$this->product->id]['quantity']++;
    //             } else {
    //                 $cart[$this->product->id] = $test;
    //             }

    //             $this->storeCartInCookie($cart);

    //             session()->flash('success', 'Product added to cart');

    //             dd($this->getCartFromCookie($request));
    //
    //}

    // private function getCartFromCookie(Request $request)
    // {
    //     $cart = $request->cookie('cart');

    //     return $cart ? json_decode($cart, true) : [];
    // }

    // private function storeCartInCookie($cart)
    // {
    //     $cartJson = json_encode($cart);

    //     return Cookie::queue('cart', $cartJson, 60 * 24 * 7); // Set cookie to expire in 7 days
    // }
}
