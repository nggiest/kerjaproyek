<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function status_id(){
        return $this->hasMany(App\User);
    }
}
