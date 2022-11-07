<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{

    public function run()
    {
        $categories = $this->compileCategories();

        $category = new \App\Models\Category();
        foreach ($categories as $data) {
            $category->create($data);
        }

        foreach ($categories as $data) {
            if ($data['fifth_level_category'] != null && !$category->find($data['fifth_level_category'])) {
                $category->create([
                    'id' => $data['fifth_level_category'],
                    'name' => $data['fifth_level_category_name'],
                    'level' => 5,
                    'parent_id' => $data['fourth_level_category'],
                    'category' => $data['category'],
                    'sub_category' => $data['sub_category'],
                    'third_level_category' => $data['third_level_category'],
                    'fourth_level_category' => $data['fourth_level_category'],
                    'fifth_level_category' => $data['fifth_level_category'],
                ]);
            }
        }

        foreach ($categories as $data) {
            if ($data['fourth_level_category'] != null && !$category->find($data['fourth_level_category'])) {
                $category->create([
                    'id' => $data['fourth_level_category'],
                    'name' => $data['fourth_level_category_name'],
                    'level' => 4,
                    'parent_id' => $data['third_level_category'],
                    'category' => $data['category'],
                    'sub_category' => $data['sub_category'],
                    'third_level_category' => $data['third_level_category'],
                    'fourth_level_category' => $data['fourth_level_category'],
                ]);
            }
        }

        foreach ($categories as $data) {
            if ($data['third_level_category'] != null && !$category->find($data['third_level_category'])) {
                $category->create([
                    'id' => $data['third_level_category'],
                    'name' => $data['third_level_category_name'],
                    'level' => 3,
                    'parent_id' => $data['sub_category'],
                    'category' => $data['category'],
                    'sub_category' => $data['sub_category'],
                    'third_level_category' => $data['third_level_category'],
                ]);
            }
        }

        foreach ($categories as $data) {
            if ($data['sub_category'] != null && !$category->find($data['sub_category'])) {
                $category->create([
                    'id' => $data['sub_category'],
                    'name' => $data['sub_category_name'],
                    'level' => 2,
                    'parent_id' => $data['category'],
                    'category' => $data['category'],
                    'sub_category' => $data['sub_category'],
                ]);
            }
        }

        foreach ($categories as $data) {
            if ($data['category'] != null && !$category->find($data['category'])) {
                $category->create([
                    'id' => $data['category'],
                    'name' => $data['category_name'],
                    'level' => 1,
                    'parent_id' => null,
                    'category' => $data['category'],
                ]);
            }
        }
        $this->fillRemainingFields();
    }

    protected function fillRemainingFields()
    {
        $this->addPathFieldToCategories();
        $this->setSlugs();
        $this->setIsSelectable();
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

            $lastKey = null;
            $parentId = null;

            if (isset($item['path'])) {
                foreach ($item['path'] as $key => $path) {
                    
                    if ($key == 0) {
                        $main['name'] = $path['category_name'];
                        $main['id'] = $path['category_id'];
                        $lastKey = $key;
                    }

                    if ($key == 1) {
                        $subCategory['name'] = $path['category_name'];
                        $subCategory['id'] = $path['category_id'];
                        $lastKey = $key;
                    }

                    if ($key == 2) {
                        $thirdLevelCategory['name'] = $path['category_name'];
                        $thirdLevelCategory['id'] = $path['category_id'];
                        $lastKey = $key;
                    }

                    if ($key == 3) {
                        $fourthLevelCategory['name'] = $path['category_name'];
                        $fourthLevelCategory['id'] = $path['category_id'];
                        $lastKey = $key;
                    }

                    if ($key == 4) {
                        $fifthLevelCategory['name'] = $path['category_name'];
                        $fifthLevelCategory['id'] = $path['category_id'];
                        $lastKey = $key;
                    }
                }

                $parentId = $item['path'][$lastKey-1]['category_id'];
            }

            $categories[] = [
                'id' => $item['category_id'],
                'name' => $item['category_name'],
                'mtime' => $item['mtime'],
                'images' => $item['images'],
                'parent_id' => $parentId,
                'level' => $lastKey+1,
                'category' => $main['id'],
                'category_name' => $main['name'],
                'sub_category' => $subCategory['id'],
                'sub_category_name' => $subCategory['name'],
                'third_level_category' => $thirdLevelCategory['id'],
                'third_level_category_name' => $thirdLevelCategory['name'],
                'fourth_level_category' => $fourthLevelCategory['id'],
                'fourth_level_category_name' => $fourthLevelCategory['name'],
                'fifth_level_category' => $fifthLevelCategory['id'],
                'fifth_level_category_name' => $fifthLevelCategory['name'],
            ];

        }

        return $categories;
    }

    public function addPathFieldToCategories()
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            $category->path = $this->buildPath($category);
            $category->save();
        }
    }

    protected function buildPath($category)
    {
        $path = $category->category_name;
        
        if ($category->sub_category_name) {
            $path .= ' > ' . $category->sub_category_name;
        }
        
        if ($category->third_level_category_name) {
            $path .= ' > ' . $category->third_level_category_name;
        }
        
        if ($category->fourth_level_category_name) {
            $path .= ' > ' . $category->fourth_level_category_name;
        }
        
        if ($category->fifth_level_category_name) {
            $path .= ' > ' . $category->fifth_level_category_name;
        }

        return $path;
    }


    public function setSlugs()
    {
        $categories = Category::all();

        foreach ($categories as $category) {

            if ($category->category) {
                $category->category_slug = Category::find($category->category)->slug;
            }

            if ($category->sub_category) {
                $category->sub_category_slug = Category::find($category->sub_category)->slug;
            }
            
            if ($category->third_level_category) {
                $category->third_level_category_slug = Category::find($category->third_level_category)->slug;
            }
            
            if ($category->fourth_level_category) {
                $category->fourth_level_category_slug = Category::find($category->fourth_level_category)->slug;
            }
            
            if ($category->fifth_level_category) {
                $category->fifth_level_category_slug = Category::find($category->fifth_level_category)->slug;
            }

            $category->save();
        }
    }

    public function setIsSelectable()
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            //if has not children mark as selectable
            if ($category->children->count() == 0) {
                $category->is_selectable = true;
                $category->save();
            }
        }
    }

}
