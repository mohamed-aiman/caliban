<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = $this->compileCategories();

        $category = new \App\Models\Category();
        foreach ($categories as $data) {
            $category->create($data);
        }
    }

    public function compileCategories()
    {
        $path = storage_path('app/data/shoppee_all_categories.json');
        $json = file_get_contents($path);
        $items = json_decode($json, true)['data']['global_cats'];

        $categories = [];
        foreach ($items as $item) {
            $main = ['id' => null, 'name' => null];
            $subCategory = ['id' => null, 'name' => null];
            $thirdLevelCategory = ['id' => null, 'name' => null];
            $fourthLevelCategory = ['id' => null, 'name' => null];
            $fifthLevelCategory = ['id' => null, 'name' => null];

            if (isset($item['path'])) {
                foreach ($item['path'] as $key => $path) {
                    
                    if ($key == 0) {
                        $main['name'] = $path['category_name'];
                        $main['id'] = $path['category_id'];
                    }

                    if ($key == 1) {
                        $subCategory['name'] = $path['category_name'];
                        $subCategory['id'] = $path['category_id'];
                    }

                    if ($key == 2) {
                        $thirdLevelCategory['name'] = $path['category_name'];
                        $thirdLevelCategory['id'] = $path['category_id'];
                    }

                    if ($key == 3) {
                        $fourthLevelCategory['name'] = $path['category_name'];
                        $fourthLevelCategory['id'] = $path['category_id'];
                    }

                    if ($key == 4) {
                        $fifthLevelCategory['name'] = $path['category_name'];
                        $fifthLevelCategory['id'] = $path['category_id'];
                    }
                }
            }

            $categories[] = [
                'id' => $item['category_id'],
                'name' => $item['category_name'],
                'mtime' => $item['mtime'],
                'images' => $item['images'],
                'category' => $main['id'],
                'sub_category' => $subCategory['id'],
                'third_level_category' => $thirdLevelCategory['id'],
                'fourth_level_category' => $fourthLevelCategory['id'],
                'fifth_level_category' => $fifthLevelCategory['id'],
            ];

        }

        return $categories;
    }
}
