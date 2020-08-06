<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoisSeeder extends Seeder
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

        DB::table('mois')->delete();

        
        $date = $this->randDate();
        DB::table('mois')->insert([
            'nom_mois' => 'janvier',
            'created_at' => $date,
            'updated_at' => $date
        ]);
        
        $date = $this->randDate();
        DB::table('mois')->insert([
            'nom_mois' => 'février',
            'created_at' => $date,
            'updated_at' => $date
        ]);
            
        $date = $this->randDate();
        DB::table('mois')->insert([
            'nom_mois' => 'mars',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        $date = $this->randDate();
        DB::table('mois')->insert([
            'nom_mois' => 'avril',
            'created_at' => $date,
            'updated_at' => $date
        ]);
    
        $date = $this->randDate();
        DB::table('mois')->insert([
            'nom_mois' => 'mai',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        $date = $this->randDate();
        DB::table('mois')->insert([
            'nom_mois' => 'juin',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        $date = $this->randDate();
        DB::table('mois')->insert([
            'nom_mois' => 'juillet',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        $date = $this->randDate();
        DB::table('mois')->insert([
            'nom_mois' => 'aout',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        $date = $this->randDate();
        DB::table('mois')->insert([
            'nom_mois' => 'septembre',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        $date = $this->randDate();
        DB::table('mois')->insert([
            'nom_mois' => 'octobre',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        $date = $this->randDate();
        DB::table('mois')->insert([
            'nom_mois' => 'novembre',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        $date = $this->randDate();
        DB::table('mois')->insert([
            'nom_mois' => 'décembre',
            'created_at' => $date,
            'updated_at' => $date
        ]);
    }
}
