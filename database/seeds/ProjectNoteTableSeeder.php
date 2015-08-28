<?php

use Illuminate\Database\Seeder;

class ProjectNoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CocProject\Entities\Project::truncate();
        factory(CocProject\Entities\ProjectNote::class,50)->create();
    }
}
