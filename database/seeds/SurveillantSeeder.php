<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveillantSeeder extends Seeder
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
        for($i = 4; $i <= 9; ++$i)
		{
            $date = $this->randDate();
			DB::table('personnes')->insert([
                'login' => 'ibrahim' . $i,
                'etablissement_id' => rand(1,3),
                'prenom' => 'Ibrahim'.$i,
                'nom' => 'Datte',
                'telephone' =>'77485210'.$i,
                'adresse' => 'Mbao'.$i,
                'motDePasse' => bcrypt('passer'),
                'nomImgPers' => 'image'.$i,
                'etatPers' => rand(0,1),
                'profil' => 'Surveillant',
                'langue' => 'fr',
                'email' => 'ibrahim' . $i . '@gmail.com',
                'created_at' => $date,
				'updated_at' => $date
			]);
		}

      
    }
}
