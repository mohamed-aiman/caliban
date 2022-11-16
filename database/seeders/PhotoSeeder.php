<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $photos = json_decode($this->s3PhotosJson());
        // $photos = json_decode($this->local20PhotosJson());
        $photos = json_decode($this->local5PhotosJson());

        foreach ($photos as $photo) {
            Photo::create((array) $photo);
        }
    }

    public function local5PhotosJson()
    {
        return '[
            {
                "id": 1,
                "file_name": "photo_1.jpeg",
                "url": "/storage/photo_1.jpeg",
                "large_url": "/storage/photo_1.jpeg",
                "medium_url": "/storage/photo_1.jpeg",
                "thumbnail_url": "/storage/photo_1.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:16:34.000000Z",
                "updated_at": "2022-10-15T05:16:34.000000Z"
            },
            {
                "id": 2,
                "file_name": "photo_2.jpeg",
                "url": "/storage/photo_2.jpeg",
                "large_url": "/storage/photo_2.jpeg",
                "medium_url": "/storage/photo_2.jpeg",
                "thumbnail_url": "/storage/photo_2.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:16:54.000000Z",
                "updated_at": "2022-10-15T05:16:55.000000Z"
            },
            {
                "id": 3,
                "file_name": "photo_3.jpeg",
                "url": "/storage/photo_3.jpeg",
                "large_url": "/storage/photo_3.jpeg",
                "medium_url": "/storage/photo_3.jpeg",
                "thumbnail_url": "/storage/photo_3.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 4,
                "file_name": "photo_4.jpeg",
                "url": "/storage/photo_4.jpeg",
                "large_url": "/storage/photo_4.jpeg",
                "medium_url": "/storage/photo_4.jpeg",
                "thumbnail_url": "/storage/photo_4.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 5,
                "file_name": "photo_5.jpeg",
                "url": "/storage/photo_5.jpeg",
                "large_url": "/storage/photo_5.jpeg",
                "medium_url": "/storage/photo_5.jpeg",
                "thumbnail_url": "/storage/photo_5.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            }
        ]';
    }

    public function local20PhotosJson()
    {
        return '[
            {
                "id": 1,
                "file_name": "photo_1.jpeg",
                "url": "/storage/photo_1.jpeg",
                "large_url": "/storage/photo_1.jpeg",
                "medium_url": "/storage/photo_1.jpeg",
                "thumbnail_url": "/storage/photo_1.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:16:34.000000Z",
                "updated_at": "2022-10-15T05:16:34.000000Z"
            },
            {
                "id": 2,
                "file_name": "photo_2.jpeg",
                "url": "/storage/photo_2.jpeg",
                "large_url": "/storage/photo_2.jpeg",
                "medium_url": "/storage/photo_2.jpeg",
                "thumbnail_url": "/storage/photo_2.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:16:54.000000Z",
                "updated_at": "2022-10-15T05:16:55.000000Z"
            },
            {
                "id": 3,
                "file_name": "photo_3.jpeg",
                "url": "/storage/photo_3.jpeg",
                "large_url": "/storage/photo_3.jpeg",
                "medium_url": "/storage/photo_3.jpeg",
                "thumbnail_url": "/storage/photo_3.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 4,
                "file_name": "photo_4.jpeg",
                "url": "/storage/photo_4.jpeg",
                "large_url": "/storage/photo_4.jpeg",
                "medium_url": "/storage/photo_4.jpeg",
                "thumbnail_url": "/storage/photo_4.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 5,
                "file_name": "photo_5.jpeg",
                "url": "/storage/photo_5.jpeg",
                "large_url": "/storage/photo_5.jpeg",
                "medium_url": "/storage/photo_5.jpeg",
                "thumbnail_url": "/storage/photo_5.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 6,
                "file_name": "photo_6.jpeg",
                "url": "/storage/photo_6.jpeg",
                "large_url": "/storage/photo_6.jpeg",
                "medium_url": "/storage/photo_6.jpeg",
                "thumbnail_url": "/storage/photo_6.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 7,
                "file_name": "photo_7.jpeg",
                "url": "/storage/photo_7.jpeg",
                "large_url": "/storage/photo_7.jpeg",
                "medium_url": "/storage/photo_7.jpeg",
                "thumbnail_url": "/storage/photo_7.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 8,
                "file_name": "photo_8.jpeg",
                "url": "/storage/photo_8.jpeg",
                "large_url": "/storage/photo_8.jpeg",
                "medium_url": "/storage/photo_8.jpeg",
                "thumbnail_url": "/storage/photo_8.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 9,
                "file_name": "photo_9.jpeg",
                "url": "/storage/photo_9.jpeg",
                "large_url": "/storage/photo_9.jpeg",
                "medium_url": "/storage/photo_9.jpeg",
                "thumbnail_url": "/storage/photo_9.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 10,
                "file_name": "photo_10.jpeg",
                "url": "/storage/photo_10.jpeg",
                "large_url": "/storage/photo_10.jpeg",
                "medium_url": "/storage/photo_10.jpeg",
                "thumbnail_url": "/storage/photo_10.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 11,
                "file_name": "photo_11.jpeg",
                "url": "/storage/photo_11.jpeg",
                "large_url": "/storage/photo_11.jpeg",
                "medium_url": "/storage/photo_11.jpeg",
                "thumbnail_url": "/storage/photo_11.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 12,
                "file_name": "photo_12.jpeg",
                "url": "/storage/photo_12.jpeg",
                "large_url": "/storage/photo_12.jpeg",
                "medium_url": "/storage/photo_12.jpeg",
                "thumbnail_url": "/storage/photo_12.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 13,
                "file_name": "photo_13.jpeg",
                "url": "/storage/photo_13.jpeg",
                "large_url": "/storage/photo_13.jpeg",
                "medium_url": "/storage/photo_13.jpeg",
                "thumbnail_url": "/storage/photo_13.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 14,
                "file_name": "photo_14.jpeg",
                "url": "/storage/photo_14.jpeg",
                "large_url": "/storage/photo_14.jpeg",
                "medium_url": "/storage/photo_14.jpeg",
                "thumbnail_url": "/storage/photo_14.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 15,
                "file_name": "photo_15.jpeg",
                "url": "/storage/photo_15.jpeg",
                "large_url": "/storage/photo_15.jpeg",
                "medium_url": "/storage/photo_15.jpeg",
                "thumbnail_url": "/storage/photo_15.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 16,
                "file_name": "photo_16.jpeg",
                "url": "/storage/photo_16.jpeg",
                "large_url": "/storage/photo_16.jpeg",
                "medium_url": "/storage/photo_16.jpeg",
                "thumbnail_url": "/storage/photo_16.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 17,
                "file_name": "photo_17.jpeg",
                "url": "/storage/photo_17.jpeg",
                "large_url": "/storage/photo_17.jpeg",
                "medium_url": "/storage/photo_17.jpeg",
                "thumbnail_url": "/storage/photo_17.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 18,
                "file_name": "photo_18.jpeg",
                "url": "/storage/photo_18.jpeg",
                "large_url": "/storage/photo_18.jpeg",
                "medium_url": "/storage/photo_18.jpeg",
                "thumbnail_url": "/storage/photo_18.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 19,
                "file_name": "photo_19.jpeg",
                "url": "/storage/photo_19.jpeg",
                "large_url": "/storage/photo_19.jpeg",
                "medium_url": "/storage/photo_19.jpeg",
                "thumbnail_url": "/storage/photo_19.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 20,
                "file_name": "photo_20.jpeg",
                "url": "/storage/photo_20.jpeg",
                "large_url": "/storage/photo_20.jpeg",
                "medium_url": "/storage/photo_20.jpeg",
                "thumbnail_url": "/storage/photo_20.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            }
        ]';
    }


    public function s3PhotosJson()
    {
        return '[
            {
                "id": 1,
                "file_name": "3_1-143365_1665810993.jpg",
                "url": "/storage/photo_1.jpeg",
                "large_url": "/storage/photo_1.jpeg",
                "medium_url": "/storage/photo_1.jpeg",
                "thumbnail_url": "/storage/photo_1.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:16:34.000000Z",
                "updated_at": "2022-10-15T05:16:34.000000Z"
            },
            {
                "id": 2,
                "file_name": "3_2-113827_1665811014.jpg",
                "url": "/storage/photo_1.jpeg",
                "large_url": "/storage/photo_1.jpeg",
                "medium_url": "/storage/photo_1.jpeg",
                "thumbnail_url": "/storage/photo_1.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:16:54.000000Z",
                "updated_at": "2022-10-15T05:16:55.000000Z"
            },
            {
                "id": 3,
                "file_name": "3_3-162943_1665811032.jpg",
                "url": "/storage/photo_1.jpeg",
                "large_url": "/storage/photo_1.jpeg",
                "medium_url": "/storage/photo_1.jpeg",
                "thumbnail_url": "/storage/photo_1.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:17:13.000000Z",
                "updated_at": "2022-10-15T05:17:13.000000Z"
            },
            {
                "id": 4,
                "file_name": "189071_1665810065.jpeg",
                "url": "/storage/photo_1.jpeg",
                "large_url": "/storage/photo_1.jpeg",
                "medium_url": "/storage/photo_1.jpeg",
                "thumbnail_url": "/storage/photo_1.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:01:06.000000Z",
                "updated_at": "2022-10-15T05:01:07.000000Z"
            },
            {
                "id": 5,
                "file_name": "168052_1665810112.jpg",
                "url": "/storage/photo_1.jpeg",
                "large_url": "/storage/photo_1.jpeg",
                "medium_url": "/storage/photo_1.jpeg",
                "thumbnail_url": "/storage/photo_1.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:01:53.000000Z",
                "updated_at": "2022-10-15T05:01:53.000000Z"
            },
            {
                "id": 6,
                "file_name": "175825_1665810159.jpg",
                "url": "/storage/photo_1.jpeg",
                "large_url": "/storage/photo_1.jpeg",
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/175825_1665810159.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/175825_1665810159.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:02:39.000000Z",
                "updated_at": "2022-10-15T05:02:40.000000Z"
            },
            {
                "id": 7,
                "file_name": "173210_1665810181.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/173210_1665810181.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/173210_1665810181.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/173210_1665810181.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:03:01.000000Z",
                "updated_at": "2022-10-15T05:03:02.000000Z"
            },
            {
                "id": 8,
                "file_name": "127421_1665810208.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/127421_1665810208.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/127421_1665810208.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/127421_1665810208.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:03:29.000000Z",
                "updated_at": "2022-10-15T05:03:29.000000Z"
            },
            {
                "id": 9,
                "file_name": "167849_1665810224.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/167849_1665810224.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/167849_1665810224.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/167849_1665810224.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:03:44.000000Z",
                "updated_at": "2022-10-15T05:03:45.000000Z"
            },
            {
                "id": 11,
                "file_name": "120202_1665810293.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/120202_1665810293.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/120202_1665810293.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/120202_1665810293.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:04:54.000000Z",
                "updated_at": "2022-10-15T05:04:54.000000Z"
            },
            {
                "id": 12,
                "file_name": "145615_1665810315.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/145615_1665810315.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/145615_1665810315.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/145615_1665810315.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:05:16.000000Z",
                "updated_at": "2022-10-15T05:05:16.000000Z"
            },
            {
                "id": 13,
                "file_name": "138305_1665810331.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/138305_1665810331.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/138305_1665810331.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/138305_1665810331.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:05:32.000000Z",
                "updated_at": "2022-10-15T05:05:32.000000Z"
            },
            {
                "id": 14,
                "file_name": "152054_1665810353.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/152054_1665810353.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/152054_1665810353.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/152054_1665810353.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:05:53.000000Z",
                "updated_at": "2022-10-15T05:05:54.000000Z"
            },
            {
                "id": 15,
                "file_name": "11_1-181628_1665810366.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/181628_1665810366.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/181628_1665810366.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/181628_1665810366.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:06:07.000000Z",
                "updated_at": "2022-10-15T05:06:07.000000Z"
            },
            {
                "id": 16,
                "file_name": "11_2-198389_1665810446.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/198389_1665810446.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/198389_1665810446.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/198389_1665810446.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:07:27.000000Z",
                "updated_at": "2022-10-15T05:07:27.000000Z"
            },
            {
                "id": 17,
                "file_name": "11_3-129943_1665810493.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/129943_1665810493.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/129943_1665810493.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/129943_1665810493.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:08:13.000000Z",
                "updated_at": "2022-10-15T05:08:13.000000Z"
            },
            {
                "id": 18,
                "file_name": "11_4-188349_1665810518.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/188349_1665810518.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/188349_1665810518.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/188349_1665810518.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:08:39.000000Z",
                "updated_at": "2022-10-15T05:08:39.000000Z"
            },
            {
                "id": 19,
                "file_name": "11_5-164634_1665810545.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/164634_1665810545.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/164634_1665810545.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/164634_1665810545.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:09:06.000000Z",
                "updated_at": "2022-10-15T05:09:06.000000Z"
            },
            {
                "id": 20,
                "file_name": "125203_1665810571.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/125203_1665810571.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/125203_1665810571.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/125203_1665810571.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:09:32.000000Z",
                "updated_at": "2022-10-15T05:09:32.000000Z"
            },
            {
                "id": 21,
                "file_name": "138898_1665810597.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/138898_1665810597.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/138898_1665810597.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/138898_1665810597.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:09:57.000000Z",
                "updated_at": "2022-10-15T05:09:57.000000Z"
            },
            {
                "id": 22,
                "file_name": "14_1-161142_1665810620.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/161142_1665810620.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/161142_1665810620.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/161142_1665810620.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:10:20.000000Z",
                "updated_at": "2022-10-15T05:10:21.000000Z"
            },
            {
                "id": 23,
                "file_name": "14_2-183221_1665810700.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/183221_1665810700.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/183221_1665810700.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/183221_1665810700.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:11:41.000000Z",
                "updated_at": "2022-10-15T05:11:41.000000Z"
            },
            {
                "id": 24,
                "file_name": "14_3-159182_1665810722.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/159182_1665810722.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/159182_1665810722.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/159182_1665810722.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:12:03.000000Z",
                "updated_at": "2022-10-15T05:12:03.000000Z"
            },
            {
                "id": 25,
                "file_name": "181813_1665810752.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/181813_1665810752.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/181813_1665810752.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/181813_1665810752.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:12:33.000000Z",
                "updated_at": "2022-10-15T05:12:33.000000Z"
            },
            {
                "id": 26,
                "file_name": "180884_1665810777.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/180884_1665810777.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/180884_1665810777.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/180884_1665810777.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:12:57.000000Z",
                "updated_at": "2022-10-15T05:12:57.000000Z"
            },
            {
                "id": 27,
                "file_name": "122356_1665810799.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/122356_1665810799.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/122356_1665810799.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/122356_1665810799.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:13:20.000000Z",
                "updated_at": "2022-10-15T05:13:20.000000Z"
            },
            {
                "id": 28,
                "file_name": "1_1-175826_1665810820.jpeg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/175826_1665810820.jpeg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/175826_1665810820.jpeg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/175826_1665810820.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:13:41.000000Z",
                "updated_at": "2022-10-15T05:13:41.000000Z"
            },
            {
                "id": 29,
                "file_name": "1_2-192008_1665810841.jpeg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/192008_1665810841.jpeg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/192008_1665810841.jpeg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/192008_1665810841.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:14:01.000000Z",
                "updated_at": "2022-10-15T05:14:02.000000Z"
            },
            {
                "id": 30,
                "file_name": "1_3-153696_1665810863.jpeg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/153696_1665810863.jpeg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/153696_1665810863.jpeg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/153696_1665810863.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:14:24.000000Z",
                "updated_at": "2022-10-15T05:14:24.000000Z"
            },
            {
                "id": 31,
                "file_name": "1_4-149030_1665810886.jpeg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/149030_1665810886.jpeg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/149030_1665810886.jpeg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/149030_1665810886.jpeg",
                "user_id": 1,
                "created_at": "2022-10-15T05:14:47.000000Z",
                "updated_at": "2022-10-15T05:14:47.000000Z"
            },
            {
                "id": 32,
                "file_name": "2_1-170934_1665810906.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/170934_1665810906.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/170934_1665810906.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/170934_1665810906.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:15:06.000000Z",
                "updated_at": "2022-10-15T05:15:07.000000Z"
            },
            {
                "id": 33,
                "file_name": "2_2-115484_1665810936.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/115484_1665810936.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/115484_1665810936.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/115484_1665810936.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:15:37.000000Z",
                "updated_at": "2022-10-15T05:15:37.000000Z"
            },
            {
                "id": 34,
                "file_name": "2_3-157408_1665810955.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/157408_1665810955.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/157408_1665810955.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/157408_1665810955.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:15:55.000000Z",
                "updated_at": "2022-10-15T05:15:56.000000Z"
            },
            {
                "id": 35,
                "file_name": "2_4-167333_1665810973.jpg",
                "url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/167333_1665810973.jpg",
                "large_url": null,
                "medium_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/medium/167333_1665810973.jpg",
                "thumbnail_url": "https://aimme.s3.ap-southeast-1.amazonaws.com/shop_dev/thumbnail/167333_1665810973.jpg",
                "user_id": 1,
                "created_at": "2022-10-15T05:16:14.000000Z",
                "updated_at": "2022-10-15T05:16:14.000000Z"
            }
        ]';
    }
}
