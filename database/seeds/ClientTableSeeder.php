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
        \CocProject\Models\Client::truncate();
        factory(CocProject\Models\Client::class,10)->create();
    }
}
