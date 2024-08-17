<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class etudiantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('etudiants')->insert([
      [
        'nom' => 'sara',
        'prenom' => 'sara',
        'email' => 'sara@gmail.com',
        'pass' => 'sara123',            
        'dateInscription' => '2023-05-29',              
        'tel' => 'required|digits:10',            
        'adresse' => 'Fes',
        'CIN'=> 'I1452'     
      ]

    ]);

    
    }
}
