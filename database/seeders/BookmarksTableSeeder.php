<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bookmark;

class BookmarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bookmark::insert([
            ['user_id' => 2, 'title' => 'わたもて', 'number'=>'30-1'],
            ['user_id' => 2, 'title' => 'Dr.コトー', 'number'=>'特別編'],
            ['user_id' => 2, 'title' => '流れ星銀河', 'number'=>'４５'],
        ]);
    }
}
