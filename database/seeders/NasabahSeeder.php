<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nasabah;
use Faker\Factory as Faker;

class NasabahSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Pastikan user dengan id=1 ada atau sesuaikan
        foreach (range(1, 100) as $i) {
            Nasabah::create([
                'name'            => $faker->company,
                'npwp'            => str_pad($faker->unique()->randomNumber(9), 16, '0', STR_PAD_LEFT),
                'address'         => $faker->address,
                'business_sector' => $faker->word,
                'key_person'      => $faker->name,
                'phone_number'    => $faker->phoneNumber,
                'created_at'      => now(),
                'updated_at'      => now(),
                'user_id'         => 1,
            ]);
        }
    }
}
