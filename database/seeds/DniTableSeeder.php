<?php

use Illuminate\Database\Seeder;

class DniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dni')->insert([
            'nombre' => 'Cedula',
            'descripcion' => 'Documento de Identidad',
        ]);

        DB::table('dni')->insert([
            'nombre' => 'Ruc',
            'descripcion' => 'Registro unico de contribuyentes',
        ]);

        DB::table('dni')->insert([
            'nombre' => 'Pasaporte',
            'descripcion' => 'Documento con validez internacional',
        ]);
    }
}
