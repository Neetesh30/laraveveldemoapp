<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'imagepath',
        'adminid',
    ];


    // public function getidAttribute($value)
    // {
    //     return '#SS00'.$value;
    // }
    
    public function getnameAttribute($value)
    {
        return ucfirst($value);
    }
}
