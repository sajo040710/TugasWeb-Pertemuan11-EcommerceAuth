<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/** 54 produk (9 per kategori), harga dalam Rupiah, dimiliki bergantian oleh 2 editor. */
class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $catalog = [
            'Elektronik' => [
                ['Laptop Acer Aspire Lite 14 Core i5 8/512 GB', 7499000],
                ['Smartphone Realme C67 8/256 GB', 2799000],
                ['Tablet Advan Sketsa 8/128 GB', 2199000],
                ['Monitor AOC 24 Inci IPS 75Hz', 1599000],
                ['Printer HP Smart Tank 580 All-in-One', 2899000],
                ['Hard Disk Eksternal Seagate 1 TB', 949000],
                ['Smartwatch Redmi Watch 5 Lite', 699000],
                ['Headset Gaming Over-Ear dengan Mikrofon', 249000],
                ['Webcam Full HD 1080p dengan Mikrofon', 275000],
            ],
            'Fashion Pria' => [
                ['Kemeja Koko Lengan Panjang Bordir', 185000],
                ['Kaos Henley Lengan Panjang Cotton', 95000],
                ['Celana Jeans Straight Cut Pria', 275000],
                ['Jaket Varsity Bomber Pria', 335000],
                ['Sepatu Pantofel Formal Pria', 345000],
                ['Sandal Gunung Pria Anti Slip', 159000],
                ['Tas Ransel Pria Kanvas', 215000],
                ['Kemeja Batik Lengan Panjang Pria', 225000],
                ['Celana Training Jogger Pria', 119000],
            ],
            'Fashion Wanita' => [
                ['Tunik Kaftan Wanita Motif Etnik', 195000],
                ['Kemeja Oversize Wanita Katun', 155000],
                ['Pashmina Plisket Premium', 59000],
                ['Rok Plisket Satin Wanita', 129000],
                ['Tas Jinjing Wanita Kulit Sintetis', 249000],
                ['Sandal Teplek Wanita Empuk', 99000],
                ['Blazer Formal Wanita', 289000],
                ['Mukena Katun Jepang Bordir', 275000],
                ['Kaos Oversize Wanita Crop', 89000],
            ],
            'Rumah Tangga' => [
                ['Mesin Cuci Mini Portable 4.5 Kg', 1049000],
                ['Teflon Grill Pan Anti Lengket 28 cm', 169000],
                ['Oven Listrik Low Watt 20 Liter', 899000],
                ['Kompor Induksi Portable', 399000],
                ['Vacuum Cleaner Mini Rumah dan Mobil', 189000],
                ['Set Gelas Kaca 6 Pcs', 79000],
                ['Karpet Bulu Lembut 120x160 cm', 185000],
                ['Rak Serbaguna Plastik 4 Susun', 225000],
                ['Lampu Tidur LED Sentuh', 69000],
            ],
            'Olahraga' => [
                ['Sit Up Bench Lipat Multifungsi', 479000],
                ['Sepatu Sepak Bola Pria', 369000],
                ['Bola Futsal Ukuran 4', 165000],
                ['Kok Badminton Bulu Angsa Isi 12', 135000],
                ['Hand Gripper Adjustable Set 5 Pcs', 49000],
                ['Tas Raket Badminton 2 Ruang', 175000],
                ['Jersey Bola Dewasa Printing', 99000],
                ['Pelindung Lutut Olahraga Sepasang', 69000],
                ['Cone Latihan Isi 20 Pcs', 59000],
            ],
            'Buku & Alat Tulis' => [
                ['Buku Pemrograman JavaScript Modern', 119000],
                ['Buku Jaringan Komputer dan Internet', 109000],
                ['Buku Pengantar Statistika', 95000],
                ['Buku Sistem Operasi Konsep Dasar', 105000],
                ['Pulpen Tinta Gel Hitam 0.7 mm Isi 24', 54000],
                ['Clipboard Akrilik A4', 29000],
                ['Stapler Mini dengan Isi', 25000],
                ['Buku Sketsa Spiral A4', 45000],
                ['Rak Laptop Lipat Aluminium', 139000],
            ],
        ];

        $editorIds = User::where('role', User::ROLE_EDITOR)->pluck('id');
        $i = 0;

        foreach ($catalog as $categoryName => $items) {
            $category = Category::where('name', $categoryName)->firstOrFail();

            foreach ($items as [$name, $price]) {
                Product::create([
                    'category_id' => $category->id,
                    'user_id'     => $editorIds[$i++ % $editorIds->count()],
                    'name'        => $name,
                    'slug'        => Str::slug($name),
                    'description' => "{$name} — produk {$categoryName} pilihan Toko Joses dengan kualitas terjamin. "
                        .'Garansi toko 7 hari dan pengiriman ke seluruh Indonesia.',
                    'price'       => $price,
                    'stock'       => fake()->numberBetween(5, 120),
                    'is_active'   => true,
                ]);
            }
        }
    }
}
