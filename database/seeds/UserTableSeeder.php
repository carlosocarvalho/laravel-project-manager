<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // CocProject\Entities\User::truncate();

        factory(CocProject\Entities\User::class)->create([
            'name' => 'quenduk',
            'email' => 'quenduk@yahoo.com.br',
            'password' => bcrypt('123456')
        ]);
        factory(CocProject\Entities\User::class,10)->create();
    }
}
