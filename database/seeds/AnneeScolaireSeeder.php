<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnneeScolaireSeeder extends Seeder
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

        DB::table('anneeScolaires')->delete();

        
        $date = $this->randDate();
        DB::table('anneeScolaires')->insert([
            'nom_anneesco' => '2018-2019',
            'created_at' => $date,
            'updated_at' => $date
        ]);
        
        $date = $this->randDate();
        DB::table('anneeScolaires')->insert([
            'nom_anneesco' => '2019-2020',
            'created_at' => $date,
            'updated_at' => $date
        ]);
            
        $date = $this->randDate();
        DB::table('anneeScolaires')->insert([
            'nom_anneesco' => '2020-2021',
            'created_at' => $date,
            'updated_at' => $date
        ]);
	
    }
}
