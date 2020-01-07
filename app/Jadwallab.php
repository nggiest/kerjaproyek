<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwallab extends Model
{
    public $table = 'jadwallab';

    protected $fillable = [
        'hari_id', 'jampel' , 'makul', 'kelas' , 'dosen',
    ];

    public function hari(){
        return $this->belongTo(App\Hari);
    }

    public function makul(){
        return $this->belongTo(App\Makul);
    }

    public function dosen(){
        return $this->belongTo(App\Dosen);
    }


}
