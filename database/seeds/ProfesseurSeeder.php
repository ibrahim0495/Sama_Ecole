<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesseurSeeder extends Seeder
{
    private function randDate()
	{
		return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 14; $i <= 23; ++$i)
		{
            $date = $this->randDate();
			DB::table('personnes')->insert([
                'login' => 'ali' . $i,
                'etablissement_id' => rand(1,3),
                'prenom' => 'Ali'.$i,
                'nom' => 'Sene',
                'telephone' =>'7623658'.$i,
                'adresse' => 'Mbour'.$i,
                'motDePasse' => bcrypt('passer'),
                'nomImgPers' => 'image'.$i,
                'etatPers' => rand(0,1),
                'profil' => 'Professeur',
                'langue' => 'fr',
                'email' => 'ali' . $i . '@gmail.com',
                'created_at' => $date,
				'updated_at' => $date
			]);
		}

      
    }
}
