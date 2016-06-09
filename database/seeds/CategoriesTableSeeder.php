<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $word = new Category();
        $word->category = 'Microsoft Word';
        $word->save();

        $powerpoint = new Category();
        $powerpoint->category = 'Microsoft Powerpoint';
        $powerpoint->save();

        $excel = new Category();
        $excel->category = 'Microsoft Excel';
        $excel->save();

        $access = new Category();
        $access->category = 'Microsoft Access';
        $access->save();

        $coreldraw = new Category();
        $coreldraw->category = 'Coreldraw';
        $coreldraw->save();

        $html = new Category();
        $html->category = 'HTML';
        $html->save();

        $photoshop = new Category();
        $photoshop->category = 'Adobe Photoshop';
        $photoshop->save();

        $cplusplus = new Category();
        $cplusplus->category = 'C++';
        $cplusplus->save();

    }
}
