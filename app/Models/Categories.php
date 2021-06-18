<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Categories extends Model
{
    public $timestamps = false;
    protected $table = 'categories';
}
