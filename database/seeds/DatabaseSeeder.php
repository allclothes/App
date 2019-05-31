<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('set foreign_key_checks = 0');

        // $this->call(UsersTableSeeder::class);
        // $this->call(ChannelTableSeeder::class);
        // $this->call(VinesTableSeeder::class);

        // DB::statement('set foreign_key_checks = 1');

        

        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Deseja limpar todo banco de dados antes de começar?')) {

            // Call the php artisan migrate:refresh using Artisan
            $this->command->call('migrate:refresh');

            $this->command->line("Tudo limpo, vamo começar do zero.");
        }

        // How many users you need, defaulting to 20
        $numberOfUser = $this->command->ask('Quantos usuarios você precisa ?', 20);

        $this->command->info("Criando {$numberOfUser} usuarios, cada um com uma loja associada.");

        // Create the channel, it will create a user and assign the channel
        $channels = factory(App\Models\Store::class, intval($numberOfUser))->create();

        $this->command->info('Usuarios criados!');

        // How many videos per channel
        $videoRange = $this->command->ask('Quantos produtos vc quer que cada loja tenha ?', '10-20');

        // Loop and create the video in range with channel id
        $channels->each(function($channel) use ($videoRange){
            factory(App\Models\Product::class, intval($videoRange))
                    ->create(['store_id' => $channel->id]);
        });

        $this->command->info("Agora todas lojas contém {$videoRange} produtos !");

        
        $this->command->info("Pronto! A database já ta povoada =)");

        // Re Guard model
        

    }
}
