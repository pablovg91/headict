<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(TiposArticulosTableSeeder::class);
        $this->call(ArticulosTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);

    }
}
