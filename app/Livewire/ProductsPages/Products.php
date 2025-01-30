<?php

namespace App\Livewire\ProductsPages;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::paginate(12);

        return view('livewire.products-pages.products', compact('products'));
    }
}
