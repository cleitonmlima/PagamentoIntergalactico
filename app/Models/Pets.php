<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
    protected $table = "pets";
    public $timestamps = false;
    public const TYPES = [
        "C" => 1,
        "G" => 2
    ];

    public function type()
    {
        return $this->hasOne('App\Models\PetsTypes', 'id', 'pet_type_id');
    }

}
