<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Objects extends Model
{
    public $timestamps = false;
    protected $fillable = ['user_id'];
    protected $table = 'objects';
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
