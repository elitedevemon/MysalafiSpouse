<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateUser extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userScholars()
    {
        return $this->hasMany(UserUpdateDetail::class, 'user_update_id', 'id');
    }
}
