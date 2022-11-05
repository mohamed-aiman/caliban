<?php

namespace App\Console\Commands;

use DOMDocument;
use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 't';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Hello World');

        $d = $this->getCategories();


        $document = new DOMDocument();
        $document->preserveWhiteSpace = false; 

        $filePath = storage_path('app/data/c.html');
        $document->loadHTMLFile($filePath);
        
        $ul = $document->getElementById("menu-v1");
        
        // dd($ul);
        // dd($document);
        $data = [];
        
        // dd($ul->childNodes);
        // dd(get_class_methods($ul));
        foreach ($ul->childNodes as $node) {

            // $texts = $this->getTexts($node);
            // if (count($texts) > 0) {
            //     $data[] = $texts;
            // }

            $data[] = $this->getListTexts($node);

            // if ($node->nodeName == 'li') {
            //     dd($node->childNodes);
            //     $data[] = str_replace("\n", "", $node->textContent);
            // } else {
            //     dd($node);
            // }
            // If the node is an element node, the nodeType property will return 1.
            // If the node is an attribute node, the nodeType property will return 2.
            // If the node is a text node, the nodeType property will return 3.
            // If the node is a comment node, the nodeType property will return 8.

            // dump($node->nodeType);
            // $text = str_replace("\n", "", $node->textContent);
            // dump(trim($text) . " - ". PHP_EOL);
            // dump(trim($text) . " - " . $node->nodeName . " - " . $node->nodeType . " - " . $node->nodeValue . PHP_EOL);
            // dump(trim($node->nodeValue));
            // dd($node->nodeValue);
            # code...
        }
        dd($data);

    }


    public function getCategories()
    {
        $data = $this->getData();
        
        $cleaned = [];

        foreach ($data as $key => $val) {
            // dd($key, $val['heading'], $val['children']);
            if (isset($val['heading'])) {
                $heading = $val['heading']['text'];
                if (isset($val['children'])) {
                    $children = $val['children'];
                    $cleaned[$heading] = $children;
                }
                // dump($heading);
            }
            // $cleaned[] = $this->clean($value);
        }

        // $cleaned = $this->cleanMany($data);
        
        dd($cleaned);
        dd('xx');
        dd($data);
    }


    public function getData()
    {

        $data = [    
            [
                'heading' => [ 'level' => 1, 'slug' => 'antiques-collectibles-gifts-b214', 'text' => 'Antiques, Collectibles & Gifts', ],
                'children' => [
                    'level' => 2, 'slug' => 'antiques-b838_0', 'text' => 'Antiques',
                    'level' => 2, 'slug' => 'coins-and-paper-money-b217_0', 'text' => 'Coins and Paper Money',
                    'level' => 2, 'slug' => 'gifts-b503_0', 'text' => 'Gifts',
                    'level' => 2, 'slug' => 'sovenirs-b215_0', 'text' => 'Sovenirs',
                    'level' => 2, 'slug' => 'sports-memorabilia-b218_0', 'text' => 'Sports Memorabilia',
                    'level' => 2, 'slug' => 'stamps-b219_0', 'text' => 'Stamps',
                    'level' => 2, 'slug' => 'other-collectibles-b220_0', 'text' => 'Other Collectibles',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'baby-pregnancy-maternity-b146', 'text' => 'Baby, Pregnancy & Maternity', ],
                'children' => [
                    'level' => 2, 'slug' => 'baby-carriers-backpacks-b679_0', 'text' => 'Baby Carriers & Backpacks',
                    'level' => 2, 'slug' => 'baby-shoes-b236_0', 'text' => 'Baby Shoes',
                    'level' => 2, 'slug' => 'baby-toys-b151_0', 'text' => 'Baby Toys',
                    'level' => 2, 'slug' => 'bathing-grooming-b186_0', 'text' => 'Bathing & Grooming',
                    'level' => 2, 'slug' => 'clothing-accessories-b185_0', 'text' => 'Clothing & Accessories',
                    'level' => 2, 'slug' => 'diapering-b148_0', 'text' => 'Diapering',
                    [
                        'heading' => [ 'slug' => 'feeding-b680', 'text' => 'Feeding', ],
                        'children' => [
                            'level' => 3, 'slug' => 'bibs-b682_0', 'text' => 'Bibs',
                            'level' => 3, 'slug' => 'bottles-b683_0', 'text' => 'Bottles',
                            'level' => 3, 'slug' => 'breast-pumps-b681_0', 'text' => 'Breast Pumps',
                            'level' => 3, 'slug' => 'high-chairs-b685_0', 'text' => 'High Chairs',
                            'level' => 3, 'slug' => 'plates-bowels-cups-b684_0', 'text' => 'Plates, Bowels & Cups',
                            'level' => 3, 'slug' => 'sterilisers-food-warmers-b687_0', 'text' => 'Sterilisers & Food Warmers',
                            'level' => 3, 'slug' => 'other-b686_0', 'text' => 'Other',
                        ],
                    ],
                    'level' => 2, 'slug' => 'furniture-bedding-b147_0', 'text' => 'Furniture & Bedding',
                    'level' => 2, 'slug' => 'health-baby-care-b150_0', 'text' => 'Health & Baby Care',
                    'level' => 2, 'slug' => 'maternity-b429_0', 'text' => 'Maternity',
                    'level' => 2, 'slug' => 'nursery-decor-b782_0', 'text' => 'Nursery Decor',
                    'level' => 2, 'slug' => 'pregnancy-b731_0', 'text' => 'Pregnancy',
                    'level' => 2, 'slug' => 'strollers-walkers-b149_0', 'text' => 'Strollers & Walkers',
                    'level' => 2, 'slug' => 'other-baby-products-b152_0', 'text' => 'Other Baby Products',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'books-magazines-b61', 'text' => 'Books & Magazines', ],
                'children' => [
                    [
                        'heading' => [ 'slug' => 'children-babies-b552', 'text' => 'Children & Babies', ],
                        'children' => [
                            'level' => 3, 'slug' => 'activity-colouring-b553_0', 'text' => 'Activity & Colouring',
                            'level' => 3, 'slug' => 'educational-b154_0', 'text' => 'Educational',
                            'level' => 3, 'slug' => 'other-b555_0', 'text' => 'Other',
                        ],
                    ],
                    'level' => 2, 'slug' => 'comics-b81_0', 'text' => 'Comics',
                    'level' => 2, 'slug' => 'fiction-b82_0', 'text' => 'Fiction',
                    'level' => 2, 'slug' => 'magazines-b85_0', 'text' => 'Magazines',
                    'level' => 2, 'slug' => 'non-fiction-b83_0', 'text' => 'Non-Fiction',
                    'level' => 2, 'slug' => 'textbooks-b84_0', 'text' => 'Textbooks',
                    'level' => 2, 'slug' => 'young-adult-fiction-b556_0', 'text' => 'Young Adult Fiction',
                    'level' => 2, 'slug' => 'other-b566_0', 'text' => 'Other',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'clothing-accessories-b66', 'text' => 'Clothing & Accessories', ],
                'children' => [
                    [
                        'heading' => [ 'slug' => 'kids-b155', 'text' => 'Kids', ],
                        'children' => [
                            [
                                'heading' => [ 'slug' => 'boys-b897', 'text' => 'Boys', ],
                                'children' => [
                                    [
                                        'heading' => [ 'slug' => 'clothing-b899', 'text' => 'Clothing', ],
                                        'children' => [
                                            'level' => 5, 'slug' => 'athletic-sports-b658_0', 'text' => 'Athletic & Sports',
                                            'level' => 5, 'slug' => 'hoodies-sweater-b900_0', 'text' => 'Hoodies & Sweater ',
                                            'level' => 5, 'slug' => 'jackets-coats-b906_0', 'text' => 'Jackets & Coats',
                                            'level' => 5, 'slug' => 'school-uniforms-b940_0', 'text' => 'School Uniforms',
                                            'level' => 5, 'slug' => 'shirts-t-shirts-b902_0', 'text' => 'Shirts & T-Shirts',
                                            'level' => 5, 'slug' => 'shorts-beachwear-b903_0', 'text' => 'Shorts & Beachwear',
                                            'level' => 5, 'slug' => 'sleepwear-lounge-b901_0', 'text' => 'Sleepwear & Lounge ',
                                            'level' => 5, 'slug' => 'socks-b909_0', 'text' => 'Socks',
                                            'level' => 5, 'slug' => 'underwear-b904_0', 'text' => 'Underwear',
                                            'level' => 5, 'slug' => 'other-b905_0', 'text' => 'Other',
                                        ],
                                    ],
                                    [
                                        'heading' => [ 'slug' => 'footwear-b945', 'text' => 'Footwear', ],
                                        'children' => [
                                            'level' => 5, 'slug' => 'athletic-sports-b961_0', 'text' => 'Athletic & Sports',
                                            'level' => 5, 'slug' => 'flip-flops-b966_0', 'text' => 'Flip Flops',
                                            'level' => 5, 'slug' => 'loafers-slip-ons-b964_0', 'text' => 'Loafers & Slip-Ons ',
                                            'level' => 5, 'slug' => 'sandals-b965_0', 'text' => 'Sandals',
                                            'level' => 5, 'slug' => 'school-shoes-b962_0', 'text' => 'School Shoes',
                                            'level' => 5, 'slug' => 'sneakers-b963_0', 'text' => 'Sneakers',
                                            'level' => 5, 'slug' => 'other-footwear-accessories-b911_0', 'text' => 'Other Footwear & Accessories',
                                        ],
                                    ],
                                    'level' => 4, 'slug' => 'hats-caps-b910_0', 'text' => 'Hats & Caps',
                                    'level' => 4, 'slug' => 'other-b912_0', 'text' => 'Other',
                                ],
                            ],
                            [
                                'heading' => [ 'slug' => 'girls-b896', 'text' => 'Girls', ],
                                'children' => [
                                    [
                                        'heading' => [ 'slug' => 'clothing-b652', 'text' => 'Clothing', ],
                                        'children' => [
                                            'level' => 5, 'slug' => 'athletic-sports-b166_0', 'text' => 'Athletic & Sports',
                                            'level' => 5, 'slug' => 'dresses-skirts-b656_0', 'text' => 'Dresses & Skirts',
                                            'level' => 5, 'slug' => 'hoodies-sweater-b103_0', 'text' => 'Hoodies & Sweater',
                                            'level' => 5, 'slug' => 'jackets-coats-b907_0', 'text' => 'Jackets & Coats',
                                            'level' => 5, 'slug' => 'jeans-pants-b654_0', 'text' => 'Jeans & Pants',
                                            'level' => 5, 'slug' => 'leggings-b659_0', 'text' => 'Leggings',
                                            'level' => 5, 'slug' => 'school-uniforms-b941_0', 'text' => 'School Uniforms',
                                            'level' => 5, 'slug' => 'shirts-t-shirts-tops-b653_0', 'text' => 'Shirts, T-Shirts & Tops',
                                            'level' => 5, 'slug' => 'shorts-beachwear-b655_0', 'text' => 'Shorts & Beachwear',
                                            'level' => 5, 'slug' => 'sleepwear-lounge-b657_0', 'text' => 'Sleepwear & Lounge',
                                            'level' => 5, 'slug' => 'socks-b908_0', 'text' => 'Socks',
                                            'level' => 5, 'slug' => 'underwear-b924_0', 'text' => 'Underwear',
                                            'level' => 5, 'slug' => 'other-b93_0', 'text' => 'Other',
                                        ],
                                    ],
                                    [
                                        'heading' => [ 'slug' => 'footwear-b946', 'text' => 'Footwear', ],
                                        'children' => [
                                            'level' => 5, 'slug' => 'athletic-sports-b967_0', 'text' => 'Athletic & Sports',
                                            'level' => 5, 'slug' => 'flats-b973_0', 'text' => 'Flats',
                                            'level' => 5, 'slug' => 'flip-flops-b972_0', 'text' => 'Flip Flops',
                                            'level' => 5, 'slug' => 'loafers-slip-ons-b970_0', 'text' => 'Loafers & Slip-Ons ',
                                            'level' => 5, 'slug' => 'sandals-b971_0', 'text' => 'Sandals',
                                            'level' => 5, 'slug' => 'school-shoes-b968_0', 'text' => 'School Shoes',
                                            'level' => 5, 'slug' => 'sneakers-b969_0', 'text' => 'Sneakers',
                                            'level' => 5, 'slug' => 'other-footwear-accessories-b660_0', 'text' => 'Other Footwear & Accessories',
                                        ],
                                    ],
                                    'level' => 4, 'slug' => 'hair-accessories-b661_0', 'text' => 'Hair Accessories',
                                    'level' => 4, 'slug' => 'hats-caps-b664_0', 'text' => 'Hats & Caps',
                                    'level' => 4, 'slug' => 'jewelry-b663_0', 'text' => 'Jewelry',
                                    'level' => 4, 'slug' => 'other-b666_0', 'text' => 'Other',
                                ],
                            ],
                            'level' => 3, 'slug' => 'costumes-b667_0', 'text' => 'Costumes',
                            'level' => 3, 'slug' => 'school-accessories-b662_0', 'text' => 'School Accessories',
                            'level' => 3, 'slug' => 'sunglasses-b665_0', 'text' => 'Sunglasses',
                            'level' => 3, 'slug' => 'watches-b898_0', 'text' => 'Watches',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'men-b354', 'text' => 'Men', ],
                        'children' => [
                            [
                                'heading' => [ 'slug' => 'footwear-b943', 'text' => 'Footwear', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'athletic-sports-b947_0', 'text' => 'Athletic & Sports',
                                    'level' => 4, 'slug' => 'flip-flops-b952_0', 'text' => 'Flip Flops',
                                    'level' => 4, 'slug' => 'formal-shoes-boots-b948_0', 'text' => 'Formal Shoes & Boots ',
                                    'level' => 4, 'slug' => 'loafers-slip-ons-b950_0', 'text' => 'Loafers & Slip-Ons ',
                                    'level' => 4, 'slug' => 'sandals-b951_0', 'text' => 'Sandals',
                                    'level' => 4, 'slug' => 'sneakers-b949_0', 'text' => 'Sneakers',
                                    'level' => 4, 'slug' => 'other-footwear-accessories-b94_0', 'text' => 'Other Footwear & Accessories',
                                ],
                            ],
                            [
                                'heading' => [ 'slug' => 'men-accessories-b102', 'text' => 'Men Accessories', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'belts-b628_0', 'text' => 'Belts',
                                    'level' => 4, 'slug' => 'bracelets-wristbands-b629_0', 'text' => 'Bracelets & Wristbands',
                                    'level' => 4, 'slug' => 'cufflinks-b630_0', 'text' => 'Cufflinks',
                                    'level' => 4, 'slug' => 'handkerchiefs-b890_0', 'text' => 'Handkerchiefs',
                                    'level' => 4, 'slug' => 'hats-caps-b889_0', 'text' => 'Hats & Caps',
                                    'level' => 4, 'slug' => 'necklaces-rings-earrings-b633_0', 'text' => 'Necklaces, Rings & Earrings',
                                    'level' => 4, 'slug' => 'ties-b631_0', 'text' => 'Ties',
                                    'level' => 4, 'slug' => 'wallets-b632_0', 'text' => 'Wallets',
                                    'level' => 4, 'slug' => 'other-b627_0', 'text' => 'Other',
                                ],
                            ],
                            [
                                'heading' => [ 'slug' => 'men-clothing-b183', 'text' => 'Men Clothing', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'athletic-and-sports-b348_0', 'text' => 'Athletic and Sports',
                                    'level' => 4, 'slug' => 'beachwear-b349_0', 'text' => 'Beachwear',
                                    'level' => 4, 'slug' => 'hoodies-sweater-b891_0', 'text' => 'Hoodies & Sweater',
                                    'level' => 4, 'slug' => 'jeans-b350_0', 'text' => 'Jeans',
                                    'level' => 4, 'slug' => 'pants-b351_0', 'text' => 'Pants',
                                    'level' => 4, 'slug' => 'shirts-b352_0', 'text' => 'Shirts',
                                    'level' => 4, 'slug' => 'shorts-b353_0', 'text' => 'Shorts',
                                    'level' => 4, 'slug' => 'sleep-lounge-b105_0', 'text' => 'Sleep & Lounge',
                                    'level' => 4, 'slug' => 'socks-b104_0', 'text' => 'Socks',
                                    'level' => 4, 'slug' => 't-shirts-b355_0', 'text' => 'T-Shirts',
                                    'level' => 4, 'slug' => 'underwear-b356_0', 'text' => 'Underwear',
                                    'level' => 4, 'slug' => 'other-b357_0', 'text' => 'Other',
                                ],
                            ],
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'women-b888', 'text' => 'Women', ],
                        'children' => [
                            [
                                'heading' => [ 'slug' => 'footwear-b944', 'text' => 'Footwear', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'athletic-sports-b953_0', 'text' => 'Athletic & Sports',
                                    'level' => 4, 'slug' => 'flats-b959_0', 'text' => 'Flats',
                                    'level' => 4, 'slug' => 'flip-flops-b958_0', 'text' => 'Flip Flops',
                                    'level' => 4, 'slug' => 'formal-shoes-boots-b954_0', 'text' => 'Formal Shoes & Boots ',
                                    'level' => 4, 'slug' => 'heels-b960_0', 'text' => 'Heels',
                                    'level' => 4, 'slug' => 'loafers-slip-ons-b956_0', 'text' => 'Loafers & Slip-Ons ',
                                    'level' => 4, 'slug' => 'sandals-b957_0', 'text' => 'Sandals',
                                    'level' => 4, 'slug' => 'sneakers-b955_0', 'text' => 'Sneakers',
                                    'level' => 4, 'slug' => 'other-footwear-accessories-b92_0', 'text' => 'Other Footwear & Accessories',
                                ],
                            ],
                            [
                                'heading' => [ 'slug' => 'women-accessories-b91', 'text' => 'Women Accessories', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'belts-b885_0', 'text' => 'Belts',
                                    'level' => 4, 'slug' => 'bracelets-b436_0', 'text' => 'Bracelets',
                                    'level' => 4, 'slug' => 'burugaa-dathi-and-pins-b437_0', 'text' => 'Burugaa Dathi and Pins',
                                    'level' => 4, 'slug' => 'earrings-b438_0', 'text' => 'Earrings',
                                    'level' => 4, 'slug' => 'fashu-foo-b439_0', 'text' => 'Fashu Foo',
                                    'level' => 4, 'slug' => 'hair-accessories-b440_0', 'text' => 'Hair Accessories',
                                    'level' => 4, 'slug' => 'handbag-purse-b441_0', 'text' => 'Handbag & Purse',
                                    'level' => 4, 'slug' => 'hats-caps-b883_0', 'text' => 'Hats & Caps',
                                    'level' => 4, 'slug' => 'necklaces-b442_0', 'text' => 'Necklaces',
                                    'level' => 4, 'slug' => 'rings-b443_0', 'text' => 'Rings',
                                    'level' => 4, 'slug' => 'other-b444_0', 'text' => 'Other',
                                ],
                            ],
                            [
                                'heading' => [ 'slug' => 'women-clothing-b90', 'text' => 'Women Clothing', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'athletic-and-sports-b422_0', 'text' => 'Athletic and Sports',
                                    'level' => 4, 'slug' => 'beach-and-swimwear-b423_0', 'text' => 'Beach and Swimwear',
                                    'level' => 4, 'slug' => 'bras-b424_0', 'text' => 'Bras',
                                    'level' => 4, 'slug' => 'buruga-shawl-b585_0', 'text' => 'Buruga & Shawl',
                                    'level' => 4, 'slug' => 'dresses-b425_0', 'text' => 'Dresses',
                                    'level' => 4, 'slug' => 'hoodies-sweater-b887_0', 'text' => 'Hoodies & Sweater',
                                    'level' => 4, 'slug' => 'jeans-b426_0', 'text' => 'Jeans',
                                    'level' => 4, 'slug' => 'kurutha-and-tops-b427_0', 'text' => 'Kurutha and Tops',
                                    'level' => 4, 'slug' => 'leggings-b886_0', 'text' => 'Leggings',
                                    'level' => 4, 'slug' => 'lingerie-shapewear-b428_0', 'text' => 'Lingerie & Shapewear',
                                    'level' => 4, 'slug' => 'panties-b430_0', 'text' => 'Panties',
                                    'level' => 4, 'slug' => 'pants-b431_0', 'text' => 'Pants',
                                    'level' => 4, 'slug' => 'shorts-b432_0', 'text' => 'Shorts',
                                    'level' => 4, 'slug' => 'skirts-b923_0', 'text' => 'Skirts',
                                    'level' => 4, 'slug' => 'sleepwear-b433_0', 'text' => 'Sleepwear',
                                    'level' => 4, 'slug' => 'socks-tights-b884_0', 'text' => 'Socks & Tights',
                                    'level' => 4, 'slug' => 't-shirts-b434_0', 'text' => 'T-Shirts',
                                    'level' => 4, 'slug' => 'other-b435_0', 'text' => 'Other',
                                ],
                            ],
                        ],
                    ],
                    'level' => 2, 'slug' => 'sunglasses-b95_0', 'text' => 'Sunglasses',
                    [
                        'heading' => [ 'slug' => 'travel-bags-b913', 'text' => 'Travel & Bags', ],
                        'children' => [
                            'level' => 3, 'slug' => 'backpacks-b916_0', 'text' => 'Backpacks',
                            'level' => 3, 'slug' => 'briefcases-b917_0', 'text' => 'Briefcases',
                            'level' => 3, 'slug' => 'gym-bags-b918_0', 'text' => 'Gym Bags',
                            'level' => 3, 'slug' => 'luggage-travel-bags-b548_0', 'text' => 'Luggage & Travel Bags',
                            'level' => 3, 'slug' => 'messenger-bags-b919_0', 'text' => 'Messenger Bags',
                            'level' => 3, 'slug' => 'school-bags-b915_0', 'text' => 'School Bags',
                            'level' => 3, 'slug' => 'travel-accessories-b914_0', 'text' => 'Travel Accessories',
                            'level' => 3, 'slug' => 'umbrellas-rain-wear-b921_0', 'text' => 'Umbrellas & Rain Wear',
                            'level' => 3, 'slug' => 'waist-packs-b920_0', 'text' => 'Waist Packs',
                            'level' => 3, 'slug' => 'other-b922_0', 'text' => 'Other',
                        ],
                    ],
                    'level' => 2, 'slug' => 'watches-b101_0', 'text' => 'Watches',
                    'level' => 2, 'slug' => 'other-clothing-accessories-b96_0', 'text' => 'Other Clothing & Accessories',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'computer-tablets-networking-b1', 'text' => 'Computer, Tablets & Networking', ],
                'children' => [
                    [
                        'heading' => [ 'slug' => 'accessories-parts-b48', 'text' => 'Accessories & Parts', ],
                        'children' => [
                            'level' => 3, 'slug' => 'card-readers-usb-hubs-b45_0', 'text' => 'Card Readers & USB Hubs',
                            [
                                'heading' => [ 'slug' => 'drives-storage-b43', 'text' => 'Drives & Storage', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'dvd-cd-drives-b47_0', 'text' => 'DVD & CD Drives',
                                    'level' => 4, 'slug' => 'hard-drives-external-b325_0', 'text' => 'Hard Drives - External',
                                    'level' => 4, 'slug' => 'hard-drives-laptop-b323_0', 'text' => 'Hard Drives - Laptop',
                                    'level' => 4, 'slug' => 'hard-drives-internal-b324_0', 'text' => 'Hard Drives- Internal',
                                    'level' => 4, 'slug' => 'pen-drive-b8_0', 'text' => 'Pen Drive',
                                    'level' => 4, 'slug' => 'other-b326_0', 'text' => 'Other',
                                ],
                            ],
                            'level' => 3, 'slug' => 'graphics-cards-b49_0', 'text' => 'Graphics Cards',
                            [
                                'heading' => [ 'slug' => 'keyboards-mouse-input-devices-b675', 'text' => 'Keyboards, Mouse & Input Devices', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'keyboards-b676_0', 'text' => 'Keyboards',
                                    'level' => 4, 'slug' => 'mouse-b100_0', 'text' => 'Mouse',
                                    'level' => 4, 'slug' => 'mouse-keyboard-bundles-b677_0', 'text' => 'Mouse & Keyboard Bundles',
                                    'level' => 4, 'slug' => 'other-b678_0', 'text' => 'Other',
                                ],
                            ],
                            [
                                'heading' => [ 'slug' => 'memory-b78', 'text' => 'Memory', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'laptop-memory-b79_0', 'text' => 'Laptop Memory',
                                    'level' => 4, 'slug' => 'pc-memory-b64_0', 'text' => 'PC Memory',
                                ],
                            ],
                            'level' => 3, 'slug' => 'monitors-b50_0', 'text' => 'Monitors',
                            'level' => 3, 'slug' => 'motherboard-b97_0', 'text' => 'Motherboard',
                            'level' => 3, 'slug' => 'power-supplies-b46_0', 'text' => 'Power Supplies',
                            'level' => 3, 'slug' => 'processor-b98_0', 'text' => 'Processor',
                            'level' => 3, 'slug' => 'projectors-b205_0', 'text' => 'Projectors',
                            'level' => 3, 'slug' => 'sound-card-b99_0', 'text' => 'Sound Card',
                            'level' => 3, 'slug' => 'speakers-headphones-b51_0', 'text' => 'Speakers & Headphones',
                            'level' => 3, 'slug' => 'webcams-b52_0', 'text' => 'Webcams',
                            'level' => 3, 'slug' => 'other-accessories-b53_0', 'text' => 'Other Accessories',
                        ],
                    ],
                    'level' => 2, 'slug' => 'desktop-b6_0', 'text' => 'Desktop',
                    'level' => 2, 'slug' => 'laptop-b7_0', 'text' => 'Laptop',
                    [
                        'heading' => [ 'slug' => 'laptop-accessories-b42', 'text' => 'Laptop Accessories', ],
                        'children' => [
                            'level' => 3, 'slug' => 'battery-b342_0', 'text' => 'Battery',
                            'level' => 3, 'slug' => 'carrying-cases-and-bags-b343_0', 'text' => 'Carrying Cases and Bags',
                            'level' => 3, 'slug' => 'charger-b344_0', 'text' => 'Charger',
                            'level' => 3, 'slug' => 'cooling-pad-b345_0', 'text' => 'Cooling Pad',
                            'level' => 3, 'slug' => 'power-adapter-b346_0', 'text' => 'Power Adapter',
                            'level' => 3, 'slug' => 'other-b347_0', 'text' => 'Other',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'networking-b38', 'text' => 'Networking', ],
                        'children' => [
                            'level' => 3, 'slug' => 'modems-b153_0', 'text' => 'Modems',
                            'level' => 3, 'slug' => 'routers-switches-b86_0', 'text' => 'Routers & Switches',
                            'level' => 3, 'slug' => 'servers-b180_0', 'text' => 'Servers',
                            [
                                'heading' => [ 'slug' => 'wireless-networking-b181', 'text' => 'Wireless Networking', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'accessories-and-parts-b380_0', 'text' => 'Accessories and Parts',
                                    'level' => 4, 'slug' => 'bluetooth-b381_0', 'text' => 'Bluetooth',
                                    'level' => 4, 'slug' => 'mobile-modem-b382_0', 'text' => 'Mobile Modem',
                                    'level' => 4, 'slug' => 'routers-and-access-points-b383_0', 'text' => 'Routers and Access Points',
                                    'level' => 4, 'slug' => 'usb-dongles-b384_0', 'text' => 'USB Dongles',
                                ],
                            ],
                            'level' => 3, 'slug' => 'other-b182_0', 'text' => 'Other',
                        ],
                    ],
                    'level' => 2, 'slug' => 'printer-supplies-accessories-b41_0', 'text' => 'Printer Supplies & Accessories',
                    'level' => 2, 'slug' => 'printers-scanners-b40_0', 'text' => 'Printers & Scanners',
                    'level' => 2, 'slug' => 'software-b54_0', 'text' => 'Software',
                    'level' => 2, 'slug' => 'tablet-accessories-b238_0', 'text' => 'Tablet Accessories',
                    'level' => 2, 'slug' => 'tablets-b226_0', 'text' => 'Tablets',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'dhoani-boats-fishing-b36', 'text' => 'Dhoani, Boats & Fishing', ],
                'children' => [
                    [
                        'heading' => [ 'slug' => 'dhoani-boats-pwc-b794', 'text' => 'Dhoani, Boats & PWC', ],
                        'children' => [
                            'level' => 3, 'slug' => 'dhoani-b141_0', 'text' => 'Dhoani',
                            'level' => 3, 'slug' => 'dinghies-bokkura-b144_0', 'text' => 'Dinghies & Bokkura',
                            'level' => 3, 'slug' => 'jet-ski-pwc-b795_0', 'text' => 'Jet Ski / PWC',
                            'level' => 3, 'slug' => 'passenger-safari-boats-b143_0', 'text' => 'Passenger & Safari Boats',
                            'level' => 3, 'slug' => 'speedboat-b142_0', 'text' => 'Speedboat',
                            'level' => 3, 'slug' => 'other-marine-vessels-b581_0', 'text' => 'Other Marine Vessels',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'fishing-b58', 'text' => 'Fishing', ],
                        'children' => [
                            'level' => 3, 'slug' => 'fish-finders-b208_0', 'text' => 'Fish Finders',
                            'level' => 3, 'slug' => 'fishing-line-b291_0', 'text' => 'Fishing Line',
                            'level' => 3, 'slug' => 'lures-and-hooks-b290_0', 'text' => 'Lures and Hooks',
                            'level' => 3, 'slug' => 'reels-b289_0', 'text' => 'Reels',
                            'level' => 3, 'slug' => 'rods-b288_0', 'text' => 'Rods',
                            'level' => 3, 'slug' => 'rods-and-reels-b287_0', 'text' => 'Rods and Reels',
                            'level' => 3, 'slug' => 'vadhu-foshi-b292_0', 'text' => 'Vadhu Foshi',
                            'level' => 3, 'slug' => 'other-b293_0', 'text' => 'Other',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'marine-engines-parts-b580', 'text' => 'Marine Engines & Parts', ],
                        'children' => [
                            'level' => 3, 'slug' => 'engines-b209_0', 'text' => 'Engines',
                            'level' => 3, 'slug' => 'parts-accessories-b505_0', 'text' => 'Parts & Accessories',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'parts-accessories-b577', 'text' => 'Parts & Accessories', ],
                        'children' => [
                            'level' => 3, 'slug' => 'anchors-b578_0', 'text' => 'Anchors',
                            'level' => 3, 'slug' => 'buoys-fenders-b584_0', 'text' => 'Buoys & Fenders',
                            'level' => 3, 'slug' => 'lifejackets-b647_0', 'text' => 'Lifejackets ',
                            'level' => 3, 'slug' => 'navigation-equipment-b207_0', 'text' => 'Navigation Equipment',
                            'level' => 3, 'slug' => 'propellers-b582_0', 'text' => 'Propellers',
                            'level' => 3, 'slug' => 'safety-b583_0', 'text' => 'Safety',
                            'level' => 3, 'slug' => 'other-b579_0', 'text' => 'Other',
                        ],
                    ],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'electronics-b2', 'text' => 'Electronics', ],
                'children' => [
                    'level' => 2, 'slug' => 'batteries-chargers-b210_0', 'text' => 'Batteries & Chargers',
                    [
                        'heading' => [ 'slug' => 'camera-photo-video-b469', 'text' => 'Camera, Photo & Video', ],
                        'children' => [
                            'level' => 3, 'slug' => 'digital-camera-b10_0', 'text' => 'Digital Camera',
                            'level' => 3, 'slug' => 'binoculars-telescopes-b319_0', 'text' => 'Binoculars & Telescopes',
                            'level' => 3, 'slug' => 'camcorders-b113_0', 'text' => 'Camcorders',
                            'level' => 3, 'slug' => 'camera-drone-b468_0', 'text' => 'Camera Drone',
                            [
                                'heading' => [ 'slug' => 'camera-accessories-b65', 'text' => 'Camera Accessories', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'battery-and-charger-b264_0', 'text' => 'Battery and Charger',
                                    'level' => 4, 'slug' => 'cases-and-bags-b265_0', 'text' => 'Cases and Bags',
                                    'level' => 4, 'slug' => 'flashes-b266_0', 'text' => 'Flashes',
                                    'level' => 4, 'slug' => 'lenses-b267_0', 'text' => 'Lenses',
                                    'level' => 4, 'slug' => 'photo-studio-supplies-b268_0', 'text' => 'Photo Studio Supplies',
                                    'level' => 4, 'slug' => 'tripods-monopods-b269_0', 'text' => 'Tripods & Monopods',
                                    'level' => 4, 'slug' => 'other-accessories-b270_0', 'text' => 'Other Accessories',
                                ],
                            ],
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'electronic-components-supplies-b465', 'text' => 'Electronic Components & Supplies', ],
                        'children' => [
                            'level' => 3, 'slug' => 'active-components-b112_0', 'text' => 'Active Components',
                            'level' => 3, 'slug' => 'passive-components-b942_0', 'text' => 'Passive Components',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'gadgets-b110', 'text' => 'Gadgets', ],
                        'children' => [
                            'level' => 3, 'slug' => 'home-improvement-b313_0', 'text' => 'Home Improvement',
                            'level' => 3, 'slug' => 'key-chain-b314_0', 'text' => 'Key Chain',
                            'level' => 3, 'slug' => 'laser-pointers-b315_0', 'text' => 'Laser Pointers',
                            'level' => 3, 'slug' => 'mini-projector-b316_0', 'text' => 'Mini Projector',
                            'level' => 3, 'slug' => 'power-saver-b317_0', 'text' => 'Power Saver',
                            'level' => 3, 'slug' => 'surveillance-b318_0', 'text' => 'Surveillance',
                            'level' => 3, 'slug' => 'universal-adaptor-b320_0', 'text' => 'Universal Adaptor',
                            'level' => 3, 'slug' => 'universal-remote-b321_0', 'text' => 'Universal Remote',
                            'level' => 3, 'slug' => 'other-b322_0', 'text' => 'Other',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'home-theater-media-players-b21', 'text' => 'Home Theater & Media Players', ],
                        'children' => [
                            'level' => 3, 'slug' => 'dvd-cd-players-b168_0', 'text' => 'DVD & CD Players',
                            'level' => 3, 'slug' => 'hard-disk-players-b170_0', 'text' => 'Hard Disk Players',
                            'level' => 3, 'slug' => 'home-theater-systems-b167_0', 'text' => 'Home Theater Systems',
                            'level' => 3, 'slug' => 'ipod-mp3-accessories-b171_0', 'text' => 'iPod & MP3 Accessories',
                            'level' => 3, 'slug' => 'ipod-mp3-players-b11_0', 'text' => 'iPod & MP3 Players',
                            'level' => 3, 'slug' => 'speaker-systems-b169_0', 'text' => 'Speaker Systems',
                            'level' => 3, 'slug' => 'other-b172_0', 'text' => 'Other',
                        ],
                    ],
                    'level' => 2, 'slug' => 'satellite-cable-tv-b464_0', 'text' => 'Satellite & Cable TV',
                    'level' => 2, 'slug' => 'security-systems-b173_0', 'text' => 'Security Systems',
                    'level' => 2, 'slug' => 'televisions-b67_0', 'text' => 'Televisions',
                    'level' => 2, 'slug' => 'tv-accessories-b206_0', 'text' => 'TV Accessories',
                    'level' => 2, 'slug' => 'other-electronics-b12_0', 'text' => 'Other Electronics',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'furniture-storage-b213', 'text' => 'Furniture & Storage', ],
                'children' => [
                    [
                        'heading' => [ 'slug' => 'bedroom-furniture-b70', 'text' => 'Bedroom Furniture', ],
                        'children' => [
                            [
                                'heading' => [ 'slug' => 'beddings-b536', 'text' => 'Beddings', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'bedsheet-b537_0', 'text' => 'Bedsheet',
                                    'level' => 4, 'slug' => 'mattress-b540_0', 'text' => 'Mattress',
                                    'level' => 4, 'slug' => 'pillows-cases-b539_0', 'text' => 'Pillows & Cases',
                                    'level' => 4, 'slug' => 'other-b541_0', 'text' => 'Other',
                                ],
                            ],
                            'level' => 3, 'slug' => 'bedroom-sets-b301_0', 'text' => 'Bedroom Sets',
                            'level' => 3, 'slug' => 'beds-b302_0', 'text' => 'Beds',
                            'level' => 3, 'slug' => 'dressing-table-b808_0', 'text' => 'Dressing Table',
                            'level' => 3, 'slug' => 'wardrobes-b310_0', 'text' => 'Wardrobes',
                            'level' => 3, 'slug' => 'other-b311_0', 'text' => 'Other',
                        ],
                    ],
                    'level' => 2, 'slug' => 'dining-furniture-b305_0', 'text' => 'Dining Furniture',
                    'level' => 2, 'slug' => 'kids-furniture-b159_0', 'text' => 'Kids Furniture',
                    'level' => 2, 'slug' => 'kitchen-furniture-b551_0', 'text' => 'Kitchen Furniture',
                    [
                        'heading' => [ 'slug' => 'office-furniture-b202', 'text' => 'Office Furniture', ],
                        'children' => [
                            'level' => 3, 'slug' => 'desks-and-tables-b413_0', 'text' => ' Desks and Tables',
                            'level' => 3, 'slug' => 'filing-cabinets-b414_0', 'text' => ' Filing Cabinets',
                            'level' => 3, 'slug' => 'bookshelves-b409_0', 'text' => 'Bookshelves',
                            'level' => 3, 'slug' => 'chairs-b410_0', 'text' => 'Chairs',
                            'level' => 3, 'slug' => 'conference-tables-b411_0', 'text' => 'Conference Tables',
                            'level' => 3, 'slug' => 'cubicles-and-partitions-b412_0', 'text' => 'Cubicles and Partitions',
                            'level' => 3, 'slug' => 'other-b415_0', 'text' => 'Other',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'sitting-room-furniture-b929', 'text' => 'Sitting Room Furniture', ],
                        'children' => [
                            'level' => 3, 'slug' => 'bean-bags-b300_0', 'text' => 'Bean Bags',
                            'level' => 3, 'slug' => 'chairs-and-stools-b303_0', 'text' => 'Chairs and Stools',
                            'level' => 3, 'slug' => 'cupboards-and-cabinets-b304_0', 'text' => 'Cupboards and Cabinets',
                            'level' => 3, 'slug' => 'sofa-beds-b306_0', 'text' => 'Sofa Beds',
                            'level' => 3, 'slug' => 'sofas-b307_0', 'text' => 'Sofas',
                            'level' => 3, 'slug' => 'tables-b308_0', 'text' => 'Tables',
                            'level' => 3, 'slug' => 'tv-racks-b309_0', 'text' => 'TV Racks',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'storage-organization-b835', 'text' => 'Storage & Organization', ],
                        'children' => [
                            'level' => 3, 'slug' => 'hanging-storage-b828_0', 'text' => 'Hanging Storage',
                            'level' => 3, 'slug' => 'hooks-rails-b826_0', 'text' => 'Hooks & Rails',
                            'level' => 3, 'slug' => 'shoe-racks-hangers-b827_0', 'text' => 'Shoe Racks & Hangers',
                            'level' => 3, 'slug' => 'storage-bags-b825_0', 'text' => 'Storage Bags',
                            'level' => 3, 'slug' => 'storage-baskets-bins-b822_0', 'text' => 'Storage Baskets & Bins',
                            'level' => 3, 'slug' => 'storage-bottles-jars-b830_0', 'text' => 'Storage Bottles & Jars',
                            'level' => 3, 'slug' => 'storage-boxes-b823_0', 'text' => 'Storage Boxes',
                            'level' => 3, 'slug' => 'storage-cabinets-b829_0', 'text' => 'Storage Cabinets',
                            'level' => 3, 'slug' => 'storage-drawers-b824_0', 'text' => 'Storage Drawers',
                            'level' => 3, 'slug' => 'styrofoam-box-b837_0', 'text' => 'Styrofoam Box',
                        ],
                    ],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'health-beauty-b111', 'text' => 'Health & Beauty', ],
                'children' => [
                    'level' => 2, 'slug' => 'diet-nutrition-supplements-b725_0', 'text' => 'Diet, Nutrition & Supplements',
                    'level' => 2, 'slug' => 'fragrances-b26_0', 'text' => 'Fragrances',
                    [
                        'heading' => [ 'slug' => 'health-care-b727', 'text' => 'Health Care', ],
                        'children' => [
                            [
                                'heading' => [ 'slug' => 'diabetes-care-b773', 'text' => 'Diabetes Care', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'glucose-monitors-b774_0', 'text' => 'Glucose Monitors',
                                    'level' => 4, 'slug' => 'insulin-injectors-b775_0', 'text' => 'Insulin Injectors',
                                    'level' => 4, 'slug' => 'lancets-b776_0', 'text' => 'Lancets',
                                    'level' => 4, 'slug' => 'monitoring-kits-b777_0', 'text' => 'Monitoring Kits',
                                    'level' => 4, 'slug' => 'socks-insoles-b779_0', 'text' => 'Socks & Insoles',
                                    'level' => 4, 'slug' => 'test-strips-b778_0', 'text' => 'Test Strips',
                                    'level' => 4, 'slug' => 'other-b780_0', 'text' => 'Other',
                                ],
                            ],
                            'level' => 3, 'slug' => 'face-mask-shield-b932_0', 'text' => 'Face Mask',
                            'level' => 3, 'slug' => 'first-aid-medical-supplies-b729_0', 'text' => 'First Aid & Medical Supplies',
                            'level' => 3, 'slug' => 'hand-sanitizers-b933_0', 'text' => 'Hand Sanitizers',
                            'level' => 3, 'slug' => 'insect-repellents-b733_0', 'text' => 'Insect Repellents',
                            'level' => 3, 'slug' => 'massage-relaxation-b730_0', 'text' => 'Massage & Relaxation',
                            'level' => 3, 'slug' => 'sexual-wellness-b732_0', 'text' => 'Sexual Wellness',
                            'level' => 3, 'slug' => 'sleeping-aids-b735_0', 'text' => 'Sleeping Aids',
                            'level' => 3, 'slug' => 'other-healthcare-b128_0', 'text' => 'Other Healthcare',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'makeup-b695', 'text' => 'Makeup', ],
                        'children' => [
                            [
                                'heading' => [ 'slug' => 'eye-b720', 'text' => 'Eye', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'eyeliner-b700_0', 'text' => 'Eyeliner',
                                    'level' => 4, 'slug' => 'eyeshadow-b701_0', 'text' => 'Eyeshadow',
                                    'level' => 4, 'slug' => 'eylelashes-b702_0', 'text' => 'Eylelashes',
                                    'level' => 4, 'slug' => 'mascara-b708_0', 'text' => 'Mascara',
                                    'level' => 4, 'slug' => 'other-b722_0', 'text' => 'Other',
                                ],
                            ],
                            [
                                'heading' => [ 'slug' => 'face-b721', 'text' => 'Face', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'blush-b698_0', 'text' => 'Blush',
                                    'level' => 4, 'slug' => 'foundation-b703_0', 'text' => 'Foundation',
                                    'level' => 4, 'slug' => 'powder-b709_0', 'text' => 'Powder',
                                    'level' => 4, 'slug' => 'other-b723_0', 'text' => 'Other',
                                ],
                            ],
                            'level' => 3, 'slug' => 'heena-b699_0', 'text' => 'Heena',
                            [
                                'heading' => [ 'slug' => 'lip-b697', 'text' => 'Lip', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'lip-balm-b710_0', 'text' => 'Lip Balm',
                                    'level' => 4, 'slug' => 'lip-gloss-b711_0', 'text' => 'Lip Gloss',
                                    'level' => 4, 'slug' => 'lip-liner-b712_0', 'text' => 'Lip Liner',
                                    'level' => 4, 'slug' => 'lipstick-b713_0', 'text' => 'Lipstick',
                                    'level' => 4, 'slug' => 'other-b714_0', 'text' => 'Other',
                                ],
                            ],
                            'level' => 3, 'slug' => 'makeup-bags-b705_0', 'text' => 'Makeup Bags',
                            'level' => 3, 'slug' => 'makeup-brushes-b706_0', 'text' => 'Makeup Brushes',
                            'level' => 3, 'slug' => 'makeup-removers-b707_0', 'text' => 'Makeup Removers',
                            'level' => 3, 'slug' => 'makeup-sets-kits-b704_0', 'text' => 'Makeup Sets & Kits',
                            [
                                'heading' => [ 'slug' => 'nail-b696', 'text' => 'Nail', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'manicure-pedicure-kits-b718_0', 'text' => 'Manicure & Pedicure Kits',
                                    'level' => 4, 'slug' => 'nail-art-b715_0', 'text' => 'Nail Art',
                                    'level' => 4, 'slug' => 'nail-polish-b716_0', 'text' => 'Nail Polish',
                                    'level' => 4, 'slug' => 'nail-polish-remover-b717_0', 'text' => 'Nail Polish Remover',
                                    'level' => 4, 'slug' => 'other-b719_0', 'text' => 'Other',
                                ],
                            ],
                            'level' => 3, 'slug' => 'other-b133_0', 'text' => 'Other',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'personal-care-b931', 'text' => 'Personal Care', ],
                        'children' => [
                            [
                                'heading' => [ 'slug' => 'face-care-b688', 'text' => 'Face Care', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'acne-treatment-b689_0', 'text' => 'Acne Treatment',
                                    'level' => 4, 'slug' => 'cleansers-b690_0', 'text' => 'Cleansers',
                                    'level' => 4, 'slug' => 'lightening-cream-b694_0', 'text' => 'Lightening Cream',
                                    'level' => 4, 'slug' => 'masks-b692_0', 'text' => 'Masks',
                                    'level' => 4, 'slug' => 'moisturizers-b693_0', 'text' => 'Moisturizers',
                                    'level' => 4, 'slug' => 'scrubs-exfoliators-b691_0', 'text' => 'Scrubs & Exfoliators',
                                    'level' => 4, 'slug' => 'other-b599_0', 'text' => 'Other',
                                ],
                            ],
                            'level' => 3, 'slug' => 'feminine-care-b728_0', 'text' => 'Feminine Care',
                            'level' => 3, 'slug' => 'hair-care-b130_0', 'text' => 'Hair Care',
                            'level' => 3, 'slug' => 'nail-care-manicure-pedicure-b734_0', 'text' => 'Nail Care, Manicure & Pedicure',
                            'level' => 3, 'slug' => 'oral-care-b131_0', 'text' => 'Oral Care',
                            [
                                'heading' => [ 'slug' => 'shaving-hair-removal-b668', 'text' => 'Shaving & Hair Removal', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'clippers-trimmers-b669_0', 'text' => 'Clippers & Trimmers',
                                    'level' => 4, 'slug' => 'electric-shavers-b670_0', 'text' => 'Electric Shavers',
                                    'level' => 4, 'slug' => 'razors-razor-blades-b671_0', 'text' => 'Razors & Razor Blades',
                                    'level' => 4, 'slug' => 'scissors-shears-b672_0', 'text' => 'Scissors & Shears',
                                    'level' => 4, 'slug' => 'waxing-supplies-b673_0', 'text' => 'Waxing Supplies ',
                                    'level' => 4, 'slug' => 'other-b674_0', 'text' => 'Other',
                                ],
                            ],
                            'level' => 3, 'slug' => 'skin-care-b129_0', 'text' => 'Skin Care',
                            'level' => 3, 'slug' => 'other-personal-care-b934_0', 'text' => 'Other Personal Care',
                        ],
                    ],
                    'level' => 2, 'slug' => 'weight-care-b132_0', 'text' => 'Weight Care',
                    'level' => 2, 'slug' => 'other-beauty-b89_0', 'text' => 'Other Beauty',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'home-garden-b69', 'text' => 'Home & Garden', ],
                'children' => [
                    [
                        'heading' => [ 'slug' => 'arts-crafts-sewing-b467', 'text' => 'Arts,Crafts & Sewing', ],
                        'children' => [
                            [
                                'heading' => [ 'slug' => 'sewing-knitting-b528', 'text' => 'Sewing & Knitting', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'accessories-b529_0', 'text' => 'Accessories',
                                    'level' => 4, 'slug' => 'sewing-machines-b329_0', 'text' => 'Sewing Machines',
                                    'level' => 4, 'slug' => 'yarn-b783_0', 'text' => 'Yarn',
                                ],
                            ],
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'bathroom-b71', 'text' => 'Bathroom', ],
                        'children' => [
                            'level' => 3, 'slug' => 'basins-vanities-b532_0', 'text' => 'Basins & Vanities',
                            'level' => 3, 'slug' => 'mirrors-b531_0', 'text' => 'Mirrors',
                            'level' => 3, 'slug' => 'showers-water-heaters-b331_0', 'text' => 'Showers & Water Heaters',
                            'level' => 3, 'slug' => 'soap-dishes-dispensers-b533_0', 'text' => 'Soap Dishes & Dispensers',
                            'level' => 3, 'slug' => 'toilets-b530_0', 'text' => 'Toilets',
                            'level' => 3, 'slug' => 'other-b534_0', 'text' => 'Other',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'cooling-air-b526', 'text' => 'Cooling & Air', ],
                        'children' => [
                            'level' => 3, 'slug' => 'airconditioners-b327_0', 'text' => 'Airconditioners',
                            'level' => 3, 'slug' => 'fans-b328_0', 'text' => 'Fans',
                            'level' => 3, 'slug' => 'humidifiers-b726_0', 'text' => 'Humidifiers',
                            'level' => 3, 'slug' => 'other-b527_0', 'text' => 'Other',
                        ],
                    ],
                    'level' => 2, 'slug' => 'curtains-blinds-b543_0', 'text' => 'Curtains & Blinds',
                    [
                        'heading' => [ 'slug' => 'food-and-beverages-b225', 'text' => 'Food and Beverages', ],
                        'children' => [
                            'level' => 3, 'slug' => 'beverages-b232_0', 'text' => 'Beverages',
                            'level' => 3, 'slug' => 'cake-pastry-b234_0', 'text' => 'Cake & Pastry',
                            'level' => 3, 'slug' => 'fruits-b230_0', 'text' => 'Fruits',
                            'level' => 3, 'slug' => 'local-specialties-b233_0', 'text' => 'Local Specialties',
                            'level' => 3, 'slug' => 'meat-b231_0', 'text' => 'Meat',
                            'level' => 3, 'slug' => 'seafood-b228_0', 'text' => 'Seafood',
                            'level' => 3, 'slug' => 'vegetables-b229_0', 'text' => 'Vegetables',
                            'level' => 3, 'slug' => 'other-b235_0', 'text' => 'Other',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'garden-b221', 'text' => 'Garden', ],
                        'children' => [
                            'level' => 3, 'slug' => 'gardening-supplies-b223_0', 'text' => 'Gardening Supplies',
                            'level' => 3, 'slug' => 'plants-and-trees-b222_0', 'text' => 'Plants and Trees',
                            'level' => 3, 'slug' => 'other-b224_0', 'text' => 'Other',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'home-decor-b557', 'text' => 'Home Decor', ],
                        'children' => [
                            'level' => 3, 'slug' => 'candles-holders-b559_0', 'text' => 'Candles & Holders',
                            'level' => 3, 'slug' => 'carpet-b565_0', 'text' => 'Carpet',
                            'level' => 3, 'slug' => 'clocks-b564_0', 'text' => 'Clocks',
                            'level' => 3, 'slug' => 'cushions-b560_0', 'text' => 'Cushions',
                            'level' => 3, 'slug' => 'flowers-b561_0', 'text' => 'Flowers',
                            'level' => 3, 'slug' => 'frames-b562_0', 'text' => 'Frames',
                            'level' => 3, 'slug' => 'pictures-paintings-b563_0', 'text' => 'Pictures & Paintings',
                            'level' => 3, 'slug' => 'vases-b558_0', 'text' => 'Vases',
                            'level' => 3, 'slug' => 'wallpaper-stickers-b781_0', 'text' => 'Wallpaper & Stickers',
                            'level' => 3, 'slug' => 'other-b184_0', 'text' => 'Other',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'housekeeping-b821', 'text' => 'Housekeeping', ],
                        'children' => [
                            [
                                'heading' => [ 'slug' => 'cleaning-b520', 'text' => 'Cleaning', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'bins-b524_0', 'text' => 'Bins',
                                    'level' => 4, 'slug' => 'brooms-mops-b523_0', 'text' => 'Brooms & Mops',
                                    'level' => 4, 'slug' => 'cleaning-supplies-b522_0', 'text' => 'Cleaning Supplies',
                                    'level' => 4, 'slug' => 'vacuum-cleaners-accessories-b521_0', 'text' => 'Vacuum Cleaners & Accessories',
                                    'level' => 4, 'slug' => 'other-b525_0', 'text' => 'Other',
                                ],
                            ],
                            [
                                'heading' => [ 'slug' => 'laundry-b515', 'text' => 'Laundry', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'clothes-hangers-b834_0', 'text' => 'Clothes Hangers',
                                    'level' => 4, 'slug' => 'clothes-pins-b832_0', 'text' => 'Clothes Pins',
                                    'level' => 4, 'slug' => 'clotheslines-b833_0', 'text' => 'Clotheslines',
                                    'level' => 4, 'slug' => 'detergent-softener-bleach-b518_0', 'text' => 'Detergent, Softener, Bleach',
                                    'level' => 4, 'slug' => 'drying-racks-b831_0', 'text' => 'Drying Racks',
                                    'level' => 4, 'slug' => 'irons-and-ironing-boards-b516_0', 'text' => 'Irons and Ironing Boards',
                                    'level' => 4, 'slug' => 'laundry-baskets-b517_0', 'text' => 'Laundry Baskets',
                                    'level' => 4, 'slug' => 'washing-machines-b330_0', 'text' => 'Washing Machines',
                                    'level' => 4, 'slug' => 'other-b519_0', 'text' => 'Other',
                                ],
                            ],
                            'level' => 3, 'slug' => 'pest-control-b836_0', 'text' => 'Pest Control',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'kitchen-dining-b27', 'text' => 'Kitchen & Dining', ],
                        'children' => [
                            'level' => 3, 'slug' => 'bakeware-b738_0', 'text' => 'Bakeware',
                            'level' => 3, 'slug' => 'coffee-tea-making-b333_0', 'text' => 'Coffee & Tea Making',
                            'level' => 3, 'slug' => 'cookware-b736_0', 'text' => 'Cookware',
                            'level' => 3, 'slug' => 'cups-glasses-b742_0', 'text' => 'Cups & Glasses',
                            'level' => 3, 'slug' => 'cutlery-utensils-b744_0', 'text' => 'Cutlery & Utensils',
                            'level' => 3, 'slug' => 'dinnerware-serving-dishes-b745_0', 'text' => 'Dinnerware & Serving Dishes',
                            'level' => 3, 'slug' => 'fridge-and-freezers-b339_0', 'text' => 'Fridge and Freezers',
                            [
                                'heading' => [ 'slug' => 'kitchen-appliances-b739', 'text' => 'Kitchen Appliances', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'blenders-and-mixers-b332_0', 'text' => 'Blenders and Mixers',
                                    'level' => 4, 'slug' => 'cookers-steamers-b334_0', 'text' => 'Cookers & Steamers',
                                    'level' => 4, 'slug' => 'grills-fryers-b741_0', 'text' => 'Grills & Fryers',
                                    'level' => 4, 'slug' => 'kettle-and-water-heaters-b335_0', 'text' => 'Kettle and Water Heaters',
                                    'level' => 4, 'slug' => 'kitchen-scale-b336_0', 'text' => 'Kitchen Scale',
                                    'level' => 4, 'slug' => 'oven-convection-b337_0', 'text' => 'Oven - Convection',
                                    'level' => 4, 'slug' => 'oven-microwave-b338_0', 'text' => 'Oven - Microwave',
                                    'level' => 4, 'slug' => 'toasters-waffle-irons-b340_0', 'text' => 'Toasters & Waffle Irons',
                                    'level' => 4, 'slug' => 'water-coolers-filters-dispensers-b535_0', 'text' => 'Water Coolers, Filters & Dispensers',
                                    'level' => 4, 'slug' => 'other-kitchen-appliances-b740_0', 'text' => 'Other Kitchen Appliances',
                                ],
                            ],
                            'level' => 3, 'slug' => 'knives-cutting-b737_0', 'text' => 'Knives & Cutting',
                            'level' => 3, 'slug' => 'rice-cookers-b930_0', 'text' => 'Rice Cookers',
                            'level' => 3, 'slug' => 'storage-containers-b743_0', 'text' => 'Storage Containers',
                            'level' => 3, 'slug' => 'tableware-linen-b746_0', 'text' => 'Tableware & Linen',
                            'level' => 3, 'slug' => 'washing-cleaning-b542_0', 'text' => 'Washing & Cleaning',
                            'level' => 3, 'slug' => 'other-b341_0', 'text' => 'Other',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'lights-lighting-b809', 'text' => 'Lights & Lighting', ],
                        'children' => [
                            'level' => 3, 'slug' => 'chandeliers-ceiling-fixtures-b810_0', 'text' => 'Chandeliers & Ceiling Fixtures',
                            'level' => 3, 'slug' => 'lamps-shades-b811_0', 'text' => 'Lamps & Shades',
                            'level' => 3, 'slug' => 'light-bulbs-tubes-b812_0', 'text' => 'Light Bulbs & Tubes',
                            'level' => 3, 'slug' => 'outdoor-lighting-b815_0', 'text' => 'Outdoor Lighting',
                            [
                                'heading' => [ 'slug' => 'portable-lighting-b816', 'text' => 'Portable Lighting', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'handheld-flashlight-b818_0', 'text' => 'Handheld Flashlight',
                                    'level' => 4, 'slug' => 'headlamps-b819_0', 'text' => 'Headlamps',
                                    'level' => 4, 'slug' => 'lantern-flashlight-b820_0', 'text' => 'Lantern Flashlight',
                                    'level' => 4, 'slug' => 'portable-spotlights-b813_0', 'text' => 'Portable Spotlights',
                                ],
                            ],
                            'level' => 3, 'slug' => 'string-novelty-lighting-b817_0', 'text' => 'String & Novelty Lighting',
                            'level' => 3, 'slug' => 'lighting-parts-accessories-b814_0', 'text' => 'Lighting Parts & Accessories',
                        ],
                    ],
                    'level' => 2, 'slug' => 'towels-b538_0', 'text' => 'Towels',
                    'level' => 2, 'slug' => 'other-b73_0', 'text' => 'Other',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'industrial-business-b198', 'text' => 'Industrial & Business', ],
                'children' => [
                    [
                        'heading' => [ 'slug' => 'building-construction-b199', 'text' => 'Building & Construction', ],
                        'children' => [
                            'level' => 3, 'slug' => 'aggregates-b271_0', 'text' => 'Aggregates',
                            'level' => 3, 'slug' => 'bricks-b272_0', 'text' => 'Bricks',
                            'level' => 3, 'slug' => 'cement-b273_0', 'text' => 'Cement',
                            'level' => 3, 'slug' => 'cladding-b274_0', 'text' => 'Cladding',
                            'level' => 3, 'slug' => 'doors-and-windows-b275_0', 'text' => 'Doors and Windows',
                            'level' => 3, 'slug' => 'electrical-supplies-b276_0', 'text' => 'Electrical Supplies',
                            'level' => 3, 'slug' => 'elevators-and-lifts-b277_0', 'text' => 'Elevators and Lifts',
                            'level' => 3, 'slug' => 'fire-systems-b279_0', 'text' => 'Fire Systems',
                            'level' => 3, 'slug' => 'flooring-b278_0', 'text' => 'Flooring',
                            'level' => 3, 'slug' => 'glass-b280_0', 'text' => 'Glass',
                            'level' => 3, 'slug' => 'paint-and-coatings-b281_0', 'text' => 'Paint and Coatings',
                            'level' => 3, 'slug' => 'roofing-b282_0', 'text' => 'Roofing',
                            'level' => 3, 'slug' => 'steel-b283_0', 'text' => 'Steel',
                            'level' => 3, 'slug' => 'tiles-marble-granite-b284_0', 'text' => 'Tiles / Marble / Granite',
                            'level' => 3, 'slug' => 'timber-and-wood-b285_0', 'text' => 'Timber and Wood',
                            'level' => 3, 'slug' => 'other-b286_0', 'text' => 'Other',
                        ],
                    ],
                    'level' => 2, 'slug' => 'compressors-pumps-b545_0', 'text' => 'Compressors & Pumps',
                    'level' => 2, 'slug' => 'engine-generators-motors-b544_0', 'text' => 'Engine, Generators & Motors',
                    'level' => 2, 'slug' => 'office-b216_0', 'text' => 'Office',
                    [
                        'heading' => [ 'slug' => 'restaurant-catering-b506', 'text' => 'Restaurant & Catering', ],
                        'children' => [
                            'level' => 3, 'slug' => 'beverage-equipment-b507_0', 'text' => 'Beverage Equipment',
                            'level' => 3, 'slug' => 'cooking-warming-equipment-b509_0', 'text' => 'Cooking & Warming Equipment',
                            'level' => 3, 'slug' => 'cookware-kitchen-tools-b508_0', 'text' => 'Cookware & Kitchen Tools',
                            'level' => 3, 'slug' => 'refrigertation-ice-machines-b510_0', 'text' => 'Refrigertation & Ice Machines',
                            'level' => 3, 'slug' => 'restaurant-furniture-decor-b511_0', 'text' => 'Restaurant Furniture & Decor',
                            'level' => 3, 'slug' => 'tabletop-b512_0', 'text' => 'Tabletop',
                            'level' => 3, 'slug' => 'uniforms-aprons-b513_0', 'text' => 'Uniforms & Aprons',
                            'level' => 3, 'slug' => 'vending-equipment-concessions-b514_0', 'text' => 'Vending Equipment & Concessions',
                            'level' => 3, 'slug' => 'other-b204_0', 'text' => 'Other',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'retail-management-b200', 'text' => 'Retail Management', ],
                        'children' => [
                            'level' => 3, 'slug' => 'display-units-racks-b612_0', 'text' => 'Display Units & Racks',
                            'level' => 3, 'slug' => 'labeling-tagging-b611_0', 'text' => 'Labeling & Tagging',
                            'level' => 3, 'slug' => 'mannequins-b613_0', 'text' => 'Mannequins',
                            [
                                'heading' => [ 'slug' => 'point-of-sale-b615', 'text' => 'Point of Sale', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'barcode-printers-supplies-b626_0', 'text' => 'Barcode Printers & Supplies',
                                    'level' => 4, 'slug' => 'barcode-scanners-b616_0', 'text' => 'Barcode Scanners',
                                    'level' => 4, 'slug' => 'cash-drawer-b623_0', 'text' => 'Cash Drawer',
                                    'level' => 4, 'slug' => 'counterfiet-detection-bill-counter-b621_0', 'text' => 'Counterfiet Detection & Bill Counter',
                                    'level' => 4, 'slug' => 'pole-display-b619_0', 'text' => 'Pole Display',
                                    'level' => 4, 'slug' => 'pos-software-b620_0', 'text' => 'POS Software',
                                    'level' => 4, 'slug' => 'pos-system-b625_0', 'text' => 'POS System',
                                    'level' => 4, 'slug' => 'programmable-keyboard-b624_0', 'text' => 'Programmable Keyboard',
                                    'level' => 4, 'slug' => 'receipt-printers-supplies-b617_0', 'text' => 'Receipt Printers & Supplies',
                                    'level' => 4, 'slug' => 'registers-monitors-b618_0', 'text' => 'Registers & Monitors',
                                    'level' => 4, 'slug' => 'other-b622_0', 'text' => 'Other',
                                ],
                            ],
                            'level' => 3, 'slug' => 'other-b614_0', 'text' => 'Other',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'tools-b466', 'text' => 'Tools', ],
                        'children' => [
                            'level' => 3, 'slug' => 'other-power-tools-b547_0', 'text' => 'Carpentry Tools & Equipment',
                            'level' => 3, 'slug' => 'hand-tools-b463_0', 'text' => 'Hand Tools',
                            [
                                'heading' => [ 'slug' => 'power-tools-b312', 'text' => 'Power Tools', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'drills-accessories-b546_0', 'text' => 'Drills & Accessories',
                                ],
                            ],
                            'level' => 3, 'slug' => 'other-tools-equipment-b201_0', 'text' => 'Other Tools & Equipment',
                        ],
                    ],
                    'level' => 2, 'slug' => 'other-b203_0', 'text' => 'Other',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'mobile-phones-accessories-b3', 'text' => 'Mobile Phones & Accessories', ],
                'children' => [
                    [
                        'heading' => [ 'slug' => 'accessories-b15', 'text' => 'Accessories', ],
                        'children' => [
                            'level' => 3, 'slug' => 'belt-holsters-clips-b650_0', 'text' => 'Belt Holsters & Clips',
                            'level' => 3, 'slug' => 'car-accessories-b485_0', 'text' => 'Car Accessories',
                            'level' => 3, 'slug' => 'cases-protection-skins-b651_0', 'text' => 'Cases, Protection & Skins',
                            'level' => 3, 'slug' => 'charger-b486_0', 'text' => 'Charger',
                            'level' => 3, 'slug' => 'data-cable-b487_0', 'text' => 'Data Cable',
                            'level' => 3, 'slug' => 'fashion-and-decoration-b488_0', 'text' => 'Fashion and Decoration',
                            'level' => 3, 'slug' => 'headset-bluetooth-b489_0', 'text' => 'Headset - Bluetooth',
                            'level' => 3, 'slug' => 'headset-wired-b490_0', 'text' => 'Headset - Wired',
                            'level' => 3, 'slug' => 'memory-card-b14_0', 'text' => 'Memory Card',
                            'level' => 3, 'slug' => 'power-bank-b747_0', 'text' => 'Power Bank',
                            'level' => 3, 'slug' => 'screen-protection-b494_0', 'text' => 'Screen Protection',
                            'level' => 3, 'slug' => 'selfie-sticks-stands-b772_0', 'text' => 'Selfie Sticks & Stands',
                            'level' => 3, 'slug' => 'smart-watches-b793_0', 'text' => 'Smart Watches',
                            'level' => 3, 'slug' => 'speakers-b492_0', 'text' => 'Speakers',
                            'level' => 3, 'slug' => 'other-b495_0', 'text' => 'Other',
                        ],
                    ],
                    'level' => 2, 'slug' => 'mobile-phones-b13_0', 'text' => 'Mobile Phones',
                    [
                        'heading' => [ 'slug' => 'parts-b604', 'text' => 'Parts', ],
                        'children' => [
                            'level' => 3, 'slug' => 'antenna-b839_0', 'text' => 'Antenna ',
                            'level' => 3, 'slug' => 'audio-jack-b840_0', 'text' => 'Audio Jack',
                            'level' => 3, 'slug' => 'battery-b484_0', 'text' => 'Battery',
                            'level' => 3, 'slug' => 'button-b841_0', 'text' => 'Button',
                            'level' => 3, 'slug' => 'camera-modules-b842_0', 'text' => 'Camera Modules',
                            'level' => 3, 'slug' => 'charging-port-b843_0', 'text' => 'Charging Port',
                            'level' => 3, 'slug' => 'ear-speaker-b844_0', 'text' => 'Ear Speaker',
                            'level' => 3, 'slug' => 'flex-cable-b605_0', 'text' => 'Flex Cable',
                            'level' => 3, 'slug' => 'frame-b845_0', 'text' => 'Frame',
                            'level' => 3, 'slug' => 'keypads-b606_0', 'text' => 'Keypads',
                            'level' => 3, 'slug' => 'lcd-screen-digitizer-b491_0', 'text' => 'LCD Screen & Digitizer',
                            'level' => 3, 'slug' => 'loud-speaker-b846_0', 'text' => 'Loud Speaker',
                            'level' => 3, 'slug' => 'motherboard-b847_0', 'text' => 'Motherboard',
                            'level' => 3, 'slug' => 'phone-cover-housing-b493_0', 'text' => 'Phone Cover / Housing',
                            'level' => 3, 'slug' => 'tools-b609_0', 'text' => 'Tools',
                            'level' => 3, 'slug' => 'vibration-motor-b848_0', 'text' => 'Vibration Motor',
                            'level' => 3, 'slug' => 'other-b610_0', 'text' => 'Other',
                        ],
                    ],
                    'level' => 2, 'slug' => 'phone-numbers-b140_0', 'text' => 'Phone Numbers',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'motorcycle-cars-vehicles-b4', 'text' => 'Motorcycle, Cars & Vehicles', ],
                'children' => [
                    'level' => 2, 'slug' => 'bicycles-b573_0', 'text' => 'Bicycles',
                    'level' => 2, 'slug' => 'car-van-b16_0', 'text' => 'Car & Van',
                    'level' => 2, 'slug' => 'car-accessories-b62_0', 'text' => 'Car Accessories',
                    'level' => 2, 'slug' => 'motorcycle-b17_0', 'text' => 'Motorcycle',
                    [
                        'heading' => [ 'slug' => 'motorcycle-accessories-b63', 'text' => 'Motorcycle Accessories', ],
                        'children' => [
                            'level' => 3, 'slug' => 'battery-b894_0', 'text' => 'Battery',
                            'level' => 3, 'slug' => 'brake-systems-b371_0', 'text' => 'Brake Systems',
                            'level' => 3, 'slug' => 'cover-sets-b372_0', 'text' => 'Cover sets',
                            'level' => 3, 'slug' => 'engine-parts-b373_0', 'text' => 'Engine Parts',
                            'level' => 3, 'slug' => 'exhaust-b374_0', 'text' => 'Exhaust',
                            'level' => 3, 'slug' => 'lights-and-electricals-b375_0', 'text' => 'Lights and Electricals',
                            'level' => 3, 'slug' => 'mirrors-b376_0', 'text' => 'Mirrors',
                            'level' => 3, 'slug' => 'safety-and-security-b377_0', 'text' => 'Safety and Security',
                            'level' => 3, 'slug' => 'suspension-b378_0', 'text' => 'Suspension',
                            'level' => 3, 'slug' => 'wheels-and-parts-b379_0', 'text' => 'Wheels and Parts',
                            'level' => 3, 'slug' => 'other-b370_0', 'text' => 'Other',
                        ],
                    ],
                    'level' => 2, 'slug' => 'pickup-lorry-truck-b574_0', 'text' => 'Pickup, Lorry & Truck',
                    'level' => 2, 'slug' => 'rashu-pickup-b895_0', 'text' => 'Rashu Pickup',
                    'level' => 2, 'slug' => 'other-b18_0', 'text' => 'Other',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'pets-and-pet-supplies-b72', 'text' => 'Pets and Pet Supplies', ],
                'children' => [
                    'level' => 2, 'slug' => 'birds-b115_0', 'text' => 'Birds',
                    'level' => 2, 'slug' => 'cages-stands-b576_0', 'text' => 'Cages & Stands',
                    [
                        'heading' => [ 'slug' => 'fish-aquarium-b784', 'text' => 'Fish & Aquarium', ],
                        'children' => [
                            'level' => 3, 'slug' => 'aquarium-tanks-b785_0', 'text' => 'Aquarium & Tanks',
                            'level' => 3, 'slug' => 'cleaning-maintenance-b790_0', 'text' => 'Cleaning & Maintenance',
                            'level' => 3, 'slug' => 'filters-b787_0', 'text' => 'Filters',
                            'level' => 3, 'slug' => 'fish-aquatic-pets-b114_0', 'text' => 'Fish & Aquatic Pets',
                            'level' => 3, 'slug' => 'food-b792_0', 'text' => 'Food',
                            'level' => 3, 'slug' => 'lights-bulbs-b786_0', 'text' => 'Lights & Bulbs',
                            'level' => 3, 'slug' => 'plant-decor-b116_0', 'text' => 'Plant & Decor',
                            'level' => 3, 'slug' => 'pumps-b788_0', 'text' => 'Pumps',
                            'level' => 3, 'slug' => 'other-aquarium-accessories-b791_0', 'text' => 'Other Aquarium Accessories',
                        ],
                    ],
                    'level' => 2, 'slug' => 'other-animals-b117_0', 'text' => 'Other Animals',
                    'level' => 2, 'slug' => 'pet-food-b237_0', 'text' => 'Pet Food',
                    'level' => 2, 'slug' => 'other-pet-supplies-b118_0', 'text' => 'Other Pet Supplies',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'sports-fitness-recreation-b56', 'text' => 'Sports, Fitness & Recreation', ],
                'children' => [
                    'level' => 2, 'slug' => 'board-games-b935_0', 'text' => 'Board Games',
                    'level' => 2, 'slug' => 'gym-fitness-equipment-b59_0', 'text' => 'Gym & Fitness Equipment',
                    [
                        'heading' => [ 'slug' => 'musical-instruments-b74', 'text' => 'Musical Instruments', ],
                        'children' => [
                            'level' => 3, 'slug' => 'brass-instruments-b76_0', 'text' => 'Brass Instruments',
                            'level' => 3, 'slug' => 'drums-percussion-b876_0', 'text' => 'Drums & Percussion',
                            'level' => 3, 'slug' => 'guitars-string-instruments-b877_0', 'text' => 'Guitars & String Instruments',
                            'level' => 3, 'slug' => 'karaoke-entertainment-b878_0', 'text' => 'Karaoke Entertainment',
                            'level' => 3, 'slug' => 'piano-keyboards-organs-b879_0', 'text' => 'Piano, Keyboards & Organs',
                            'level' => 3, 'slug' => 'recording-equipment-b880_0', 'text' => 'Recording Equipment',
                            'level' => 3, 'slug' => 'stage-audio-lighting-b881_0', 'text' => 'Stage Audio & Lighting',
                            'level' => 3, 'slug' => 'wind-woodwind-instruments-b882_0', 'text' => 'Wind & Woodwind Instruments',
                            'level' => 3, 'slug' => 'other-musical-instruments-accessories-b75_0', 'text' => 'Other Musical Instruments & Accessories',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'skates-skateboards-scooters-b804', 'text' => 'Skates, Skateboards & Scooters', ],
                        'children' => [
                            'level' => 3, 'slug' => 'kick-scooters-b806_0', 'text' => 'Kick Scooters',
                            'level' => 3, 'slug' => 'self-balancing-scooters-b807_0', 'text' => 'Self Balancing Scooters',
                            'level' => 3, 'slug' => 'skateboarding-roller-skating-b805_0', 'text' => 'Skateboarding & Roller Skating',
                        ],
                    ],
                    'level' => 2, 'slug' => 'snooker-pool-billiard-b550_0', 'text' => 'Snooker, Pool & Billiard',
                    'level' => 2, 'slug' => 'sports-nutrition-supplements-b724_0', 'text' => 'Sports Nutrition & Supplements',
                    [
                        'heading' => [ 'slug' => 'team-sports-b936', 'text' => 'Team Sports', ],
                        'children' => [
                            'level' => 3, 'slug' => 'badminton-b549_0', 'text' => 'Badminton',
                            'level' => 3, 'slug' => 'basketball-b938_0', 'text' => 'Basketball',
                            [
                                'heading' => [ 'slug' => 'football-b57', 'text' => 'Football', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'balls-b294_0', 'text' => 'Balls',
                                    'level' => 4, 'slug' => 'jersey-b295_0', 'text' => 'Jersey',
                                    'level' => 4, 'slug' => 'protective-gear-b296_0', 'text' => 'Protective Gear',
                                    'level' => 4, 'slug' => 'shoes-b297_0', 'text' => 'Shoes',
                                    'level' => 4, 'slug' => 'vests-b298_0', 'text' => 'Vests',
                                    'level' => 4, 'slug' => 'other-b299_0', 'text' => 'Other',
                                ],
                            ],
                            'level' => 3, 'slug' => 'volleyball-b937_0', 'text' => 'Volleyball',
                            'level' => 3, 'slug' => 'other-team-sports-b939_0', 'text' => 'Other Team Sports',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'water-sports-b642', 'text' => 'Water Sports', ],
                        'children' => [
                            'level' => 3, 'slug' => 'kites-kitesurfing-b188_0', 'text' => 'Kites & Kitesurfing',
                            [
                                'heading' => [ 'slug' => 'scuba-snorkelling-b748', 'text' => 'SCUBA & Snorkelling', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'boots-gloves-b749_0', 'text' => 'Boots & Gloves',
                                    'level' => 4, 'slug' => 'buoyancy-compensators-b750_0', 'text' => 'Buoyancy Compensators',
                                    'level' => 4, 'slug' => 'dive-computers-gauges-b751_0', 'text' => 'Dive Computers & Gauges',
                                    'level' => 4, 'slug' => 'fins-b752_0', 'text' => 'Fins',
                                    'level' => 4, 'slug' => 'masks-snorkels-sets-b753_0', 'text' => 'Masks, Snorkels & Sets',
                                    'level' => 4, 'slug' => 'regulators-b754_0', 'text' => 'Regulators',
                                    [
                                        'heading' => [ 'slug' => 'suits-b756', 'text' => 'Suits', ],
                                        'children' => [
                                            'level' => 5, 'slug' => 'hoods-b758_0', 'text' => 'Hoods',
                                            'level' => 5, 'slug' => 'rash-guards-b759_0', 'text' => 'Rash Guards',
                                            'level' => 5, 'slug' => 'shorts-b760_0', 'text' => 'Shorts',
                                            'level' => 5, 'slug' => 'wetsuits-b767_0', 'text' => 'Wetsuits',
                                            'level' => 5, 'slug' => 'other-b761_0', 'text' => 'Other',
                                        ],
                                    ],
                                    'level' => 4, 'slug' => 'tanks-b755_0', 'text' => 'Tanks',
                                    [
                                        'heading' => [ 'slug' => 'accessories-b757', 'text' => 'Accessories', ],
                                        'children' => [
                                            'level' => 5, 'slug' => 'gear-bags-b764_0', 'text' => 'Gear Bags',
                                            'level' => 5, 'slug' => 'knives-b762_0', 'text' => 'Knives',
                                            'level' => 5, 'slug' => 'lights-b763_0', 'text' => 'Lights',
                                            'level' => 5, 'slug' => 'mask-defoggers-b765_0', 'text' => 'Mask Defoggers',
                                            'level' => 5, 'slug' => 'other-accessories-b766_0', 'text' => 'Other Accessories',
                                        ],
                                    ],
                                    'level' => 4, 'slug' => 'other-b187_0', 'text' => 'Other',
                                ],
                            ],
                            'level' => 3, 'slug' => 'surfing-b572_0', 'text' => 'Surfing',
                            'level' => 3, 'slug' => 'swimming-b645_0', 'text' => 'Swimming',
                            'level' => 3, 'slug' => 'wakeboarding-waterskiing-b646_0', 'text' => 'Wakeboarding & Waterskiing',
                            'level' => 3, 'slug' => 'windsurfing-b643_0', 'text' => 'Windsurfing',
                            'level' => 3, 'slug' => 'other-b644_0', 'text' => 'Other',
                        ],
                    ],
                    'level' => 2, 'slug' => 'other-sporting-goods-b60_0', 'text' => 'Other Sporting Goods',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'stationery-office-supplies-b211', 'text' => 'Stationery & Office Supplies', ],
                'children' => [
                    'level' => 2, 'slug' => 'blank-cds-and-dvds-b416_0', 'text' => 'Blank CDs and DVDs',
                    'level' => 2, 'slug' => 'filing-and-binding-products-b417_0', 'text' => 'Filing and Binding Products',
                    'level' => 2, 'slug' => 'highlighters-markers-b927_0', 'text' => 'Highlighters & Markers',
                    'level' => 2, 'slug' => 'notebooks-writing-pads-b925_0', 'text' => 'Notebooks & Writing Pads',
                    [
                        'heading' => [ 'slug' => 'office-electronics-b212', 'text' => 'Office Electronics', ],
                        'children' => [
                            'level' => 3, 'slug' => 'copiers-b404_0', 'text' => 'Copiers',
                            'level' => 3, 'slug' => 'fax-machines-b405_0', 'text' => 'Fax Machines',
                            'level' => 3, 'slug' => 'laminating-b406_0', 'text' => 'Laminating',
                            'level' => 3, 'slug' => 'shredders-b407_0', 'text' => 'Shredders',
                            'level' => 3, 'slug' => 'other-b408_0', 'text' => 'Other',
                        ],
                    ],
                    'level' => 2, 'slug' => 'organizers-b418_0', 'text' => 'Organizers',
                    'level' => 2, 'slug' => 'painting-supplies-b928_0', 'text' => 'Painting Supplies',
                    'level' => 2, 'slug' => 'paper-b419_0', 'text' => 'Paper',
                    'level' => 2, 'slug' => 'pens-and-pencils-b420_0', 'text' => 'Pens and Pencils',
                    'level' => 2, 'slug' => 'tapes-adhesives-fasteners-b926_0', 'text' => 'Tapes, Adhesives & Fasteners',
                    'level' => 2, 'slug' => 'other-b421_0', 'text' => 'Other',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'toys-hobbies-b77', 'text' => 'Toys & Hobbies', ],
                'children' => [
                    'level' => 2, 'slug' => 'educational-toys-b157_0', 'text' => 'Educational Toys',
                    'level' => 2, 'slug' => 'outdoors-b161_0', 'text' => 'Outdoors',
                    [
                        'heading' => [ 'slug' => 'remote-control-toys-b796', 'text' => 'Remote Control Toys', ],
                        'children' => [
                            'level' => 3, 'slug' => 'drones-b798_0', 'text' => 'Drones',
                            'level' => 3, 'slug' => 'rc-airplanes-b801_0', 'text' => 'RC Airplanes',
                            'level' => 3, 'slug' => 'rc-boats-b802_0', 'text' => 'RC Boats',
                            'level' => 3, 'slug' => 'rc-cars-trucks-b799_0', 'text' => 'RC Cars & Trucks',
                            'level' => 3, 'slug' => 'rc-helicopters-b800_0', 'text' => 'RC Helicopters ',
                            'level' => 3, 'slug' => 'rc-other-b160_0', 'text' => 'RC Other',
                            'level' => 3, 'slug' => 'parts-accessories-b803_0', 'text' => 'Parts & Accessories',
                        ],
                    ],
                    'level' => 2, 'slug' => 'soft-and-stuffed-toys-b158_0', 'text' => 'Soft and Stuffed Toys',
                    'level' => 2, 'slug' => 'toy-vehicles-diecasts-b797_0', 'text' => 'Toy Vehicles & Diecasts',
                    'level' => 2, 'slug' => 'other-b162_0', 'text' => 'Other',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'video-computer-gaming-b107', 'text' => 'Video & Computer Gaming', ],
                'children' => [
                    [
                        'heading' => [ 'slug' => 'accessories-b108', 'text' => 'Accessories', ],
                        'children' => [
                            'level' => 3, 'slug' => 'battery-and-charger-b460_0', 'text' => 'Battery and Charger',
                            'level' => 3, 'slug' => 'data-and-power-cables-b461_0', 'text' => 'Data and Power Cables',
                            'level' => 3, 'slug' => 'game-controllers-b458_0', 'text' => 'Game Controllers',
                            'level' => 3, 'slug' => 'memory-b459_0', 'text' => 'Memory',
                            'level' => 3, 'slug' => 'other-b462_0', 'text' => 'Other',
                        ],
                    ],
                    'level' => 2, 'slug' => 'consoles-b68_0', 'text' => 'Consoles',
                    'level' => 2, 'slug' => 'games-b106_0', 'text' => 'Games',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'other-stuff-b5_0', 'text' => 'Other Stuff',],
                'children' => [],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'housing-real-estate-b19', 'text' => 'Housing & Real Estate', ],
                'children' => [
                    'level' => 2, 'slug' => 'apartments-houses-for-rent-b25_0', 'text' => 'Apartments & Houses for Rent',
                    'level' => 2, 'slug' => 'room-for-rent-b601_0', 'text' => 'Room for Rent',
                    'level' => 2, 'slug' => 'guest-houses-short-stay-accomodation-b589_0', 'text' => 'Guest Houses & Short Stay Accomodation',
                    'level' => 2, 'slug' => 'kudhin-baithibbaadhinun-b603_0', 'text' => 'Kudhin Baithibbaadhinun',
                    'level' => 2, 'slug' => 'land-for-sale-lease-b88_0', 'text' => 'Land For Sale & Lease',
                    'level' => 2, 'slug' => 'office-commercial-space-b22_0', 'text' => 'Office & Commercial Space',
                    'level' => 2, 'slug' => 'roommates-wanted-b602_0', 'text' => 'Roommates Wanted',
                    [
                        'heading' => [ 'slug' => 'international-b768', 'text' => 'International', ],
                        'children' => [
                            'level' => 3, 'slug' => 'apartments-houses-for-rent-b769_0', 'text' => 'Apartments & Houses for Rent',
                            'level' => 3, 'slug' => 'guest-houses-short-stay-accomodation-b770_0', 'text' => 'Guest Houses & Short Stay Accomodation',
                            'level' => 3, 'slug' => 'kudhin-baithibbaadhinun-b771_0', 'text' => ' Kudhin Baithibbaadhinun',
                        ],
                    ],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'jobs-b55_0', 'text' => 'Jobs',],
                'children' => [],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'services-b28', 'text' => 'Services', ],
                'children' => [
                    'level' => 2, 'slug' => 'architectural-home-design-b127_0', 'text' => 'Architectural & Home Design',
                    [
                        'heading' => [ 'slug' => 'beauty-sports-and-wellness-b858', 'text' => 'Beauty, Sports and Wellness', ],
                        'children' => [
                            'level' => 3, 'slug' => 'aerobics-and-zumba-classes-b860_0', 'text' => 'Aerobics and Zumba Classes ',
                            'level' => 3, 'slug' => 'beauty-services-b504_0', 'text' => 'Beauty Services',
                            'level' => 3, 'slug' => 'gym-and-fitness-studios-b892_0', 'text' => 'Gym and Fitness Studios',
                            'level' => 3, 'slug' => 'martial-arts-classes-b861_0', 'text' => 'Martial Arts Classes',
                            'level' => 3, 'slug' => 'personal-trainer-b197_0', 'text' => 'Personal Trainer',
                            'level' => 3, 'slug' => 'racket-stringing-b196_0', 'text' => 'Racket Stringing',
                            'level' => 3, 'slug' => 'sports-coach-b859_0', 'text' => 'Sports Coach',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'business-services-b849', 'text' => 'Business Services', ],
                        'children' => [
                            'level' => 3, 'slug' => 'accounting-auditing-b109_0', 'text' => 'Accounting & Auditing',
                            'level' => 3, 'slug' => 'advertising-marketing-b499_0', 'text' => 'Advertising & Marketing',
                            'level' => 3, 'slug' => 'business-consulting-b191_0', 'text' => 'Business Consulting',
                            'level' => 3, 'slug' => 'cargo-handling-logistics-b9_0', 'text' => 'Cargo Handling & Logistics',
                            'level' => 3, 'slug' => 'computer-telecom-networking-b192_0', 'text' => 'Computer & Telecom Networking',
                            'level' => 3, 'slug' => 'courier-and-delivery-b164_0', 'text' => 'Courier and Delivery',
                            'level' => 3, 'slug' => 'foreign-labor-recruitment-services-b124_0', 'text' => 'Foreign Labor Recruitment & Services',
                            'level' => 3, 'slug' => 'legal-b31_0', 'text' => 'Legal',
                            'level' => 3, 'slug' => 'printing-b125_0', 'text' => 'Printing',
                            'level' => 3, 'slug' => 'secretarial-services-b121_0', 'text' => 'Secretarial Services',
                            'level' => 3, 'slug' => 'security-services-b175_0', 'text' => 'Security Services',
                            'level' => 3, 'slug' => 'signboard-making-b145_0', 'text' => 'Signboard Making',
                            'level' => 3, 'slug' => 'software-development-b119_0', 'text' => 'Software Development',
                            'level' => 3, 'slug' => 'transport-b139_0', 'text' => 'Transport',
                            'level' => 3, 'slug' => 'web-graphics-design-b126_0', 'text' => 'Web & Graphics Design',
                            'level' => 3, 'slug' => 'web-hosting-b138_0', 'text' => 'Web Hosting',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'domestic-services-b862', 'text' => 'Domestic Services', ],
                        'children' => [
                            'level' => 3, 'slug' => 'babysitting-and-child-care-b190_0', 'text' => 'Babysitting and Child Care',
                            'level' => 3, 'slug' => 'cooking-b863_0', 'text' => 'Cooking',
                            'level' => 3, 'slug' => 'laundry-b500_0', 'text' => 'Laundry',
                            'level' => 3, 'slug' => 'maid-b864_0', 'text' => 'Maid',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'event-services-b851', 'text' => 'Event Services', ],
                        'children' => [
                            'level' => 3, 'slug' => 'cake-b869_0', 'text' => 'Cake',
                            'level' => 3, 'slug' => 'catering-takeaway-b20_0', 'text' => 'Catering & Takeaway',
                            'level' => 3, 'slug' => 'corporate-event-planners-b853_0', 'text' => 'Corporate Event Planners',
                            'level' => 3, 'slug' => 'florists-b854_0', 'text' => 'Florists',
                            'level' => 3, 'slug' => 'function-venues-b852_0', 'text' => 'Function Venues',
                            'level' => 3, 'slug' => 'live-bands-and-musicians-b856_0', 'text' => 'Live Bands and Musicians',
                            'level' => 3, 'slug' => 'party-planners-b857_0', 'text' => 'Party Planners',
                            'level' => 3, 'slug' => 'party-supplies-decoration-b137_0', 'text' => 'Party Supplies & Decoration',
                            'level' => 3, 'slug' => 'sound-and-lighting-b855_0', 'text' => 'Sound and Lighting',
                            'level' => 3, 'slug' => 'video-photography-b34_0', 'text' => 'Video & Photography',
                            'level' => 3, 'slug' => 'wedding-planners-b134_0', 'text' => 'Wedding Planners',
                        ],
                    ],
                    'level' => 2, 'slug' => 'food-services-b23_0', 'text' => 'Food Services',
                    'level' => 2, 'slug' => 'healthcare-services-b501_0', 'text' => 'Healthcare Services',
                    [
                        'heading' => [ 'slug' => 'industrial-b37', 'text' => 'Industrial', ],
                        'children' => [
                            'level' => 3, 'slug' => 'boat-building-related-services-b648_0', 'text' => 'Boat Building & Related Services',
                            'level' => 3, 'slug' => 'welding-engineering-b136_0', 'text' => 'Welding & Engineering',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'rental-services-b850', 'text' => 'Rental Services', ],
                        'children' => [
                            'level' => 3, 'slug' => 'catering-utensils-supplies-b875_0', 'text' => 'Catering Utensils & Supplies',
                            'level' => 3, 'slug' => 'chairs-tables-b874_0', 'text' => 'Chairs & Tables',
                            'level' => 3, 'slug' => 'dhoani-and-marine-vessels-b871_0', 'text' => 'Dhoani and Marine Vessels',
                            'level' => 3, 'slug' => 'pickup-heavy-vehicles-b872_0', 'text' => 'Pickup & Heavy Vehicles',
                            'level' => 3, 'slug' => 'tools-equipment-b873_0', 'text' => 'Tools & Equipment',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'repairs-maintenance-household-work-b634', 'text' => 'Repairs, Maintenance & Household Work', ],
                        'children' => [
                            'level' => 3, 'slug' => 'aircon-servicing-repair-b637_0', 'text' => 'Aircon Servicing & Repair',
                            'level' => 3, 'slug' => 'building-construction-b635_0', 'text' => 'Building & Construction',
                            'level' => 3, 'slug' => 'camera-repair-b194_0', 'text' => 'Camera Repair',
                            'level' => 3, 'slug' => 'carpentry-b641_0', 'text' => 'Carpentry',
                            'level' => 3, 'slug' => 'computer-repairs-b29_0', 'text' => 'Computer Repairs',
                            'level' => 3, 'slug' => 'dhonna-machine-maraamathukurun-b639_0', 'text' => 'Dhonna Machine Maraamathukurun',
                            'level' => 3, 'slug' => 'electrical-wiring-b638_0', 'text' => 'Electrical & Wiring',
                            'level' => 3, 'slug' => 'fen-motor-maraamathukurun-b640_0', 'text' => 'Fen Motor Maraamathukurun',
                            'level' => 3, 'slug' => 'housekeeping-cleaning-b174_0', 'text' => 'Housekeeping & Cleaning',
                            'level' => 3, 'slug' => 'movers-b587_0', 'text' => 'Movers',
                            'level' => 3, 'slug' => 'pest-control-b497_0', 'text' => 'Pest Control',
                            'level' => 3, 'slug' => 'phone-servicing-unlocking-b120_0', 'text' => 'Phone Servicing & Unlocking',
                            'level' => 3, 'slug' => 'plumbing-b636_0', 'text' => 'Plumbing',
                            'level' => 3, 'slug' => 'television-repair-b865_0', 'text' => 'Television Repair',
                            'level' => 3, 'slug' => 'vehicle-garage-b893_0', 'text' => 'Vehicle Garage',
                            'level' => 3, 'slug' => 'video-game-repair-services-b195_0', 'text' => 'Video Game Repair & Services',
                            'level' => 3, 'slug' => 'general-other-b30_0', 'text' => 'General / Other',
                        ],
                    ],
                    'level' => 2, 'slug' => 'tailoring-b123_0', 'text' => 'Tailoring',
                    [
                        'heading' => [ 'slug' => 'travel-recreation-b649', 'text' => 'Travel & Recreation', ],
                        'children' => [
                            'level' => 3, 'slug' => 'island-overview-information-b598_0', 'text' => 'Island Overview & Information',
                            'level' => 3, 'slug' => 'picnic-fishing-trips-other-activities-b586_0', 'text' => 'Picnic, Fishing Trips & Other Activities',
                            'level' => 3, 'slug' => 'restaurants-cafes-b590_0', 'text' => 'Restaurants & Cafes',
                            [
                                'heading' => [ 'slug' => 'transport-vehicle-rental-b591', 'text' => 'Transport & Vehicle Rental', ],
                                'children' => [
                                    'level' => 4, 'slug' => 'bicycle-rental-b592_0', 'text' => 'Bicycle Rental',
                                    'level' => 4, 'slug' => 'ferry-naalu-boat-b593_0', 'text' => 'Ferry & Naalu Boat',
                                    'level' => 4, 'slug' => 'motorcycle-rental-b594_0', 'text' => 'Motorcycle Rental',
                                    'level' => 4, 'slug' => 'speedboat-dhoani-rental-b596_0', 'text' => 'Speedboat & Dhoani Rental',
                                    'level' => 4, 'slug' => 'taxi-car-rental-b595_0', 'text' => 'Taxi & Car Rental',
                                ],
                            ],
                            'level' => 3, 'slug' => 'travel-packages-b32_0', 'text' => 'Travel Packages',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'tuition-personal-development-b866', 'text' => 'Tuition & Personal Development', ],
                        'children' => [
                            'level' => 3, 'slug' => 'cooking-baking-classes-b868_0', 'text' => 'Cooking & Baking Classes',
                            'level' => 3, 'slug' => 'driving-classes-b867_0', 'text' => 'Driving Classes',
                            'level' => 3, 'slug' => 'training-b122_0', 'text' => 'Training',
                            'level' => 3, 'slug' => 'tuition-b39_0', 'text' => 'Tuition',
                        ],
                    ],
                    [
                        'heading' => [ 'slug' => 'other-services-b870', 'text' => 'Other Services', ],
                        'children' => [
                            'level' => 3, 'slug' => 'audio-video-recording-b193_0', 'text' => 'Audio & Video Recording',
                            'level' => 3, 'slug' => 'buying-from-abroad-b135_0', 'text' => 'Buying from Abroad',
                            'level' => 3, 'slug' => 'vehicle-registration-roadworthiness-b33_0', 'text' => 'Vehicle Registration & Roadworthiness',
                            'level' => 3, 'slug' => 'other-services-b35_0', 'text' => 'Other Services',
                        ],
                    ],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'wanted-b87', 'text' => 'Wanted', ],
                'children' => [
                    'level' => 2, 'slug' => 'books-and-magazines-b445_0', 'text' => 'Books and Magazines',
                    'level' => 2, 'slug' => 'clothing-and-accessories-b446_0', 'text' => 'Clothing and Accessories',
                    'level' => 2, 'slug' => 'computer-laptop-and-accessories-b447_0', 'text' => 'Computer Laptop and Accessories',
                    'level' => 2, 'slug' => 'electronics-b448_0', 'text' => 'Electronics',
                    'level' => 2, 'slug' => 'mobile-phones-and-accessories-b449_0', 'text' => 'Mobile Phones and Accessories',
                    'level' => 2, 'slug' => 'motorcycles-cars-and-accessories-b450_0', 'text' => 'Motorcycles- Cars and Accessories',
                    'level' => 2, 'slug' => 'real-estate-office-space-and-commercial-b452_0', 'text' => 'Real Estate - Office Space and Commercial',
                    'level' => 2, 'slug' => 'real-estate-rooms-and-apartment-b453_0', 'text' => 'Real Estate - Rooms and Apartment',
                    'level' => 2, 'slug' => 'services-b454_0', 'text' => 'Services',
                    'level' => 2, 'slug' => 'sporting-goods-b455_0', 'text' => 'Sporting Goods',
                    'level' => 2, 'slug' => 'toys-kids-and-hobbies-b456_0', 'text' => 'Toys Kids and Hobbies',
                    'level' => 2, 'slug' => 'other-stuff-b457_0', 'text' => 'Other Stuff',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'business-opportunities-b176', 'text' => 'Business Opportunities', ],
                'children' => [
                    'level' => 2, 'slug' => 'business-for-sale-b177_0', 'text' => 'Business for Sale',
                    'level' => 2, 'slug' => 'websites-for-sale-b502_0', 'text' => 'Websites for Sale',
                    'level' => 2, 'slug' => 'other-b179_0', 'text' => 'Other',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'announcements-events-b227', 'text' => 'Announcements & Events', ],
                'children' => [
                    'level' => 2, 'slug' => 'announcements-b567_0', 'text' => 'Announcements',
                    'level' => 2, 'slug' => 'lost-and-found-b568_0', 'text' => 'Lost and Found',
                    'level' => 2, 'slug' => 'promotions-b569_0', 'text' => 'Promotions',
                    'level' => 2, 'slug' => 'trade-exhibitions-fairs-b570_0', 'text' => 'Trade Exhibitions & Fairs',
                    'level' => 2, 'slug' => 'other-b571_0', 'text' => 'Other',
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'free-stuff-b451_0', 'text' => 'Free Stuff',],
                'children' => [],
            ],
        ];

        return $data;

        // dd($data);

        // $filePath = storage_path('app/data/c3.html');
    
        // //read the file line by line and store it in an array
        // $lines = file($filePath);

        // $data = [];

        // foreach ($lines as $line) {

        //     $line = trim($line);

        //     if (strpos($line, '<li><a class="arrow" href="') !== false) {

        //         $line = str_replace('<li><a class="arrow" href=', "[ 'slug' => '", $line);

        //         $data[] = $line;
        //     }

        //     $data[] = $line;
        // }

        // dd($data);
        // return $data;


        // $data = [];
        // $current = null;

        // foreach ($lines as $no => $line) {

        //     $text = trim($line);
        //     //remove multiple spaces
        //     $text = preg_replace('/\s+/', ' ', $text);
        //     $text = str_replace("\n", "", $text);
        //     $line = trim($text);
        //     //get only lines not starting with a html element
        //     // if (strpos($line, '<') !== 0) {
        //     //     $data[] =  [
        //     //             'line_number' => $no,
        //     //             'line' => $line
        //     //         ];
        //     // } 

        //     //get only the line matching exactly </li>
        //     // if (strpos($line, '</li>') === 0) {
        //     //     $data[] =  [
        //     //             'line_number' => $no,
        //     //             'line' => $line
        //     //         ];
        //     // }

        //     //get lines ending with </a>
        //     if (strpos($line, '</a>') === strlen($line) - strlen('</a>')) {

        //         //if string does not contain arrow
        //         if (strpos($line, 'arrow') === false) {
        //             $data[] =  [
        //                 'line_number' => $no,
        //                 'line' => $line
        //             ];
        //         }

        //         // $data[] =  [
        //         //         'line_number' => $no,
        //         //         'line' => $line
        //         //     ];
        //     }




        //     // if (strpos($line, '<li') !== false) {
        //     //     $current = $line;
        //     // } else if (strpos($line, '</li>') !== false) {
        //     //     $current .= $line;
        //     //     $data[] = $current;
        //     //     $current = null;
        //     // } else if ($current) {
        //     //     $current .= $line;
        //     // }
        // }

        // dd($data);

        // return $data;


    }


    protected function getListTexts($ul)
    {
        $data = [];
        foreach ($ul->childNodes as $node) {
            if ($node->nodeName == 'li') {
                $text = $this->getListItemText($node);
                // dump('li',$text);
                if ($text) {
                    $data[] = $text;
                }
            } else if ($node->nodeName == 'ul') {
                $texts = $this->getListTexts($node);
                // dump('ul',$texts);
                if (count($texts) > 0) {
                    $data[]['ul'][] = $texts;
                }
            } else {
                $text = $this->getListItemText($node);
                if ($text) {
                    // dump('Unknown node: ' . $node->nodeName . ' - ' . $text);
                    $data[]['a'][] = $text;
                }
            }
        }
        return $data;
    }

    protected function getListItemText($li)
    {
        $text = trim($li->textContent);
        //remove multiple spaces
        $text = preg_replace('/\s+/', ' ', $text);
        $text = str_replace("\n", "", $text);
        return $text;
    }

    protected function getTexts($node)
    {
        $text = trim($node->textContent);
        //remove multiple spaces
        $text = preg_replace('/\s+/', ' ', $text);
        $text = str_replace("\n", "", $text);
        if (!$text) {
            return [];
        }

        $texts = [];
        $children = $node->childNodes;
        foreach ($children as $child) {
            if ($child->nodeType == XML_TEXT_NODE) {
                $text = trim($child->textContent);
                //remove multiple spaces
                $text = preg_replace('/\s+/', ' ', $text);
                $text = str_replace("\n", "", $text);
                if ($text) {
                    $texts[] = $text;
                }

                // dump($child->nodeName);

                // dump('XML_TEXT_NODE: ' . $child->nodeName . " - " . $child->nodeValue);
            } else {
                // if ($child->nodeName == 'a') {
                //     $texts[] = $child->getAttribute('href');
                // }
                //ul is only found here
                if ($child->nodeName == 'ul') {
                    $texts[] = $this->getTexts($child);
                    // dump('NOT_XML_TEXT_NODE ul: ' . $child->nodeName . " - " . $child->nodeValue);
                } else {
                    if ($child->nodeName == 'a') {
                        // $texts[] = $child->getAttribute('href');
                    } else if ($child->nodeName == 'li') {
                    } else {
                        //doesnt touch here.
                        // dump($child->nodeName);

                    }
                }

                // dump($child->nodeName . " - " . $child->nodeValue);
                $texts = array_merge($texts, $this->getTexts($child));
                // dump('NOT_XML_TEXT_NODE: ' . $child->nodeName . " - " . $child->nodeValue);
            }
        }
        // dd('node: ' . $node->nodeName . " - " . $node->nodeValue);
        return $texts;
    }
    


    protected function getTextFromNode($node)
    {
        $text = "";
        foreach ($node->childNodes as $child) {
            if ($child->nodeType == XML_TEXT_NODE) {
                $text .= $child->nodeValue;
            } else {
                $text .= $this->getTextFromNode($child);
            }
        }
        return $text;
    }
}
