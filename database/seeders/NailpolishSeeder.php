<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Nailpolish;
use Carbon\Carbon;

class NailpolishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void   //void means the method doesnt return a value
    {
        $currentTimestamp = Carbon::now();
        //insert method lets model insert multiple records in a single query
            $nailpolishes = [
                ['name' => 'Lilac', 'description' => 'lilac nailpolish','image' => 'lilac.jfif', 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Green', 'description' => 'green nailpolish', 'image' => 'green.jpg','created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Holographic', 'description' => 'Rainbow nailpolish', 'image' => 'rainbow.jpg','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
                ['name' => 'Green Rainbow', 'description' => 'green rainbow nailpolish', 'image' => 'greenRainbow.jfif','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
                ['name' => 'Festive Red', 'description' => 'christmasy nailpolish','image' => 'christmas.jpg', 'created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ];

            foreach ($nailpolishes as $nailpolishData)
            {
                $nailpolish = Nailpolish::create(array_merge($nailpolishData, ['created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp]));


                $categories = Category::inRandomOrder()->take(2)->pluck('id');

                
                $nailpolish->categories()->attach($categories);
            }
    }

       
}

