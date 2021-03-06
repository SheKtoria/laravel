<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class RoomUser extends Model
{
    use HasFactory;
    protected $table = 'room_user';
    public function users()
    {
        return $this->belongsToMany(User::class, 'id' , 'user_id');
    }

}
