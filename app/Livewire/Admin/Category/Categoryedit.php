<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Component;

class Categoryedit extends Component
{
    public $categoryId;

    public $name;

    public function mount(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        // update category
        $category = Category::findOrFail($this->categoryId);
        $category->name = $this->name;
        $category->save();
        session()->flash('message', 'Category updated successfully.');

        return redirect()->route('admin.show.categories');
    }

    public function render()
    {
        return view('livewire.admin.category.categoryedit')->layout('components.admin');
    }
}
