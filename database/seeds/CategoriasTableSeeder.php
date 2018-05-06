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
            ['id' => 1, 'nombre' => 'Kids', 'descripcion' => 'Colección niños', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'nombre' => 'Verano', 'descripcion' => 'Colección de verano', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'nombre' => 'Coleccion 2018', 'descripcion' => 'Colección de 2018', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        $articulo_categoria = array(
            //Articulo Knox
            ['id' => 1, 'articulo_id' => 1, 'categoria_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'articulo_id' => 1, 'categoria_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],

            //Articulo Barrow
            ['id' => 3, 'articulo_id' => 2, 'categoria_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        // Uncomment the below to run the seeder
        DB::table('Categorias')->insert($categorias);
        DB::table('Articulo_categoria')->insert($articulo_categoria);
    }
}
