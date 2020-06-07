<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $attributes = [
        'material' => 0,
        'jasa' => 0
     ];
    protected $table = 'barangs';
    public function rabs(){
        return $this->belongsToMany('App\Rab', 'rab_barangs');
    }
}
