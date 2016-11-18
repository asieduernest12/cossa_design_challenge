<?php

use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //load all voters and loop them to voters
        $users = App\User::all();
        foreach ($users as $user ) {
          factory(App\Vote::class,1)->create(['voter_id'=>$user->id]);
        }

    }
}
