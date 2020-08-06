<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentSeeder extends Seeder
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
        for($i = 24; $i <= 31; ++$i)
		{
            $date = $this->randDate();
			DB::table('personnes')->insert([
                'login' => 'richard' . $i,
                'etablissement_id' => rand(1,3),
                'prenom' => 'Richard'.$i,
                'nom' => 'Ndiaye',
                'telephone' =>'7820123'.$i,
                'adresse' => 'Dieupeul'.$i,
                'motDePasse' => bcrypt('passer'),
                'nomImgPers' => 'image'.$i,
                'etatPers' => rand(0,1),
                'profil' => 'Parent',
                'langue' => 'fr',
                'email' => 'richard' . $i . '@gmail.com',
                'created_at' => $date,
				'updated_at' => $date
			]);
		}

        DB::table('parents')->delete();

		for($i = 24; $i <= 31; ++$i)
		{
            $date = $this->randDate();
			DB::table('parents')->insert([
                'login' => 'richard'.$i,
                'created_at' => $date,
				'updated_at' => $date
			]);
		}
    }
}
