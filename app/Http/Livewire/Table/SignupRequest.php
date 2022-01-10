<?php

namespace App\Http\Livewire\Table;

use App\Http\Livewire\WantToSignUp;
use App\Models\User;
use App\Models\WantToSignup as ModelsWantToSignup;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SignupRequest extends LivewireDatatable
{
    // public $exportable = true;
    public $hideable = 'buttons';
    // public $model = User::class;
  /**
   * Write code on Method
   *
   * @return response()
   */
    public $filter;
    
    public function builder()
    {
        $signRequest= ModelsWantToSignup::orderByDesc('want_to_signups.id');
        // if($this->params['filter'] == 'Female'){
        //     $users->where('gender', 'Female')->where('type', 'UK Base')->where('user_type', 'user');
        // }
        // elseif($this->params['filter'] == 'InternationalFemale'){
        //     $users->where('gender', 'Female')->where('type', 'International')->where('user_type', 'user');
        // }
        // elseif($this->params['filter'] == 'Male'){
        //     $users->where('gender', 'Male')->where('type', 'UK Base')->where('user_type', 'user');
        // }
        // elseif($this->params['filter'] == 'InternationalMale'){
        //     $users->where('gender', 'Male')->where('type', 'International')->where('user_type', 'user');
        // }
        return $signRequest;
    }
  public function columns()
  {
      return [
        
          NumberColumn::name('id')
              ->label('ID')
              ->sortBy('id')
              ->searchable(),
              NumberColumn::name('email')
            //   ->label('Profile Code')
              ->sortBy('email')
              ->searchable(),
              
              NumberColumn::name('gender')
              ->label('Gender')
              ->sortBy('gender')
              ->searchable(),
              NumberColumn::name('ethnicity_residence')
              ->label('Ethnicity Residence')
              ->sortBy('ethnicity_residence')
              ->searchable(),
              NumberColumn::name('age_height')
              ->label('Age Height')
              ->sortBy('age_height')
              ->searchable(),
              NumberColumn::name('background')
              ->label('Background')
              ->sortBy('background')
              ->searchable(),
              NumberColumn::name('potential')
              ->label('Potential')
              ->sortBy('potential')
              ->searchable(),
              NumberColumn::name('before_married')
              ->label('Before Married')
              ->sortBy('before_married')
              ->searchable(),
              NumberColumn::name('ip_address')
              ->label('Ip Address')
              ->sortBy('ip_address')
              ->searchable(),
            //   NumberColumn::name('scholar')
            //   ->label('Before')
            //   ->sortBy('scholar')
            //   ->searchable(),
              
            Column::callback(['status', 'id'], function($status,$id){
              // return "<a class='btn btn-warning'  style='padding-top:5px;padding-bottom:5px;'  href='/profile/modify?id=$id'><i class='fa fa-pencil'></i></a>";
             if($status == 1){
                return '<span class="badge badge-success">Read</span>';
             }else{
              return "<a href='/superadmin/read-status-signup/$id'><span class='badge badge-danger'>Unread</span></a>";
             }
          })->label('Status'),    
            Column::callback(['id'], function($id){
                // return "<a class='btn btn-warning'  style='padding-top:5px;padding-bottom:5px;'  href='/profile/modify?id=$id'><i class='fa fa-pencil'></i></a>";
                return "<a href='/signup-view?sid=$id' type='button' class='btn btn-icon rounded-circle btn-info mr-1 mb-1'><i class='bx bx-show'></i></a>";
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
