<?php

use Illuminate\Database\Seeder;

use App\School;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school = new School();
        $school->city_id = 1;
        $school->name = '420 СОУ „Петър Дънов“';
        $school->save();

        $school = new School();
        $school->city_id = 1;
        $school->name = '15 Гимназия „Иван Рилски“';
        $school->save();

        $school = new School();
        $school->city_id = 2;
        $school->name = '12 Гимназия „Паисий Хилендарски“';
        $school->save();

        $school = new School();
        $school->city_id = 3;
        $school->name = '5 СОУ „Героги Раковски“';
        $school->save();

        $school = new School();
        $school->city_id = 4;
        $school->name = '26 СОУ „Васил Априлов“';
        $school->save();
    }
}
