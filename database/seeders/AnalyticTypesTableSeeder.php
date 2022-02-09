<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnalyticTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('analytic_types')->delete();
        
        \DB::table('analytic_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Navigation',
                'created_at' => '2022-02-09 02:01:53',
                'updated_at' => '2022-02-09 02:01:53',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Purchase',
                'created_at' => '2022-02-09 02:02:00',
                'updated_at' => '2022-02-09 02:02:00',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Error',
                'created_at' => '2022-02-09 02:02:05',
                'updated_at' => '2022-02-09 02:02:05',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'TimeQuest',
                'created_at' => '2022-02-09 02:02:10',
                'updated_at' => '2022-02-09 02:02:10',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'VisitBruges',
                'created_at' => '2022-02-09 02:02:17',
                'updated_at' => '2022-02-09 02:02:17',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'IAP',
                'created_at' => '2022-02-09 02:02:38',
                'updated_at' => '2022-02-09 02:02:38',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Coupons',
                'created_at' => '2022-02-09 02:02:50',
                'updated_at' => '2022-02-09 02:02:50',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}