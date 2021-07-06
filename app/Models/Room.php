<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Room extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'rooms';
    public $timestamps = false;
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function messages()
    {
        return $this->hasMany(Messages::class);
    }
}
