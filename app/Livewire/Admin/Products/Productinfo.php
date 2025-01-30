<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\coupon;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Productinfo extends Component
{
    use WithPagination;

    public $searchTerm = '';

    public $selectedCategory = '';

    protected $queryString = [
        'searchTerm' => ['except' => ''],
        'selectedCategory' => ['except' => ''],
    ];

    public function updatedSearchTerm()
    {

        // This function is intentionally left blank to allow automatic update on input change
    }

    public function updatedSelectedCategory()
    {
        // This function is intentionally left blank to allow automatic update on input change
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

    public function changeselectedCoupon($id)
    {
        $category = Category::find($id);
        $category->delete();
    }

    public function render()
    {
        $category_id = null;

        if ($this->selectedCategory) {
            //  dd($this->selectedCategory);
            if ($this->selectedCategory != 'All' && $this->selectedCategory != 'No') {
                $category_id = Category::where('name', $this->selectedCategory)->first()->id;
            } else {
                $category_id = $this->selectedCategory;
            }
        }

        $searchTerm = '%'.$this->searchTerm.'%';

        $query = Product::query();

        // Apply search term to relevant fields
        $query->where(function ($q) use ($searchTerm) {
            $q->where('product_name', 'like', $searchTerm)
                ->orWhere('description', 'like', $searchTerm)
                ->orWhere('price', 'like', $searchTerm)
                ->orWhere('stock', 'like', $searchTerm)
                ->orWhereHas('category', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', $searchTerm);
                });
        });

        // Filter by selected category if provided
        if ($this->selectedCategory) {
            if ($this->selectedCategory != 'All' && $this->selectedCategory != 'No') {
                $query->where('category_id', $category_id);
            } elseif ($this->selectedCategory == 'No') {
                $query->whereNull('category_id');
            }

        }

        // Filter by selected coupon if provided

        $products = $query->paginate(20);

        return view('livewire.admin.products.productinfo', [
            'products' => $products,
            'categories' => Category::all(),
            'coupons' => Coupon::all(),
        ])->layout('components.admin');
    }
}
