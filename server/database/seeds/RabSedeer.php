<?php

use Illuminate\Database\Seeder;

class RabSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rabs')->insert([
            'noRab' => '230793',
            'nama'  => 'PT.PLTU'
        ]);
    }
}
