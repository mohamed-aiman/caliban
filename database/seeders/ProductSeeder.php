<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Photo;
use App\Models\Store;
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
        $allCategories = Category::where('is_selectable', true)->select('id')->get()->pluck('id')->toArray();

        $stores = Store::all()->pluck('id')->toArray();

        // $selectableCategories = Category::whereNotIn('parent_id', $allCategories)
        //     ->get()->pluck('id')
        //     ->toArray();

        // dd($selectableCategories, $allCategories);

        $photos = Photo::select('id')->get()->pluck('id')->toArray();
        $locations = Location::select('id')->get()->pluck('id')->toArray();

        $titles = $this->getTitleTexts();

        for ($i = 0; $i < 100; $i++) {
            $product = Product::factory()->create([
                'title' => $titles[array_rand($titles)],
                'category_id' => $this->faker->randomElement($allCategories),
                'description' => $this->getDescription(),
                'seller_id' => $this->faker->randomElement($stores),
            ]);

            if ($i != 0) {
                $product->photos()->attach(
                    $this->faker->randomElements(
                            $photos, $this->faker->numberBetween(1, 5)
                        )
                );
            } else {
                //using same batch of photos for first product
                
                $s3Photos = Photo::whereIn('id', [28,29,30,31])->get();
                if ($s3Photos->count() == 4) {
                    //s3 photos
                    $product->photos()->attach([28,29,30,31]);
                } else {
                    //local photos
                    $product->photos()->attach([1,2,3,4]);
                }

            }
            
            $product->locations()->attach(
                $this->faker->randomElements(
                        $locations, $this->faker->numberBetween(1, 5)
                    )
            );

        }

        // $products = Product::with('photos', 'locations')->get()->toArray();
    }

    private function getDescription()
    {
        return '<p>APPLE IPHONE 13 PRO 128GB 256GB + Apple 1year Warranty Free delivery shop 7781353</p><p>HOTLINE 7781353 | 9775757 SHOP 7700441</p><p>check all items price hampseshop.com&nbsp;</p><p>&nbsp;</p><p><strong>REGIS</strong></p><p>APPLE IPHONE 13 PRO MAX 128GB</p><p><strong>PRICE 20,499MVR</strong></p><p>APPLE IPHONE 13 PRO MAX 256GB</p><p><strong>PRICE 22,499MVR</strong></p><p>APPLE IPHONE 13 PRO MAX 512GB</p><p><strong>PRICE 26999 MVR</strong></p><p>APPLE IPHONE 13 PRO 128GB</p><p><strong>PRICE 18,499 MVR</strong></p><p>APPLE IPHONE 13 PRO 256GB</p><p><strong>PRICE 20,499&nbsp;MVR</strong></p><p>TERED BUSINESS</p><p>Registered Business in accordance with the Law of Maldives.</p><p>We provide a bill of sale with all our purchases upon request.&nbsp;</p><p><u>Search Hamps in Google Maps for our Outlet location.</u></p><p>&nbsp;</p><p><strong>GENIUNE PRODUCT</strong></p><p>A brand-new, unused, unopened, undamaged item in its original packaging</p><p>(where packaging is applicable).</p><p><br></p><p><strong>WARRANTY CLAUSE</strong></p><p>Smart phones sold in Hamps are sold with one-year international warranty.&nbsp;</p><p>We&nbsp;provide a testing period of 72hrs. During this testing period, a reported factory&nbsp;</p><p>defected product will be replaced or refunded from our outlet after a proper</p><p>diagnose by our technicians. However, any factory defected product reported</p><p>after the said&nbsp;72hrs will be handled under the one-year international warranty.</p><p><br></p><p><strong>DELIVERY CLAUSE</strong></p><p>Smart Phones and Laptops are delivered island wide without any delivery charge.&nbsp;</p><p>We also deliver to Boats, Ferries and Speed Launches.</p><p><br></p><p><strong>BANKING DETAILS</strong></p><p>BML MVR&nbsp;7730000086848</p><p>BML USD 773000008904</p>';
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


    protected function getTitleTexts()
    {
        return [
            'Paper Bag Victoria Secret',
            '"Double Tape 3M VHB 12 mm x 4,5 m ORIGINAL / DOUBLE FOAM TAPE"',
            'Maling TTS Canned Pork Luncheon Meat 397 gr',
            'Daster Batik Lengan pendek - Motif Acak / Campur - Leher Kancing (DPT001-00) Batik karakter Alhadi',
            'Nescafe \xc3\x89clair Latte 220ml',
            'CELANA WANITA  (BB 45-84 KG)Harem wanita (bisa cod)',
            'Jubah anak size 1-12 thn',
            'KULOT PLISKET SALUR /CANDY PLISKET /WISH KULOT PREMIUM /KULOT PELANGI PREMIUM/HIEKA KULOT',
            '"[LOGU] Tempelan kulkas magnet angka, tempelan angka magnet"',
            'BIG SALE SEPATU PANTOFEL KULIT KEREN KERJA KANTOR LAKI PRIA COWOK DINAS RESMI FORMAL PESTA KICKERS',
            'Atasan Rajut Wanita LISDIA SWEATER',
            'PASHMINA KUSUT RAWIS POLOS CRINKLE SHAWL MURAH BANGET',
            'PASHMINA KUSUT RAWIS POLOS CRINKLE SHAWL MURAH BANGET PART 2',
            'Lampu led t5 Speedometer Dashboard Motor Mobil 5050 Speedo Bright',
            'Charger VIZZ VZ-TC11 / batok charger vizz 1A ORIGINAL REAL KAPASITAS',
            'Korek Kuping LED untuk balita CherryBabyKidsShop SP LC',
            'MARKS & SPENCER - Rose Hand & Body Lotion 250 ml',
            '"Saffron 0,25 gr s.d 2 gr Super Negin Premium Quality Original"',
            'HnKfashion Sweater Hoodie WHO Printing BabyTerry - Fit L',
            'Madame Gie MakeUp Blush On BY GISELL',
            'Safi Dermasafe Night Moisturiser 50 gr',
            'Kangaroo Teflon / Allu Fry Pan 18 cm - KG652',
            'CHOCO BALL LAGIE COKLAT Lagie Grosir Cokelat Lagie Murah Chocoball Kiloan Chocobal Coklat Kiloan 1Kg',
            '[INCLUDE PAJAK] NCT DREAM RELOAD ALBUM',
            'Stand Hanger Multifungsi - Tiang Gantungan Baju Jaket Syal 9 Hook',
            'Sambal Petis Bumbu Udang Pedas Boyya 270 gram Petis Siap Saji Bogajaya',
            'Masker Medis 3ply Earloop (50pcs) - Masker 3ply Disposable isi 50pcs - Masker 3ply Murah',
            '[Shiyan] mainan gigitan bayi set pack baby teether melatih gigi bayi diatas 3 bulan atau lebih',
            'Pakaian Dalam Cewek Wings Bra  Bra Tempel Seamless  Push Up Bra  BH Wanita IMPORT',
            'WINGs BRA-BRA TEMPEL SEAMLESS - PUSH UP BRA - STRAPLESS WING BRA - BRA TEMPEL - BH TEMPEL',
            'Molina Kaftan / YADITA SPARKLE KAFTAN / KEANU DIAMOND KAFTAN / Talisha Kaftan',
            'B33F My Food Shop Shopping Trolley - ST. 003 troli mainan edukasi anak keranjang belanja',
            'Alat Facial Wajah 5 in 1 / Face Beauty Care Massager 5 in 1 JK',
            'Citra Tone Up Pearly White Body Lotion 180 ml / 180ml',
            'Jam Tangan Pria Sporty Quicksilver Ocean Day Date Kulit',
            'CHIL KID GOLD VANILA 800GR',
            'Laneige Cica Sleeping Mask Sample 10ml Original Masker Wajah Leneige Masker Tidur Lanege',
            'Benton Fermentation Eye Cream 30ml',
            'Soti Antiseptic Spray 100ml',
            'Pelindung Lutut Bayi | Kaos Kaki Baby Knee Pad Protector',
            'SOMEBYMI AHA-BHA-PHA 30 DAYS MIRACLE ACNE CLEAR BODY CLEANSER 400ML',
            'Masker Scuba Korea Anti Polusi & Debu Bahan Scuba',
            'HEADSET SAMSUNG AKG S8 VIP9 / HANDSFREE SAMSUNG HYBRID GALAXY S8',
            'Kitoderm Facial Soap Acne Tea Tree Oil (Hijau)  - sabun muka berjerawat',
            'SENKA Perfect Whip Facial Foam (Shiseido)',
            'TRACK RACER THOMAS SUPER MOTORDROME I',
            'Marcks Teens Compact Powder',
            'COOCAA LED TV 40 inch - Android 9.0 - Smart TV - FullHD - Infinity View - Netflix (Model 40S6G)',
            'Kaos kaki baby karakter 0-6bulan bahan super soft import',
            'Aloevera kiloan gel aloe vera curah lidah buaya extract clinically grade bahan hand sanitizer',
            'ARSHOP MAYCREATE MOISTURIZING UV SPRAY 150ML (1 KG MUAT 6PCS)',
            'Lemari Pakaian Plastik Olymplast Odc 04 Susun 4 Multicolor A3B2 Alumunium Susun Geser',
            'HHG Kacamata Thug Life Double Mosaic Sunglasses Kaca mata Hitam Wanita Pria Unisex Import',
            'GT MAN - BOXER PKR MISTY - GTM 04',
            'KEDAS BEAUTY BODY SERUM BER BPOM',
            'Botol Antis 30 Ml (KEMASAN 25 pcs @Rp 1199) BEST PRODUCT PRODUKSI',
            'DZUVIA TUNIK / NEDA TUNIK',
            'TUNIK DZUVIA KANCING HIDUP SYARI MOSCREPE PREMIUM',
            'Packing Kardus Tambahan - Packing Ekstra Kardus - Packing Pengaman Agar Tidak Bocor',
            'TAMBAHAN PACKING KARDUS/BUBBLEWRAP / Centralbandung',
            'LCD Jangka Sorong Digital Caliper Vernier Sigmat Kaliper',
            'La Tulipe Acne Soothing Mist - 60ml',
            'CHARGER XIAOMI ORIGINAL FAST CHARGING QC 3.0 5V 2.5A / 9V 2A',
            'TZUKI SOAP 1 PCS',
            '"MIAO ANTICRACK / ANTI CRACK CASE FOR ALL TYPE / SOFTCASE SOFT CASE CASING BENING TPU KETEBALAN 0,8MM"',
            'Nova NS-216 Alat Cukur Janggut Shaver Hair Clipper Mesin Cukur Kumis Jenggot Cukuran cas',
            'Anti Blue Light Film Sony Xperia XZ1 XZ3 XZ/XZ2 Premium XA2 Plus/Ultra Xperia 1 10 Plus Screen Guard',
            'YOU Golden Age Revitalizing Night Cream 30g[Overnight Skin Reviving Complex]',
            'TAS SELEMPANG WANITA SOPHIE MARTIN KULIT MURAH MAROON AMITEE T5299M2 DISKON MEMBER PROMO TERMURAH',
            'CUKA APEL BRAGG [MURNI 100% 60 ML]',
            '(SHOELACE) Tali Sepatu Vans Motif Chakerboard',
            'NAOMI / naomy OUTER LONG  KARDIGAN LINE RAJUT AGATA',
            'Bantal Olus Pillow Bayi - Bantal Anti Peyang untuk Terapi dan Kesehatan Bayi',
            '"Mandisa Wine, PANASIA SCARF (Superfine Voal Hijab Premium)"',
            'The Body Shop Chinese Ginseng & Rice Clarifying Mask 15Ml',
            'SABUN TZUKI',
            'Erigo T-Shirt Quality Black',
            'BSB gantungan hp strap phone tali leher motif sport all type hp',
            'Set Boneka Jari Binatang Hewan Finget Puppet Mainan Edukasi Anak Bayi Balita PAUD Alat Mendongeng',
            'Islamic Parenting - Aqwam',
            'Totebag tote bag BTS BT21 Cooky Koya Mang Chimmy Van',
            'PENGANTAR AKUNTANSI 2 Adaptasi Indonesia  edisi 4 by:WARREN  ... REEVE',
            'Spon blender / Sponge beauty blender / spons makeup PREMIUM',
            'Sandal Gladiator Tali Lebar Import 1606-3A',
            'Nova NS 216 Alat Mesin Cukur Rambut Multifungsi kumis jenggot dan rambut',
            '\xe2\x9d\xa4 RATU \xe2\x9d\xa4 MAYCREATE MOISTURIZING SPRAY - LOTION SPRAY MAY CREATE 150ML ORIGINAL',
            'Crystallure Supreme Revitalizing Oil Serum 30ml',
            'VOLT METER',
            'Kacamata Google / Kacamata Goggle Per Pcs',
            '[GARANSI 6 BULAN] ECLE Impor Termometer Infrared Alat Pengukur Suhu tubuh dahi CE',
            'TummyTrimmer Alat Pengencang Dan Pengecil Perut Lengan Paha Body',
            '[LOKAL] DOMMO - D1360 Dompet TESSA - Dompet Lipat Wanita MORYMONY',
            'Buku Metode Penelitian Kuantitatif Kualitatif dan R&D - Prof Sugiyono',
            'Wimiu BH Bra Menyusui Zemira BRM 1388',
            'Pasta Gigi Ciptadent Maxy 12 Plus Fresh Mint 190g',
            'Parfum Mobil Botol VLEO SCENTS',
            '(Bundling 2 Pcs) Acnol Lotion 10Ml Acne Lotion Obat Jerawat',
            'MAYCREATE MOISTURIZING LOTION/WHITENING SUNSCREEN SPF 50',
            '"SABUN PEMUTIH TZUKI ORIGINAL PENGHILANG JERAWAT, ANTI AGING DAN FLEK HITAM"',
            'Tzuki Beauty Soap',
            '"[Per Pc] Kiss Beauty Cat Claw Set 3in1 Eyeshadow, Blush On, Lipcream"',
            'COMOTOMO PINK/GREEN 150ML SINGLE PACK BOTTLE',
            'HE060 POUCH GANTUNG / Korean Underwear Pouch banyak sekat / GANTUNGAN SERBAGUNA',
            'DASTER KATUN KARTUN KARAKTER / DRESS WANITA BUSUI',
            'Gesper Ikat Pinggang Pria Canvas Army Military Tactical 125cm - MU056',
            'Miluota Tali Ikat Pinggang Canvas Army Military Tactical 125cm',
            'Miluota Tali Ikat Pinggang Canvas Army Military Tactical 125cm MU056',
            'Tali Ikat Pinggang Pria Canvas Army Military Tactical 125cm',
            'Aroma Terapi Pengharum Ruangan Merek Josmine / Aroma Pengharum Ruangan',
            'Reed Diffuser Aromatherapy Pengharum Ruangan Merek Josmine / Pengharum Ruangan Aroma Josmine',
            'Baso Aci 69 Tulang Rangu',
            'YANG LAGI HITS DICARI GAN Termurah Kurta Pria Cowok Muslim Kasual Formal Lengan l.625',
            'Spidol SNOWMAN Whiteboard Marker',
            '4 5 6 7 8 9 tahun celana panjang anak chino pants gymboree coklat',
            'Wipol 750 ml botol',
            'Natur Hair Tonic Ginseng dan Aloe Vera 90ml',
            'COD Dot Buah Bayi Empeng Buah Gigitan Bayi / Dot Buah Silikon Untuk Bayi PB02',
            '[ Promo Flash Sale ] Luvita Dress | Size S M L XL | Dress Terlaris | Moscrepe HQ | Fashion Muslim',
            'BAGGY JEANS CELANA JEAN PLAIN BOYFRIEND MURAH WANITA MUSLIMAH IMPORT MURAH',
            '1KG = 7PCS | GEYSA PANTS / CELANA STRADI / CELANA SALUR SELEBGRAM',
            '1KG BISA 7PCS | GEYSA PANTS / CELANA STRADI / CELANA SALUR SELEBGRAM',
            '832P - FLEXIBLE Sambungan Kran FLEXIBLE irit air Keran Splash shower--168--',
            'Set Piyama Sexy dengan Celana Pendek',
            'Petis Boyya Surabaya',
            'BAJ JAM TANGAN APPLE WATCH IPHONE RUBBER IMPORT TOUCH SCREEN LED DIGITAL PRIA WANITA GROSIR',
            'Pantene Conditioner 3 Minutes Miracle Quantum Total Damage Care 180 ml [P&G]',
            'FS Beras Setra Wangi Premium 5kg',
            'PAKET KACAMATA FASHION + LENSA PHOTOCHROMIC / BLUERAY',
            'Acnoc Acneser Spot Gel 15g',
            'Pengait Sprei Karet Jepitan Pengencang Sudut Sprei Sheet Gripper R23',
            'FOOMEE headset QA06 wired headset stereo sound',
            'Maybelline Fit Me! Liquid Concealer MakeUp - 10 Light (Dengan Coverage Tinggi & Hasil Natural)',
            'DISPENSER SABUN 2 TABUNG 2 IN 1/DISPENSER SABUN KOTAK SENTUH UNIK',
            'CLB / GB GLOW EMBOS KEMASAN BARU ORIGINAL',
            'Wardah Everyday Fruity Sheer Lip Balm Strawberry 4g',
            'Headset / Handsfree U19 macaron / Macaroon Mate Color Hifi Extra Bass',
            'STROLLER LABEILLE LIGHT',
            'Handuk Mandi Mutia 70x140 70 140 Tidak Bisa Pilih Warna Random',
            'Bakso Sapi Super Special eSseM Food isi 50',
            'TURUN HARGA! ROBOT GIGA 9 DAN 7 ADA HELIKOPTER KEREN ABIS JIKA JADI KADO',
            'Philips Accessories for Blender - HR2939/55',
            'POCKET FILE MULTI HOLE ZIP A5 8072 08 BANTEX',
            'Nibs Cokelat Kekinian 50 gr',
            '[500ML]QOLE HS002 Level of Sterilization 99.9% Hand Sanitizer Gel - Certificate',
            'Masker Hijab Cantik Bettina 3ply headloop',
            'Ice Cream Tower Es Krim Mainan Anak Murah',
            'Emina Glossy Stain 01 Autumn Bell',
            'TONER BADAN SH COSMETICS TONER WHITENING  100ml',
            'Souvenir Dzikir Pagi & Petang [ Pustaka Arafah ] Riniaga',
            'JESINA DRESS MAYOUTFIT',
            'ALKOHOL SWAB ALKOHOLSWAB BOX',
            'ALKOHOL SWAB PER BOX. TISUE ALKOHOL ANTI BAKTERI  steril kapas alkohol OneMed',
            'Pembalut Herbal AVAIL Merah/Pink Night Use (per bungkus)',
            'CQ56 - 24 PCS / SET Kuku Palsu Smile Snoopy Gradien Potongan Kuku Palsu Simulasi Lem Alpukat R',
            '[PROMO 1 HARI] SABUN DHAFF ACNE | DHAFFI BEAUTY SOAP | SABUN BEXINDO GREENTEA BEAUTY EXPOSURE',
            'Mainan Ice Cream Tower',
            'OVERALL MILA MIDI OUTER ROK TUTU MOSCREPE PREMIUM',
            '[BS] BISA COD KPOP BTS BT21 Sticker Warna Warni Cooky Tata Stiker',
            'SPEAKER POLYTRON PMA 9505 / PMA9505 [BLUETOOTH / AUX / USB / KARAOKE / RADIO FM] (GARANSI RESMI)',
            'Roughneck CJ032 Navy Mind Control Coach Jacket',
            'Best Seller!! TOP AMANDA LENGAN PANJANG /SABRINA SERUT /BAJU WANITA',
            'DNM 5 Warna Black Coffee Gray Eyebrow Enhancers Gel Cosmetic',
            'SWALLOW BALL KAMPER',
            'khusus live total 2 kg',
            'Wardah Acnederm Pore Blackhead Balm',
            'Lingerie Gstring Babydoll Terbaru Ukuran M L XLl',
            'SIKAT pembersih sedotan stainless Brush pembersih sedotan besi murah',
            'Termurah Eric summers neo gracella gamis gracella ceruti gamis polos set khimar',
            'LONG OVERALL VENDETA ROK PANJANG JEANS PREMIUM',
            'GAMIS PLISKET ANAK PEREMPUAN 3-10 TAHUN/PAKAIAN ANAK/BAJU MUSLIM ANAK ANAK / BLUS ANAK',
            'Kapsul Susut Lemak - Menurunkan Berat Badan - Herbal Diet',
            'Charger OPPO Original Fast Charging Micro USB',
            'BUKU AKTIVITAS MENULIS BALITA',
            '5 pcs Uang mainan mahar / uang replika/uang uangan  / duit mainan',
            'Speaker Subwoofer Audio Tecnix SPK-S080 Subwoofer Speaker 2.1 Channel Design',
            'HANASUI Serum Gold Jaya Mandiri',
            'Belfoods Uenaaak Nugget Ayam Stick 500gr',
            'Dazzling White Pemutih Gigi Teeth Whitening Essence Serum - A544 [Putih]',
            'KAOS KAKI ANAK 5906 SOREX KIDS',
            'Headset Headphone Robot RE101 RE101S Wired Earphone Bass Android iPhone Original - Garansi 1 Tahun',
            'MUKENA POLOS MUTIARA DAISY',
            'Karpet Refleksi Pijat Telapak Kaki',
            'MASKER KOMEDO  GELATIN by PICNIC.ID 10 gr',
            'ELE 182 TAS SELEMPANG KEKINIAN TAS WANITA  IMPORT G1415 - BQ 2600',
            'IKAT RAMBUT SPIRAL IMPORT / IKAT RAMBUT WANITA',
            'MUKENA ANAK LOL LED 3-6thn',
            'hijab niqob wahyu by safira hijabnj',
            'AS Bantal Pijat 8 Bola Massage Pillow Mobil dan Rumah Car Home Bantal Pijat Leher Punggung Portable',
            'SAMYUWAN PENGGEMUK BADAN',
            'Skin Aqua UV Moisture Milk 40g SPF 50',
            'BLABLABLA Alat Pijat Refleksi Kepala Bahan Metal Head Massager Bokoma Massage Relaksasi - ISG',
            'Wardah Refill Instaperfect Matte Fit Powder Foundation (100% Original)',
            'Tango Long Wafer 130 gr',
            'Dot / Empeng Wide Neck Bahan Silikon untuk Bayi',
            '3M VHB Double Tape Automotive 4900 tebal 1.1 mm size 24mm x 4.5m - 1 Pcs - Merah',
            'Jeans Anak 7/8 Wisker 141618/7-10 tahun',
            'NutriSari Markisa (10Sch) @14gr',
            'MamyPoko Perekat Royal Soft - L 62 - Popok Tape',
            'INFINIX HOT 9 Play 2/32 & 3/64 & 4/64  GARANSI RESMI',
            'Vitalis Perfumed Body Wash 100ml',
            'Cairan Softlens Sedang Cairan Solutions ( Random O2 / Polylab )',
            'KAIN STOKING POLOS / NYLON STOCKING FLOWER',
            'Celana training olahraga kolor pendek pria dewasa jumbo / celana kolor pria pendek dewasa jumbo',
            'ChinaTown - Timbangan Kopi Bumbu Dapur Emas Digital Kitchen Scale 1kg 0.1g i-2000 Coffee Teh Gold',
            'Tshirt Currently Kaos Wanita',
            'M031 Alarm anti maling',
            '"Kertas thermal 57x30 mm / Kertas Struk 58x30 mm printer bluetooth polos, SPOTS, EDC BRI 57 X 30"',
            'AM377 Jepitan Gorengan Dengan Tirisan Minyak',
            'Sandal (Sendal) Masjid Musholla Wudhu Wakaf Sedekah - Sandal Jepit SJW 10',
            'ISOTONIK DRINK ISOPLUS 350ML BOTOL',
            'Kapas Filter Aquarium Aquascape 2 lapis Sutera Sutra Hijau Premium',
            'Bubble Wrap ( Hanya tambahan packing)',
            'Philips Avent Bottle Natural 260ml/9oz',
            'Sandisk Flashdisk CZ50 - 32 GB',
            'Viva Queen Eye Base Gel',
            'Pokana Pants M32 / L28 / XL24 Reguler Surprise Design / Baby Happy Pants M34+4 / L30+4 / XL26+4',
            'Samsung Galaxy A10 A20 A30 A40 A50 A70 M10 M20 M30 Silicone Soft Matte Phone Case Casing Back Cover',
            'Kertas Mewarnai Lukisan Pasir Warna Sand Painting Kecil Mainan Anak Edukasi DiasahToys',
            'Rara tunik / tunik kotak / tunik busui /',
            'GAMIA AZRA ELZATTA GAMIS POLOS HITAM',
            'Oppo A9 A5 2020 R15 Pro F9 A7 R9 Plus Marble Ultra-Thin Gradient Tempered Glass Cover Phone Case',
            'Bola Lampu LED - PREMIER 3 watt Hannochs',
            'SWEATER MURAH - IMAGINE HOODIE - SWEATER HOODIE - SWEATER KEKINIAN - GROSIR JAKET PRIA WANITA',
            '910 Nineten Noru 1.5  Sepatu Running for Men Abu Muda Putih',
            'REPACK ORI CAT FOOD ORICAT FOOD 1KG MAKANAN KUCING ORI CAT',
            'Some By Mi Yuja Niacin 30 Days Brightening Trial Kit - Yuja Niacin Kit Original 100%',
            'Bubel warp',
            'PLAZA KOREA - KIMCHI SAWI FRESH 500GR - MAKANAN KOREA',
            'SARUNG TANGAN RAJUT TOUCHSCREEN POLOS WARNA',
            'SELSUN Yellow Double Impact 100ml / Shampoo',
            '100% Cocoa Dark Chocolate Monggo 80g| Cokelat Hitam 100% Kakao| Coklat Diet | Cemilan Sehat | Keto',
            '100% Cocoa Dark Chocolate Monggo 80g| Cokelat Hitam 100% Kakao| Coklat Makanan Diet Keto Indonesia',
            '100% Cocoa Dark Unsweetened Chocolate Monggo 80g| Cokelat Hitam 100% Kakao| Coklat Premium Indonesia',
            'TS101 - TAS GOYAVE TRANSPARAN PVC IMPORT MURAH HANDBAG FASHION JEPANG',
            'BATTERY LENOVO A6000 BL242 ORIGINAL',
            'LILIN LED / LILIN ELEKTRIK / CANDLE LED / LED CANDLE',
            'Buku Anak - 100% Siap Masuk TK - Full color',
            'Lampu Jamur / Lampu Tidur / Lampu Hias / Lampu Avata',
            'HLG HL WARNA GRADASI clip on 55cm hair clip warna highlight rambut palsu klip',
            'HLP hair clip WARNA POLOS highlight rambut palsu klip',
            'HAPPY CALL GRILL Alat pemangang serbaguna',
            'Blueband cake&cookies 2kg(kaleng)',
            'Kurma sukari ember 850 gram',
            '[COD]Ready Stock Mini Nano Water Mist Sprayer Facial Steamer Beauty Spray USB Rechargeable SAWU',
            'KEMEJA ANAK LAKI-LAKI  Merk Gymboree/Bobo Kids/oshkosh size 1-7thn',
            'Random - CP piyama doraemon starmoon - fit to L ld104 - Piyama Cp Wanita',
            'SHE OWNS THE DEVIL PRINCE',
            'Keju whincheez @250g',
            'Anker Powerbank PowerCore II Slim 10000mAh QC 3.0 A1261',
            'Make Up Bursh Set - Kuas Masker Wajah Gagang Bening 1Pcs',
            'Korset Stagen Perut Multi Fungsi  By Sofie',
            'Spidol Joyko CLP-04 Color Pen 12 Warna Washable Mudah di hapus',
            'Nescafe classic',
            'FAIR & LOVELY CREAM MOUSTURIZER PELEMBAP WAJAH MULTI VITAMIN 50G',
            'Healthy Choice Beras Merah (1Kg)',
            '3pcs Jepit Rambut Model Bunga Dengan Mutiara Untuk Wanita',
            'Korset YUTIND LEBIH LEBAR & JUMBO Pelangsing Pengecil Perut 901B / Stagen 901 B (Produk Golden Nick)',
            'Natur Hair Serum 60 Ml',
            'KERANJANG BAJU LAUNDRY LIPAT SERBAGUNA CANVAS LAUNDRY BAG',
            'Pepsodent Sensitive Expert Whitening 100 gr / 100gr',
            'Morinaga Chil Kid Gold 800gr Vanilla',
            '(3PCS) ORI JAPAN GENIE BRA / GENIE BRA ORIGINAL JAPAN WITH STIKER HIJAU ( SUMMER - CLASSIC - PASTEL)',
            '[BUNDLE ISI 3] LIBBY 3stel Baju / Oblong Pendek + Celana Pendek',
            'Habbat Nigellive Habbasyi plus Zaitun isi 100 kapsul ( Jinten hitam plus Zaitun )',
            'VEGER Powerbank X103 10500mAh 2.4A Slim 2 Ports USB Output Real Capacity Power Bank',
            'Master rem supra   Supra X  Kharisma  Supra X 125 KET',
            'Pot Bunga Gentong 20 Warna Putih',
            'Singlet Anak Agree Kids 019 Cewek & Cowok | Kaos Dalam Anak Balita |Lx#',
            'Celana Pendek Pria Sport Running / Training Bola Futsal',
            '#COD# Espio Collagen Soap ORIGINAL',
            'ChinaTown - Rak Sudut Tempel Serbaguna Kamar Mandi Toilet Corner Rack Storage',
            'POWER BANK ROBOT RT130 (10.000mAh) BLACK',
            'TISU TEMPERED GLASS 2 IN 1 (isi 10)',
            'Original Xiaomi Redmi Airdots TWS Bluetooth 5.0 Earbuds Sport Earphone Headphone',
            '11.11 SUPER BIGSALE \xe2\x80\x9cH-108\xe2\x80\x9d sepatu sneakers wanita/ sneakers putih/ sepatu putih wanita',
            '"VIVA Cleansing Milk, VIVA Air Mawar, VIVA Face Toner 100ml"',
            'Raket Badminton Bulutangkis Flypower Legend 09',
            'Sprei katun lokal motif terbaru bahan adem uk. 200x200 180x200 160x200 120x200 t.25 (KODE ) S7H7',
            '\xf0\x9f\x87\xb2\xf0\x9f\x87\xa8MG\xf0\x9f\x87\xb2\xf0\x9f\x87\xa8 Jam Tangan  Fashion Wanita Rantai Strap Emas Silver Dial Logam Fashion JT12',
            'Rak Dinding DIY Serbaguna - Rak Dinding Vintage Serbaguna MB641',
            'X05 Rak sepatu gantungan payung',
            'OKHISHOP - Piyama Pajamas CP Satin Velvet',
            'Panci Wajan Goreng Frypan Maxim Valentino 18 CM',
            'PLASTIK STANDING POUCH 12X20/KEMASAN PLASTIK SNACK ZIPLOCK KLIP BERDIRI',
            'HAND CREAM HAND LOTION IMAGES/ROREC',
            'Jas Hujan BAMBU - Jas Hujan Stelan Jaket Celana Bambu - Jas Hujan Plastik Murah',
            'Tulip Milk Chocolate Compound 1kg',
            'Kacang Mete Mede mentah 1kg',
            'ELBER ACC136 JEPIT RAMBUT FASHION WANITA JEPIT RAMBUT MODEL X SILANG JEPIT RAMBUT MURAH BATAM IMPORT',
            'MASKER KAIN NON MEDIS 3 PLY MOTIF READY STOCK (PART 3) BY AZHANIA',
            'TOPI NIKE POLOS-TOPI OLAHRAGA SPORT MURAH',
            'JETE Headset Cello Super bass Handsfree Stereo',
            'NIKI BLOUSE',
            'Baterai Battery Batre Sony Xperia Z3 / D6603 / D6653 ORIGINAL',
            'MY001-  KARDIGAN RAJUT HALUS KNIT CARDIGAN  OUTTER',
            'Mede original mateng super 1kg',
            'Daster Manohara Panjang Motif Daun Etnik Bali',
            'DIY Wallsticker Whiteboard / Stiker Papan Tulis Putih',
            'DNM EYELINER WATERPROOF QUICK DRYING',
            'LIBBY BABY - 3STEL TRAVEL AROUND UNIVERSE Setelan Oblong Singlet',
            'Tabita travel/mini/tabita skincare/trial tabita glow original',
            '(TERMURAH) 10GRAM BPOM MASKER PEEL OFF PEELOFF MASK PHILOCALY SKIN',
            'Tas Selempang Quilted Bahan Kulit Quilted Kualitas Tinggi',
            '(TUBE 60gr) HANASUI NATURGO MASK TUBE / Naturgo black tube 60gr - NATURGO LIGHTENING PEEL OF MASK',
            'Charger Aki Mobil Wet Dry Lead Acid Digital Smart Battery Charger 12V6',
            'TP-LINK TL-SF1008D 8-Port 10/100M TPLINK Switch Hub 8Port 8 Port',
            'IMPLORA CHEEK & LIPTINT - IMPLORA LIP TINT ORIGINAL BPOM',
            'TANGO Wafer Renyah Cokelat / Cheese / Strawberry / Vanilla / Bubble Gum 47 Gram',
            'Daster Arab Tunik Teby by Teby',
            'Bumbu tradisional asli GERAK TANI 90 gram',
            '\xe2\x9c\x85cod Speaker bluetooth portabel Fleco f6 speaker MP3 speaker aktif radio superbas bergaransi cod',
            '[\xe2\x9c\xa8] 400ml Botol Pump Kompresi untuk Shampo / Kamar Mandi',
            'BOTOL ANTIS / BOTOL SANITIZER NATURAL/BOTOL TONER  30 ML TUTUP FLIPTOP MURAH PVC',
            'KARBOL PEMBERSIH LANTAI CAIRAN DISINFEKTAN WIPOL BOTOL 450 ML',
            'Pensil Warna JOYKO Panjang 48 Warna',
            'Chiayo Muesli Homemade 300gr',
            'Kikkoman All Purpose Soy Sauce 150 ml | Kecap Asin Jepang Botol | Kikoman Shoyu Seasoning',
            'Fujifilm Instax Mini 11',
            'Bee123 Kain lap kanebo',
            'Kardus 15x10x5 cm DC',
            'FACIAL WASH NORMAL( THERASKIN)',
            'Bib Bohobaby \xe2\x80\xa2 Bib bahan katun lembut',
            'MORYMONY KIMORA WAISTBAG - Tas Pinggang Wanita',
            'Bebelove gold 2 700gr',
            'AFI - EC - LongSleeve Santuy',
            'Bolde Mixer Super Mix Turbo',
            'Uno Card',
            'PP Lite Kertas Fotocopy A4 75gr - 1 Ream (500 lembar)',
            'Pota - Mixed Sweet Potato Chips Brown Sugar Balado 50gr - Organik Chips',
            '[MURAH] Slayer / Sapu Tangan Bikers',
            'ARASTA GLOW BPOM ORIGINAL 100% ( KEMASAN BARU SUDAH BPOM )',
            'KARET KUCIR PREMIUM',
            'Toner Collagen plus Vit. C & E WHITENING 100 ML',
            'JAM TANGAN ROLEX COUPLE',
            'Oral B Sikat gigi anak bayi stages 1 2 3',
            'Tunik UNI (Bisa COD) Bahan Babyterry Halus Kualitas Bagus FIT TO XL (LD 105-110)Saku Kanan Kiri - NG',
            'LANEIGE Lip Sleeping Mask 20g',
            'Fibro Dusdusan Easy Fiber Drink Minuman Berserat untuk Diet dan Detox Kesehatan',
            'Organic Chia Seed in Jar 110 gr - Namaste Organic',
            'SARIMI ISI 2 MI KUAH RASA BASO SAPI 115g',
            'Jas Hujan Poncho Lengan Celana Varia Merk Gajah / Elephant',
            'Bantalan Alas Duduk Ventilasi Silikon Gel Cloud Posture Cushion EGGSIT',
            'kaos atasan anak   hello kity 2_9thn',
            'Viva Air Mawar 100 ml',
            'Pastel candy basic case oppo f9 a5s a7 a12 realme c2 a1k a3s a5 a9 2020 f11 vivo y12 y15 y17 y91 y95',
            'ADAPTOR LAPTOP ACER 19v-3.42A NOTEBOOK CHARGER 19 VOLT - 3.42 ampere',
            'chandrasurya TUSPIN BUNGA 7 Hijab Jarum Jilbab Aksesoris Wanita Korea Muslim Cantik',
            'TERMURAH DI JKT! KIRIM LANGSUNG! Enervon C Multivitamin + Active ( Vitamin C ) ORI 100%',
            'Kabel data micro usb tali sepatu 3meter',
            'Meja Belajar Anak Karakter / Meja Lipat Anak Karakter / Meja Laptop / Minimalis Serbaguna',
            '[350gr] E34 Rak Gantung persegi serbaguna model persegi kamar mandi tanpa bor',
            '"Kampas rem paket depan + belakang  vario cbs, beat f1, beat pop, vario 125, beat esp, beat street"',
            'meteran kain baju 150m jahit pakaian badan pengukur panjang bahan',
            'Buku Anak - Cerita Binatang - Dongeng Edukasi Islami - Penerbit Jabal',
            'SEGI EMPAT BELLA SQUARE',
            'Desktop storage keranjang multifungsi desktop box organizer',
            'QnC Jelly Gamat di  Kota Bandung di Kab Bandung Original Jaminan Uang Kembali. QnC Jelly Jeli Gamat',
            'Khimar tikap hijab ORI CANTIKA',
            'Ventela Public Low Maroon',
            'Vitamin B1 liqunox 100 ML',
            'SMART CHOICE CELEMEK Apron Celemek Anti Air Motif Kartun Untuk Memasak',
            'St. Ives - Share in Jar',
            '[Jakarta] My Bottle + Pouch Warna Infused Water 500ml - Botol Minum 1kg 9 Pc',
            'Frisian Flag Karya 456 Vanila 400 Gr Box 400 800 1200',
            'NEW ARRIVAL!! RANSEL BLACKPINK BTS KPOK TAS IMPORT TAS SEKOLAH TAS RANSEL WANITA ( GRATIS POM POM )',
            'Aero Bed/ Car Air Bed / Kasur Angin Mobil / Kasur Angin Portable mobil E-3 FREE POMPA ANGIN',
            'Soft Bumper Case Vivo S1 V17 V15 Y91C Z1 Pro Y19 Y17 Y15 Y12 Y93 Y95 Fashion Matte Slim Silicone | LC',
            'Murah Botol Minum Olahraga Sepeda 750ml - KS200334 Berkualitas',
            'TaffSPORT TREK Botol Minum Olahraga Sepeda 750ml - 30A12',
            'Medicated Oil Four Season 40ml',
            'Beach Hut Lotion Sunblock Spf 36 - 40ml',
            '"SALEP SRITI ORIGINAL ~ OBAT SALEP GATAL,PANU,KUDIS,KURAP"',
            'Masker hijab tali karet lusinan /isi 12 pcs',
            'Sasa sambal pedas sachet 24*9gr',
            'Original Omiland Gendongan Bayi Samping Print Mono Chevron',
            'Sauna suit murah',
            'CETAKAN PANGSIT PASTEL DUMPLING GYOZA MOLD',
        ];
    }
}
