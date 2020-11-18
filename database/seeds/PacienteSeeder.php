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
            ['name'=> 'Márcio José Duarte', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677',],
            ['name'=> 'Mauro Cardoso Santos ', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677',],
            ['name'=> 'Ricardo Veloso Andrade', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677',],
            ['name'=> 'Rui Otávio Nascimento', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677',],
            ['name'=> 'Carlos André dos Santos', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677',],
            ['name'=> 'Paulo Ricardo Santana', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677',],
            ['name'=> 'João Pedro Alkimin', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677',],
            ['name'=> 'Luiz Carlos Santos', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677',],
            ['name'=> 'Guastavo Henrique Cardoso', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677',],
            ['name'=> 'Luiz Paulo de Souza', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677',],
            ['name'=> 'Mara Luiana da Costa', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677',],
            ['name'=> 'Marcos Aurelio Cardoso', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677',],
            ['name'=> 'João Lucas dos Santos', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677',],
            ['name'=> 'José Maria Figueiredo', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677',],
            ['name'=> 'Rafael Dias Velos', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677',],
            ['name'=> 'Adevaldo Praes', 'dataNascimento'=> '1980-02-12','sus'=> '11223344556677',],
        ]);
    }
}


