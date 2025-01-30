<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class Categorycreate extends Component
{
    public $name;

    public function saveNewCategory()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $this->name,
        ]);

        session()->flash('message', 'Category created successfully.');
        $this->reset();

        return redirect()->route('admin.show.categories');
    }

    public function render()
    {
        return view('livewire.admin.category.categorycreate')->layout('components.admin');
    }
}
