<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EleveSeeder extends Seeder
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
        for($i = 32; $i <= 60; ++$i)
		{
            $date = $this->randDate();
			DB::table('personnes')->insert([
                'login' => 'joe' . $i,
                'etablissement_id' => rand(1,3),
                'prenom' => 'Moussa'.$i,
                'nom' => 'Sarr',
                'telephone' =>'7724523'.$i,
                'adresse' => 'Keur Massar'.$i,
                'motDePasse' => bcrypt('passer'),
                'nomImgPers' => 'image'.$i,
                'etatPers' => rand(0,1),
                'profil' => 'Eleve',
                'langue' => 'fr',
                'email' => 'joe' . $i . '@gmail.com',
                'created_at' => $date,
				'updated_at' => $date
			]);
		}

        DB::table('eleves')->delete();

		for($i = 32; $i <= 60; ++$i)
		{
            $date = $this->randDate();
			DB::table('eleves')->insert([
                'loginEleve' => 'joe'.$i,
                'code' => rand(145000, 145100),
                'dateNaissance' => $date,
                'lieuNaissance' => 'Dakar',
                'sexe' => 'M',
                'login_parent' => 'richard'.rand(24,31),
                'created_at' => $date,
				'updated_at' => $date
			]);
		}
    }
}
