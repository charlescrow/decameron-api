<?php

namespace Database\Seeders;

use App\Models\AccommodationRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccommodationRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            'Sencilla', 
            'Doble', 
            'Triple',
            'Cuádruple'
        ];

        foreach ($tipos as $tipo) {
            AccommodationRoom::create(['name' => $tipo]);
        }
    }
}
