<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComptableSeeder extends Seeder
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
        for($i = 10; $i <= 13; ++$i)
		{
            $date = $this->randDate();
			DB::table('personnes')->insert([
                'login' => 'abdou' . $i,
                'etablissement_id' => rand(1,3),
                'prenom' => 'Abdoulaye'.$i,
                'nom' => 'Diouf',
                'telephone' =>'7052416'.$i,
                'adresse' => 'Pikine'.$i,
                'motDePasse' => bcrypt('passer'),
                'nomImgPers' => 'image'.$i,
                'etatPers' => rand(0,1),
                'profil' => 'Comptable',
                'langue' => 'fr',
                'email' => 'abdou' . $i . '@gmail.com',
                'created_at' => $date,
				'updated_at' => $date
			]);
		}

    }
}
