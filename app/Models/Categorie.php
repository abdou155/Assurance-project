<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    public static function getServiceCount($id)
    {
        $serviceCount = Service::select('id' , 'categorie_id')->where('categorie_id', $id)->count();
        return $serviceCount;
    }
}
