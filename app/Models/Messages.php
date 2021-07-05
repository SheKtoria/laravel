<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Messages extends Model
{
    protected $table = 'messages';
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
