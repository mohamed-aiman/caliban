<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Product;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = \Faker\Factory::create();

        $allCategories = Category::select('id')->get()->pluck('id')->toArray();
        // $selectableCategories = Category::whereNotIn('parent_id', $allCategories)
        //     ->get()->pluck('id')
        //     ->toArray();

        // dd($selectableCategories, $allCategories);

        $photos = Photo::select('id')->get()->pluck('id')->toArray();
        $locations = Location::select('id')->get()->pluck('id')->toArray();

        for ($i = 0; $i < 100; $i++) {
            $product = Product::factory()->create([
                'category_id' => $this->faker->randomElement($allCategories),
            ]);

            if ($i != 0) {
                $product->photos()->attach(
                    $this->faker->randomElements(
                            $photos, $this->faker->numberBetween(1, 5)
                        )
                );
            } else {
                //using same batch of photos for first product
                $product->photos()->attach([1,2,3]);
            }
            
            $product->locations()->attach(
                $this->faker->randomElements(
                        $locations, $this->faker->numberBetween(1, 5)
                    )
            );

        }

        // $products = Product::with('photos', 'locations')->get()->toArray();
    }



    public function compileProducts()
    {
        // $path = storage_path('app/data/marketing_sample_for_amazon_com-ecommerce__20200101_20200131__10k_data.csv');
        $path = storage_path('app/data/amazon_products_sample.csv');
        //read csv file from storage and return as array
        $csv = array_map('str_getcsv', file($path));
        //get the first row of the csv as the header
        $header = array_shift($csv);
        //combine the header and the values to get an associative array
        $products = array_map(function ($row) use ($header) {
            $arr = array_combine($header, $row);
            return [
                // 'id' => $arr["Uniq Id"], // "4c69b61db1fc16e7013b43fc926e502d"
                'title' => $arr["Product Name"], // "DB Longboards CoreFlex Crossbow 41" Bamboo Fiberglass Longboard Complete"
                'brand' => $arr["Brand Name"], // ""
                // '' => $arr["Asin"], // " Ages 5 & Up"
                // '' => $arr["Category"], // "Sports & Outdoors | Outdoor Recreation | Skates, Skateboards & Scooters | Skateboarding | Standard Skateboards & Longboards | Longboards"
                // '' => $arr["Upc Ean Code"], // ""
                'list_price' => $arr["List Price"], // ""
                'selling_price' => $arr["Selling Price"], // "$237.68"
                'quantity' => $arr["Quantity"], // ""
                'model_number' => $arr["Model Number"], // ""
                'about' => $arr["About Product"], // "Make sure this fits by entering your model number. | RESPONSIVE FLEX: The Crossbow features a bamboo core encased in triaxial fiberglass and HD plastic for a re ▶"
                'specification' => $arr["Product Specification"], // "Shipping Weight: 10.7 pounds (View shipping rates and policies)|ASIN: B07KMVJJK7|    #474    in Longboards Skateboard"
                'technical_details' => $arr["Technical Details"], // ""
                // 'shipping_weight' => $arr["Shipping Weight"], // "10.7 pounds"
                // 'dimensions' => $arr["Product Dimensions"], // ""
                'images' => $arr["Image"], // "https://images-na.ssl-images-amazon.com/images/I/51j3fPQTQkL.jpg|https://images-na.ssl-images-amazon.com/images/I/31hKM3cSoSL.jpg|https://images-na.ssl-images-a ▶"
                // 'variants' => $arr["Variants"], // "https://www.amazon.com/DB-Longboards-CoreFlex-Fiberglass-Longboard/dp/B07KMVJJK7|https://www.amazon.com/DB-Longboards-CoreFlex-Fiberglass-Longboard/dp/B07KMN5KS ▶"
                // '' => $arr["Sku"], // ""
                // 'url' => $arr["Product Url"], // "https://www.amazon.com/DB-Longboards-CoreFlex-Fiberglass-Longboard/dp/B07KMVJJK7"
                // '' => $arr["Stock"], // ""
                // 'details' => $arr["Product Details"], // ""
                // '' => $arr["Dimensions"], // ""
                // 'color' => $arr["Color"], // ""
                // 'ingredients' => $arr["Ingredients"], // ""
                // 'directions_to_use' => $arr["Direction To Use"], // ""
                // 'size_quantity_variant' => $arr["Size Quantity Variant"], // ""
                'description' => $arr["Product Description"], // ""
            ];
        }, $csv);

        // dd($csv);
        return $products;
    }
}
