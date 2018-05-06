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
            ['id' => 1, 'nombre' => 'Articulo 1', 'precio' => 9.99, 'color' => 'azul', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'nombre' => 'Articulo 2', 'precio' => 20.50, 'color' => 'verde', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'nombre' => 'Articulo 3', 'precio' => 30.00, 'color' => 'rojo', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        // Uncomment the below to run the seeder
        DB::table('Articulos')->insert($articulos);
    }
}
