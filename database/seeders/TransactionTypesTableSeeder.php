<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransactionTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transaction_types')->delete();
        
        \DB::table('transaction_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Bryghia Purchase',
                'created_at' => '2022-02-15 06:21:47',
                'updated_at' => '2022-02-15 06:39:35',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Unlock Main Landmark',
                'created_at' => '2022-02-15 06:41:17',
                'updated_at' => '2022-02-15 06:41:17',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Unlock B LandMark',
                'created_at' => '2022-02-15 06:41:25',
                'updated_at' => '2022-02-15 06:41:25',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Unlock AR Character',
                'created_at' => '2022-02-15 06:43:32',
                'updated_at' => '2022-02-15 06:43:32',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}