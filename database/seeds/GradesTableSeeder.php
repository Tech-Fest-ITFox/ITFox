<?php

use Illuminate\Database\Seeder;

use App\Grade;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grade = new Grade();
        $grade->school_id = 1;
        $grade->grade = 5;
        $grade->class = 'a';
        $grade->save();

        $grade = new Grade();
        $grade->school_id = 1;
        $grade->grade = 6;
        $grade->class = 'a';
        $grade->save();

        $grade = new Grade();
        $grade->school_id = 1;
        $grade->grade = 7;
        $grade->class = 'a';
        $grade->save();

        $grade = new Grade();
        $grade->school_id = 1;
        $grade->grade = 11;
        $grade->class = 'a';
        $grade->save();
    }
}
