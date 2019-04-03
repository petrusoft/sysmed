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
            'nombre' => 'CEDULA',
            'descripcion' => 'Documento de Identidad',
        ]);

        DB::table('dni')->insert([
            'nombre' => 'RUC',
            'descripcion' => 'Registro unico de contribuyentes',
        ]);

        DB::table('dni')->insert([
            'nombre' => 'PASAPORTE',
            'descripcion' => 'Documento con validez internacional',
        ]);
    }
}
