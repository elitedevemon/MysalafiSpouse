<?php

namespace App\Http\Livewire\TableView;

use Livewire\Component;

class PaymentCollection extends Component
{
    public  $filter;
    public function render()
    {
        return view('livewire.table-view.payment-collection');
    }
}
