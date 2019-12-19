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
}
