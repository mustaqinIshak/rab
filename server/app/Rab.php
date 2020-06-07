<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rab extends Model
{
    //
    protected $table = "rabs";
    protected $fillable = ['noRab', 'nama'];
    public function barangs(){
        return $this->belongsToMany('App\Barang', 'rab_barangs')->withPivot('id', 'volume', 'totalMaterial', 'totalJasa', 'keterangan');
    }
}
