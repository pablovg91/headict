<?php

use Illuminate\Database\Seeder;

class TiposArticulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('Tipos')->delete();

        $tipos_articulos = array(
            ['id' => 1, 'nombre' => 'gorro', 'descripcion' => 'Artículos de gorros', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'nombre' => 'gorra', 'descripcion' => 'Artículos de gorras', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'nombre' => 'gafas', 'descripcion' => 'Artículos de gafas', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        // Uncomment the below to run the seeder
        DB::table('Tipos')->insert($tipos_articulos);
    }
}
