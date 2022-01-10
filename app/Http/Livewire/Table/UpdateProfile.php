<?php

namespace App\Http\Livewire\Table;

use App\Models\UpdateUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UpdateProfile extends LivewireDatatable
{
    // public $exportable = true;
    public $hideable = 'buttons';
    // public $model = UpdateUser::class;
  /**
   * Write code on Method
   *
   * @return response()
   */
   
  public function builder()
  {
        $matchReq= UpdateUser::orderByDesc('update_users.id')
        ->Join('users', 'users.id', 'update_users.user_id');
        // ->where('update_users.status', 0);
        return $matchReq;
    }  
   
  public function columns()
  {
      return [
        
          NumberColumn::name('id')
              ->label('ID')
              ->sortBy('id')
              ->searchable(),
              NumberColumn::name('users.profile_code')
              ->label('Profile Code')
              ->sortBy('users.profile_code')
              ->searchable(),
              NumberColumn::name('users.email')
              ->label('Email')
              ->sortBy('users.email')
              ->searchable(),
              NumberColumn::name('users.gender')
              ->label('Gender')
              ->sortBy('users.gender')
              ->searchable(),
              NumberColumn::name('age')
              ->label('Age')
              ->sortBy('age')
              ->searchable(),
              NumberColumn::name('height')
              ->label('Height')
              ->sortBy('height')
              ->searchable(),
           
           
              NumberColumn::name('residence')
              ->label('Residence')
              ->sortBy('residence')
              ->searchable(),
             

            //   Column::callback(['deleted'], function($deleted){
            //     // return "<a class='btn btn-warning'  style='padding-top:5px;padding-bottom:5px;'  href='/profile/modify?id=$id'><i class='fa fa-pencil'></i></a>";
            //     if($deleted == 'yes')
            //     {
            //         return "<span class='badge badge-danger'>Deleted</span>";
            //     }
            // })->label('Deleted'),
            Column::callback(['status'], function($status){
              // return "<a class='btn btn-warning'  style='padding-top:5px;padding-bottom:5px;'  href='/profile/modify?id=$id'><i class='fa fa-pencil'></i></a>";
             if($status == 1){
                return '<span class="badge badge-success">Approved</span>';
             }elseif($status == 2){
              return '<span class="badge badge-danger">Reject</span>';
             }else{
              return '<span class="badge badge-warning">UnApprove</span>';
             }
          })->label('Status'),  
            Column::callback(['id'], function($id){
                // return "<a class='btn btn-warning'  style='padding-top:5px;padding-bottom:5px;'  href='/profile/modify?id=$id'><i class='fa fa-pencil'></i></a>";
                return "
                <a href='/superadmin-profile-update-view/$id' type='button' class='btn btn-icon rounded-circle btn-warning mr-1 mb-1'><i class='bx bx-show'></i></a>";
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
