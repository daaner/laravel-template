<?php

namespace Modules\Blog\database\seeds;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Modules\Blog\Models\BlogCategory as Seedmodel;

class BlogCategorySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('ru_RU');

        for ($i = 0; $i < 50; $i++) {
            $nameSeed = $faker->Realtext(30);

            $newData = Seedmodel::create([
        'name'         => $nameSeed,
        'slug'         => $nameSeed,
        'lang'	        => rand(1, 2),
        'category_id'	 => rand(0, 10),
        'active'	      => rand(0, 1),
      ]);
        }
    }
}
