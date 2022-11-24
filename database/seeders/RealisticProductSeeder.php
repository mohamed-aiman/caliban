<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Photo;
use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Database\Seeder;

class RealisticProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedRealisticProducts();
    }

    public function seedRealisticProducts($categoryId = 10073)
    {

        if (!$category = Category::find($categoryId)) {
            $category = Category::find(122);
        }

        $product = Product::create([
            'title' => "APPLE IPHONE 13 PRO 128GB, 256GB, with WARRANTY CALL 7781353",
            'brand' => null,
            'model_number' => null,
            'price' => 18499,
            'selling_price' => null,
            'list_price' => null,
            'images' => null,
            'about' => null,
            'specification' => null,
            'technical_details' => null,
            'quantity' => null,
            'unit' => null,
            'description' => "<p>APPLE IPHONE 13 PRO 128GB 256GB + Apple 1year Warranty Free delivery shop 7781353</p><p>HOTLINE 7781353 | 9775757 SHOP 7700441</p><p>check all items price hampseshop.com&nbsp;</p><p>&nbsp;</p><p><strong>REGIS</strong></p><p>APPLE IPHONE 13 PRO MAX 128GB</p><p><strong>PRICE 20,499MVR</strong></p><p>APPLE IPHONE 13 PRO MAX 256GB</p><p><strong>PRICE 22,499MVR</strong></p><p>APPLE IPHONE 13 PRO MAX 512GB</p><p><strong>PRICE 26999 MVR</strong></p><p>APPLE IPHONE 13 PRO 128GB</p><p><strong>PRICE 18,499 MVR</strong></p><p>APPLE IPHONE 13 PRO 256GB</p><p><strong>PRICE 20,499&nbsp;MVR</strong></p><p>TERED BUSINESS</p><p>Registered Business in accordance with the Law of Maldives.</p><p>We provide a bill of sale with all our purchases upon request.&nbsp;</p><p><u>Search Hamps in Google Maps for our Outlet location.</u></p><p>&nbsp;</p><p><strong>GENIUNE PRODUCT</strong></p><p>A brand-new, unused, unopened, undamaged item in its original packaging</p><p>(where packaging is applicable).</p><p><br></p><p><strong>WARRANTY CLAUSE</strong></p><p>Smart phones sold in Hamps are sold with one-year international warranty.&nbsp;</p><p>We&nbsp;provide a testing period of 72hrs. During this testing period, a reported factory&nbsp;</p><p>defected product will be replaced or refunded from our outlet after a proper</p><p>diagnose by our technicians. However, any factory defected product reported</p><p>after the said&nbsp;72hrs will be handled under the one-year international warranty.</p><p><br></p><p><strong>DELIVERY CLAUSE</strong></p><p>Smart Phones and Laptops are delivered island wide without any delivery charge.&nbsp;</p><p>We also deliver to Boats, Ferries and Speed Launches.</p><p><br></p><p><strong>BANKING DETAILS</strong></p><p>BML MVR&nbsp;7730000086848</p><p>BML USD 773000008904</p>",
            'description_delta' => null,
            'category_id' => $category->id,
            'seller_id' => 1,
            'condition' => "new",
            'selling_format' => "buy_now",
            'duration' => null,
            'list_till' => "2022-10-21 12:42:20",
            'tax' => "GST_6%",
            'is_active' => true,
        ]);
        
        $photosData = [
            [
                "file_name" => "183227_1666269637.jpg",
                "url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/183227_1666269637.jpg",
                "large_url" => null,
                "medium_url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/183227_1666269637.jpg",
                "thumbnail_url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/183227_1666269637.jpg",
                "user_id" => 1
            ],
            [
                "file_name" => "199107_1666269645.jpeg",
                "url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/183227_1666269637.jpg",
                "large_url" => null,
                "medium_url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/199107_1666269645.jpeg",
                "thumbnail_url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/199107_1666269645.jpeg",
                "user_id" => 1
            ],
            [
                "file_name" => "199107_1666269645.jpeg",
                "url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/183227_1666269637.jpg",
                "large_url" => null,
                "medium_url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/199107_1666269645.jpeg",
                "thumbnail_url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/199107_1666269645.jpeg",
                "user_id" => 1
            ],
            [
                "file_name" => "199107_1666269645.jpeg",
                "url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/183227_1666269637.jpg",
                "large_url" => null,
                "medium_url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/199107_1666269645.jpeg",
                "thumbnail_url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/199107_1666269645.jpeg",
                "user_id" => 1
            ],
            [
                "file_name" => "183227_1666269637.jpg",
                "url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/183227_1666269637.jpg",
                "large_url" => null,
                "medium_url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/183227_1666269637.jpg",
                "thumbnail_url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/183227_1666269637.jpg",
                "user_id" => 1
            ],
            [
                "file_name" => "199107_1666269645.jpeg",
                "url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/199107_1666269645.jpeg",
                "large_url" => null,
                "medium_url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/199107_1666269645.jpeg",
                "thumbnail_url" => "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/199107_1666269645.jpeg",
                "user_id" => 1
            ]
        ];

        foreach ($photosData as $data) {
            $photo = Photo::create($data);
            $product->photos()->attach($photo->id);
        }

        $product->locations()->attach([98, 188]);
    }
}
