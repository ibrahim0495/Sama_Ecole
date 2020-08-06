<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasseSeeder extends Seeder
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

        DB::table('classes')->delete();

		for($i = 1; $i <= 20; ++$i)
		{
            $noms = array("CI", "CP", "CE1", "CE2", "CM1", "CM2","6eme", "5eme", "4eme","3eme","2nde","1ere","Tle");
            $nom = array_rand($noms, 1);

            $date = $this->randDate();

            $inscription = 0;
            $mensualite = 0;
            switch ($noms[$nom]) {
                case 'CI':
                    $inscription = 10000;
                    $mensualite = 5000;
                    break;
                case "CP":
                    $inscription = 12000;
                    $mensualite = 6000;
                    break;
                case 'CE1':
                    $inscription = 13000;
                    $mensualite = 8000;
                    break;
                case 'CE2':
                    $inscription = 15000;
                    $mensualite = 8000;
                    break;
                case 'CM1':
                    $inscription = 15000;
                    $mensualite = 9000;
                    break;
                case 'CM2':
                    $inscription = 16000;
                    $mensualite = 10000;
                    break;
                case '6eme':
                    $inscription = 17000;
                    $mensualite = 11000;
                    break;
                case '5eme':
                    $inscription = 17000;
                    $mensualite = 12000;
                    break;
                case "4eme":
                    $inscription = 17000;
                    $mensualite = 13000;
                    break;
                case "3eme":
                    $inscription = 18000;
                    $mensualite = 15000;
                    break;
                case "2nde":
                    $inscription = 20000;
                    $mensualite = 16000;
                    break;
                case "1ere":
                    $inscription = 24000;
                    $mensualite = 20000;
                    break;
                case "Tle":
                    $inscription = 28000;
                    $mensualite = 20000;
                    break;
            }
            
            DB::table('classes')->insert([
                'login_surveillant' => 'ibrahim'.rand(4,9),
                'nom' => $noms[$nom] ,
                'montant_inscription' => $inscription,
                'montant_mensuel' => $mensualite,
                'created_at' => $date,
				'updated_at' => $date
			]);
		}
    }
}
