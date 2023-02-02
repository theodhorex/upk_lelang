<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Postingan;

class PostinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postingan = [
            [
                'user_id' => '1',
                'title' => 'Dummy One',
                'subtitle' => 'this is dummy one',
                'category' => 'Vintage',
                'location' => 'Germany',
                'descandcond' => 'loremloremloremloremloremloremloremloremloremloremloremloremlorem',
                'endauc' => 'Januari, 1 2023',
                'start_price' => '100000',
            ],
        ];
        foreach($postingan as $key => $value){
            Postingan::create($value);
        }
    }
}
