<?php

use Illuminate\Database\Seeder;

class DesignEntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\DesignEntry::class,8)->create();
    }
}
