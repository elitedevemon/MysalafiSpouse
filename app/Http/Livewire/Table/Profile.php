<?php

namespace App\Http\Livewire\Table;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Profile extends LivewireDatatable
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
        $users= User::orderByDesc('users.id');
        if($this->params['filter'] == 'Female'){
            $users->where('gender', 'Female')->where('type', 'UK Base')->where('user_type', 'user');
        }
        elseif($this->params['filter'] == 'InternationalFemale'){
            $users->where('gender', 'Female')->where('type', 'International')->where('user_type', 'user');
        }
        elseif($this->params['filter'] == 'Male'){
            $users->where('gender', 'Male')->where('type', 'UK Base')->where('user_type', 'user');
        }
        elseif($this->params['filter'] == 'InternationalMale'){
            $users->where('gender', 'Male')->where('type', 'International')->where('user_type', 'user');
        }
        return $users;
    }
  public function columns()
  {
      return [
        
          NumberColumn::name('id')
              ->label('ID')
              ->sortBy('id')
              ->searchable(),
              NumberColumn::name('profile_code')
              ->label('Profile Code')
              ->sortBy('profile_code')
              ->searchable(),
              NumberColumn::name('email')
              ->label('Email')
              ->sortBy('email')
              ->searchable(),
              NumberColumn::name('gender')
              ->label('Gender')
              ->sortBy('gender')
              ->searchable(),
              NumberColumn::name('age')
              ->label('Age')
              ->sortBy('age')
              ->searchable(),
              NumberColumn::name('height')
              ->label('Height')
              ->sortBy('height')
              ->searchable(),
              NumberColumn::name('dob')
              ->label('DOB')
              ->sortBy('dob')
              ->searchable(),
              NumberColumn::name('type')
              ->label('Type')
              ->sortBy('type')
              ->searchable(),
              NumberColumn::name('residence')
              ->label('Residence')
              ->sortBy('residence')
              ->searchable(),
              NumberColumn::name('visibility')
              ->label('Visibility')
              ->sortBy('visibility')
              ->searchable(),
              NumberColumn::name('status')
              ->label('Status')
              ->sortBy('status')
              ->searchable(),

              Column::callback(['deleted'], function($deleted){
                // return "<a class='btn btn-warning'  style='padding-top:5px;padding-bottom:5px;'  href='/profile/modify?id=$id'><i class='fa fa-pencil'></i></a>";
                if($deleted == 'yes')
                {
                    return "<span class='badge badge-danger'>Deleted</span>";
                }
            })->label('Deleted'),
              
            Column::callback(['id'], function($id){
                // return "<a class='btn btn-warning'  style='padding-top:5px;padding-bottom:5px;'  href='/profile/modify?id=$id'><i class='fa fa-pencil'></i></a>";
                return "
                <a href='/superadmin/profile/modify?user_id=$id' type='button' class='btn btn-icon rounded-circle btn-warning mr-1 mb-1'><i class='bx bx-pencil'></i></a>
                <a href='/superadmin/profile/delete/$id' type='button' class='btn btn-icon  btn-danger mr-1 mb-1'>Delete</a>
                ";
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
