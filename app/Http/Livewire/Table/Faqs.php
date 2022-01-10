<?php

namespace App\Http\Livewire\Table;
use App\Models\Faqs as ModelsFaqs;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
class Faqs extends LivewireDatatable
{
    // public $exportable = true;
    // public $hideable = 'buttons';
    public $model = ModelsFaqs::class;
    
  /**
   * Write code on Method
   *
   * @return response()
   */
  public function columns()
  {
      return [
        
          NumberColumn::name('id')
              ->label('ID')
              ->sortBy('id')
              ->searchable(),
              NumberColumn::name('question')
              
              ->label('Question')
              ->sortBy('question')
              
              ->searchable(),
              NumberColumn::name('answer')
              ->label('Answer')
              ->sortBy('answer')
            
              ->searchable(),
            Column::callback(['active'], function($active){
                // return "<a class='btn btn-warning'  style='padding-top:5px;padding-bottom:5px;'  href='/profile/modify?id=$id'><i class='fa fa-pencil'></i></a>";
                if($active == 1){
                return "<div class='badge badge-success mr-1 mb-1'>Active</div>";
                }
                else{
                return "<div class='badge badge-warning mr-1 mb-1'>Inactive</div>";
                }
            })->label('Status'),
            Column::callback(['id'], function($id){
                // return "<a class='btn btn-warning'  style='padding-top:5px;padding-bottom:5px;'  href='/profile/modify?id=$id'><i class='fa fa-pencil'></i></a>";
                return "<a href='/superadmin/website?faq_id=$id' type='button' class='btn btn-icon rounded-circle btn-warning mr-1 mb-1'><i class='bx bx-pencil'></i></a>";
            })->label('Action'),
            
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
