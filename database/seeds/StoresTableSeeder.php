<?php

use Illuminate\Database\Seeder;

class VinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Vines::truncate();

    	factory(App\Models\Vines::class, 400)->create();
    }
}
