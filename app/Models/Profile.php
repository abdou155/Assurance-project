<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'family_name', 'title','cin',
        'sexe', 'region', 'agence_id',
    ];


    public static  function getAgentTitleList()
    {
        return [
            'PDG' => 'PDG',
            'chef serice' => 'Chef serice',
            'arriere guichet' => 'Arrière guichet',
            'caissier' => 'Caissier',
        ];
    }


    public function agence()
    {
        return $this->belongsTo('App\Models\Agence');
    }
}

