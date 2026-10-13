<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Elektronik'          => 'Laptop, ponsel, tablet, dan perangkat elektronik untuk kerja dan hiburan.',
            'Fashion Pria'        => 'Pakaian dan aksesori untuk pria.',
            'Fashion Wanita'      => 'Pakaian dan aksesori untuk wanita.',
            'Rumah Tangga'        => 'Peralatan dapur, kebersihan, dan perlengkapan rumah sehari-hari.',
            'Olahraga'            => 'Peralatan olahraga, kebugaran, dan kegiatan outdoor.',
            'Buku & Alat Tulis'   => 'Buku pelajaran, alat tulis, dan perlengkapan belajar.',
        ];

        foreach ($categories as $name => $description) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $description,
            ]);
        }
    }
}
