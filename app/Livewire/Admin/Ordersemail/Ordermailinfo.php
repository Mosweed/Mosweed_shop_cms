<?php

namespace App\Livewire\Admin\Ordersemail;

use App\Models\OrdersEmails;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Ordermailinfo extends Component
{
    #[Layout('components.admin')]
    public $ordersEmails;

    public function mount()
    {
        $this->ordersEmails = OrdersEmails::all();
    }

    public function deleteOrderEmail($id)
    {
        $orderEmail = OrdersEmails::find($id);
        if ($orderEmail) {
            $orderEmail->delete();
        }

        $this->ordersEmails = OrdersEmails::all();
    }

    public function render()
    {
        return view('livewire.admin.ordersemail.ordermailinfo');
    }
}
