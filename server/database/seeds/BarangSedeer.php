<?php

use Illuminate\Database\Seeder;

class BarangSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('barangs')->insert([
            'nama'          =>  'Kabel Fiber Optik 12 core',
            'satuan'        =>  'm',
            'material'      =>  '16000',
            'jasa'          =>  '4500'
        ]);
        DB::table('barangs')->insert([
        'nama'          =>  'OTB 6 core',
        'satuan'        =>  'bh',
        'material'      =>  '750000',
        'jasa'          =>  '0'
        ]);
        DB::table('barangs')->insert([
            'nama'          =>  'Ditto Closure 1-6 Core',
            'satuan'        =>  'ls',
            'material'      =>  '0',
            'jasa'          =>  '350000'
        ]);
    }
}
