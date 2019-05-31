<?php

use Illuminate\Database\Seeder;
use App\Models\Canal;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\Models\Canal::truncate();

    	factory(App\Models\Canal::class, 25)->create();
    }
    
}
