<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalAslab extends Model
{
    public $table = 'reportdaily';
    protected $fillable =[
        'hari_id', 'users_id',
    ];
    public function hari(){
        return $this->belongTo(App\Hari);
    }
}
