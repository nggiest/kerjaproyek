<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    public $table = 'hari';
    public function Aslabs(){
        return $this->hasMany(App\JadwalAslab);
    }
}
