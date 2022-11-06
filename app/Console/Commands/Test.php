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
        $data = $this->getData2();
        
        // dd($data);


        $cleaned = $this->recursive($data);
        
        dd('cleaned', $cleaned);
        dd('xx');
        dd($data);
    }

    public function recursive($data)
    {
        $cleaned = [];

        dump('recursive', $data);
        foreach ($data as $key => $val) {
            // dd($key, $val['heading'], $val['children']);
            if (isset($val['heading'])) {
                $heading = $val['heading']['text'];
                if (isset($val['children'])) {
                    foreach ($val['children'] as $child) {
                        if (isset($child['heading'])) {
                            // dd($child['heading']);
                            $h2 = $child['heading']['text'];
                            // $cleaned[$heading][$h2] = $child;//$this->recursive($child);
                            $cleaned[$heading][$h2][] = $this->recursive($child);
                        } else {
                            $cleaned[$heading][]  = $child['text'];
                        }
                        # code...
                    }
                }
                // dump($heading);
            }
            // $cleaned[] = $this->clean($value);
        }

        return $cleaned;
    }

    public function getData2()
    {

        $data = [    
            [
                'heading' => [ 'level' => 1, 'slug' => 'antiques-collectibles-gifts-b214', 'text' => 'Antiques, Collectibles & Gifts', ],
                'children' => [
                    [ 'level' => 1, 'slug' => 'antiques-b838_0', 'text' => 'Antiques',],
                    [ 'level' => 1, 'slug' => 'coins-and-paper-money-b217_0', 'text' => 'Coins and Paper Money',],
                    [ 'level' => 1, 'slug' => 'gifts-b503_0', 'text' => 'Gifts',],
                    [ 'level' => 1, 'slug' => 'sovenirs-b215_0', 'text' => 'Sovenirs',],
                    [ 'level' => 1, 'slug' => 'sports-memorabilia-b218_0', 'text' => 'Sports Memorabilia',],
                    [ 'level' => 1, 'slug' => 'stamps-b219_0', 'text' => 'Stamps',],
                    [ 'level' => 1, 'slug' => 'other-collectibles-b220_0', 'text' => 'Other Collectibles',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'baby-pregnancy-maternity-b146', 'text' => 'Baby, Pregnancy & Maternity', ],
                'children' => [
                    [ 'level' => 1, 'slug' => 'baby-carriers-backpacks-b679_0', 'text' => 'Baby Carriers & Backpacks',],
                    [ 'level' => 1, 'slug' => 'baby-shoes-b236_0', 'text' => 'Baby Shoes',],
                    [ 'level' => 1, 'slug' => 'baby-toys-b151_0', 'text' => 'Baby Toys',],
                    [ 'level' => 1, 'slug' => 'bathing-grooming-b186_0', 'text' => 'Bathing & Grooming',],
                    [ 'level' => 1, 'slug' => 'clothing-accessories-b185_0', 'text' => 'Clothing & Accessories',],
                    [ 'level' => 1, 'slug' => 'diapering-b148_0', 'text' => 'Diapering',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'feeding-b680', 'text' => 'Feeding', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'bibs-b682_0', 'text' => 'Bibs',],
                            [ 'level' => 2, 'slug' => 'bottles-b683_0', 'text' => 'Bottles',],
                            [ 'level' => 2, 'slug' => 'breast-pumps-b681_0', 'text' => 'Breast Pumps',],
                            [ 'level' => 2, 'slug' => 'high-chairs-b685_0', 'text' => 'High Chairs',],
                            [ 'level' => 2, 'slug' => 'plates-bowels-cups-b684_0', 'text' => 'Plates, Bowels & Cups',],
                            [ 'level' => 2, 'slug' => 'sterilisers-food-warmers-b687_0', 'text' => 'Sterilisers & Food Warmers',],
                            [ 'level' => 2, 'slug' => 'other-b686_0', 'text' => 'Other',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'furniture-bedding-b147_0', 'text' => 'Furniture & Bedding',],
                    [ 'level' => 1, 'slug' => 'health-baby-care-b150_0', 'text' => 'Health & Baby Care',],
                    [ 'level' => 1, 'slug' => 'maternity-b429_0', 'text' => 'Maternity',],
                    [ 'level' => 1, 'slug' => 'nursery-decor-b782_0', 'text' => 'Nursery Decor',],
                    [ 'level' => 1, 'slug' => 'pregnancy-b731_0', 'text' => 'Pregnancy',],
                    [ 'level' => 1, 'slug' => 'strollers-walkers-b149_0', 'text' => 'Strollers & Walkers',],
                    [ 'level' => 1, 'slug' => 'other-baby-products-b152_0', 'text' => 'Other Baby Products',],
                ],
            ],
        ];

        return $data;
    }


    public function getData()
    {

        $data = [    
            [
                'heading' => [ 'level' => 1, 'slug' => 'antiques-collectibles-gifts-b214', 'text' => 'Antiques, Collectibles & Gifts', ],
                'children' => [
                    [ 'level' => 1, 'slug' => 'antiques-b838_0', 'text' => 'Antiques',],
                    [ 'level' => 1, 'slug' => 'coins-and-paper-money-b217_0', 'text' => 'Coins and Paper Money',],
                    [ 'level' => 1, 'slug' => 'gifts-b503_0', 'text' => 'Gifts',],
                    [ 'level' => 1, 'slug' => 'sovenirs-b215_0', 'text' => 'Sovenirs',],
                    [ 'level' => 1, 'slug' => 'sports-memorabilia-b218_0', 'text' => 'Sports Memorabilia',],
                    [ 'level' => 1, 'slug' => 'stamps-b219_0', 'text' => 'Stamps',],
                    [ 'level' => 1, 'slug' => 'other-collectibles-b220_0', 'text' => 'Other Collectibles',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'baby-pregnancy-maternity-b146', 'text' => 'Baby, Pregnancy & Maternity', ],
                'children' => [
                    [ 'level' => 1, 'slug' => 'baby-carriers-backpacks-b679_0', 'text' => 'Baby Carriers & Backpacks',],
                    [ 'level' => 1, 'slug' => 'baby-shoes-b236_0', 'text' => 'Baby Shoes',],
                    [ 'level' => 1, 'slug' => 'baby-toys-b151_0', 'text' => 'Baby Toys',],
                    [ 'level' => 1, 'slug' => 'bathing-grooming-b186_0', 'text' => 'Bathing & Grooming',],
                    [ 'level' => 1, 'slug' => 'clothing-accessories-b185_0', 'text' => 'Clothing & Accessories',],
                    [ 'level' => 1, 'slug' => 'diapering-b148_0', 'text' => 'Diapering',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'feeding-b680', 'text' => 'Feeding', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'bibs-b682_0', 'text' => 'Bibs',],
                            [ 'level' => 2, 'slug' => 'bottles-b683_0', 'text' => 'Bottles',],
                            [ 'level' => 2, 'slug' => 'breast-pumps-b681_0', 'text' => 'Breast Pumps',],
                            [ 'level' => 2, 'slug' => 'high-chairs-b685_0', 'text' => 'High Chairs',],
                            [ 'level' => 2, 'slug' => 'plates-bowels-cups-b684_0', 'text' => 'Plates, Bowels & Cups',],
                            [ 'level' => 2, 'slug' => 'sterilisers-food-warmers-b687_0', 'text' => 'Sterilisers & Food Warmers',],
                            [ 'level' => 2, 'slug' => 'other-b686_0', 'text' => 'Other',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'furniture-bedding-b147_0', 'text' => 'Furniture & Bedding',],
                    [ 'level' => 1, 'slug' => 'health-baby-care-b150_0', 'text' => 'Health & Baby Care',],
                    [ 'level' => 1, 'slug' => 'maternity-b429_0', 'text' => 'Maternity',],
                    [ 'level' => 1, 'slug' => 'nursery-decor-b782_0', 'text' => 'Nursery Decor',],
                    [ 'level' => 1, 'slug' => 'pregnancy-b731_0', 'text' => 'Pregnancy',],
                    [ 'level' => 1, 'slug' => 'strollers-walkers-b149_0', 'text' => 'Strollers & Walkers',],
                    [ 'level' => 1, 'slug' => 'other-baby-products-b152_0', 'text' => 'Other Baby Products',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'books-magazines-b61', 'text' => 'Books & Magazines', ],
                'children' => [
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'children-babies-b552', 'text' => 'Children & Babies', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'activity-colouring-b553_0', 'text' => 'Activity & Colouring',],
                            [ 'level' => 2, 'slug' => 'educational-b154_0', 'text' => 'Educational',],
                            [ 'level' => 2, 'slug' => 'other-b555_0', 'text' => 'Other',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'comics-b81_0', 'text' => 'Comics',],
                    [ 'level' => 1, 'slug' => 'fiction-b82_0', 'text' => 'Fiction',],
                    [ 'level' => 1, 'slug' => 'magazines-b85_0', 'text' => 'Magazines',],
                    [ 'level' => 1, 'slug' => 'non-fiction-b83_0', 'text' => 'Non-Fiction',],
                    [ 'level' => 1, 'slug' => 'textbooks-b84_0', 'text' => 'Textbooks',],
                    [ 'level' => 1, 'slug' => 'young-adult-fiction-b556_0', 'text' => 'Young Adult Fiction',],
                    [ 'level' => 1, 'slug' => 'other-b566_0', 'text' => 'Other',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'clothing-accessories-b66', 'text' => 'Clothing & Accessories', ],
                'children' => [
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'kids-b155', 'text' => 'Kids', ],
                        'children' => [
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'boys-b897', 'text' => 'Boys', ],
                                'children' => [
                                    [
                                        'heading' => [ 'level' => 4, 'slug' => 'clothing-b899', 'text' => 'Clothing', ],
                                        'children' => [
                                            [ 'level' => 4, 'slug' => 'athletic-sports-b658_0', 'text' => 'Athletic & Sports',],
                                            [ 'level' => 4, 'slug' => 'hoodies-sweater-b900_0', 'text' => 'Hoodies & Sweater ',],
                                            [ 'level' => 4, 'slug' => 'jackets-coats-b906_0', 'text' => 'Jackets & Coats',],
                                            [ 'level' => 4, 'slug' => 'school-uniforms-b940_0', 'text' => 'School Uniforms',],
                                            [ 'level' => 4, 'slug' => 'shirts-t-shirts-b902_0', 'text' => 'Shirts & T-Shirts',],
                                            [ 'level' => 4, 'slug' => 'shorts-beachwear-b903_0', 'text' => 'Shorts & Beachwear',],
                                            [ 'level' => 4, 'slug' => 'sleepwear-lounge-b901_0', 'text' => 'Sleepwear & Lounge ',],
                                            [ 'level' => 4, 'slug' => 'socks-b909_0', 'text' => 'Socks',],
                                            [ 'level' => 4, 'slug' => 'underwear-b904_0', 'text' => 'Underwear',],
                                            [ 'level' => 4, 'slug' => 'other-b905_0', 'text' => 'Other',],
                                        ],
                                    ],
                                    [
                                        'heading' => [ 'level' => 4, 'slug' => 'footwear-b945', 'text' => 'Footwear', ],
                                        'children' => [
                                            [ 'level' => 4, 'slug' => 'athletic-sports-b961_0', 'text' => 'Athletic & Sports',],
                                            [ 'level' => 4, 'slug' => 'flip-flops-b966_0', 'text' => 'Flip Flops',],
                                            [ 'level' => 4, 'slug' => 'loafers-slip-ons-b964_0', 'text' => 'Loafers & Slip-Ons ',],
                                            [ 'level' => 4, 'slug' => 'sandals-b965_0', 'text' => 'Sandals',],
                                            [ 'level' => 4, 'slug' => 'school-shoes-b962_0', 'text' => 'School Shoes',],
                                            [ 'level' => 4, 'slug' => 'sneakers-b963_0', 'text' => 'Sneakers',],
                                            [ 'level' => 4, 'slug' => 'other-footwear-accessories-b911_0', 'text' => 'Other Footwear & Accessories',],
                                        ],
                                    ],
                                    [ 'level' => 3, 'slug' => 'hats-caps-b910_0', 'text' => 'Hats & Caps',],
                                    [ 'level' => 3, 'slug' => 'other-b912_0', 'text' => 'Other',],
                                ],
                            ],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'girls-b896', 'text' => 'Girls', ],
                                'children' => [
                                    [
                                        'heading' => [ 'level' => 4, 'slug' => 'clothing-b652', 'text' => 'Clothing', ],
                                        'children' => [
                                            [ 'level' => 4, 'slug' => 'athletic-sports-b166_0', 'text' => 'Athletic & Sports',],
                                            [ 'level' => 4, 'slug' => 'dresses-skirts-b656_0', 'text' => 'Dresses & Skirts',],
                                            [ 'level' => 4, 'slug' => 'hoodies-sweater-b103_0', 'text' => 'Hoodies & Sweater',],
                                            [ 'level' => 4, 'slug' => 'jackets-coats-b907_0', 'text' => 'Jackets & Coats',],
                                            [ 'level' => 4, 'slug' => 'jeans-pants-b654_0', 'text' => 'Jeans & Pants',],
                                            [ 'level' => 4, 'slug' => 'leggings-b659_0', 'text' => 'Leggings',],
                                            [ 'level' => 4, 'slug' => 'school-uniforms-b941_0', 'text' => 'School Uniforms',],
                                            [ 'level' => 4, 'slug' => 'shirts-t-shirts-tops-b653_0', 'text' => 'Shirts, T-Shirts & Tops',],
                                            [ 'level' => 4, 'slug' => 'shorts-beachwear-b655_0', 'text' => 'Shorts & Beachwear',],
                                            [ 'level' => 4, 'slug' => 'sleepwear-lounge-b657_0', 'text' => 'Sleepwear & Lounge',],
                                            [ 'level' => 4, 'slug' => 'socks-b908_0', 'text' => 'Socks',],
                                            [ 'level' => 4, 'slug' => 'underwear-b924_0', 'text' => 'Underwear',],
                                            [ 'level' => 4, 'slug' => 'other-b93_0', 'text' => 'Other',],
                                        ],
                                    ],
                                    [
                                        'heading' => [ 'level' => 4, 'slug' => 'footwear-b946', 'text' => 'Footwear', ],
                                        'children' => [
                                            [ 'level' => 4, 'slug' => 'athletic-sports-b967_0', 'text' => 'Athletic & Sports',],
                                            [ 'level' => 4, 'slug' => 'flats-b973_0', 'text' => 'Flats',],
                                            [ 'level' => 4, 'slug' => 'flip-flops-b972_0', 'text' => 'Flip Flops',],
                                            [ 'level' => 4, 'slug' => 'loafers-slip-ons-b970_0', 'text' => 'Loafers & Slip-Ons ',],
                                            [ 'level' => 4, 'slug' => 'sandals-b971_0', 'text' => 'Sandals',],
                                            [ 'level' => 4, 'slug' => 'school-shoes-b968_0', 'text' => 'School Shoes',],
                                            [ 'level' => 4, 'slug' => 'sneakers-b969_0', 'text' => 'Sneakers',],
                                            [ 'level' => 4, 'slug' => 'other-footwear-accessories-b660_0', 'text' => 'Other Footwear & Accessories',],
                                        ],
                                    ],
                                    [ 'level' => 3, 'slug' => 'hair-accessories-b661_0', 'text' => 'Hair Accessories',],
                                    [ 'level' => 3, 'slug' => 'hats-caps-b664_0', 'text' => 'Hats & Caps',],
                                    [ 'level' => 3, 'slug' => 'jewelry-b663_0', 'text' => 'Jewelry',],
                                    [ 'level' => 3, 'slug' => 'other-b666_0', 'text' => 'Other',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'costumes-b667_0', 'text' => 'Costumes',],
                            [ 'level' => 2, 'slug' => 'school-accessories-b662_0', 'text' => 'School Accessories',],
                            [ 'level' => 2, 'slug' => 'sunglasses-b665_0', 'text' => 'Sunglasses',],
                            [ 'level' => 2, 'slug' => 'watches-b898_0', 'text' => 'Watches',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'men-b354', 'text' => 'Men', ],
                        'children' => [
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'footwear-b943', 'text' => 'Footwear', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'athletic-sports-b947_0', 'text' => 'Athletic & Sports',],
                                    [ 'level' => 3, 'slug' => 'flip-flops-b952_0', 'text' => 'Flip Flops',],
                                    [ 'level' => 3, 'slug' => 'formal-shoes-boots-b948_0', 'text' => 'Formal Shoes & Boots ',],
                                    [ 'level' => 3, 'slug' => 'loafers-slip-ons-b950_0', 'text' => 'Loafers & Slip-Ons ',],
                                    [ 'level' => 3, 'slug' => 'sandals-b951_0', 'text' => 'Sandals',],
                                    [ 'level' => 3, 'slug' => 'sneakers-b949_0', 'text' => 'Sneakers',],
                                    [ 'level' => 3, 'slug' => 'other-footwear-accessories-b94_0', 'text' => 'Other Footwear & Accessories',],
                                ],
                            ],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'men-accessories-b102', 'text' => 'Men Accessories', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'belts-b628_0', 'text' => 'Belts',],
                                    [ 'level' => 3, 'slug' => 'bracelets-wristbands-b629_0', 'text' => 'Bracelets & Wristbands',],
                                    [ 'level' => 3, 'slug' => 'cufflinks-b630_0', 'text' => 'Cufflinks',],
                                    [ 'level' => 3, 'slug' => 'handkerchiefs-b890_0', 'text' => 'Handkerchiefs',],
                                    [ 'level' => 3, 'slug' => 'hats-caps-b889_0', 'text' => 'Hats & Caps',],
                                    [ 'level' => 3, 'slug' => 'necklaces-rings-earrings-b633_0', 'text' => 'Necklaces, Rings & Earrings',],
                                    [ 'level' => 3, 'slug' => 'ties-b631_0', 'text' => 'Ties',],
                                    [ 'level' => 3, 'slug' => 'wallets-b632_0', 'text' => 'Wallets',],
                                    [ 'level' => 3, 'slug' => 'other-b627_0', 'text' => 'Other',],
                                ],
                            ],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'men-clothing-b183', 'text' => 'Men Clothing', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'athletic-and-sports-b348_0', 'text' => 'Athletic and Sports',],
                                    [ 'level' => 3, 'slug' => 'beachwear-b349_0', 'text' => 'Beachwear',],
                                    [ 'level' => 3, 'slug' => 'hoodies-sweater-b891_0', 'text' => 'Hoodies & Sweater',],
                                    [ 'level' => 3, 'slug' => 'jeans-b350_0', 'text' => 'Jeans',],
                                    [ 'level' => 3, 'slug' => 'pants-b351_0', 'text' => 'Pants',],
                                    [ 'level' => 3, 'slug' => 'shirts-b352_0', 'text' => 'Shirts',],
                                    [ 'level' => 3, 'slug' => 'shorts-b353_0', 'text' => 'Shorts',],
                                    [ 'level' => 3, 'slug' => 'sleep-lounge-b105_0', 'text' => 'Sleep & Lounge',],
                                    [ 'level' => 3, 'slug' => 'socks-b104_0', 'text' => 'Socks',],
                                    [ 'level' => 3, 'slug' => 't-shirts-b355_0', 'text' => 'T-Shirts',],
                                    [ 'level' => 3, 'slug' => 'underwear-b356_0', 'text' => 'Underwear',],
                                    [ 'level' => 3, 'slug' => 'other-b357_0', 'text' => 'Other',],
                                ],
                            ],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'women-b888', 'text' => 'Women', ],
                        'children' => [
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'footwear-b944', 'text' => 'Footwear', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'athletic-sports-b953_0', 'text' => 'Athletic & Sports',],
                                    [ 'level' => 3, 'slug' => 'flats-b959_0', 'text' => 'Flats',],
                                    [ 'level' => 3, 'slug' => 'flip-flops-b958_0', 'text' => 'Flip Flops',],
                                    [ 'level' => 3, 'slug' => 'formal-shoes-boots-b954_0', 'text' => 'Formal Shoes & Boots ',],
                                    [ 'level' => 3, 'slug' => 'heels-b960_0', 'text' => 'Heels',],
                                    [ 'level' => 3, 'slug' => 'loafers-slip-ons-b956_0', 'text' => 'Loafers & Slip-Ons ',],
                                    [ 'level' => 3, 'slug' => 'sandals-b957_0', 'text' => 'Sandals',],
                                    [ 'level' => 3, 'slug' => 'sneakers-b955_0', 'text' => 'Sneakers',],
                                    [ 'level' => 3, 'slug' => 'other-footwear-accessories-b92_0', 'text' => 'Other Footwear & Accessories',],
                                ],
                            ],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'women-accessories-b91', 'text' => 'Women Accessories', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'belts-b885_0', 'text' => 'Belts',],
                                    [ 'level' => 3, 'slug' => 'bracelets-b436_0', 'text' => 'Bracelets',],
                                    [ 'level' => 3, 'slug' => 'burugaa-dathi-and-pins-b437_0', 'text' => 'Burugaa Dathi and Pins',],
                                    [ 'level' => 3, 'slug' => 'earrings-b438_0', 'text' => 'Earrings',],
                                    [ 'level' => 3, 'slug' => 'fashu-foo-b439_0', 'text' => 'Fashu Foo',],
                                    [ 'level' => 3, 'slug' => 'hair-accessories-b440_0', 'text' => 'Hair Accessories',],
                                    [ 'level' => 3, 'slug' => 'handbag-purse-b441_0', 'text' => 'Handbag & Purse',],
                                    [ 'level' => 3, 'slug' => 'hats-caps-b883_0', 'text' => 'Hats & Caps',],
                                    [ 'level' => 3, 'slug' => 'necklaces-b442_0', 'text' => 'Necklaces',],
                                    [ 'level' => 3, 'slug' => 'rings-b443_0', 'text' => 'Rings',],
                                    [ 'level' => 3, 'slug' => 'other-b444_0', 'text' => 'Other',],
                                ],
                            ],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'women-clothing-b90', 'text' => 'Women Clothing', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'athletic-and-sports-b422_0', 'text' => 'Athletic and Sports',],
                                    [ 'level' => 3, 'slug' => 'beach-and-swimwear-b423_0', 'text' => 'Beach and Swimwear',],
                                    [ 'level' => 3, 'slug' => 'bras-b424_0', 'text' => 'Bras',],
                                    [ 'level' => 3, 'slug' => 'buruga-shawl-b585_0', 'text' => 'Buruga & Shawl',],
                                    [ 'level' => 3, 'slug' => 'dresses-b425_0', 'text' => 'Dresses',],
                                    [ 'level' => 3, 'slug' => 'hoodies-sweater-b887_0', 'text' => 'Hoodies & Sweater',],
                                    [ 'level' => 3, 'slug' => 'jeans-b426_0', 'text' => 'Jeans',],
                                    [ 'level' => 3, 'slug' => 'kurutha-and-tops-b427_0', 'text' => 'Kurutha and Tops',],
                                    [ 'level' => 3, 'slug' => 'leggings-b886_0', 'text' => 'Leggings',],
                                    [ 'level' => 3, 'slug' => 'lingerie-shapewear-b428_0', 'text' => 'Lingerie & Shapewear',],
                                    [ 'level' => 3, 'slug' => 'panties-b430_0', 'text' => 'Panties',],
                                    [ 'level' => 3, 'slug' => 'pants-b431_0', 'text' => 'Pants',],
                                    [ 'level' => 3, 'slug' => 'shorts-b432_0', 'text' => 'Shorts',],
                                    [ 'level' => 3, 'slug' => 'skirts-b923_0', 'text' => 'Skirts',],
                                    [ 'level' => 3, 'slug' => 'sleepwear-b433_0', 'text' => 'Sleepwear',],
                                    [ 'level' => 3, 'slug' => 'socks-tights-b884_0', 'text' => 'Socks & Tights',],
                                    [ 'level' => 3, 'slug' => 't-shirts-b434_0', 'text' => 'T-Shirts',],
                                    [ 'level' => 3, 'slug' => 'other-b435_0', 'text' => 'Other',],
                                ],
                            ],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'sunglasses-b95_0', 'text' => 'Sunglasses',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'travel-bags-b913', 'text' => 'Travel & Bags', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'backpacks-b916_0', 'text' => 'Backpacks',],
                            [ 'level' => 2, 'slug' => 'briefcases-b917_0', 'text' => 'Briefcases',],
                            [ 'level' => 2, 'slug' => 'gym-bags-b918_0', 'text' => 'Gym Bags',],
                            [ 'level' => 2, 'slug' => 'luggage-travel-bags-b548_0', 'text' => 'Luggage & Travel Bags',],
                            [ 'level' => 2, 'slug' => 'messenger-bags-b919_0', 'text' => 'Messenger Bags',],
                            [ 'level' => 2, 'slug' => 'school-bags-b915_0', 'text' => 'School Bags',],
                            [ 'level' => 2, 'slug' => 'travel-accessories-b914_0', 'text' => 'Travel Accessories',],
                            [ 'level' => 2, 'slug' => 'umbrellas-rain-wear-b921_0', 'text' => 'Umbrellas & Rain Wear',],
                            [ 'level' => 2, 'slug' => 'waist-packs-b920_0', 'text' => 'Waist Packs',],
                            [ 'level' => 2, 'slug' => 'other-b922_0', 'text' => 'Other',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'watches-b101_0', 'text' => 'Watches',],
                    [ 'level' => 1, 'slug' => 'other-clothing-accessories-b96_0', 'text' => 'Other Clothing & Accessories',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'computer-tablets-networking-b1', 'text' => 'Computer, Tablets & Networking', ],
                'children' => [
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'accessories-parts-b48', 'text' => 'Accessories & Parts', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'card-readers-usb-hubs-b45_0', 'text' => 'Card Readers & USB Hubs',],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'drives-storage-b43', 'text' => 'Drives & Storage', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'dvd-cd-drives-b47_0', 'text' => 'DVD & CD Drives',],
                                    [ 'level' => 3, 'slug' => 'hard-drives-external-b325_0', 'text' => 'Hard Drives - External',],
                                    [ 'level' => 3, 'slug' => 'hard-drives-laptop-b323_0', 'text' => 'Hard Drives - Laptop',],
                                    [ 'level' => 3, 'slug' => 'hard-drives-internal-b324_0', 'text' => 'Hard Drives- Internal',],
                                    [ 'level' => 3, 'slug' => 'pen-drive-b8_0', 'text' => 'Pen Drive',],
                                    [ 'level' => 3, 'slug' => 'other-b326_0', 'text' => 'Other',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'graphics-cards-b49_0', 'text' => 'Graphics Cards',],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'keyboards-mouse-input-devices-b675', 'text' => 'Keyboards, Mouse & Input Devices', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'keyboards-b676_0', 'text' => 'Keyboards',],
                                    [ 'level' => 3, 'slug' => 'mouse-b100_0', 'text' => 'Mouse',],
                                    [ 'level' => 3, 'slug' => 'mouse-keyboard-bundles-b677_0', 'text' => 'Mouse & Keyboard Bundles',],
                                    [ 'level' => 3, 'slug' => 'other-b678_0', 'text' => 'Other',],
                                ],
                            ],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'memory-b78', 'text' => 'Memory', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'laptop-memory-b79_0', 'text' => 'Laptop Memory',],
                                    [ 'level' => 3, 'slug' => 'pc-memory-b64_0', 'text' => 'PC Memory',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'monitors-b50_0', 'text' => 'Monitors',],
                            [ 'level' => 2, 'slug' => 'motherboard-b97_0', 'text' => 'Motherboard',],
                            [ 'level' => 2, 'slug' => 'power-supplies-b46_0', 'text' => 'Power Supplies',],
                            [ 'level' => 2, 'slug' => 'processor-b98_0', 'text' => 'Processor',],
                            [ 'level' => 2, 'slug' => 'projectors-b205_0', 'text' => 'Projectors',],
                            [ 'level' => 2, 'slug' => 'sound-card-b99_0', 'text' => 'Sound Card',],
                            [ 'level' => 2, 'slug' => 'speakers-headphones-b51_0', 'text' => 'Speakers & Headphones',],
                            [ 'level' => 2, 'slug' => 'webcams-b52_0', 'text' => 'Webcams',],
                            [ 'level' => 2, 'slug' => 'other-accessories-b53_0', 'text' => 'Other Accessories',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'desktop-b6_0', 'text' => 'Desktop',],
                    [ 'level' => 1, 'slug' => 'laptop-b7_0', 'text' => 'Laptop',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'laptop-accessories-b42', 'text' => 'Laptop Accessories', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'battery-b342_0', 'text' => 'Battery',],
                            [ 'level' => 2, 'slug' => 'carrying-cases-and-bags-b343_0', 'text' => 'Carrying Cases and Bags',],
                            [ 'level' => 2, 'slug' => 'charger-b344_0', 'text' => 'Charger',],
                            [ 'level' => 2, 'slug' => 'cooling-pad-b345_0', 'text' => 'Cooling Pad',],
                            [ 'level' => 2, 'slug' => 'power-adapter-b346_0', 'text' => 'Power Adapter',],
                            [ 'level' => 2, 'slug' => 'other-b347_0', 'text' => 'Other',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'networking-b38', 'text' => 'Networking', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'modems-b153_0', 'text' => 'Modems',],
                            [ 'level' => 2, 'slug' => 'routers-switches-b86_0', 'text' => 'Routers & Switches',],
                            [ 'level' => 2, 'slug' => 'servers-b180_0', 'text' => 'Servers',],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'wireless-networking-b181', 'text' => 'Wireless Networking', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'accessories-and-parts-b380_0', 'text' => 'Accessories and Parts',],
                                    [ 'level' => 3, 'slug' => 'bluetooth-b381_0', 'text' => 'Bluetooth',],
                                    [ 'level' => 3, 'slug' => 'mobile-modem-b382_0', 'text' => 'Mobile Modem',],
                                    [ 'level' => 3, 'slug' => 'routers-and-access-points-b383_0', 'text' => 'Routers and Access Points',],
                                    [ 'level' => 3, 'slug' => 'usb-dongles-b384_0', 'text' => 'USB Dongles',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'other-b182_0', 'text' => 'Other',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'printer-supplies-accessories-b41_0', 'text' => 'Printer Supplies & Accessories',],
                    [ 'level' => 1, 'slug' => 'printers-scanners-b40_0', 'text' => 'Printers & Scanners',],
                    [ 'level' => 1, 'slug' => 'software-b54_0', 'text' => 'Software',],
                    [ 'level' => 1, 'slug' => 'tablet-accessories-b238_0', 'text' => 'Tablet Accessories',],
                    [ 'level' => 1, 'slug' => 'tablets-b226_0', 'text' => 'Tablets',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'dhoani-boats-fishing-b36', 'text' => 'Dhoani, Boats & Fishing', ],
                'children' => [
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'dhoani-boats-pwc-b794', 'text' => 'Dhoani, Boats & PWC', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'dhoani-b141_0', 'text' => 'Dhoani',],
                            [ 'level' => 2, 'slug' => 'dinghies-bokkura-b144_0', 'text' => 'Dinghies & Bokkura',],
                            [ 'level' => 2, 'slug' => 'jet-ski-pwc-b795_0', 'text' => 'Jet Ski / PWC',],
                            [ 'level' => 2, 'slug' => 'passenger-safari-boats-b143_0', 'text' => 'Passenger & Safari Boats',],
                            [ 'level' => 2, 'slug' => 'speedboat-b142_0', 'text' => 'Speedboat',],
                            [ 'level' => 2, 'slug' => 'other-marine-vessels-b581_0', 'text' => 'Other Marine Vessels',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'fishing-b58', 'text' => 'Fishing', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'fish-finders-b208_0', 'text' => 'Fish Finders',],
                            [ 'level' => 2, 'slug' => 'fishing-line-b291_0', 'text' => 'Fishing Line',],
                            [ 'level' => 2, 'slug' => 'lures-and-hooks-b290_0', 'text' => 'Lures and Hooks',],
                            [ 'level' => 2, 'slug' => 'reels-b289_0', 'text' => 'Reels',],
                            [ 'level' => 2, 'slug' => 'rods-b288_0', 'text' => 'Rods',],
                            [ 'level' => 2, 'slug' => 'rods-and-reels-b287_0', 'text' => 'Rods and Reels',],
                            [ 'level' => 2, 'slug' => 'vadhu-foshi-b292_0', 'text' => 'Vadhu Foshi',],
                            [ 'level' => 2, 'slug' => 'other-b293_0', 'text' => 'Other',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'marine-engines-parts-b580', 'text' => 'Marine Engines & Parts', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'engines-b209_0', 'text' => 'Engines',],
                            [ 'level' => 2, 'slug' => 'parts-accessories-b505_0', 'text' => 'Parts & Accessories',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'parts-accessories-b577', 'text' => 'Parts & Accessories', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'anchors-b578_0', 'text' => 'Anchors',],
                            [ 'level' => 2, 'slug' => 'buoys-fenders-b584_0', 'text' => 'Buoys & Fenders',],
                            [ 'level' => 2, 'slug' => 'lifejackets-b647_0', 'text' => 'Lifejackets ',],
                            [ 'level' => 2, 'slug' => 'navigation-equipment-b207_0', 'text' => 'Navigation Equipment',],
                            [ 'level' => 2, 'slug' => 'propellers-b582_0', 'text' => 'Propellers',],
                            [ 'level' => 2, 'slug' => 'safety-b583_0', 'text' => 'Safety',],
                            [ 'level' => 2, 'slug' => 'other-b579_0', 'text' => 'Other',],
                        ],
                    ],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'electronics-b2', 'text' => 'Electronics', ],
                'children' => [
                    [ 'level' => 1, 'slug' => 'batteries-chargers-b210_0', 'text' => 'Batteries & Chargers',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'camera-photo-video-b469', 'text' => 'Camera, Photo & Video', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'digital-camera-b10_0', 'text' => 'Digital Camera',],
                            [ 'level' => 2, 'slug' => 'binoculars-telescopes-b319_0', 'text' => 'Binoculars & Telescopes',],
                            [ 'level' => 2, 'slug' => 'camcorders-b113_0', 'text' => 'Camcorders',],
                            [ 'level' => 2, 'slug' => 'camera-drone-b468_0', 'text' => 'Camera Drone',],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'camera-accessories-b65', 'text' => 'Camera Accessories', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'battery-and-charger-b264_0', 'text' => 'Battery and Charger',],
                                    [ 'level' => 3, 'slug' => 'cases-and-bags-b265_0', 'text' => 'Cases and Bags',],
                                    [ 'level' => 3, 'slug' => 'flashes-b266_0', 'text' => 'Flashes',],
                                    [ 'level' => 3, 'slug' => 'lenses-b267_0', 'text' => 'Lenses',],
                                    [ 'level' => 3, 'slug' => 'photo-studio-supplies-b268_0', 'text' => 'Photo Studio Supplies',],
                                    [ 'level' => 3, 'slug' => 'tripods-monopods-b269_0', 'text' => 'Tripods & Monopods',],
                                    [ 'level' => 3, 'slug' => 'other-accessories-b270_0', 'text' => 'Other Accessories',],
                                ],
                            ],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'electronic-components-supplies-b465', 'text' => 'Electronic Components & Supplies', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'active-components-b112_0', 'text' => 'Active Components',],
                            [ 'level' => 2, 'slug' => 'passive-components-b942_0', 'text' => 'Passive Components',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'gadgets-b110', 'text' => 'Gadgets', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'home-improvement-b313_0', 'text' => 'Home Improvement',],
                            [ 'level' => 2, 'slug' => 'key-chain-b314_0', 'text' => 'Key Chain',],
                            [ 'level' => 2, 'slug' => 'laser-pointers-b315_0', 'text' => 'Laser Pointers',],
                            [ 'level' => 2, 'slug' => 'mini-projector-b316_0', 'text' => 'Mini Projector',],
                            [ 'level' => 2, 'slug' => 'power-saver-b317_0', 'text' => 'Power Saver',],
                            [ 'level' => 2, 'slug' => 'surveillance-b318_0', 'text' => 'Surveillance',],
                            [ 'level' => 2, 'slug' => 'universal-adaptor-b320_0', 'text' => 'Universal Adaptor',],
                            [ 'level' => 2, 'slug' => 'universal-remote-b321_0', 'text' => 'Universal Remote',],
                            [ 'level' => 2, 'slug' => 'other-b322_0', 'text' => 'Other',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'home-theater-media-players-b21', 'text' => 'Home Theater & Media Players', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'dvd-cd-players-b168_0', 'text' => 'DVD & CD Players',],
                            [ 'level' => 2, 'slug' => 'hard-disk-players-b170_0', 'text' => 'Hard Disk Players',],
                            [ 'level' => 2, 'slug' => 'home-theater-systems-b167_0', 'text' => 'Home Theater Systems',],
                            [ 'level' => 2, 'slug' => 'ipod-mp3-accessories-b171_0', 'text' => 'iPod & MP3 Accessories',],
                            [ 'level' => 2, 'slug' => 'ipod-mp3-players-b11_0', 'text' => 'iPod & MP3 Players',],
                            [ 'level' => 2, 'slug' => 'speaker-systems-b169_0', 'text' => 'Speaker Systems',],
                            [ 'level' => 2, 'slug' => 'other-b172_0', 'text' => 'Other',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'satellite-cable-tv-b464_0', 'text' => 'Satellite & Cable TV',],
                    [ 'level' => 1, 'slug' => 'security-systems-b173_0', 'text' => 'Security Systems',],
                    [ 'level' => 1, 'slug' => 'televisions-b67_0', 'text' => 'Televisions',],
                    [ 'level' => 1, 'slug' => 'tv-accessories-b206_0', 'text' => 'TV Accessories',],
                    [ 'level' => 1, 'slug' => 'other-electronics-b12_0', 'text' => 'Other Electronics',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'furniture-storage-b213', 'text' => 'Furniture & Storage', ],
                'children' => [
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'bedroom-furniture-b70', 'text' => 'Bedroom Furniture', ],
                        'children' => [
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'beddings-b536', 'text' => 'Beddings', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'bedsheet-b537_0', 'text' => 'Bedsheet',],
                                    [ 'level' => 3, 'slug' => 'mattress-b540_0', 'text' => 'Mattress',],
                                    [ 'level' => 3, 'slug' => 'pillows-cases-b539_0', 'text' => 'Pillows & Cases',],
                                    [ 'level' => 3, 'slug' => 'other-b541_0', 'text' => 'Other',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'bedroom-sets-b301_0', 'text' => 'Bedroom Sets',],
                            [ 'level' => 2, 'slug' => 'beds-b302_0', 'text' => 'Beds',],
                            [ 'level' => 2, 'slug' => 'dressing-table-b808_0', 'text' => 'Dressing Table',],
                            [ 'level' => 2, 'slug' => 'wardrobes-b310_0', 'text' => 'Wardrobes',],
                            [ 'level' => 2, 'slug' => 'other-b311_0', 'text' => 'Other',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'dining-furniture-b305_0', 'text' => 'Dining Furniture',],
                    [ 'level' => 1, 'slug' => 'kids-furniture-b159_0', 'text' => 'Kids Furniture',],
                    [ 'level' => 1, 'slug' => 'kitchen-furniture-b551_0', 'text' => 'Kitchen Furniture',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'office-furniture-b202', 'text' => 'Office Furniture', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'desks-and-tables-b413_0', 'text' => ' Desks and Tables',],
                            [ 'level' => 2, 'slug' => 'filing-cabinets-b414_0', 'text' => ' Filing Cabinets',],
                            [ 'level' => 2, 'slug' => 'bookshelves-b409_0', 'text' => 'Bookshelves',],
                            [ 'level' => 2, 'slug' => 'chairs-b410_0', 'text' => 'Chairs',],
                            [ 'level' => 2, 'slug' => 'conference-tables-b411_0', 'text' => 'Conference Tables',],
                            [ 'level' => 2, 'slug' => 'cubicles-and-partitions-b412_0', 'text' => 'Cubicles and Partitions',],
                            [ 'level' => 2, 'slug' => 'other-b415_0', 'text' => 'Other',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'sitting-room-furniture-b929', 'text' => 'Sitting Room Furniture', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'bean-bags-b300_0', 'text' => 'Bean Bags',],
                            [ 'level' => 2, 'slug' => 'chairs-and-stools-b303_0', 'text' => 'Chairs and Stools',],
                            [ 'level' => 2, 'slug' => 'cupboards-and-cabinets-b304_0', 'text' => 'Cupboards and Cabinets',],
                            [ 'level' => 2, 'slug' => 'sofa-beds-b306_0', 'text' => 'Sofa Beds',],
                            [ 'level' => 2, 'slug' => 'sofas-b307_0', 'text' => 'Sofas',],
                            [ 'level' => 2, 'slug' => 'tables-b308_0', 'text' => 'Tables',],
                            [ 'level' => 2, 'slug' => 'tv-racks-b309_0', 'text' => 'TV Racks',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'storage-organization-b835', 'text' => 'Storage & Organization', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'hanging-storage-b828_0', 'text' => 'Hanging Storage',],
                            [ 'level' => 2, 'slug' => 'hooks-rails-b826_0', 'text' => 'Hooks & Rails',],
                            [ 'level' => 2, 'slug' => 'shoe-racks-hangers-b827_0', 'text' => 'Shoe Racks & Hangers',],
                            [ 'level' => 2, 'slug' => 'storage-bags-b825_0', 'text' => 'Storage Bags',],
                            [ 'level' => 2, 'slug' => 'storage-baskets-bins-b822_0', 'text' => 'Storage Baskets & Bins',],
                            [ 'level' => 2, 'slug' => 'storage-bottles-jars-b830_0', 'text' => 'Storage Bottles & Jars',],
                            [ 'level' => 2, 'slug' => 'storage-boxes-b823_0', 'text' => 'Storage Boxes',],
                            [ 'level' => 2, 'slug' => 'storage-cabinets-b829_0', 'text' => 'Storage Cabinets',],
                            [ 'level' => 2, 'slug' => 'storage-drawers-b824_0', 'text' => 'Storage Drawers',],
                            [ 'level' => 2, 'slug' => 'styrofoam-box-b837_0', 'text' => 'Styrofoam Box',],
                        ],
                    ],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'health-beauty-b111', 'text' => 'Health & Beauty', ],
                'children' => [
                    [ 'level' => 1, 'slug' => 'diet-nutrition-supplements-b725_0', 'text' => 'Diet, Nutrition & Supplements',],
                    [ 'level' => 1, 'slug' => 'fragrances-b26_0', 'text' => 'Fragrances',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'health-care-b727', 'text' => 'Health Care', ],
                        'children' => [
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'diabetes-care-b773', 'text' => 'Diabetes Care', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'glucose-monitors-b774_0', 'text' => 'Glucose Monitors',],
                                    [ 'level' => 3, 'slug' => 'insulin-injectors-b775_0', 'text' => 'Insulin Injectors',],
                                    [ 'level' => 3, 'slug' => 'lancets-b776_0', 'text' => 'Lancets',],
                                    [ 'level' => 3, 'slug' => 'monitoring-kits-b777_0', 'text' => 'Monitoring Kits',],
                                    [ 'level' => 3, 'slug' => 'socks-insoles-b779_0', 'text' => 'Socks & Insoles',],
                                    [ 'level' => 3, 'slug' => 'test-strips-b778_0', 'text' => 'Test Strips',],
                                    [ 'level' => 3, 'slug' => 'other-b780_0', 'text' => 'Other',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'face-mask-shield-b932_0', 'text' => 'Face Mask',],
                            [ 'level' => 2, 'slug' => 'first-aid-medical-supplies-b729_0', 'text' => 'First Aid & Medical Supplies',],
                            [ 'level' => 2, 'slug' => 'hand-sanitizers-b933_0', 'text' => 'Hand Sanitizers',],
                            [ 'level' => 2, 'slug' => 'insect-repellents-b733_0', 'text' => 'Insect Repellents',],
                            [ 'level' => 2, 'slug' => 'massage-relaxation-b730_0', 'text' => 'Massage & Relaxation',],
                            [ 'level' => 2, 'slug' => 'sexual-wellness-b732_0', 'text' => 'Sexual Wellness',],
                            [ 'level' => 2, 'slug' => 'sleeping-aids-b735_0', 'text' => 'Sleeping Aids',],
                            [ 'level' => 2, 'slug' => 'other-healthcare-b128_0', 'text' => 'Other Healthcare',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'makeup-b695', 'text' => 'Makeup', ],
                        'children' => [
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'eye-b720', 'text' => 'Eye', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'eyeliner-b700_0', 'text' => 'Eyeliner',],
                                    [ 'level' => 3, 'slug' => 'eyeshadow-b701_0', 'text' => 'Eyeshadow',],
                                    [ 'level' => 3, 'slug' => 'eylelashes-b702_0', 'text' => 'Eylelashes',],
                                    [ 'level' => 3, 'slug' => 'mascara-b708_0', 'text' => 'Mascara',],
                                    [ 'level' => 3, 'slug' => 'other-b722_0', 'text' => 'Other',],
                                ],
                            ],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'face-b721', 'text' => 'Face', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'blush-b698_0', 'text' => 'Blush',],
                                    [ 'level' => 3, 'slug' => 'foundation-b703_0', 'text' => 'Foundation',],
                                    [ 'level' => 3, 'slug' => 'powder-b709_0', 'text' => 'Powder',],
                                    [ 'level' => 3, 'slug' => 'other-b723_0', 'text' => 'Other',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'heena-b699_0', 'text' => 'Heena',],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'lip-b697', 'text' => 'Lip', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'lip-balm-b710_0', 'text' => 'Lip Balm',],
                                    [ 'level' => 3, 'slug' => 'lip-gloss-b711_0', 'text' => 'Lip Gloss',],
                                    [ 'level' => 3, 'slug' => 'lip-liner-b712_0', 'text' => 'Lip Liner',],
                                    [ 'level' => 3, 'slug' => 'lipstick-b713_0', 'text' => 'Lipstick',],
                                    [ 'level' => 3, 'slug' => 'other-b714_0', 'text' => 'Other',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'makeup-bags-b705_0', 'text' => 'Makeup Bags',],
                            [ 'level' => 2, 'slug' => 'makeup-brushes-b706_0', 'text' => 'Makeup Brushes',],
                            [ 'level' => 2, 'slug' => 'makeup-removers-b707_0', 'text' => 'Makeup Removers',],
                            [ 'level' => 2, 'slug' => 'makeup-sets-kits-b704_0', 'text' => 'Makeup Sets & Kits',],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'nail-b696', 'text' => 'Nail', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'manicure-pedicure-kits-b718_0', 'text' => 'Manicure & Pedicure Kits',],
                                    [ 'level' => 3, 'slug' => 'nail-art-b715_0', 'text' => 'Nail Art',],
                                    [ 'level' => 3, 'slug' => 'nail-polish-b716_0', 'text' => 'Nail Polish',],
                                    [ 'level' => 3, 'slug' => 'nail-polish-remover-b717_0', 'text' => 'Nail Polish Remover',],
                                    [ 'level' => 3, 'slug' => 'other-b719_0', 'text' => 'Other',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'other-b133_0', 'text' => 'Other',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'personal-care-b931', 'text' => 'Personal Care', ],
                        'children' => [
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'face-care-b688', 'text' => 'Face Care', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'acne-treatment-b689_0', 'text' => 'Acne Treatment',],
                                    [ 'level' => 3, 'slug' => 'cleansers-b690_0', 'text' => 'Cleansers',],
                                    [ 'level' => 3, 'slug' => 'lightening-cream-b694_0', 'text' => 'Lightening Cream',],
                                    [ 'level' => 3, 'slug' => 'masks-b692_0', 'text' => 'Masks',],
                                    [ 'level' => 3, 'slug' => 'moisturizers-b693_0', 'text' => 'Moisturizers',],
                                    [ 'level' => 3, 'slug' => 'scrubs-exfoliators-b691_0', 'text' => 'Scrubs & Exfoliators',],
                                    [ 'level' => 3, 'slug' => 'other-b599_0', 'text' => 'Other',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'feminine-care-b728_0', 'text' => 'Feminine Care',],
                            [ 'level' => 2, 'slug' => 'hair-care-b130_0', 'text' => 'Hair Care',],
                            [ 'level' => 2, 'slug' => 'nail-care-manicure-pedicure-b734_0', 'text' => 'Nail Care, Manicure & Pedicure',],
                            [ 'level' => 2, 'slug' => 'oral-care-b131_0', 'text' => 'Oral Care',],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'shaving-hair-removal-b668', 'text' => 'Shaving & Hair Removal', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'clippers-trimmers-b669_0', 'text' => 'Clippers & Trimmers',],
                                    [ 'level' => 3, 'slug' => 'electric-shavers-b670_0', 'text' => 'Electric Shavers',],
                                    [ 'level' => 3, 'slug' => 'razors-razor-blades-b671_0', 'text' => 'Razors & Razor Blades',],
                                    [ 'level' => 3, 'slug' => 'scissors-shears-b672_0', 'text' => 'Scissors & Shears',],
                                    [ 'level' => 3, 'slug' => 'waxing-supplies-b673_0', 'text' => 'Waxing Supplies ',],
                                    [ 'level' => 3, 'slug' => 'other-b674_0', 'text' => 'Other',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'skin-care-b129_0', 'text' => 'Skin Care',],
                            [ 'level' => 2, 'slug' => 'other-personal-care-b934_0', 'text' => 'Other Personal Care',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'weight-care-b132_0', 'text' => 'Weight Care',],
                    [ 'level' => 1, 'slug' => 'other-beauty-b89_0', 'text' => 'Other Beauty',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'home-garden-b69', 'text' => 'Home & Garden', ],
                'children' => [
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'arts-crafts-sewing-b467', 'text' => 'Arts,Crafts & Sewing', ],
                        'children' => [
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'sewing-knitting-b528', 'text' => 'Sewing & Knitting', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'accessories-b529_0', 'text' => 'Accessories',],
                                    [ 'level' => 3, 'slug' => 'sewing-machines-b329_0', 'text' => 'Sewing Machines',],
                                    [ 'level' => 3, 'slug' => 'yarn-b783_0', 'text' => 'Yarn',],
                                ],
                            ],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'bathroom-b71', 'text' => 'Bathroom', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'basins-vanities-b532_0', 'text' => 'Basins & Vanities',],
                            [ 'level' => 2, 'slug' => 'mirrors-b531_0', 'text' => 'Mirrors',],
                            [ 'level' => 2, 'slug' => 'showers-water-heaters-b331_0', 'text' => 'Showers & Water Heaters',],
                            [ 'level' => 2, 'slug' => 'soap-dishes-dispensers-b533_0', 'text' => 'Soap Dishes & Dispensers',],
                            [ 'level' => 2, 'slug' => 'toilets-b530_0', 'text' => 'Toilets',],
                            [ 'level' => 2, 'slug' => 'other-b534_0', 'text' => 'Other',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'cooling-air-b526', 'text' => 'Cooling & Air', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'airconditioners-b327_0', 'text' => 'Airconditioners',],
                            [ 'level' => 2, 'slug' => 'fans-b328_0', 'text' => 'Fans',],
                            [ 'level' => 2, 'slug' => 'humidifiers-b726_0', 'text' => 'Humidifiers',],
                            [ 'level' => 2, 'slug' => 'other-b527_0', 'text' => 'Other',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'curtains-blinds-b543_0', 'text' => 'Curtains & Blinds',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'food-and-beverages-b225', 'text' => 'Food and Beverages', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'beverages-b232_0', 'text' => 'Beverages',],
                            [ 'level' => 2, 'slug' => 'cake-pastry-b234_0', 'text' => 'Cake & Pastry',],
                            [ 'level' => 2, 'slug' => 'fruits-b230_0', 'text' => 'Fruits',],
                            [ 'level' => 2, 'slug' => 'local-specialties-b233_0', 'text' => 'Local Specialties',],
                            [ 'level' => 2, 'slug' => 'meat-b231_0', 'text' => 'Meat',],
                            [ 'level' => 2, 'slug' => 'seafood-b228_0', 'text' => 'Seafood',],
                            [ 'level' => 2, 'slug' => 'vegetables-b229_0', 'text' => 'Vegetables',],
                            [ 'level' => 2, 'slug' => 'other-b235_0', 'text' => 'Other',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'garden-b221', 'text' => 'Garden', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'gardening-supplies-b223_0', 'text' => 'Gardening Supplies',],
                            [ 'level' => 2, 'slug' => 'plants-and-trees-b222_0', 'text' => 'Plants and Trees',],
                            [ 'level' => 2, 'slug' => 'other-b224_0', 'text' => 'Other',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'home-decor-b557', 'text' => 'Home Decor', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'candles-holders-b559_0', 'text' => 'Candles & Holders',],
                            [ 'level' => 2, 'slug' => 'carpet-b565_0', 'text' => 'Carpet',],
                            [ 'level' => 2, 'slug' => 'clocks-b564_0', 'text' => 'Clocks',],
                            [ 'level' => 2, 'slug' => 'cushions-b560_0', 'text' => 'Cushions',],
                            [ 'level' => 2, 'slug' => 'flowers-b561_0', 'text' => 'Flowers',],
                            [ 'level' => 2, 'slug' => 'frames-b562_0', 'text' => 'Frames',],
                            [ 'level' => 2, 'slug' => 'pictures-paintings-b563_0', 'text' => 'Pictures & Paintings',],
                            [ 'level' => 2, 'slug' => 'vases-b558_0', 'text' => 'Vases',],
                            [ 'level' => 2, 'slug' => 'wallpaper-stickers-b781_0', 'text' => 'Wallpaper & Stickers',],
                            [ 'level' => 2, 'slug' => 'other-b184_0', 'text' => 'Other',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'housekeeping-b821', 'text' => 'Housekeeping', ],
                        'children' => [
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'cleaning-b520', 'text' => 'Cleaning', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'bins-b524_0', 'text' => 'Bins',],
                                    [ 'level' => 3, 'slug' => 'brooms-mops-b523_0', 'text' => 'Brooms & Mops',],
                                    [ 'level' => 3, 'slug' => 'cleaning-supplies-b522_0', 'text' => 'Cleaning Supplies',],
                                    [ 'level' => 3, 'slug' => 'vacuum-cleaners-accessories-b521_0', 'text' => 'Vacuum Cleaners & Accessories',],
                                    [ 'level' => 3, 'slug' => 'other-b525_0', 'text' => 'Other',],
                                ],
                            ],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'laundry-b515', 'text' => 'Laundry', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'clothes-hangers-b834_0', 'text' => 'Clothes Hangers',],
                                    [ 'level' => 3, 'slug' => 'clothes-pins-b832_0', 'text' => 'Clothes Pins',],
                                    [ 'level' => 3, 'slug' => 'clotheslines-b833_0', 'text' => 'Clotheslines',],
                                    [ 'level' => 3, 'slug' => 'detergent-softener-bleach-b518_0', 'text' => 'Detergent, Softener, Bleach',],
                                    [ 'level' => 3, 'slug' => 'drying-racks-b831_0', 'text' => 'Drying Racks',],
                                    [ 'level' => 3, 'slug' => 'irons-and-ironing-boards-b516_0', 'text' => 'Irons and Ironing Boards',],
                                    [ 'level' => 3, 'slug' => 'laundry-baskets-b517_0', 'text' => 'Laundry Baskets',],
                                    [ 'level' => 3, 'slug' => 'washing-machines-b330_0', 'text' => 'Washing Machines',],
                                    [ 'level' => 3, 'slug' => 'other-b519_0', 'text' => 'Other',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'pest-control-b836_0', 'text' => 'Pest Control',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'kitchen-dining-b27', 'text' => 'Kitchen & Dining', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'bakeware-b738_0', 'text' => 'Bakeware',],
                            [ 'level' => 2, 'slug' => 'coffee-tea-making-b333_0', 'text' => 'Coffee & Tea Making',],
                            [ 'level' => 2, 'slug' => 'cookware-b736_0', 'text' => 'Cookware',],
                            [ 'level' => 2, 'slug' => 'cups-glasses-b742_0', 'text' => 'Cups & Glasses',],
                            [ 'level' => 2, 'slug' => 'cutlery-utensils-b744_0', 'text' => 'Cutlery & Utensils',],
                            [ 'level' => 2, 'slug' => 'dinnerware-serving-dishes-b745_0', 'text' => 'Dinnerware & Serving Dishes',],
                            [ 'level' => 2, 'slug' => 'fridge-and-freezers-b339_0', 'text' => 'Fridge and Freezers',],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'kitchen-appliances-b739', 'text' => 'Kitchen Appliances', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'blenders-and-mixers-b332_0', 'text' => 'Blenders and Mixers',],
                                    [ 'level' => 3, 'slug' => 'cookers-steamers-b334_0', 'text' => 'Cookers & Steamers',],
                                    [ 'level' => 3, 'slug' => 'grills-fryers-b741_0', 'text' => 'Grills & Fryers',],
                                    [ 'level' => 3, 'slug' => 'kettle-and-water-heaters-b335_0', 'text' => 'Kettle and Water Heaters',],
                                    [ 'level' => 3, 'slug' => 'kitchen-scale-b336_0', 'text' => 'Kitchen Scale',],
                                    [ 'level' => 3, 'slug' => 'oven-convection-b337_0', 'text' => 'Oven - Convection',],
                                    [ 'level' => 3, 'slug' => 'oven-microwave-b338_0', 'text' => 'Oven - Microwave',],
                                    [ 'level' => 3, 'slug' => 'toasters-waffle-irons-b340_0', 'text' => 'Toasters & Waffle Irons',],
                                    [ 'level' => 3, 'slug' => 'water-coolers-filters-dispensers-b535_0', 'text' => 'Water Coolers, Filters & Dispensers',],
                                    [ 'level' => 3, 'slug' => 'other-kitchen-appliances-b740_0', 'text' => 'Other Kitchen Appliances',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'knives-cutting-b737_0', 'text' => 'Knives & Cutting',],
                            [ 'level' => 2, 'slug' => 'rice-cookers-b930_0', 'text' => 'Rice Cookers',],
                            [ 'level' => 2, 'slug' => 'storage-containers-b743_0', 'text' => 'Storage Containers',],
                            [ 'level' => 2, 'slug' => 'tableware-linen-b746_0', 'text' => 'Tableware & Linen',],
                            [ 'level' => 2, 'slug' => 'washing-cleaning-b542_0', 'text' => 'Washing & Cleaning',],
                            [ 'level' => 2, 'slug' => 'other-b341_0', 'text' => 'Other',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'lights-lighting-b809', 'text' => 'Lights & Lighting', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'chandeliers-ceiling-fixtures-b810_0', 'text' => 'Chandeliers & Ceiling Fixtures',],
                            [ 'level' => 2, 'slug' => 'lamps-shades-b811_0', 'text' => 'Lamps & Shades',],
                            [ 'level' => 2, 'slug' => 'light-bulbs-tubes-b812_0', 'text' => 'Light Bulbs & Tubes',],
                            [ 'level' => 2, 'slug' => 'outdoor-lighting-b815_0', 'text' => 'Outdoor Lighting',],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'portable-lighting-b816', 'text' => 'Portable Lighting', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'handheld-flashlight-b818_0', 'text' => 'Handheld Flashlight',],
                                    [ 'level' => 3, 'slug' => 'headlamps-b819_0', 'text' => 'Headlamps',],
                                    [ 'level' => 3, 'slug' => 'lantern-flashlight-b820_0', 'text' => 'Lantern Flashlight',],
                                    [ 'level' => 3, 'slug' => 'portable-spotlights-b813_0', 'text' => 'Portable Spotlights',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'string-novelty-lighting-b817_0', 'text' => 'String & Novelty Lighting',],
                            [ 'level' => 2, 'slug' => 'lighting-parts-accessories-b814_0', 'text' => 'Lighting Parts & Accessories',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'towels-b538_0', 'text' => 'Towels',],
                    [ 'level' => 1, 'slug' => 'other-b73_0', 'text' => 'Other',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'industrial-business-b198', 'text' => 'Industrial & Business', ],
                'children' => [
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'building-construction-b199', 'text' => 'Building & Construction', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'aggregates-b271_0', 'text' => 'Aggregates',],
                            [ 'level' => 2, 'slug' => 'bricks-b272_0', 'text' => 'Bricks',],
                            [ 'level' => 2, 'slug' => 'cement-b273_0', 'text' => 'Cement',],
                            [ 'level' => 2, 'slug' => 'cladding-b274_0', 'text' => 'Cladding',],
                            [ 'level' => 2, 'slug' => 'doors-and-windows-b275_0', 'text' => 'Doors and Windows',],
                            [ 'level' => 2, 'slug' => 'electrical-supplies-b276_0', 'text' => 'Electrical Supplies',],
                            [ 'level' => 2, 'slug' => 'elevators-and-lifts-b277_0', 'text' => 'Elevators and Lifts',],
                            [ 'level' => 2, 'slug' => 'fire-systems-b279_0', 'text' => 'Fire Systems',],
                            [ 'level' => 2, 'slug' => 'flooring-b278_0', 'text' => 'Flooring',],
                            [ 'level' => 2, 'slug' => 'glass-b280_0', 'text' => 'Glass',],
                            [ 'level' => 2, 'slug' => 'paint-and-coatings-b281_0', 'text' => 'Paint and Coatings',],
                            [ 'level' => 2, 'slug' => 'roofing-b282_0', 'text' => 'Roofing',],
                            [ 'level' => 2, 'slug' => 'steel-b283_0', 'text' => 'Steel',],
                            [ 'level' => 2, 'slug' => 'tiles-marble-granite-b284_0', 'text' => 'Tiles / Marble / Granite',],
                            [ 'level' => 2, 'slug' => 'timber-and-wood-b285_0', 'text' => 'Timber and Wood',],
                            [ 'level' => 2, 'slug' => 'other-b286_0', 'text' => 'Other',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'compressors-pumps-b545_0', 'text' => 'Compressors & Pumps',],
                    [ 'level' => 1, 'slug' => 'engine-generators-motors-b544_0', 'text' => 'Engine, Generators & Motors',],
                    [ 'level' => 1, 'slug' => 'office-b216_0', 'text' => 'Office',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'restaurant-catering-b506', 'text' => 'Restaurant & Catering', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'beverage-equipment-b507_0', 'text' => 'Beverage Equipment',],
                            [ 'level' => 2, 'slug' => 'cooking-warming-equipment-b509_0', 'text' => 'Cooking & Warming Equipment',],
                            [ 'level' => 2, 'slug' => 'cookware-kitchen-tools-b508_0', 'text' => 'Cookware & Kitchen Tools',],
                            [ 'level' => 2, 'slug' => 'refrigertation-ice-machines-b510_0', 'text' => 'Refrigertation & Ice Machines',],
                            [ 'level' => 2, 'slug' => 'restaurant-furniture-decor-b511_0', 'text' => 'Restaurant Furniture & Decor',],
                            [ 'level' => 2, 'slug' => 'tabletop-b512_0', 'text' => 'Tabletop',],
                            [ 'level' => 2, 'slug' => 'uniforms-aprons-b513_0', 'text' => 'Uniforms & Aprons',],
                            [ 'level' => 2, 'slug' => 'vending-equipment-concessions-b514_0', 'text' => 'Vending Equipment & Concessions',],
                            [ 'level' => 2, 'slug' => 'other-b204_0', 'text' => 'Other',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'retail-management-b200', 'text' => 'Retail Management', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'display-units-racks-b612_0', 'text' => 'Display Units & Racks',],
                            [ 'level' => 2, 'slug' => 'labeling-tagging-b611_0', 'text' => 'Labeling & Tagging',],
                            [ 'level' => 2, 'slug' => 'mannequins-b613_0', 'text' => 'Mannequins',],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'point-of-sale-b615', 'text' => 'Point of Sale', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'barcode-printers-supplies-b626_0', 'text' => 'Barcode Printers & Supplies',],
                                    [ 'level' => 3, 'slug' => 'barcode-scanners-b616_0', 'text' => 'Barcode Scanners',],
                                    [ 'level' => 3, 'slug' => 'cash-drawer-b623_0', 'text' => 'Cash Drawer',],
                                    [ 'level' => 3, 'slug' => 'counterfiet-detection-bill-counter-b621_0', 'text' => 'Counterfiet Detection & Bill Counter',],
                                    [ 'level' => 3, 'slug' => 'pole-display-b619_0', 'text' => 'Pole Display',],
                                    [ 'level' => 3, 'slug' => 'pos-software-b620_0', 'text' => 'POS Software',],
                                    [ 'level' => 3, 'slug' => 'pos-system-b625_0', 'text' => 'POS System',],
                                    [ 'level' => 3, 'slug' => 'programmable-keyboard-b624_0', 'text' => 'Programmable Keyboard',],
                                    [ 'level' => 3, 'slug' => 'receipt-printers-supplies-b617_0', 'text' => 'Receipt Printers & Supplies',],
                                    [ 'level' => 3, 'slug' => 'registers-monitors-b618_0', 'text' => 'Registers & Monitors',],
                                    [ 'level' => 3, 'slug' => 'other-b622_0', 'text' => 'Other',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'other-b614_0', 'text' => 'Other',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'tools-b466', 'text' => 'Tools', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'other-power-tools-b547_0', 'text' => 'Carpentry Tools & Equipment',],
                            [ 'level' => 2, 'slug' => 'hand-tools-b463_0', 'text' => 'Hand Tools',],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'power-tools-b312', 'text' => 'Power Tools', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'drills-accessories-b546_0', 'text' => 'Drills & Accessories',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'other-tools-equipment-b201_0', 'text' => 'Other Tools & Equipment',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'other-b203_0', 'text' => 'Other',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'mobile-phones-accessories-b3', 'text' => 'Mobile Phones & Accessories', ],
                'children' => [
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'accessories-b15', 'text' => 'Accessories', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'belt-holsters-clips-b650_0', 'text' => 'Belt Holsters & Clips',],
                            [ 'level' => 2, 'slug' => 'car-accessories-b485_0', 'text' => 'Car Accessories',],
                            [ 'level' => 2, 'slug' => 'cases-protection-skins-b651_0', 'text' => 'Cases, Protection & Skins',],
                            [ 'level' => 2, 'slug' => 'charger-b486_0', 'text' => 'Charger',],
                            [ 'level' => 2, 'slug' => 'data-cable-b487_0', 'text' => 'Data Cable',],
                            [ 'level' => 2, 'slug' => 'fashion-and-decoration-b488_0', 'text' => 'Fashion and Decoration',],
                            [ 'level' => 2, 'slug' => 'headset-bluetooth-b489_0', 'text' => 'Headset - Bluetooth',],
                            [ 'level' => 2, 'slug' => 'headset-wired-b490_0', 'text' => 'Headset - Wired',],
                            [ 'level' => 2, 'slug' => 'memory-card-b14_0', 'text' => 'Memory Card',],
                            [ 'level' => 2, 'slug' => 'power-bank-b747_0', 'text' => 'Power Bank',],
                            [ 'level' => 2, 'slug' => 'screen-protection-b494_0', 'text' => 'Screen Protection',],
                            [ 'level' => 2, 'slug' => 'selfie-sticks-stands-b772_0', 'text' => 'Selfie Sticks & Stands',],
                            [ 'level' => 2, 'slug' => 'smart-watches-b793_0', 'text' => 'Smart Watches',],
                            [ 'level' => 2, 'slug' => 'speakers-b492_0', 'text' => 'Speakers',],
                            [ 'level' => 2, 'slug' => 'other-b495_0', 'text' => 'Other',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'mobile-phones-b13_0', 'text' => 'Mobile Phones',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'parts-b604', 'text' => 'Parts', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'antenna-b839_0', 'text' => 'Antenna ',],
                            [ 'level' => 2, 'slug' => 'audio-jack-b840_0', 'text' => 'Audio Jack',],
                            [ 'level' => 2, 'slug' => 'battery-b484_0', 'text' => 'Battery',],
                            [ 'level' => 2, 'slug' => 'button-b841_0', 'text' => 'Button',],
                            [ 'level' => 2, 'slug' => 'camera-modules-b842_0', 'text' => 'Camera Modules',],
                            [ 'level' => 2, 'slug' => 'charging-port-b843_0', 'text' => 'Charging Port',],
                            [ 'level' => 2, 'slug' => 'ear-speaker-b844_0', 'text' => 'Ear Speaker',],
                            [ 'level' => 2, 'slug' => 'flex-cable-b605_0', 'text' => 'Flex Cable',],
                            [ 'level' => 2, 'slug' => 'frame-b845_0', 'text' => 'Frame',],
                            [ 'level' => 2, 'slug' => 'keypads-b606_0', 'text' => 'Keypads',],
                            [ 'level' => 2, 'slug' => 'lcd-screen-digitizer-b491_0', 'text' => 'LCD Screen & Digitizer',],
                            [ 'level' => 2, 'slug' => 'loud-speaker-b846_0', 'text' => 'Loud Speaker',],
                            [ 'level' => 2, 'slug' => 'motherboard-b847_0', 'text' => 'Motherboard',],
                            [ 'level' => 2, 'slug' => 'phone-cover-housing-b493_0', 'text' => 'Phone Cover / Housing',],
                            [ 'level' => 2, 'slug' => 'tools-b609_0', 'text' => 'Tools',],
                            [ 'level' => 2, 'slug' => 'vibration-motor-b848_0', 'text' => 'Vibration Motor',],
                            [ 'level' => 2, 'slug' => 'other-b610_0', 'text' => 'Other',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'phone-numbers-b140_0', 'text' => 'Phone Numbers',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'motorcycle-cars-vehicles-b4', 'text' => 'Motorcycle, Cars & Vehicles', ],
                'children' => [
                    [ 'level' => 1, 'slug' => 'bicycles-b573_0', 'text' => 'Bicycles',],
                    [ 'level' => 1, 'slug' => 'car-van-b16_0', 'text' => 'Car & Van',],
                    [ 'level' => 1, 'slug' => 'car-accessories-b62_0', 'text' => 'Car Accessories',],
                    [ 'level' => 1, 'slug' => 'motorcycle-b17_0', 'text' => 'Motorcycle',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'motorcycle-accessories-b63', 'text' => 'Motorcycle Accessories', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'battery-b894_0', 'text' => 'Battery',],
                            [ 'level' => 2, 'slug' => 'brake-systems-b371_0', 'text' => 'Brake Systems',],
                            [ 'level' => 2, 'slug' => 'cover-sets-b372_0', 'text' => 'Cover sets',],
                            [ 'level' => 2, 'slug' => 'engine-parts-b373_0', 'text' => 'Engine Parts',],
                            [ 'level' => 2, 'slug' => 'exhaust-b374_0', 'text' => 'Exhaust',],
                            [ 'level' => 2, 'slug' => 'lights-and-electricals-b375_0', 'text' => 'Lights and Electricals',],
                            [ 'level' => 2, 'slug' => 'mirrors-b376_0', 'text' => 'Mirrors',],
                            [ 'level' => 2, 'slug' => 'safety-and-security-b377_0', 'text' => 'Safety and Security',],
                            [ 'level' => 2, 'slug' => 'suspension-b378_0', 'text' => 'Suspension',],
                            [ 'level' => 2, 'slug' => 'wheels-and-parts-b379_0', 'text' => 'Wheels and Parts',],
                            [ 'level' => 2, 'slug' => 'other-b370_0', 'text' => 'Other',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'pickup-lorry-truck-b574_0', 'text' => 'Pickup, Lorry & Truck',],
                    [ 'level' => 1, 'slug' => 'rashu-pickup-b895_0', 'text' => 'Rashu Pickup',],
                    [ 'level' => 1, 'slug' => 'other-b18_0', 'text' => 'Other',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'pets-and-pet-supplies-b72', 'text' => 'Pets and Pet Supplies', ],
                'children' => [
                    [ 'level' => 1, 'slug' => 'birds-b115_0', 'text' => 'Birds',],
                    [ 'level' => 1, 'slug' => 'cages-stands-b576_0', 'text' => 'Cages & Stands',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'fish-aquarium-b784', 'text' => 'Fish & Aquarium', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'aquarium-tanks-b785_0', 'text' => 'Aquarium & Tanks',],
                            [ 'level' => 2, 'slug' => 'cleaning-maintenance-b790_0', 'text' => 'Cleaning & Maintenance',],
                            [ 'level' => 2, 'slug' => 'filters-b787_0', 'text' => 'Filters',],
                            [ 'level' => 2, 'slug' => 'fish-aquatic-pets-b114_0', 'text' => 'Fish & Aquatic Pets',],
                            [ 'level' => 2, 'slug' => 'food-b792_0', 'text' => 'Food',],
                            [ 'level' => 2, 'slug' => 'lights-bulbs-b786_0', 'text' => 'Lights & Bulbs',],
                            [ 'level' => 2, 'slug' => 'plant-decor-b116_0', 'text' => 'Plant & Decor',],
                            [ 'level' => 2, 'slug' => 'pumps-b788_0', 'text' => 'Pumps',],
                            [ 'level' => 2, 'slug' => 'other-aquarium-accessories-b791_0', 'text' => 'Other Aquarium Accessories',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'other-animals-b117_0', 'text' => 'Other Animals',],
                    [ 'level' => 1, 'slug' => 'pet-food-b237_0', 'text' => 'Pet Food',],
                    [ 'level' => 1, 'slug' => 'other-pet-supplies-b118_0', 'text' => 'Other Pet Supplies',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'sports-fitness-recreation-b56', 'text' => 'Sports, Fitness & Recreation', ],
                'children' => [
                    [ 'level' => 1, 'slug' => 'board-games-b935_0', 'text' => 'Board Games',],
                    [ 'level' => 1, 'slug' => 'gym-fitness-equipment-b59_0', 'text' => 'Gym & Fitness Equipment',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'musical-instruments-b74', 'text' => 'Musical Instruments', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'brass-instruments-b76_0', 'text' => 'Brass Instruments',],
                            [ 'level' => 2, 'slug' => 'drums-percussion-b876_0', 'text' => 'Drums & Percussion',],
                            [ 'level' => 2, 'slug' => 'guitars-string-instruments-b877_0', 'text' => 'Guitars & String Instruments',],
                            [ 'level' => 2, 'slug' => 'karaoke-entertainment-b878_0', 'text' => 'Karaoke Entertainment',],
                            [ 'level' => 2, 'slug' => 'piano-keyboards-organs-b879_0', 'text' => 'Piano, Keyboards & Organs',],
                            [ 'level' => 2, 'slug' => 'recording-equipment-b880_0', 'text' => 'Recording Equipment',],
                            [ 'level' => 2, 'slug' => 'stage-audio-lighting-b881_0', 'text' => 'Stage Audio & Lighting',],
                            [ 'level' => 2, 'slug' => 'wind-woodwind-instruments-b882_0', 'text' => 'Wind & Woodwind Instruments',],
                            [ 'level' => 2, 'slug' => 'other-musical-instruments-accessories-b75_0', 'text' => 'Other Musical Instruments & Accessories',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'skates-skateboards-scooters-b804', 'text' => 'Skates, Skateboards & Scooters', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'kick-scooters-b806_0', 'text' => 'Kick Scooters',],
                            [ 'level' => 2, 'slug' => 'self-balancing-scooters-b807_0', 'text' => 'Self Balancing Scooters',],
                            [ 'level' => 2, 'slug' => 'skateboarding-roller-skating-b805_0', 'text' => 'Skateboarding & Roller Skating',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'snooker-pool-billiard-b550_0', 'text' => 'Snooker, Pool & Billiard',],
                    [ 'level' => 1, 'slug' => 'sports-nutrition-supplements-b724_0', 'text' => 'Sports Nutrition & Supplements',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'team-sports-b936', 'text' => 'Team Sports', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'badminton-b549_0', 'text' => 'Badminton',],
                            [ 'level' => 2, 'slug' => 'basketball-b938_0', 'text' => 'Basketball',],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'football-b57', 'text' => 'Football', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'balls-b294_0', 'text' => 'Balls',],
                                    [ 'level' => 3, 'slug' => 'jersey-b295_0', 'text' => 'Jersey',],
                                    [ 'level' => 3, 'slug' => 'protective-gear-b296_0', 'text' => 'Protective Gear',],
                                    [ 'level' => 3, 'slug' => 'shoes-b297_0', 'text' => 'Shoes',],
                                    [ 'level' => 3, 'slug' => 'vests-b298_0', 'text' => 'Vests',],
                                    [ 'level' => 3, 'slug' => 'other-b299_0', 'text' => 'Other',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'volleyball-b937_0', 'text' => 'Volleyball',],
                            [ 'level' => 2, 'slug' => 'other-team-sports-b939_0', 'text' => 'Other Team Sports',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'water-sports-b642', 'text' => 'Water Sports', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'kites-kitesurfing-b188_0', 'text' => 'Kites & Kitesurfing',],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'scuba-snorkelling-b748', 'text' => 'SCUBA & Snorkelling', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'boots-gloves-b749_0', 'text' => 'Boots & Gloves',],
                                    [ 'level' => 3, 'slug' => 'buoyancy-compensators-b750_0', 'text' => 'Buoyancy Compensators',],
                                    [ 'level' => 3, 'slug' => 'dive-computers-gauges-b751_0', 'text' => 'Dive Computers & Gauges',],
                                    [ 'level' => 3, 'slug' => 'fins-b752_0', 'text' => 'Fins',],
                                    [ 'level' => 3, 'slug' => 'masks-snorkels-sets-b753_0', 'text' => 'Masks, Snorkels & Sets',],
                                    [ 'level' => 3, 'slug' => 'regulators-b754_0', 'text' => 'Regulators',],
                                    [
                                        'heading' => [ 'level' => 4, 'slug' => 'suits-b756', 'text' => 'Suits', ],
                                        'children' => [
                                            [ 'level' => 4, 'slug' => 'hoods-b758_0', 'text' => 'Hoods',],
                                            [ 'level' => 4, 'slug' => 'rash-guards-b759_0', 'text' => 'Rash Guards',],
                                            [ 'level' => 4, 'slug' => 'shorts-b760_0', 'text' => 'Shorts',],
                                            [ 'level' => 4, 'slug' => 'wetsuits-b767_0', 'text' => 'Wetsuits',],
                                            [ 'level' => 4, 'slug' => 'other-b761_0', 'text' => 'Other',],
                                        ],
                                    ],
                                    [ 'level' => 3, 'slug' => 'tanks-b755_0', 'text' => 'Tanks',],
                                    [
                                        'heading' => [ 'level' => 4, 'slug' => 'accessories-b757', 'text' => 'Accessories', ],
                                        'children' => [
                                            [ 'level' => 4, 'slug' => 'gear-bags-b764_0', 'text' => 'Gear Bags',],
                                            [ 'level' => 4, 'slug' => 'knives-b762_0', 'text' => 'Knives',],
                                            [ 'level' => 4, 'slug' => 'lights-b763_0', 'text' => 'Lights',],
                                            [ 'level' => 4, 'slug' => 'mask-defoggers-b765_0', 'text' => 'Mask Defoggers',],
                                            [ 'level' => 4, 'slug' => 'other-accessories-b766_0', 'text' => 'Other Accessories',],
                                        ],
                                    ],
                                    [ 'level' => 3, 'slug' => 'other-b187_0', 'text' => 'Other',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'surfing-b572_0', 'text' => 'Surfing',],
                            [ 'level' => 2, 'slug' => 'swimming-b645_0', 'text' => 'Swimming',],
                            [ 'level' => 2, 'slug' => 'wakeboarding-waterskiing-b646_0', 'text' => 'Wakeboarding & Waterskiing',],
                            [ 'level' => 2, 'slug' => 'windsurfing-b643_0', 'text' => 'Windsurfing',],
                            [ 'level' => 2, 'slug' => 'other-b644_0', 'text' => 'Other',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'other-sporting-goods-b60_0', 'text' => 'Other Sporting Goods',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'stationery-office-supplies-b211', 'text' => 'Stationery & Office Supplies', ],
                'children' => [
                    [ 'level' => 1, 'slug' => 'blank-cds-and-dvds-b416_0', 'text' => 'Blank CDs and DVDs',],
                    [ 'level' => 1, 'slug' => 'filing-and-binding-products-b417_0', 'text' => 'Filing and Binding Products',],
                    [ 'level' => 1, 'slug' => 'highlighters-markers-b927_0', 'text' => 'Highlighters & Markers',],
                    [ 'level' => 1, 'slug' => 'notebooks-writing-pads-b925_0', 'text' => 'Notebooks & Writing Pads',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'office-electronics-b212', 'text' => 'Office Electronics', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'copiers-b404_0', 'text' => 'Copiers',],
                            [ 'level' => 2, 'slug' => 'fax-machines-b405_0', 'text' => 'Fax Machines',],
                            [ 'level' => 2, 'slug' => 'laminating-b406_0', 'text' => 'Laminating',],
                            [ 'level' => 2, 'slug' => 'shredders-b407_0', 'text' => 'Shredders',],
                            [ 'level' => 2, 'slug' => 'other-b408_0', 'text' => 'Other',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'organizers-b418_0', 'text' => 'Organizers',],
                    [ 'level' => 1, 'slug' => 'painting-supplies-b928_0', 'text' => 'Painting Supplies',],
                    [ 'level' => 1, 'slug' => 'paper-b419_0', 'text' => 'Paper',],
                    [ 'level' => 1, 'slug' => 'pens-and-pencils-b420_0', 'text' => 'Pens and Pencils',],
                    [ 'level' => 1, 'slug' => 'tapes-adhesives-fasteners-b926_0', 'text' => 'Tapes, Adhesives & Fasteners',],
                    [ 'level' => 1, 'slug' => 'other-b421_0', 'text' => 'Other',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'toys-hobbies-b77', 'text' => 'Toys & Hobbies', ],
                'children' => [
                    [ 'level' => 1, 'slug' => 'educational-toys-b157_0', 'text' => 'Educational Toys',],
                    [ 'level' => 1, 'slug' => 'outdoors-b161_0', 'text' => 'Outdoors',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'remote-control-toys-b796', 'text' => 'Remote Control Toys', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'drones-b798_0', 'text' => 'Drones',],
                            [ 'level' => 2, 'slug' => 'rc-airplanes-b801_0', 'text' => 'RC Airplanes',],
                            [ 'level' => 2, 'slug' => 'rc-boats-b802_0', 'text' => 'RC Boats',],
                            [ 'level' => 2, 'slug' => 'rc-cars-trucks-b799_0', 'text' => 'RC Cars & Trucks',],
                            [ 'level' => 2, 'slug' => 'rc-helicopters-b800_0', 'text' => 'RC Helicopters ',],
                            [ 'level' => 2, 'slug' => 'rc-other-b160_0', 'text' => 'RC Other',],
                            [ 'level' => 2, 'slug' => 'parts-accessories-b803_0', 'text' => 'Parts & Accessories',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'soft-and-stuffed-toys-b158_0', 'text' => 'Soft and Stuffed Toys',],
                    [ 'level' => 1, 'slug' => 'toy-vehicles-diecasts-b797_0', 'text' => 'Toy Vehicles & Diecasts',],
                    [ 'level' => 1, 'slug' => 'other-b162_0', 'text' => 'Other',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'video-computer-gaming-b107', 'text' => 'Video & Computer Gaming', ],
                'children' => [
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'accessories-b108', 'text' => 'Accessories', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'battery-and-charger-b460_0', 'text' => 'Battery and Charger',],
                            [ 'level' => 2, 'slug' => 'data-and-power-cables-b461_0', 'text' => 'Data and Power Cables',],
                            [ 'level' => 2, 'slug' => 'game-controllers-b458_0', 'text' => 'Game Controllers',],
                            [ 'level' => 2, 'slug' => 'memory-b459_0', 'text' => 'Memory',],
                            [ 'level' => 2, 'slug' => 'other-b462_0', 'text' => 'Other',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'consoles-b68_0', 'text' => 'Consoles',],
                    [ 'level' => 1, 'slug' => 'games-b106_0', 'text' => 'Games',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'other-stuff-b5_0', 'text' => 'Other Stuff',],
                'children' => [],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'housing-real-estate-b19', 'text' => 'Housing & Real Estate', ],
                'children' => [
                    [ 'level' => 1, 'slug' => 'apartments-houses-for-rent-b25_0', 'text' => 'Apartments & Houses for Rent',],
                    [ 'level' => 1, 'slug' => 'room-for-rent-b601_0', 'text' => 'Room for Rent',],
                    [ 'level' => 1, 'slug' => 'guest-houses-short-stay-accomodation-b589_0', 'text' => 'Guest Houses & Short Stay Accomodation',],
                    [ 'level' => 1, 'slug' => 'kudhin-baithibbaadhinun-b603_0', 'text' => 'Kudhin Baithibbaadhinun',],
                    [ 'level' => 1, 'slug' => 'land-for-sale-lease-b88_0', 'text' => 'Land For Sale & Lease',],
                    [ 'level' => 1, 'slug' => 'office-commercial-space-b22_0', 'text' => 'Office & Commercial Space',],
                    [ 'level' => 1, 'slug' => 'roommates-wanted-b602_0', 'text' => 'Roommates Wanted',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'international-b768', 'text' => 'International', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'apartments-houses-for-rent-b769_0', 'text' => 'Apartments & Houses for Rent',],
                            [ 'level' => 2, 'slug' => 'guest-houses-short-stay-accomodation-b770_0', 'text' => 'Guest Houses & Short Stay Accomodation',],
                            [ 'level' => 2, 'slug' => 'kudhin-baithibbaadhinun-b771_0', 'text' => ' Kudhin Baithibbaadhinun',],
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
                    [ 'level' => 1, 'slug' => 'architectural-home-design-b127_0', 'text' => 'Architectural & Home Design',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'beauty-sports-and-wellness-b858', 'text' => 'Beauty, Sports and Wellness', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'aerobics-and-zumba-classes-b860_0', 'text' => 'Aerobics and Zumba Classes ',],
                            [ 'level' => 2, 'slug' => 'beauty-services-b504_0', 'text' => 'Beauty Services',],
                            [ 'level' => 2, 'slug' => 'gym-and-fitness-studios-b892_0', 'text' => 'Gym and Fitness Studios',],
                            [ 'level' => 2, 'slug' => 'martial-arts-classes-b861_0', 'text' => 'Martial Arts Classes',],
                            [ 'level' => 2, 'slug' => 'personal-trainer-b197_0', 'text' => 'Personal Trainer',],
                            [ 'level' => 2, 'slug' => 'racket-stringing-b196_0', 'text' => 'Racket Stringing',],
                            [ 'level' => 2, 'slug' => 'sports-coach-b859_0', 'text' => 'Sports Coach',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'business-services-b849', 'text' => 'Business Services', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'accounting-auditing-b109_0', 'text' => 'Accounting & Auditing',],
                            [ 'level' => 2, 'slug' => 'advertising-marketing-b499_0', 'text' => 'Advertising & Marketing',],
                            [ 'level' => 2, 'slug' => 'business-consulting-b191_0', 'text' => 'Business Consulting',],
                            [ 'level' => 2, 'slug' => 'cargo-handling-logistics-b9_0', 'text' => 'Cargo Handling & Logistics',],
                            [ 'level' => 2, 'slug' => 'computer-telecom-networking-b192_0', 'text' => 'Computer & Telecom Networking',],
                            [ 'level' => 2, 'slug' => 'courier-and-delivery-b164_0', 'text' => 'Courier and Delivery',],
                            [ 'level' => 2, 'slug' => 'foreign-labor-recruitment-services-b124_0', 'text' => 'Foreign Labor Recruitment & Services',],
                            [ 'level' => 2, 'slug' => 'legal-b31_0', 'text' => 'Legal',],
                            [ 'level' => 2, 'slug' => 'printing-b125_0', 'text' => 'Printing',],
                            [ 'level' => 2, 'slug' => 'secretarial-services-b121_0', 'text' => 'Secretarial Services',],
                            [ 'level' => 2, 'slug' => 'security-services-b175_0', 'text' => 'Security Services',],
                            [ 'level' => 2, 'slug' => 'signboard-making-b145_0', 'text' => 'Signboard Making',],
                            [ 'level' => 2, 'slug' => 'software-development-b119_0', 'text' => 'Software Development',],
                            [ 'level' => 2, 'slug' => 'transport-b139_0', 'text' => 'Transport',],
                            [ 'level' => 2, 'slug' => 'web-graphics-design-b126_0', 'text' => 'Web & Graphics Design',],
                            [ 'level' => 2, 'slug' => 'web-hosting-b138_0', 'text' => 'Web Hosting',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'domestic-services-b862', 'text' => 'Domestic Services', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'babysitting-and-child-care-b190_0', 'text' => 'Babysitting and Child Care',],
                            [ 'level' => 2, 'slug' => 'cooking-b863_0', 'text' => 'Cooking',],
                            [ 'level' => 2, 'slug' => 'laundry-b500_0', 'text' => 'Laundry',],
                            [ 'level' => 2, 'slug' => 'maid-b864_0', 'text' => 'Maid',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'event-services-b851', 'text' => 'Event Services', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'cake-b869_0', 'text' => 'Cake',],
                            [ 'level' => 2, 'slug' => 'catering-takeaway-b20_0', 'text' => 'Catering & Takeaway',],
                            [ 'level' => 2, 'slug' => 'corporate-event-planners-b853_0', 'text' => 'Corporate Event Planners',],
                            [ 'level' => 2, 'slug' => 'florists-b854_0', 'text' => 'Florists',],
                            [ 'level' => 2, 'slug' => 'function-venues-b852_0', 'text' => 'Function Venues',],
                            [ 'level' => 2, 'slug' => 'live-bands-and-musicians-b856_0', 'text' => 'Live Bands and Musicians',],
                            [ 'level' => 2, 'slug' => 'party-planners-b857_0', 'text' => 'Party Planners',],
                            [ 'level' => 2, 'slug' => 'party-supplies-decoration-b137_0', 'text' => 'Party Supplies & Decoration',],
                            [ 'level' => 2, 'slug' => 'sound-and-lighting-b855_0', 'text' => 'Sound and Lighting',],
                            [ 'level' => 2, 'slug' => 'video-photography-b34_0', 'text' => 'Video & Photography',],
                            [ 'level' => 2, 'slug' => 'wedding-planners-b134_0', 'text' => 'Wedding Planners',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'food-services-b23_0', 'text' => 'Food Services',],
                    [ 'level' => 1, 'slug' => 'healthcare-services-b501_0', 'text' => 'Healthcare Services',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'industrial-b37', 'text' => 'Industrial', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'boat-building-related-services-b648_0', 'text' => 'Boat Building & Related Services',],
                            [ 'level' => 2, 'slug' => 'welding-engineering-b136_0', 'text' => 'Welding & Engineering',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'rental-services-b850', 'text' => 'Rental Services', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'catering-utensils-supplies-b875_0', 'text' => 'Catering Utensils & Supplies',],
                            [ 'level' => 2, 'slug' => 'chairs-tables-b874_0', 'text' => 'Chairs & Tables',],
                            [ 'level' => 2, 'slug' => 'dhoani-and-marine-vessels-b871_0', 'text' => 'Dhoani and Marine Vessels',],
                            [ 'level' => 2, 'slug' => 'pickup-heavy-vehicles-b872_0', 'text' => 'Pickup & Heavy Vehicles',],
                            [ 'level' => 2, 'slug' => 'tools-equipment-b873_0', 'text' => 'Tools & Equipment',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'repairs-maintenance-household-work-b634', 'text' => 'Repairs, Maintenance & Household Work', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'aircon-servicing-repair-b637_0', 'text' => 'Aircon Servicing & Repair',],
                            [ 'level' => 2, 'slug' => 'building-construction-b635_0', 'text' => 'Building & Construction',],
                            [ 'level' => 2, 'slug' => 'camera-repair-b194_0', 'text' => 'Camera Repair',],
                            [ 'level' => 2, 'slug' => 'carpentry-b641_0', 'text' => 'Carpentry',],
                            [ 'level' => 2, 'slug' => 'computer-repairs-b29_0', 'text' => 'Computer Repairs',],
                            [ 'level' => 2, 'slug' => 'dhonna-machine-maraamathukurun-b639_0', 'text' => 'Dhonna Machine Maraamathukurun',],
                            [ 'level' => 2, 'slug' => 'electrical-wiring-b638_0', 'text' => 'Electrical & Wiring',],
                            [ 'level' => 2, 'slug' => 'fen-motor-maraamathukurun-b640_0', 'text' => 'Fen Motor Maraamathukurun',],
                            [ 'level' => 2, 'slug' => 'housekeeping-cleaning-b174_0', 'text' => 'Housekeeping & Cleaning',],
                            [ 'level' => 2, 'slug' => 'movers-b587_0', 'text' => 'Movers',],
                            [ 'level' => 2, 'slug' => 'pest-control-b497_0', 'text' => 'Pest Control',],
                            [ 'level' => 2, 'slug' => 'phone-servicing-unlocking-b120_0', 'text' => 'Phone Servicing & Unlocking',],
                            [ 'level' => 2, 'slug' => 'plumbing-b636_0', 'text' => 'Plumbing',],
                            [ 'level' => 2, 'slug' => 'television-repair-b865_0', 'text' => 'Television Repair',],
                            [ 'level' => 2, 'slug' => 'vehicle-garage-b893_0', 'text' => 'Vehicle Garage',],
                            [ 'level' => 2, 'slug' => 'video-game-repair-services-b195_0', 'text' => 'Video Game Repair & Services',],
                            [ 'level' => 2, 'slug' => 'general-other-b30_0', 'text' => 'General / Other',],
                        ],
                    ],
                    [ 'level' => 1, 'slug' => 'tailoring-b123_0', 'text' => 'Tailoring',],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'travel-recreation-b649', 'text' => 'Travel & Recreation', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'island-overview-information-b598_0', 'text' => 'Island Overview & Information',],
                            [ 'level' => 2, 'slug' => 'picnic-fishing-trips-other-activities-b586_0', 'text' => 'Picnic, Fishing Trips & Other Activities',],
                            [ 'level' => 2, 'slug' => 'restaurants-cafes-b590_0', 'text' => 'Restaurants & Cafes',],
                            [
                                'heading' => [ 'level' => 3, 'slug' => 'transport-vehicle-rental-b591', 'text' => 'Transport & Vehicle Rental', ],
                                'children' => [
                                    [ 'level' => 3, 'slug' => 'bicycle-rental-b592_0', 'text' => 'Bicycle Rental',],
                                    [ 'level' => 3, 'slug' => 'ferry-naalu-boat-b593_0', 'text' => 'Ferry & Naalu Boat',],
                                    [ 'level' => 3, 'slug' => 'motorcycle-rental-b594_0', 'text' => 'Motorcycle Rental',],
                                    [ 'level' => 3, 'slug' => 'speedboat-dhoani-rental-b596_0', 'text' => 'Speedboat & Dhoani Rental',],
                                    [ 'level' => 3, 'slug' => 'taxi-car-rental-b595_0', 'text' => 'Taxi & Car Rental',],
                                ],
                            ],
                            [ 'level' => 2, 'slug' => 'travel-packages-b32_0', 'text' => 'Travel Packages',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'tuition-personal-development-b866', 'text' => 'Tuition & Personal Development', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'cooking-baking-classes-b868_0', 'text' => 'Cooking & Baking Classes',],
                            [ 'level' => 2, 'slug' => 'driving-classes-b867_0', 'text' => 'Driving Classes',],
                            [ 'level' => 2, 'slug' => 'training-b122_0', 'text' => 'Training',],
                            [ 'level' => 2, 'slug' => 'tuition-b39_0', 'text' => 'Tuition',],
                        ],
                    ],
                    [
                        'heading' => [ 'level' => 2, 'slug' => 'other-services-b870', 'text' => 'Other Services', ],
                        'children' => [
                            [ 'level' => 2, 'slug' => 'audio-video-recording-b193_0', 'text' => 'Audio & Video Recording',],
                            [ 'level' => 2, 'slug' => 'buying-from-abroad-b135_0', 'text' => 'Buying from Abroad',],
                            [ 'level' => 2, 'slug' => 'vehicle-registration-roadworthiness-b33_0', 'text' => 'Vehicle Registration & Roadworthiness',],
                            [ 'level' => 2, 'slug' => 'other-services-b35_0', 'text' => 'Other Services',],
                        ],
                    ],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'wanted-b87', 'text' => 'Wanted', ],
                'children' => [
                    [ 'level' => 1, 'slug' => 'books-and-magazines-b445_0', 'text' => 'Books and Magazines',],
                    [ 'level' => 1, 'slug' => 'clothing-and-accessories-b446_0', 'text' => 'Clothing and Accessories',],
                    [ 'level' => 1, 'slug' => 'computer-laptop-and-accessories-b447_0', 'text' => 'Computer Laptop and Accessories',],
                    [ 'level' => 1, 'slug' => 'electronics-b448_0', 'text' => 'Electronics',],
                    [ 'level' => 1, 'slug' => 'mobile-phones-and-accessories-b449_0', 'text' => 'Mobile Phones and Accessories',],
                    [ 'level' => 1, 'slug' => 'motorcycles-cars-and-accessories-b450_0', 'text' => 'Motorcycles- Cars and Accessories',],
                    [ 'level' => 1, 'slug' => 'real-estate-office-space-and-commercial-b452_0', 'text' => 'Real Estate - Office Space and Commercial',],
                    [ 'level' => 1, 'slug' => 'real-estate-rooms-and-apartment-b453_0', 'text' => 'Real Estate - Rooms and Apartment',],
                    [ 'level' => 1, 'slug' => 'services-b454_0', 'text' => 'Services',],
                    [ 'level' => 1, 'slug' => 'sporting-goods-b455_0', 'text' => 'Sporting Goods',],
                    [ 'level' => 1, 'slug' => 'toys-kids-and-hobbies-b456_0', 'text' => 'Toys Kids and Hobbies',],
                    [ 'level' => 1, 'slug' => 'other-stuff-b457_0', 'text' => 'Other Stuff',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'business-opportunities-b176', 'text' => 'Business Opportunities', ],
                'children' => [
                    [ 'level' => 1, 'slug' => 'business-for-sale-b177_0', 'text' => 'Business for Sale',],
                    [ 'level' => 1, 'slug' => 'websites-for-sale-b502_0', 'text' => 'Websites for Sale',],
                    [ 'level' => 1, 'slug' => 'other-b179_0', 'text' => 'Other',],
                ],
            ],
            [
                'heading' => [ 'level' => 1, 'slug' => 'announcements-events-b227', 'text' => 'Announcements & Events', ],
                'children' => [
                    [ 'level' => 1, 'slug' => 'announcements-b567_0', 'text' => 'Announcements',],
                    [ 'level' => 1, 'slug' => 'lost-and-found-b568_0', 'text' => 'Lost and Found',],
                    [ 'level' => 1, 'slug' => 'promotions-b569_0', 'text' => 'Promotions',],
                    [ 'level' => 1, 'slug' => 'trade-exhibitions-fairs-b570_0', 'text' => 'Trade Exhibitions & Fairs',],
                    [ 'level' => 1, 'slug' => 'other-b571_0', 'text' => 'Other',],
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
