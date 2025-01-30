<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\coupon;
use App\Models\Product;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Productedit extends Component
{
    use WithFileUploads;

    public $product_id;

    public $product_name;

    public $description;

    public $price;

    public $image;

    public $stock;

    public $current_image;

    public $category_id;

    public $coupons;

    public $categories;

    public function mount($id)
    {
        $product = Product::findOrFail($id);
        $this->product_id = $product->id;
        $this->product_name = $product->product_name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->current_image = $product->image;
        $this->category_id = $product->category_id;
        $this->coupons = Coupon::all();
        $this->categories = Category::all();
    }

    public function updateProduct()
    {
        $this->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:1024', // Optional: add validation for image
            'category_id' => 'nullable|exists:categories,id', // Validate category ID if provided
        ]);

        $product = Product::findOrFail($this->product_id);

        if ($this->image) {
            $imagePath = $this->image->store('public/images');
            $filename = basename($imagePath);
            $imageUrl = asset('storage/images/'.$filename);
            $product->image = $imageUrl;
        }

        $categoryId = $this->category_id ?: null;

        $product->update([
            'product_name' => $this->product_name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'category_id' => $categoryId,
        ]);

        session()->flash('message', 'Product updated successfully.');

        return redirect()->route('admin.show.prodcuts');
    }

    public function render()
    {
        return view('livewire.admin.products.productedit')->layout('components.admin');
    }
}
