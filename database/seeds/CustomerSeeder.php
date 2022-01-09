<?php

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 20; $i++){
            $name = $faker->name;
            array_push($data, [
                'name'      => $name,
                'code'      => Str::slug($name),
                'phone'     => $faker->e164PhoneNumber,
                'email'     => $faker->email,
                'address'   => $faker->address,
            ]);
        }
        Customer::insert($data);
    }
}
