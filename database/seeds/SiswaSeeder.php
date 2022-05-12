<?php

use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{ 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class, 150)->create();
        
    }
}
