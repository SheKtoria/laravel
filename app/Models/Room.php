<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Room extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $table = 'rooms';
    public function users()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
    public function userRoom()
    {
        return $this->hasOne(RoomUser::class);
    }
}
