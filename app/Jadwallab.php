<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwallab extends Model
{
    public $table = 'jadwallab';

    protected $fillable = [
        'hari_id', 'jampel' , 'makul', 'kelas' , 'dosen',
    ];

    public function haris(){
        return $this->belongTo(App\Hari);
    }

    public function makuls(){
        return $this->belongTo(App\Makul);
    }

    public function dosens(){
        return $this->belongTo(App\Dosen);
    }


}
