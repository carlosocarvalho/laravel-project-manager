<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // CocProject\Entities\Client::truncate();
        factory(CocProject\Entities\Client::class,10)->create();
    }
}
