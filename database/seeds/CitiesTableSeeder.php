<?php

use Illuminate\Database\Seeder;

use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new City();
        $city->name = 'Пловдив';
        $city->save();

        $city = new City();
        $city->name = 'Русе';
        $city->save();

        $city = new City();
        $city->name = 'София';
        $city->save();

        $city = new City();
        $city->name = 'Варна';
        $city->save();
    }
}
