<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'code' , 'location'];

    public static function getAgenceList()
    {
        $agenceList = self::select('id' , 'name')->pluck('name' , 'id');
        return $agenceList;
    }
}
