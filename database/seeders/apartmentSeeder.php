<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class apartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Events');
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \Illuminate\Support\Facades\DB::table('apartments')->truncate();
        \Illuminate\Support\Facades\DB::table('apartments')->insert([
            [
                'id' => 1,
                'name' => 'Chung cư quận cầu giấy',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 2,
                'name' => 'Căn hộ hạng sang view sông hồng',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'phù hợp với gia đình trẻ, làm việc gần quận long biên',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 3,
                'name' => 'Căn hộ thu nhập thấp',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 4,
                'name' => 'Villa nghỉ dưỡng Quảng Ninh',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 5,
                'name' => 'Chung cư bộ công an',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 6,
                'name' => 'Nhà chính chủ quận 7',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 7,
                'name' => 'Bán nhà gấp do thiếu nợ',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 8,
                'name' => 'Căn họ full nội thất giá rẻ',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 9,
                'name' => 'Đất nền quận long biên',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 10,
                'name' => 'Nhà đất dịch vọng hậu',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 11,
                'name' => 'Căn hộ view nghĩa trang mai dịch',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 12,
                'name' => 'Đất chính chủ cần bán',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 13,
                'name' => 'Đất quận Bắc Từ Liêm',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 14,
                'name' => 'Chung cư đường khuất duy tiến',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 15,
                'name' => 'Nhà ở xã hội bán gấp',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 16,
                'name' => 'Đất đầu tư Bắc Ninh',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 17,
                'name' => 'Nhà có sẵn sổ đỏ, quận Cầu Giấy',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 18,
                'name' => 'Đất đồi ngoài thành',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 19,
                'name' => 'Trang trại cần bán',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ],
            [
                'id' => 20,
                'name' => 'Bán nhà chính chủ quận Long Biên',
                'address' => $faker->address,
                'price' => $faker->numberBetween(15,35)*1000000,
                'information' => 'Nhà 4 mặt thoáng, gần trường học',
                'informationDetail'=> $faker->paragraph,
                'thumbnail'=> $faker->imageUrl,
                'status'=> $faker->numberBetween(1,3)
            ]
        ]);
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
