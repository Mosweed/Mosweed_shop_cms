<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Categoryoverview extends Component
{
    use WithPagination;

    public $searchTerm = '';

    protected $queryString = ['searchTerm' => ['except' => '']];

    public function updatedSearchTerm()
    {
        // This function is intentionally left blank to allow automatic update on input change
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);

        $products = Product::where('category_id', $category->id)->get();

        foreach ($products as $product) {
            $product->update([
                'category_id' => null,
            ]);
        }

        $category->delete();
    }

    public function render()
    {

        if ($this->searchTerm == '') {
            $categories = Category::paginate(20);
        } else {
            $searchTerm = '%'.$this->searchTerm.'%';
            $categories = Category::where('name', 'like', $searchTerm)->paginate(20);
        }

        return view('livewire.admin.category.categoryoverview', [
            'categories' => $categories,
        ])->layout('components.admin');
    }
}
