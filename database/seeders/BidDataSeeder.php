<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BidData;

class BidDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bid = [
            [
                'bid' => '99000',
                'user_id' => '1',
                'postingan_id' => '1',
            ],
            [
                'bid' => '100000',
                'user_id' => '2',
                'postingan_id' => '1'
            ]
        ];
        foreach($bid as $key => $value){
            BidData::create($value);
        }
    }
}
