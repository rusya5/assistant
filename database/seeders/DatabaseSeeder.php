<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\EquipmentsServicesType::insert([
             ['name' => 'Услуги'],
             ['name' => 'Звук'],
             ['name' => 'Видео'],
             ['name' => 'Синхронный перевод'],
             ['name' => 'Трансляция и конференции'],
             ['name' => 'Освещение'],
             ['name' => 'Дополнительное оборудование'],
         ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
