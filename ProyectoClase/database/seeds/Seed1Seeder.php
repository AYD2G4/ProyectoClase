<?php

use Illuminate\Database\Seeder;

class Seed1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $sql = file_get_contents(database_path() . '/scriptdeLlenadoTemporal.sql');
   //      $sql = base_path('dump.sql');

         //collect contents and pass to DB::unprepared
         DB::unprepared(file_get_contents($sql));
         //DB::statement($sql);
    }
}
