<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CocProject\Entities\Project::truncate();
        factory(CocProject\Entities\Project::class,10)->create();
    }
}
