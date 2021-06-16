<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PersonalInfo extends Model
{
    public $timestamps = false;
    protected $fillable = ['user_id'];
    protected $table = 'personal_info';
    public function updateById($id, $data = array())
    {
        return DB::table('personal_info')->where('user_id',  $id)->update($data);
    }
}
