<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Productecreate extends Component
{
    use WithFileUploads;

    public $product_name;

    public $description;

    public $price;

    public $image;

    public $stock;

    public $category_id;

    public $coupons;

    public $categories;

    public function mount()
    {
        // Load all available coupons and categories
        $this->categories = Category::all();
    }

    public function saveNewProduct()
    {
        $this->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required|image|max:1024', // Optional: add validation for image
            'category_id' => 'nullable|exists:categories,id', // Validate category ID if provided
        ]);

        $imagePath = $this->image->store('public/images');
        $filename = basename($imagePath);
        $imageUrl = asset('storage/images/'.$filename);

        Product::create([
            'product_name' => $this->product_name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'image' => $imageUrl,
            'category_id' => $this->category_id,
        ]);

        session()->flash('message', 'Product created successfully.');
        $this->reset();

        return redirect()->to(route('admin.show.prodcuts'));
    }

    public function render()
    {
        return view('livewire.admin.products.productecreate')->layout('components.admin');
    }
}
