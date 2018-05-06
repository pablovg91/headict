<?php

use Illuminate\Database\Seeder;

class ArticulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('Articulos')->delete();

        $articulos = array(
            ['id' => 1, 'nombre' => 'Knox', 'precio' => 9.99, 'stock' => 5, 'tipo_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'nombre' => 'Performed', 'precio' => 20.50, 'stock' => 5, 'tipo_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'nombre' => 'Barrow', 'precio' => 30.00, 'stock' => 10, 'tipo_id' => 0, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        // Uncomment the below to run the seeder
        DB::table('Articulos')->insert($articulos);
    }
}
