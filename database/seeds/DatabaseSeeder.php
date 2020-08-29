<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       /* $this->call(EtablissementSeeder::class);
        $this->call(PersonneSeeder::class);
        $this->call(DirecteurSeeder::class);
        $this->call(SurveillantSeeder::class);
        $this->call(ComptableSeeder::class);
        $this->call(ProfesseurSeeder::class);
        $this->call(ParentSeeder::class);
        $this->call(ClasseSeeder::class);*/
        $this->call(EleveSeeder::class);
        $this->call(AnneeScolaireSeeder::class);
        $this->call(MoisSeeder::class);

       
    }
}
