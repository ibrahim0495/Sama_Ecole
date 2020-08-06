<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtablissementSeeder extends Seeder
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
        DB::table('etablissements')->delete();

		for($i = 1; $i <= 10; ++$i)
		{
            $date = $this->randDate();

			DB::table('etablissements')->insert([
                'nom' => 'Kennedy' . $i,
                'telephone' => '773489475',
                'email' => 'ouzy' . $i . '@gmail.com',
                'adresse' => 'Dakar,'.$i,
				'logo' => 'logo' . $i,
                'acronyme' => 'acronyme'.$i,
                'created_at' => $date,
				'updated_at' => $date
			]);
		}
    }
}
