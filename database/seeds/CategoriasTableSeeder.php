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
            ['id' => 1, 'nombre' => 'Gorros', 'descripcion' => 'Esta categoría va de gorros', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'nombre' => 'Gorras', 'descripcion' => 'Esta categoría va de gorras', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        $articulo_categoria = array(
            ['id' => 1, 'id_articulo' => 1, 'id_categoria' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'id_articulo' => 2, 'id_categoria' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        // Uncomment the below to run the seeder
        DB::table('Categorias')->insert($categorias);
        DB::table('Articulo_categoria')->insert($articulo_categoria);
    }
}
