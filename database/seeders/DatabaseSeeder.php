<?php

namespace Database\Seeders;

use App\Models\Call;
use App\Models\Show;
use App\Models\Task;
use App\Models\Report;
use App\Models\Category;
use App\Models\Presenter;
use App\Models\SubCategory;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    
        Category::factory(10)->create()->each(function ($data) {
            SubCategory::factory($data)->count(5)->create([
              'category_id' => $data->id,
            ]);
          });

        Presenter::factory(20)->create()->each(function($data){
            Show::factory($data)->count(5)->create([
              'presenter_id' => $data->id,
            ]);
         });

         Video::factory(20)->create();

    }
}
