<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentboard extends Model
{

    //
    protected $table = 'studentboard_records';

    public function college()
    {
        return $this->belongsTo('App\Model\College');
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

    public function priority()
    {
        return $this->belongsTo('App\Model\Priority');
    }

}
