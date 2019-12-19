<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public $table = 'report';


    protected $fillable = [
        'tanggal' , 'users_id'
    ];

    public function user(){
        return $this->belongTo(App\User);
    }

    public function reportdaily(){
        return $this->belongTo(App\ReportDaily);
    }
}
