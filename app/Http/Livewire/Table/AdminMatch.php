<?php

namespace App\Http\Livewire\Table;

use App\Models\RequestLog;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class AdminMatch extends LivewireDatatable
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
        $matchReq= RequestLog::orderBy('request_logs.r_status', 'asc')
        ->Join('users', 'users.id', 'request_logs.user_id');
        
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
        return $matchReq;
    }
  public function columns()
  {
      return [
        
          NumberColumn::name('id')
              ->label('ID')
              ->sortBy('request_logs.id')
              ->searchable(),
              NumberColumn::name('users.profile_code')
              ->label('Sender Profile Code')
              ->sortBy('users.profile_code')
              ->searchable(),
              
              NumberColumn::name('request_logs.receiver_profile_code')
              ->label('Receiver Profile Code')
              ->sortBy('request_logs.receiver_profile_code')
              ->searchable(),

              DateColumn::name('request_logs.created_at')
              ->label('Request Sent')
              ->format('d/m/Y')
              ->sortBy('request_logs.created_at'),

              DateColumn::name('request_logs.updated_at')
              ->label('Request Updated')
              ->format('d/m/Y')
              ->sortBy('request_logs.updated_at'),

              Column::callback(['status'], function($status){
                if ($status == 'Unsuccessfull') {
                  return "<span class='badge' style='color: white; background-color: red !important'>$status</span>";
                }elseif ($status == 'accept') {
                  return "<span class='badge' style='color: white; background-color: green !important'>$status</span>";
                }elseif ($status == 'new') {
                  return "<span class='badge badge-info'>$status</span>";
                }elseif ($status == 'in-process') {
                  return "<span class='badge' style='color: white; background-color: orange !important'>$status</span>";
                }
                  // return "<span class='badge' style='color: white; background-color:  !important'>$status</span>";
              })->label('Status'),

            //   Column::callback(['r_status', 'id'], function($r_status,$id){
            //     if($r_status == 0){
            //       return "<a href='/superadmin/match-read-status/$id'><span class='badge badge-danger'>Unread</span></a>";
            //     }else{
            //     return "<span class='badge badge-success'>Read</span>";
            //   }
            // })->label('Mark'),

            Column::callback(['status','id'], function($status, $id){
              // if($status == 'new'){
                return "<a class='btn btn-success' href='/superadmin/match-request-view/$id'>View</a>";
              // }
            })->label('Action'),
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
