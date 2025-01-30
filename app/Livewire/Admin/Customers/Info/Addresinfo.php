<?php

namespace App\Livewire\Admin\Customers\Info;

use Livewire\Component;

class Addresinfo extends Component
{
    public $addresses;

    public function render()
    {
        //dd($this->addresses);
        return view('livewire.admin.customers.info.addresinfo')->layout('components.admin');
    }
}
