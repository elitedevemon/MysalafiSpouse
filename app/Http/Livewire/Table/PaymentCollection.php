<?php

namespace App\Http\Livewire\Table;

use App\Models\PaymentMange;
use App\Models\RequestLog;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PaymentCollection extends LivewireDatatable
{
    // public $exportable = true;
    public $hideable = 'buttons';
    public $model = PaymentMange::class;
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
              ->sortBy('payment_manges.id')
              ->searchable(),
            
              NumberColumn::name('user.profile_code')
              ->label('Profile Code')
              ->searchable(),
              NumberColumn::name('user.email')
              ->label('Email')
              ->searchable(),

              NumberColumn::name('paid_against')
              ->label('Payment Against')
              ->searchable(),

              NumberColumn::name('payment_method')
              ->label('Payment Mode')
              ->searchable(),
              NumberColumn::name('transaction_id')
              ->label('Transaction ID')
              ->searchable(),

              Column::callback(['payment_status'], function($payment_status){
                  return "<span class='badge badge-info'>$payment_status</span>";
              })->label('Currency'),
              Column::callback(['currency'], function($currency){
                return "<span class='badge badge-success'>$currency</span>";
            })->label('Payment Status'),
            DateColumn::raw('payment_manges.created_at AS dob2')
            ->label('Date')
            ->format('jS F')
            ->sortBy(DB::raw('DATE_FORMAT(payment_manges.created_at, "%m%d%Y")')),
            Column::callback(['id', 'payment_status'], function($id, $payment_status){
              // return "<span class='badge badge-info'>$id</span>";
              if($payment_status == 'Unpaid'){
             return  "<a href='/superadmin/payment-collection/$id' type='button' class='btn btn-icon btn-warning' style='margin-bottom: 5px;'><i class='bx bx-pencil'></i></a>"."
             <a href='/superadmin/payment-collection/delete/$id' type='button' class='btn btn-icon btn-danger'><i class='bx bx-trash'></i></a>";
          }
          })->label('Action'),
            // Column::callback(['status','id'], function($status, $id){
            //   // if($status == 'new'){
            //     return "<a class='btn btn-success' href='/superadmin/match-request-view/$id'>View</a>";
            //   // }
            // })->label('Action'),
            // Column::delete()->label('delete')->alignRight()
             
             
            //   ->filterable(),
             
            //   ->filterable(),
              
              
            //   ->filterable(),
            //   NumberColumn::name('profile_code')
            //   ->label('Profile Code')
            //   ->sortBy('profile_code')
            //   ->searchable(),
            //   NumberColumn::name('email')
            //   ->label('Email')
            //   ->sortBy('email')
            //   ->searchable(),
            //   NumberColumn::name('gender')
            //   ->label('Gender')
            //   ->sortBy('gender')
            //   ->searchable(),
            //   NumberColumn::name('age')
            //   ->label('Age')
            //   ->sortBy('age')
            //   ->searchable(),
            //   NumberColumn::name('height')
            //   ->label('Height')
            //   ->sortBy('height')
            //   ->searchable(),
            //   NumberColumn::name('dob')
            //   ->label('DOB')
            //   ->sortBy('dob')
            //   ->searchable(),
            //   NumberColumn::name('type')
            //   ->label('Type')
            //   ->sortBy('type')
            //   ->searchable(),
            //   NumberColumn::name('residence')
            //   ->label('Residence')
            //   ->sortBy('residence')
            //   ->searchable(),
            //   NumberColumn::name('visibility')
            //   ->label('Visibility')
            //   ->sortBy('visibility')
            //   ->searchable(),
            //   NumberColumn::name('status')
            //   ->label('Status')
            //   ->sortBy('status')
            //   ->searchable(),
              
            // Column::callback(['id'], function($id){
            //     // return "<a class='btn btn-warning'  style='padding-top:5px;padding-bottom:5px;'  href='/profile/modify?id=$id'><i class='fa fa-pencil'></i></a>";
            //     return "<a href='/superadmin/profile/modify?user_id=$id' type='button' class='btn btn-icon rounded-circle btn-warning mr-1 mb-1'><i class='bx bx-pencil'></i></a>";
            // })->label('Action'),
            
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
