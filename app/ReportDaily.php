<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportDaily extends Model
{
    public $table = 'reportdaily';
    protected $fillable= [
        'report_id', 'report_note',
    ];

    public function reportdaily(){
        return $this->belong(App\Report);
    }
}
