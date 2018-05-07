<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Uncomment the below to wipe the table clean before populating
        DB::table('Categorias')->delete();
        DB::table('Articulo_categoria')->delete();

        $categorias = array(
            ['id' => 1, 'nombre' => 'Kids', 'descripcion' => 'colección de niños', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'nombre' => 'Verano', 'descripcion' => 'colección de verano', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'nombre' => 'Limited edition', 'descripcion' => 'ediciones limitadas', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'nombre' => 'Classic', 'descripcion' => 'clasicos de toda la vida', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'nombre' => 'Black Label', 'descripcion' => 'colección Black Label', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        $articulo_categoria = array(
            //Articulo Knox - aero
            ['id' => 1, 'articulo_id' => 1, 'categoria_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'articulo_id' => 1, 'categoria_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            //Articulo Knox - terra
            ['id' => 3, 'articulo_id' => 2, 'categoria_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'articulo_id' => 2, 'categoria_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            //Articulo Knox - fire
            ['id' => 5, 'articulo_id' => 3, 'categoria_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            //Articulo Knox - water
            ['id' => 6, 'articulo_id' => 4, 'categoria_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            //Articulo Performed - aero
            ['id' => 7, 'articulo_id' => 5, 'categoria_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'articulo_id' => 5, 'categoria_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            //Articulo Performed - terra
            ['id' => 9, 'articulo_id' => 6, 'categoria_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 10, 'articulo_id' => 6, 'categoria_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            //Articulo Performed - fire
            ['id' => 11, 'articulo_id' => 7, 'categoria_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            //Articulo Performed - water
            ['id' => 12, 'articulo_id' => 8, 'categoria_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],


            //Articulo Barrow - model 1
            ['id' => 13, 'articulo_id' => 9, 'categoria_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            //Articulo Barrow - model 2
            ['id' => 14, 'articulo_id' => 10, 'categoria_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        // Uncomment the below to run the seeder
        DB::table('Categorias')->insert($categorias);
        DB::table('Articulo_categoria')->insert($articulo_categoria);
    }
}
