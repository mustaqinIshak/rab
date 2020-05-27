<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $table = 'barangs';
    public function rabs(){
        return $this->belongsToMany('App/Rab');
    }
}
