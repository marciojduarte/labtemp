<?php

use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert([
            ['name'=> 'Márcio José Duarte', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677','mae'=>'nome da mae'],
            ['name'=> 'Mauro Cardoso Santos ', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677','mae'=>'nome da mae'],
            ['name'=> 'Ricardo Veloso Andrade', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677','mae'=>'nome da mae'],
            ['name'=> 'Rui Otávio Nascimento', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677','mae'=>'nome da mae'],
            ['name'=> 'Carlos André dos Santos', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677','mae'=>'nome da mae'],
            ['name'=> 'Paulo Ricardo Santana', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677','mae'=>'nome da mae'],
            ['name'=> 'João Pedro Alkimin', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677','mae'=>'nome da mae'],
            ['name'=> 'Luiz Carlos Santos', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677','mae'=>'nome da mae'],
            ['name'=> 'Guastavo Henrique Cardoso', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677','mae'=>'nome da mae'],
            ['name'=> 'Luiz Paulo de Souza', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677','mae'=>'nome da mae'],
            ['name'=> 'Mara Luiana da Costa', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677','mae'=>'nome da mae'],
            ['name'=> 'Marcos Aurelio Cardoso', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677','mae'=>'nome da mae'],
            ['name'=> 'João Lucas dos Santos', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677','mae'=>'nome da mae'],
            ['name'=> 'José Maria Figueiredo', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677','mae'=>'nome da mae'],
            ['name'=> 'Rafael Dias Velos', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677','mae'=>'nome da mae'],
            ['name'=> 'Adevaldo Praes', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677','mae'=>'nome da mae'],
        ]);
    }
}


