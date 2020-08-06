<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirecteurSeeder extends Seeder
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

        for($i = 1; $i <= 3; ++$i)
		{
            $date = $this->randDate();
			DB::table('personnes')->insert([
                'login' => 'ouzy' . $i,
                'etablissement_id' => rand(1,3),
                'prenom' => 'Ousmane'.$i,
                'nom' => 'Ndiaye',
                'telephone' =>'77451021'.$i,
                'adresse' => 'Malika'.$i,
                'motDePasse' => bcrypt('passer'),
                'nomImgPers' => 'image'.$i,
                'etatPers' => rand(0,1),
                'profil' => 'Directeur',
                'langue' => 'fr',
                'email' => 'ouzy' . $i . '@gmail.com',
                'created_at' => $date,
				'updated_at' => $date
			]);
        }
        
        DB::table('directeurs')->delete();

		for($i = 1; $i <= 3; ++$i)
		{
            $date = $this->randDate();
			DB::table('directeurs')->insert([
                'login' => 'ouzy'.$i,
                'created_at' => $date,
				'updated_at' => $date
			]);
		}
    }
}
