<?php

namespace App\Http\Livewire\Table;

use App\Http\Livewire\WantToSignUp;
use App\Models\Subscribe as ModelsSubscribe;
use App\Models\User;
use App\Models\WantToSignup as ModelsWantToSignup;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Subscribe extends LivewireDatatable
{
    // public $exportable = true;
    public $hideable = 'buttons';
    public $model = ModelsSubscribe::class;
  /**
   * Write code on Method
   *
   * @return response()
   */
    public $filter;
  public function columns()
  {
      return [
        
          NumberColumn::name('id')
              ->label('ID')
              ->sortBy('id')
              ->searchable(),
              NumberColumn::name('name')
            //   ->label('Profile Code')
              ->sortBy('name')
              ->searchable(),
              
              NumberColumn::name('email')
              ->label('Email')
              ->sortBy('email')
              ->searchable(),
              
            
            // NumberColumn::name('payment_mode')
            // ->label('Payment Mode'),
            // Column::callback(['id', 'status'], function ($id, $status) {
            //     if($status == 'Unpaid'){
            //         return "<span class='badge badge-warning'><a target='_blank' href='/admin/deposit-detail/$id'>Unpaid</a></span>";
            //     }else{
            //         return "<span class='badge badge-success'>Paid</span>";
            //     }
            // })->label('Status') ->searchable(),
      ];
  }
}
