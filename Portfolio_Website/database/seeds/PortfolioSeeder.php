<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        DB::table('portfolio')->insert([
            'name' => Str::random(4),
            'email' => Str::random(10).'@gmail.com',
            'telephone' => random_int(10000,1000000),
            'self_description' => 'description_'.Str::random(10),
            'user_id' =>  DB::table('users')->inRandomOrder()->first()->id,
        ]);
    }
}
