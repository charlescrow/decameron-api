<?php

namespace Database\Seeders;

use App\Models\TypeRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = ['Estándar', 'Junior', 'Suite'];

        foreach($tipos as $tipo) {
            TypeRoom::create(['name' => $tipo]);
        }
    }
}
