<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(config('const.publishers') as $publisher){
            DB::table('publishers')->insert([
              'name' => $publisher
            ]);
        }
    }
}
