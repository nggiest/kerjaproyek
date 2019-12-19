<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $fillable =[
        'jenis_barang', 'jumlah_barang', 'upload_by',
    ];

    public function users(){
        return $this->belongsTo(App\User);
    }
}
