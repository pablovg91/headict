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
            //GORROS
            ['id' => 1, 'nombre' => 'Knox - aero', 'precio' => 9.99, 'stock' => 5, 'tipo_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'nombre' => 'Knox - terra', 'precio' => 9.99, 'stock' => 5, 'tipo_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'nombre' => 'Knox - fire', 'precio' => 9.99, 'stock' => 5, 'tipo_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'nombre' => 'Knox - water', 'precio' => 9.99, 'stock' => 5, 'tipo_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['id' => 5, 'nombre' => 'Performed - aero', 'precio' => 20.00, 'stock' => 10, 'tipo_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'nombre' => 'Performed - terra', 'precio' => 20.00, 'stock' => 10, 'tipo_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'nombre' => 'Performed - fire', 'precio' => 20.00, 'stock' => 20, 'tipo_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'nombre' => 'Performed - water', 'precio' => 20.00, 'stock' => 20, 'tipo_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            //GORRAS
            ['id' => 9, 'nombre' => 'Barrow - model 1', 'precio' => 30.00, 'stock' => 10, 'tipo_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 10, 'nombre' => 'Barrow - model 2', 'precio' => 30.00, 'stock' => 10, 'tipo_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 11, 'nombre' => 'Barrow - model 3', 'precio' => 30.00, 'stock' => 10, 'tipo_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            ['id' => 12, 'nombre' => 'BUY IT - test model 1', 'precio' => 0.10, 'stock' => 100, 'tipo_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],

        );

        // Uncomment the below to run the seeder
        DB::table('Articulos')->insert($articulos);
    }
}
