<?php

use Illuminate\Database\Seeder;

class EmploisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Emploi::class, 50)->create();
    }
}
