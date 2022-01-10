<?php

namespace App\Http\Livewire\TableView;

use Livewire\Component;

class Profile extends Component
{
    public $filter = 'Female';
    public $queryString = ['filter'];
    public function render()
    {
        return view('livewire.table-view.profile');
    }
}
